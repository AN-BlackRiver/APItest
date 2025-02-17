<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{

    public function index()
    {
        return TaskResource::collection(Task::with('priority')->get());
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::query()->create($request->validated());
        $task->load('priority');
        return TaskResource::make($task);
    }

    public function show(Task $task)
    {
        return TaskResource::make($task);
    }


    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return TaskResource::make($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->noContent();
    }
}
