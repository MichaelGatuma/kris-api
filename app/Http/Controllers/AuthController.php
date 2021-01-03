<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordRequest;
use App\Mail\PasswordResetSuccessful;
use App\Models\PasswordReset;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'Title' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'profPic' => 'required',
            'device_name' => 'required',
        ]);
        $user = new User();
        $user->Title = $request->Title;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->profPic = $request->profPic;
        $user->save();

        $tokenResult = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            "success" => [
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]
        ], 200);

    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required',
                'device_name' => 'required',
            ]);
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    "failure" => [
                        'message' => 'Unauthorized',
                    ]
                ], 500);
            }
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new Exception('Error in Login');
            }
            $tokenResult = $user->createToken($request->device_name)->plainTextToken;
            return response()->json([
                "success" => [
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                ]
            ], 200);

        } catch (Exception $error) {
            return response()->json([
                "failure" => [
                    'message' => 'Error in Login',
                    'error' => $error,
                ]
            ], 500);
        }
    }

    public function forgotPasswordRequest(Request $request)
    {
        //email
        $details = ['email' => $request->email];

        $validator = Validator::make($details, [
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $error["message"] = $errors[0];
            $error["code"] = 'VALIDATION_ERROR';
            return response()->json(["error" => $error], 400);
        }

        try {
            $passResetToken = PasswordReset::create([
                'email' => $details['email'],
                'token' => Str::random(40)
            ]);
            $token = $passResetToken->token;
            Mail::to($passResetToken->email)->send(new ForgotPasswordRequest($token));
            $success['message'] = "We have sent instructions to your email for reset password. Please check your inbox.";
            return response()->json(['success' => $success], 200);
        } catch (QueryException $exception) {
            return response()->json($exception, 400);
        }
    }

    public function resetPasswordByAuth(Request $request)
    {
        $newDetails = $request->all();
        $user = Auth::user();
        $validator = Validator::make($newDetails, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
            'current_password' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $error["message"] = $errors[0];
            $error["code"] = 'VALIDATION_ERROR';
            return response()->json(["error" => $error], 400);
        } else {
            if (Hash::check($newDetails["current_password"], $user->password)) {
                // The passwords match...
                $user['password'] = bcrypt($newDetails['password']);
                $user->save();
                Mail::to($user->email)->send(new PasswordResetSuccessful());
                return response()->json(["success" => ["message" => "Your password has been reset successfully."]],
                    200);
            } else {
                $error['code'] = "INVALID_CREDENTIALS";
                $error['message'] = "Your current password is incorrect";
                return response()->json(["error" => $error], 400);
            }
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->delete();
        return response()->json(["success" => ["message" => "Logged out Successfully."]], 200);
    }
}
