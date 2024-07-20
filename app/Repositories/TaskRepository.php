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
        return $this->task->paginate(10);
    }
}
