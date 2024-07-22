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

    public function create(Request $request)
    {
       $errors = $this->taskService->create($request);

       if ($errors != null) {
            return redirect()
                ->back()
                ->withErrors($errors);
       }

       return redirect()
            ->route('task.getAll')
            ->with('swal_success', 'Task successfully created');
    }

    public function update(Request $request, string $id)
    {
        $errors = $this->taskService->update($request, $id);

        if ($errors != null) {
            return redirect()
                ->back()
                ->withErrors($errors);
        }

       return redirect()
            ->route('task.getAll')
            ->with('swal_success', 'Task successfully updated');
    }

    public function delete(string $id)
    {
        $this->taskService->delete($id);

        return redirect()
            ->route('task.getAll')
            ->with('swal_success', 'Task successfully deleted');
    }
}
