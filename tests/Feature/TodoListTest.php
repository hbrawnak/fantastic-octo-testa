<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_todo_list()
    {
        TodoList::factory()->create(['name' => 'todo-list']);

        $response = $this->getJson(route('todo-list.store'));

        //dd($response->json());
        $this->assertEquals(1, count($response->json()));
        $this->assertEquals('todo-list', $response->json()[0]['name']);
    }
}
