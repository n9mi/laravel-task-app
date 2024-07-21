<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function findAll(): View
    {
        $tasks = $this->taskService->findAll();

        return view('pages.task.task',
        [
            'type_menu' => 'dashboard',
            'tasks' => $tasks,
        ]);
    }

    public function update(Request $request, string $id)
    {
       $this->taskService->update($request, $id);

       return redirect()
            ->route('task.getAll')
            ->with('swal_success', 'Task successfully updated');
    }
}
