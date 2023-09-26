<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use App\Models\Company;
use App\Notifications\InviteNotification;
use Illuminate\Http\Request;
use Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EmailController extends Controller
{

    public function sendEmail(Request $request){
        
        $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users,email'
        ]);

        $validator->after(function ($validator) use ($request) {
            if (Invite::where('email', $request->input('email'))->exists()) {
                $validator->errors()->add('email', 'There exists an invite with this email!');
            }
        });

        if ($validator->fails()) {
        return redirect('clients/invite')
            ->withErrors($validator)
            ->withInput(); }

        do {
        $token = Str::random(20);
        } 
        while (Invite::where('token', $token)->first());

        Invite::create([
            'token' => $token,
            'email' => $request->input('email')
        ]);
        
        $url = URL::temporarySignedRoute(

            'registration', now()->addMinutes(300), ['token' => $token]
        );
        
       Notification::route('mail', $request->input('email'))->notify(new InviteNotification($url));
       
        
       return redirect('/clients')->with('success', 'The Invite has been sent successfully');
    
    }  

    public function invite(){
        $companies = Company::all();
        return view('invite-client',[
            'companies' => $companies
        ]);
    }

    public function registration_view($token)
    {
        $company = Company::latest()->first();
        $invite = Invite::where('token', $token)->first();
        return view('auth.register',[
            'invite' => $invite,
            'company'=> $company
        ]);
    }

}
