<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends ClientController
{
    public function register(RegisterRequest $request){
        try {
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->role_id = 1;
            $emailTaken = $user->where('email','=',$request->email);
            if($emailTaken){
                return redirect()->back()->with('error', 'User with provided email already exist.');
            }
            $user->password = md5($request->password);
            $user->save();
            $this->logAction("User: ".$request->get('username')." registered .", $request);
            return back()->with("success-msg", "Successfully registered user");
        }
        catch(\Exception $ex) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $ex->getMessage());
            return redirect()->back()->withErrors(["We encountered an error.", 'Error ID: ' . $uniqueId]);
        }

    }
}
