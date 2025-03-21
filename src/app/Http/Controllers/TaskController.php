<?php

namespace App\Http\Controllers;

use App\helpers\ApiResponse;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tasks = $this->taskService->get_all();
            return ApiResponse::success('Tasks retrieved successfully.',$tasks);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), null);
        }
    }

    public function show(Request $request, $id)  {
        try {
            $task = $this->taskService->get_task_by_id($id);
            return ApiResponse::success('Task retrieved successfully.',$task);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), null);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                "title" => "required|string|max:255",
                "description" => "nullable|string",
                'is_completed' => 'required|boolean',
            ]);
            $data['user_id'] = auth()->id();
            $task = $this->taskService->create($data);
            return ApiResponse::success('Task created successfully',$task);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), null);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                "title" => "required|string|max:255",
                "description" => "nullable|string",
                'is_completed' => 'required|boolean',
            ]);

            $updated_task = $this->taskService->update($id, $data);
            return ApiResponse::success('Task updated successfully.', $updated_task);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->taskService->delete($id);
            return ApiResponse::success('Task deleted successfully.');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), null);
        }
    }
}
