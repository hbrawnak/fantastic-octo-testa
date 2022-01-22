<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public function index(TodoList $todoList)
    {
        $tasks = $todoList->tasks;
        return response($tasks);
    }

    public function store(TaskRequest $request, TodoList $todoList)
    {
        $task = $todoList->tasks()->create($request->all());
        return response($task, Response::HTTP_CREATED);
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());
        return response($task, Response::HTTP_OK);
    }
}
