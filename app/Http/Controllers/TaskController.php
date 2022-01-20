<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response($tasks);
    }

    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());
        return response($task, Response::HTTP_CREATED);
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
