<?php

namespace App\Http\Controllers;

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


    public function show(TodoList $list)
    {
        return response($list);
    }


    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $list = TodoList::create($request->all());
        return response($list, Response::HTTP_CREATED);
    }

    /*public function ping(CustomServiceInterface $customService)
    {
        echo $customService->getData();
    }*/
}
