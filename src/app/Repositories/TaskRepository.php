<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    public function get_all()
    {
        return Task::all();
    }

    public function get_task_by_id($id)
    {
        return Task::find($id);
    }

    public function create(array $data)
    {
        return Task::create($data);
    }

    public function update(Task $task, array $data)
    {
        $task->update($data);
        return $task;
    }

    public function delete(Task $task)
    {
        $task->delete();
    }
}