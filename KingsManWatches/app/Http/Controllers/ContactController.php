<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends ClientController
{
    public function index(){
        return view("pages.client.contact",$this->data);
    }
    public function contact(ContactRequest $request){
        try {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phoneNumber = $request->phoneNumber;
            $contact->message = $request->message;
            $contact->save();
            return redirect()->back()->with("success","Your feedback was sent");
        }
        catch(\Exception $ex) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $ex->getMessage());
            return redirect()->back()->withErrors(["We encountered an error.", 'Error ID: ' . $uniqueId]);
        }

    }
}
