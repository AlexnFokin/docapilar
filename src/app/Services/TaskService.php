<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
class TaskService 
{
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function get_all()
    {
        return $this->taskRepository->get_all();
    }

    public function get_all_tasks()
    {
        return $this->taskRepository->get_task_by_id();
    }

    public function create(array $data)
    {
        return $this->taskRepository->create($data);
    }

    public function update($task, array $data)
    {
        return $this->taskRepository->update($task, $data);
    }

    public function delete(Task $task)
    {
        return $this->taskRepository->delete($task);
    }
}