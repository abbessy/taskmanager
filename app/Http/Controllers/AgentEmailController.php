<?php

namespace App\Http\Controllers;

use App\Models\AgentInvite;
use App\Notifications\AgentInviteNotification;
use Illuminate\Http\Request;
use Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AgentEmailController extends Controller
{
    public function sendEmail(Request $request){
        
        $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users,email'
        ]);

        $validator->after(function ($validator) use ($request) {
            if (AgentInvite::where('email', $request->input('email'))->exists()) {
                $validator->errors()->add('email', 'There exists an invite with this email!');
            }
        });

        if ($validator->fails()) {
        return redirect('agents/invite')
            ->withErrors($validator)
            ->withInput(); }

        do {
        $token = Str::random(20);
        } 
        while (AgentInvite::where('token', $token)->first());

        AgentInvite::create([
            'token' => $token,
            'email' => $request->input('email'),
            'responsable_id' => $request->input('responsable_id')
        ]);
        
        $url = URL::temporarySignedRoute(

            'AgentRegistration', now()->addMinutes(300), ['token' => $token]
        );
        
        Notification::route('mail', $request->input('email'))->notify(new AgentInviteNotification($url));
        
        
        return redirect('/agents')->with('success', 'The Invite has been sent successfully');

    }  

    public function invite(){
        
        return view('invite-agent');
    }

    public function registration_view($token)
    {
        $invite = AgentInvite::where('token', $token)->first();
        return view('auth.agent-register',[
            'invite' => $invite,
        ]);
    }
}
