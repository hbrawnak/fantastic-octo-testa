<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;

    private $list;

    public function setUp(): void
    {
        parent::setUp();
        $this->list = TodoList::factory()->create(['name' => 'todo-list']);
    }

    public function test_get_todo_list()
    {
        $response = $this->getJson(route('todo-list.store'));
        $this->assertEquals(1, count($response->json()));
        $this->assertEquals('todo-list', $response->json()[0]['name']);
    }


    public function test_get_single_todo_list()
    {
        $response = $this->getJson(route('todo-list.show', $this->list->id))
            ->assertOk()
            ->json();

        $this->assertEquals($response['name'], $this->list->name);
    }
}
