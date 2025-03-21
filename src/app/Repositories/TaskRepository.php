<?php

namespace App\Repositories;

use App\Models\Task;
use Exception;
class TaskRepository
{
    public function get_all()
    {
        return Task::all();
    }

    public function get_task_by_id($id)
    {
        $task = Task::find($id);
        if (!$task) {
            throw new Exception('Task not found.');
        }
        return $task;
    }

    public function create(array $data)
    {
        return Task::create($data);
    }

    public function update($id, array $data)
    {
        $task = Task::find($id);
        if (!$task) {
            throw new Exception('Task not found');
        }
        $task->update($data);
        return $task;
    }

    public function delete($id)
    {
        $task = Task::find($id);
        if (!$task) {
            throw new Exception('Task not found');
        }
        $task->delete();
    }
}