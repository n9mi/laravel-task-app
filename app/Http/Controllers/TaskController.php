<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function findAll()
    {
        $tasks = $this->taskService->findAll();

        return view('pages.task.task', [
            'type_menu' => 'dashboard',
            'tasks' => $tasks,
        ]);
    }
}
