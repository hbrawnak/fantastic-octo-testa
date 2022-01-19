<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListRequest;
use App\Library\Services\Contracts\CustomServiceInterface;
use App\Library\Services\Evanto;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    public function index()
    {
        $list = TodoList::all();

        return response($list);
    }


    public function show(TodoList $todo_list)
    {
        return response($todo_list);
    }


    public function store(TodoListRequest $request)
    {
        $list = TodoList::create($request->all());
        return response($list, Response::HTTP_CREATED);
    }


    public function destroy(TodoList $todo_list)
    {
        $todo_list->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }


    public function update(TodoListRequest $request, TodoList $todo_list)
    {
        $todo_list->update($request->all());
        return response($todo_list);
    }

    /*public function ping(CustomServiceInterface $customService)
    {
        echo $customService->getData();
    }*/
}
