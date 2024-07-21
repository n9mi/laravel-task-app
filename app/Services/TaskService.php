<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskService {
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function findAll()
    {
        return $this->taskRepository->findAll();
    }

    public function findById(string $id)
    {
        return $this->taskRepository->findById($id);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $this->taskRepository->update($id, [
                'title' => $request->title,
                'description' => $request->description,
                'is_done' => $request->is_done === 'on',
            ]);
    }
}
