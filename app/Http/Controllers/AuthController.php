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
        $validator = Validator::make($request->all(), [
            'Title' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'profPic' => 'required',
            'device_name' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $error["code"] = 'VALIDATION_ERROR';
            $error["message"] = $errors[0];
            return response()->json(
                [
                    "success" => false,
                    "exception" => $error
                ]
                , 400);
        }
        $user = new User();
        $user->Title = $request->Title;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->profPic = $request->profPic;
        $user->save();

        $tokenResult = $user->createToken($request->device_name)->plainTextToken;
        return response()->json(
            [
                "success" => true,
                "auth" => [
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                ],
                "user" => $user->toArray(),
                "message" => "Registration Successful"
            ]
            , 200);

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
                return response()->json(
                    [
                        "success" => false,
                        'message' => 'Unauthorized',
                    ]
                    , 500);
            }
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new Exception('Error in Login');
            }
            $tokenResult = $user->createToken($request->device_name)->plainTextToken;
            return response()->json(
                [
                    "success" => true,
                    "auth" => [
                        'access_token' => $tokenResult,
                        'token_type' => 'Bearer',
                    ],
                    "message" => "Login Successful"
                ]
                , 200);

        } catch (Exception $error) {
            return response()->json(
                [
                    "success" => false,
                    'message' => 'Error in Login',
                    'exception' => $error,
                ]
                , 500);
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
            return response()->json(
                [
                    "success" => false,
                    "exception" => $error
                ]
                , 400);
        }

        try {
            $passResetToken = PasswordReset::create([
                'email' => $details['email'],
                'token' => Str::random(40)
            ]);
            $token = $passResetToken->token;
            Mail::to($passResetToken->email)->send(new ForgotPasswordRequest($token));
            return response()->json(
                [
                    'success' => true,
                    'message' => "We have sent instructions to your email for reset password. Please check your inbox."
                ]
                , 200);
        } catch (QueryException $exception) {
            return response()->json(
                [
                    'success' => false,
                    'exception' => $exception
                ]
                , 400);
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
            return response()->json(
                [
                    "success" => false,
                    "exception" => $error
                ]
                , 400);
        } else {
            if (Hash::check($newDetails["current_password"], $user->password)) {
                // The passwords match...
                $user->password = bcrypt($newDetails['password']);
                $user->save();
                Mail::to($user->email)->send(new PasswordResetSuccessful());
                return response()->json(
                    [
                        "success" => true,
                        "message" => "Your password has been reset successfully."
                    ]
                    , 200);
            } else {
                $error['code'] = "INVALID_CREDENTIALS";
                $error['message'] = "Your current password is incorrect";
                return response()->json(
                    [
                        "success" => false,
                        "exception" => $error
                    ]
                    , 400);
            }
        }
    }

    public function logout(Request $request)
    {
        try {
            $user = $request->user();
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
            return response()->json(
                [
                    "success" => true,
                    "message" => "Logged out Successfully."
                ]
                , 200);
        } catch (Exception $exception) {
            return response()->json(
                [
                    "success" => false,
                    "exception" => $exception,
                    "message" => "Unable to log out"
                ]
                , 200);
        }
    }
}
