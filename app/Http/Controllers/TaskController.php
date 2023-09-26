<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class TaskController extends Controller
{
    public function list(Request $request){

        $tasks = Task::where('responsable_id', Auth::user()->id)->get();

        $agents = User::where('user_type', 'agent')
                 ->where('responsable_id', auth()->user()->id)
                 ->get();
        
       if($request->ajax()){
            $data = Task::where('responsable_id', Auth::user()->id)->get();
            return DataTables::of($data)
            ->addIndexColumn()
             ->addColumn('action', function ($task) {
                return '<ul class="list-inline m-0">
                <li class="list-inline-item">
                    <a href="'.url('/tasks/comment/'.$task->id).'">
                        <button class="btn btn-outline-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="comment"><i class="bx bx-message-square-dots"></i></button>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="'.url('/tasks/'.$task->id).'">
                        <button class="btn btn-outline-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Update"><i class="bx bx-edit-alt"></i></button>
                    </a>
                </li>
                <li class="list-inline-item">
                    <form action="'.url('/tasks/'.$task->id).'" method="POST">
                        '.method_field('DELETE').'
                        '.csrf_field().'
                        <button class="btn btn-outline-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bx bx-trash"></i></button>
                    </form>
                </li>
            </ul>';
            
            })
            ->make(true);
        }

        return view('tasks',[
            'tasks' => $tasks,
            'agents' => $agents
        ]);
    }

    public function store(Request $request)
    {
      
        Task::create([
            'title' => $request->input('title'),
            'description' =>$request->input('description'),
            'status' => $request->input('status'),
            'creation_time' => $request->input('creation_time'),
            'limit_time' => $request->input('limit_time'),
            'responsable_id' => $request->input('responsable_id'),
            'agent_id' => $request->input('agent_id'),
            

        ]);
       
        return redirect('tasks')->with('success','Task created successfully.');
    }

     public function edit(Task $task){
        return view ('edit-task',[
            'task' => $task
        ]);
    }

    public function update(Task $task){
        
        $data = request()->all();
        $task->update($data);
        return redirect('/tasks');
    }

    public function destroy(Task $task){
        $task->delete(); 
        return redirect('/tasks');
    }

    public function getTasksByAgent(Request $request){
        $tasks = Task::where('agent_id', Auth::user()->id)->get();

        if($request->ajax()){
            $data = Task::where('agent_id', Auth::user()->id)->get();
            return DataTables::of($data)
            ->addIndexColumn()
             ->addColumn('action', function ($task) {
                return '<ul class="list-inline m-0">
                <li class="list-inline-item">
                    <a href="'.url('/agent/comments/'.$task->id).'">
                        <button class="btn btn-outline-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="comment"><i class="bx bx-message-square-dots"></i></button>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="'.url('/agent/tasks/'.$task->id).'">
                        <button class="btn btn-outline-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Update"><i class="bx bx-edit-alt"></i></button>
                    </a>
                </li>
                
            </ul>';
            
            })
            ->make(true);
        }
          
        return view('agent-tasks',[
            'tasks' => $tasks,
        ]);
    }

    public function agent_edit(Task $task){
        return view ('agent-edit-task',[
            'task' => $task
        ]);
    }

    public function agent_update(Task $task){
        
        $data = request()->all();
        $task->update($data);
        return redirect('/agent-tasks');
    }

    public function showComment(Task $task){
        return view ('show-comment',[
            'task' => $task
        ]);
    }

    public function createComment(Task $task){
        return view ('create-comment',[
            'task' => $task
        ]);
    }

    public function storeComment(Task $task){
        
        $data = request()->all();
        $task->update($data);
        return redirect('/agent-tasks');
    }


}
