<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\ResponsableEmailController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AgentEmailController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', fn() => view('welcome'));
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/registration/{token}', [EmailController::class, 'registration_view'])->name('registration');
Route::POST('/registration', [RegisterController::class, 'register'])->name('accept');

Route::get('responsable/registration/{token}', [ResponsableEmailController::class, 'registration_view'])->name('ResponsableRegistration');;
Route::POST('responsable/registration', [ResponsableController::class, 'register'])->name('responsableAccept');

Route::get('agent/registration/{token}', [AgentEmailController::class, 'registration_view'])->name('AgentRegistration');;
Route::POST('agent/registration', [AgentController::class, 'register'])->name('agentAccept');

Route::middleware(['admin'])->group(function () {
    Route::post('/clients/invite', [EmailController::class, 'sendEmail']);
    Route::get('/clients/invite', [EmailController::class, 'invite']);
    Route::get('/clients', [ClientController::class, 'list']);
    Route::get('/clients/{client}', [ClientController::class, 'edit']);
    Route::post('/clients/{client}', [ClientController::class, 'update']);
    Route::delete('/clients/{client}', [ClientController::class, 'destroy']);
    Route::post('/companies/create', [CompanyController::class, 'store']);
    Route::get('clients',[ClientController::class, 'list'])->name('clients.list');
});


Route::middleware(['client'])->group(function () {
    Route::post('/responsables/invite', [ResponsableEmailController::class, 'sendEmail']);
    Route::get('/responsables/invite', [ResponsableEmailController::class, 'invite']);
    
    Route::get('/responsables', [ResponsableController::class, 'list'])->name('responsables.list');
    Route::get('/responsables/{responsable}', [ResponsableController::class, 'edit']);
    Route::post('/responsables/{responsable}', [ResponsableController::class, 'update']);
    Route::delete('/responsables/{responsable}', [ResponsableController::class, 'destroy']);
});


Route::middleware(['responsable'])->group(function () {
    Route::post('/agents/invite', [AgentEmailController::class, 'sendEmail']);
    Route::get('/agents/invite', [AgentEmailController::class, 'invite']);
    
    Route::get('/agents', [AgentController::class, 'list'])->name('agents.list');
    Route::get('/agents/{agent}', [AgentController::class, 'edit']);
    Route::post('/agents/{agent}', [AgentController::class, 'update']);
    Route::delete('/agents/{agent}', [AgentController::class, 'destroy']);
    
    Route::get('/tasks', [TaskController::class, 'list'])->name('tasks.list');
    Route::get('/tasks/{task}', [TaskController::class, 'edit']);
    Route::post('/tasks/{task}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/stats', [StatsController::class, 'stats']);
    Route::get('/tasks/comment/{task}', [TaskController::class, 'showComment']);
});



Route::middleware(['agent'])->group(function () {
    Route::get('/agent-tasks', [TaskController::class, 'getTasksByAgent'])->name('agent.tasks.list');;
    Route::get('agent/tasks/{task}', [TaskController::class, 'agent_edit']);
    Route::post('agent/tasks/{task}', [TaskController::class, 'agent_update']);
    Route::get('agent/comments/{task}', [TaskController::class, 'createComment']);
    Route::post('agent/comments/{task}', [TaskController::class, 'storeComment']);
    
});


