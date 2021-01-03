<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordRequest;
use App\Models\PasswordReset;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
            'status_code' => 200,
            'access_token' => $tokenResult,
            'token_type' => 'Bearer',
        ]);
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
                    'status_code' => 500,
                    'message' => 'Unauthorized'
                ]);
            }
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new Exception('Error in Login');
            }
            $tokenResult = $user->createToken($request->device_name)->plainTextToken;
            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Login',
                'error' => $error,
            ]);
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
                'token' => str_random(40)
            ]);
            $token = $passResetToken->token;
            Mail::to($passResetToken->email)->send(new ForgotPasswordRequest($token));
            $success['message'] = "We have sent instructions to your email for reset password. Please check your inbox.";
            return response()->json(['success' => $success], 200);
        } catch (QueryException $exception) {
            return response()->json($exception, 400);
        }
    }
}
