<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class ClientController extends Controller
{

    public function list(Request $request){


        if($request->ajax()){
            $data = User::select('*')->where('user_type','client');
            return DataTables::of($data)
            ->addIndexColumn()
             ->addColumn('action', function ($client) {
                return '<ul class="list-inline m-0">
                <li class="list-inline-item">
                    <a href="'.url('/clients/'.$client->id).'">
                        <button class="btn btn-outline-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Update"><i class="bx bx-edit-alt"></i></button>
                    </a>
                </li>
                <li class="list-inline-item">
                    <form action="'.url('/clients/'.$client->id).'" method="POST">
                        '.method_field('DELETE').'
                        '.csrf_field().'
                        <button class="btn btn-outline-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bx bx-trash"></i></button>
                    </form>
                </li>
            </ul>';
            
            })
            ->make(true);
        }

        return view('clients');
    }


    public function edit(User $client){
        return view ('edit',[
            'client' => $client
        ]);
    }

    public function update(User $client){
        
        $data = request()->all();
        $client->update($data);
        return redirect('/clients');
    }

    public function destroy(User $client){
        $client->delete(); 
        return redirect('/clients');
    }
}
