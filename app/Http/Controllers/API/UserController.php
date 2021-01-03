<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetSuccessful;
use App\Models\PasswordReset;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //verifying user account by token, sent via mail
    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if (isset($verifyUser)) {
            $user = $verifyUser->user;
            if (!$user->isVerified) {
                $verifyUser->user->isVerified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return redirect('/message')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('/message')->with('status', $status);
    }

    public function edit(Request $request, $id)
    {
        try {
            $data = '';
            if ($request->isJson()) {
                $data = $request->json()->all();
            } else {
                $data = $request->all();
            }
            $validator = Validator::make($data, [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                $error["message"] = $errors[0];
                $error["code"] = 'VALIDATION_ERROR';
                return response()->json(["error" => $error], 400);
            }
            $user = User::findOrFail($id);
            $user->name = $data["name"];
            $user->save();
            return response()->json(["success" => $user], 200);
        } catch (QueryException $exception) {
            return response()->json($exception, 400);
        }
    }

    public function addUserImage(Request $request)
    {//fixme: change how profile picture is uploaded and saved
        $user = Auth::user();
        $imageDetails = '';
        if ($request->isJson()) {
            $imageDetails = $request->json()->all();
        } else {
            $imageDetails = $request->all();
        }

        $validator = Validator::make($imageDetails, [
            'url' => 'required_without_all:file|url',
            'file' => 'required_without_all:url|image|max:20000'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $error["message"] = $errors[0];
            $error["code"] = 'VALIDATION_ERROR';
            return response()->json(["error" => $error], 400);
        }

        try {
            if(isset($imageDetails["url"])){
                $user->addMediaFromUrl($imageDetails["url"])
                    ->usingName($user["name"]."'s dp")
                    ->toMediaCollection();
            }else{
                $file = $request->file('file');
                $user->addMedia($file)
                    ->usingName($user["name"]."'s dp")
                    ->toMediaCollection();
            }
            $image = $user->getMedia()->last();
            $extension = explode('/',$image->mime_type);
            $image->file_name = str_random(5).'.'. $extension[1];
            $image->save();
            $user["imageUrl"] = $image->getFullUrl();
            $user->save();
            unset($user->{"media"});
            return response()->json(["success" => $user], 200);
        } catch (QueryException $exception) {
            return response()->json($exception, 400);
        }
    }

    public function revokeAllTokens(Request $request)
    {
        $user = $request->user();
        $currentDeviceTokenId = $request->user()->token()->id;
        $userTokens = $user->tokens;

        foreach ($userTokens as $token) {
            if ($token->id !== $currentDeviceTokenId) {
                $token->revoke();
            }
        }
        return response()->json(["success" => ["token" => "Successfully Logged Out from other devices."]]);
    }

    public function toggle2fa(Request $request)
    {
        $user = $request->user();
        $user->update(["2fa" => !$user["2fa"]]);
        return response()->json(["success" => $user]);
    }

    //Verifying forgot password token via mail
    public function verifyForgotPasswordToken(Request $request, $token)
    {
        $resetToken = PasswordReset::where('token', $token)->first();
        if (isset($resetToken)) {
            // $resetToken["current_date"] = date('Y-m-d H:i:s', strtotime(gmdate("Y-m-d H:i:s")));
            // $resetToken["expiry_date"] = date('Y-m-d H:i:s', strtotime($resetToken["created_at"]) + 86400);
            $expire_within_hours = ((strtotime($resetToken["created_at"]) + (env('REQUEST_EXPIRATION_TIME') * 3600)) - strtotime(gmdate("Y-m-d H:i:s"))) / 3600;
            $request->session()->put(['email' => $resetToken->email]);
            $request->session()->put(['token' => $resetToken->token]);
            $request->session()->put(['expiry' => $expire_within_hours]);
            if ($expire_within_hours < 0) {
                return redirect('/message')->with('warning', "Sorry! This link has been expired.");
            }
            //if token is valid, redirect to reset form
            return view("passwordResetForm", compact('resetToken'));
        }
        return redirect('/message')->with('warning', "Sorry your request could not be found or may have been deleted.");
    }

    //Submit new Password details by form
    public function resetPassword(Request $request)
    {
        $newDetails = $request->all();
        $newDetails["email"] = session('email');
        $token = session('token');
        $validator = Validator::make($newDetails, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = User::where('email', $newDetails['email'])->first();
            $user['password'] = bcrypt($newDetails['password']);
            $user->save();
            Mail::to($user->email)->send(new PasswordResetSuccessful());
            PasswordReset::where('token', $token)->delete();
            return redirect('/message')->with('status', 'Your password has been reset successfully');
        }
    }

    public function deleteAccount(){
        //todo
    }
}
