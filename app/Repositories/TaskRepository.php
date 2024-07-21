<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository {
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function findAll()
    {
        return $this->task::latest('updated_at')->paginate(10);
    }

    public function findById(string $id)
    {
        return $this->task::findOrFail($id);
    }

    public function update(string $id, array $data)
    {
        $this->findById($id)->update($data);
    }
}
