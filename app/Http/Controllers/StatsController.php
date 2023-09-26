<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function stats(){

        $agents_number = User::where('user_type', 'agent')->count();

        $your_agents_number = User::where('user_type', 'agent')
        ->where('responsable_id', Auth::user()->id)
        ->count();

        $your_tasks = Task::where('responsable_id', Auth::user()->id)->get();

        $tasks_number = Task::count();
        $your_tasks_number = Task::where('responsable_id', Auth::user()->id)->count();

        $todo = Task::where('status', 'to do')
        ->where('responsable_id', Auth::user()->id)
        ->count();
        $in_progress= Task::where('status', 'in progress')
        ->where('responsable_id', Auth::user()->id)
        ->count();
        $finished= Task::where('status', 'finished')
        ->where('responsable_id', Auth::user()->id)
        ->count();
        $exceeded = Task::where('status', 'exceeded')
        ->where('responsable_id', Auth::user()->id)
        ->count();
        $in_problem= Task::where('status', 'in problem')
        ->where('responsable_id', Auth::user()->id)
        ->count();

         $taskData = [
            ['Task', 'status'],
            ['in progress', $in_progress],
            ['in problem', $in_problem],
            ['exceeded', $exceeded],
            ['finished', $finished],
            ['to do', $todo],
            
         ];

        
        $agentsWithTaskCounts = User::where('users.user_type', 'agent')
            ->where('users.responsable_id', Auth::user()->id)
            ->leftJoin('tasks', 'users.id', '=', 'tasks.agent_id')
            ->select('users.id', 'users.name', 
            DB::raw('COUNT(tasks.id) as task_count'),
            DB::raw('COUNT(CASE WHEN tasks.status = "to do" THEN tasks.id END) as todo_count'),
            DB::raw('COUNT(CASE WHEN tasks.status = "in progress" THEN tasks.id END) as in_progress_count'),
            DB::raw('COUNT(CASE WHEN tasks.status = "finished" THEN tasks.id END) as finished_count'),
            DB::raw('COUNT(CASE WHEN tasks.status = "exceeded" THEN tasks.id END) as exceeded_count'),
            DB::raw('COUNT(CASE WHEN tasks.status = "in problem" THEN tasks.id END) as in_problem_count')
            )
            ->groupBy('users.id', 'users.name')
            ->get();

        return view('stats',[
            'agents_number' => $agents_number,
            'your_agents_number' => $your_agents_number,
            'tasks_number'=> $tasks_number,
            'your_tasks_number' => $your_tasks_number,
            'your_tasks' => $your_tasks,
            'taskData' => $taskData,
            'agentsWithTaskCounts' => $agentsWithTaskCounts,

        ]);
    }
}
