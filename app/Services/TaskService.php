<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->messages();
        }

        $this->taskRepository->create([
            'title' => $request->title,
            'description' => $request->description,
            'is_done' => $request->is_done === 'on',
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->messages();
        }

        $this->taskRepository->update($id, [
                'title' => $request->title,
                'description' => $request->description,
                'is_done' => $request->is_done === 'on',
            ]);
    }

    public function delete(string $id)
    {
        $this->taskRepository->delete($id);
    }
}
