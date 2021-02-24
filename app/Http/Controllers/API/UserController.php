<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetSuccessful;
use App\Models\PasswordReset;
use App\Models\User;
use App\Models\VerifyUser;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * @group User Management Endpoints
     *
     * User Details
     *
     * This endpoint lets you login a user.
     * @authenticated
     *
     * @response scenario=success {
     * "success": true,
     * "data": {
     * "id": 84,
     * "Title": "",
     * "name": "Michael Gates",
     * "email": "mgates4410@gmail.com",
     * "email_verified_at": null,
     * "api_token": null,
     * "two_factor_recovery_codes": null,
     * "profPic": "storage/ProfilePictures/mgates4410@gmail.com.png",
     * "isAdmin": true,
     * "current_team_id": null,
     * "profile_photo_path": null,
     * "created_at": "2020-11-24T06:50:33.000000Z",
     * "updated_at": "2021-01-06T23:39:58.000000Z",
     * "verified_at": null
     * },
     * "message": "User details retrieved successfully"
     * }
     *
     * @response status=400 {
     *
     * }
     */
    public function details(Request $request)
    {
        return response()->json([
            "success" => true,
            "data" => $request->user(),
            "message" => "User details retrieved successfully"
        ]);
    }

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

    /**
     * @group User Management Endpoints
     *
     * Edit user Details
     *
     * This endpoint lets you edit the user details.
     * @authenticated
     *
     * @queryParam fields required Comma-separated list of fields to include in the response. Example: title,published_at,is_public
     *
     * @bodyParam Title string required The title of the user. Example: Prof.
     * @bodyParam name string required The full names of the user. Example: John Doe
     * @bodyParam email string required The email of the user. Example: john@kris.com.
     *
     * @response scenario=success {
     *"success" : "true",
     * "data" : $user,
     * "message" : "Your profile has been updates successfully"
     * }
     *
     */
    public function edit(Request $request)
    {
        try {
            if ($request->isJson()) {
                $data = $request->json()->all();
            } else {
                $data = $request->all();
            }
            $validator = Validator::make($data, [
                'Title' => 'string',
                'name' => 'string',
                'email' => 'email',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                $error["message"] = $errors[0];
                $error["code"] = 'VALIDATION_ERROR';
                return response()->json([
                    "success" => false,
                    "exception" => $error
                ], 400);
            }
            $user = $request->user();
            $user->name = $data["name"];
            $user->save();
            return response()->json([
                "success" => true, "data" => $user, "message" => "Your profile has been updated successfully"
            ], 200);
        } catch (QueryException $exception) {
            return response()->json($exception, 400);
        }
    }

    /**
     * @group User Management Endpoints
     *
     * Add user Image
     *
     * This endpoint lets you upload a user profile image.
     * @authenticated
     *
     * @bodyParam file file required The file object to be uploaded
     *
     * @response scenario=success {
     *"success" : true,
     * "data" : $user,
     * "message" : "Profile Photo Updated successfully"
     * }
     *
     */
    public function addUserImage(Request $request)
    {
        $user = $request->user();
        if ($request->isJson()) {
            $imageDetails = $request->json()->all();
        } else {
            $imageDetails = $request->all();
        }

        $validator = Validator::make($imageDetails, [
            'file' => 'required_without_all:url|image|max:20000'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $error["code"] = 'VALIDATION_ERROR';
            $error["message"] = $errors[0];
            return response()->json([
                "success" => false,
                "error" => $error,
                "message" => "Unable to validate image"
            ], 400);
        }

        try {
            $file = $request->file('file');
            //store
            $path = Storage::disk('api')->put('ProfilePictures', $file);

            $user->profPic = 'storage/app/public/'.$path;
            $user->save();
            return response()->json([
                "success" => true, "data" => $user, "message" => "Profile Photo Updated successfully"
            ],
                200);
        } catch (QueryException $exception) {
            return response()->json(["success" => false, $exception], 400);
        }
    }

    /**
     * @group User Management Endpoints
     *
     * Get user Image Url
     *
     * This endpoint lets you fetch a logged in user profile image or fetch a user image by user id.
     * @authenticated
     *
     * @queryParam user_id integer The specified user's id
     *
     */
    public function getUserImage(Request $request)
    {
        $user = $request->user();
        if ($request->has('user_id')) {
            $user = User::find($request->get('user_id'));
        }
        return URL::asset($user->profPic);
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
//            // $resetToken["current_date"] = date('Y-m-d H:i:s', strtotime(gmdate("Y-m-d H:i:s")));
//            // $resetToken["expiry_date"] = date('Y-m-d H:i:s', strtotime($resetToken["created_at"]) + 86400);
//            $expire_within_hours = ((strtotime($resetToken["created_at"]) + (env('REQUEST_EXPIRATION_TIME') * 3600)) - strtotime(gmdate("Y-m-d H:i:s"))) / 3600;
//            $request->session()->put(['email' => $resetToken->email]);
//            $request->session()->put(['token' => $resetToken->token]);
//            $request->session()->put(['expiry' => $expire_within_hours]);
//            if ($expire_within_hours < 0) {
//                return redirect('/message')->with('warning', "Sorry! This link has expired.");
//            }
            $manufacture_time = Carbon::createFromTimestamp($resetToken->created_at);
            $life_hours = env('REQUEST_EXPIRATION_TIME');
            $expiry_time = Carbon::parse($manufacture_time)->addHours($life_hours);
            $time_left = $manufacture_time->diffInSeconds($expiry_time);
            if ($time_left < 0) {
                return redirect('/message')->with('warning', "Sorry! This link has expired.");
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

    /**
     * @group User Management Endpoints
     *
     * Delete user account
     *
     * This endpoint lets you delete the user account.
     * @authenticated
     *
     * @response scenario=success {
     * "success" : true,
     * "message" : "Your account has been deleted successfully"
     * }
     *
     * @response status=400 {
     *"message": "Unauthenticated."
     * }
     */
    public function deleteAccount(Request $request)
    {
        try {
            $user = $request->user();
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
            if ($user->delete()) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "Your account has been deleted successfully"
                    ]
                    , 200);
            }
        } catch (\Exception $exception) {
            return response()->json(
                [
                    "success" => false,
                    "exception" => $exception,
                    "message" => "Your account could not be deleted"
                ]
                , 200);
        }
        return response()->json(
            [
                "success" => false,
                "message" => "Your account could not be deleted"
            ]
            , 200);
    }

}
