<?php

namespace App\Http\Controllers;

use App\Library\Services\Contracts\CustomServiceInterface;
use App\Library\Services\Evanto;
use App\Models\TodoList;
use Illuminate\Http\Request;

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

    /*public function ping(CustomServiceInterface $customService)
    {
        echo $customService->getData();
    }*/
}
