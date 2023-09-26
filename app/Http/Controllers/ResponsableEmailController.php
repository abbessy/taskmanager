<?php

namespace App\Http\Controllers;

use App\Models\ResponsableInvite;
use App\Notifications\ResponsableInviteNotification;
use Illuminate\Http\Request;
use Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ResponsableEmailController extends Controller
{
    public function sendEmail(Request $request){
        
        $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users,email'
        ]);

        $validator->after(function ($validator) use ($request) {
            if (ResponsableInvite::where('email', $request->input('email'))->exists()) {
                $validator->errors()->add('email', 'There exists an invite with this email!');
            }
        });

        if ($validator->fails()) {
        return redirect('responsables/invite')
            ->withErrors($validator)
            ->withInput(); }

        do {
        $token = Str::random(20);
        } 
        while (ResponsableInvite::where('token', $token)->first());

        ResponsableInvite::create([
            'token' => $token,
            'email' => $request->input('email'),
            'client_id' => $request->input('client_id')
        ]);
        
        $url = URL::temporarySignedRoute(

            'ResponsableRegistration', now()->addMinutes(300), ['token' => $token]
        );
        
        Notification::route('mail', $request->input('email'))->notify(new ResponsableInviteNotification($url));
        
        
        return redirect('/responsables')->with('success', 'The Invite has been sent successfully');

    }  

    public function invite(){
        
        return view('invite-responsable');
    }

    public function registration_view($token)
    {
        $invite = ResponsableInvite::where('token', $token)->first();
        return view('auth.responsable-register',[
            'invite' => $invite,
        ]);
    }
}
