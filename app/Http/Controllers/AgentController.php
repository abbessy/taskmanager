<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\AgentInvite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class AgentController extends Controller
{
    
    public function list(Request $request){

        if($request->ajax()){
            $data = User::select('*')->where('user_type','agent');
            return DataTables::of($data)
            ->addIndexColumn()
             ->addColumn('action', function ($agent) {
                return '<ul class="list-inline m-0">
                <li class="list-inline-item">
                    <a href="'.url('/agents/'.$agent->id).'">
                        <button class="btn btn-outline-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Update"><i class="bx bx-edit-alt"></i></button>
                    </a>
                </li>
                <li class="list-inline-item">
                    <form action="'.url('/agents/'.$agent->id).'" method="POST">
                        '.method_field('DELETE').'
                        '.csrf_field().'
                        <button class="btn btn-outline-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bx bx-trash"></i></button>
                    </form>
                </li>
            </ul>';
            
            })
            ->make(true);
        }

        return view('agents');
    }


    public function register(Request $request)
    {
        $invite = AgentInvite::where('email', $request['email'])->first();
        $invite->delete();

        $userData = $request->all();
        $userData['password'] = Hash::make($request->input('password'));

        User::create($userData);

        return redirect('/home')->with('success','Agent created successfully.');

    }

    public function edit(User $agent){
        return view ('edit-agent',[
            'agent' => $agent
        ]);
    }

    public function update(User $agent){
        
        $data = request()->all();
        $agent->update($data);
        return redirect('/agents');
    }

    public function destroy(User $agent){
        $agent->delete(); 
        return redirect('/agents');
    }
}
