<?php

namespace App\Services;

use App\Repositories\TaskRepository;

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
}