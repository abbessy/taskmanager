<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\ResponsableInvite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class ResponsableController extends Controller
{
    
    public function list(Request $request){

        if($request->ajax()){
            $data = User::select('*')->where('user_type','responsable');
            return DataTables::of($data)
            ->addIndexColumn()
             ->addColumn('action', function ($responsable) {
                return '<ul class="list-inline m-0">
                <li class="list-inline-item">
                    <a href="'.url('/responsables/'.$responsable->id).'">
                        <button class="btn btn-outline-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Update"><i class="bx bx-edit-alt"></i></button>
                    </a>
                </li>
                <li class="list-inline-item">
                    <form action="'.url('/responsables/'.$responsable->id).'" method="POST">
                        '.method_field('DELETE').'
                        '.csrf_field().'
                        <button class="btn btn-outline-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bx bx-trash"></i></button>
                    </form>
                </li>
            </ul>';
            
            })
            ->make(true);
        }

        return view('responsables');
    }


    public function register(Request $request)
    {
        $invite = ResponsableInvite::where('email', $request['email'])->first();
        $invite->delete();

        $userData = $request->all();
        $userData['password'] = Hash::make($request->input('password'));

        User::create($userData);

        return redirect('/home')->with('success','Responsable created successfully.');

    }

    public function edit(User $responsable){
        return view ('edit-responsable',[
            'responsable' => $responsable
        ]);
    }

    public function update(User $responsable){
        
        $data = request()->all();
        $responsable->update($data);
        return redirect('/responsables');
    }

    public function destroy(User $responsable){
        $responsable->delete(); 
        return redirect('/responsables');
    }
}
