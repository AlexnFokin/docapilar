<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Exception;
use Illuminate\Database\QueryException;
class TaskService 
{
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function get_all()
    {
        try {
            return $this->taskRepository->get_all();
        } catch (QueryException $e) {
            \Log::error("Error fetching all tasks: " . $e->getMessage());
            throw new Exception("An error occurred while fetching tasks.");
        }
    }

    public function get_task_by_id($id)
    {
        try {
            return $this->taskRepository->get_task_by_id($id);
        } catch (QueryException $e) {
            \Log::error("Error fetching all tasks: " . $e->getMessage());
            throw new Exception("An error occurred while fetching task.");
        }
        
    }

    public function create(array $data)
    {
        try {
            return $this->taskRepository->create($data);
        } catch (QueryException $e) {
            \Log::error("Error creating task: " . $e->getMessage());
            throw new Exception("An error occurred while creating the task.");
        }
    }

    public function update($id, array $data)
    {
        try {
            return $this->taskRepository->update($id, $data);
        } catch (QueryException $e) {
            \Log::error("Error updating task: " . $e->getMessage());
            throw new Exception("Failed to update task.");
        }
    }

    public function delete($id)
    {
        try {
            return $this->taskRepository->delete($id);
        } catch (QueryException $e) {
            \Log::error("Error deleting task: " . $e->getMessage());
            throw new Exception("Failed to delete task.");
        }
    }
}