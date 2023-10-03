<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends ClientController
{
    public  function login(LoginRequest $request) {
        try {
            $email = $request->email;
            $password = $request->password;
            $customerModel = new User();
            $customer = $customerModel->where("email", "=", $email);;
            if($customer) {
                if($customer->password == md5($password)){
                    $request->session()->put("user", $customer);
                    $request->session()->put("cartItems", []);
                    return redirect()->route("shop");
                }
                else{
                    return redirect()->back()->with("error", "Incorrect Password");
                }
            }
            else{
                return redirect()->back()->with("error", "User with the provided email doesn't exist.");
            }
            $this->logAction("User: ".$request->get('username')." logged in .", $request);

        }
        catch(\Exception $ex) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $ex->getMessage());
            return redirect()->back()->withErrors(["We encountered an error.", 'Error ID: ' . $uniqueId]);
        }


    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('loginForm');
    }
}
