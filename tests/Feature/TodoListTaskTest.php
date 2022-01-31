<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_tasks_of_a_todo_list()
    {
        $list = $this->createTodoList();
        $list2 = $this->createTodoList();
        $task = $this->createTask(['todo_list_id' => $list->id]);
        $this->createTask(['todo_list_id' => $list2->id]);

       $response = $this->getJson(route('todo-list.task.index', $list->id))
           ->assertOk()
           ->json();

       $this->assertEquals(1, count($response));

       $this->assertEquals($task->title, $response[0]['title']);
       $this->assertEquals($response[0]['todo_list_id'], $list->id);
    }


    public function test_store_a_task()
    {
        $list = $this->createTodoList();
        $task = Task::factory()->make();

        $this->postJson(route('todo-list.task.store', $list->id), ['title' => $task->title])
            ->assertCreated();

        $this->assertDatabaseHas('tasks', [
            'title' => $task->title, 'todo_list_id' => $list->id]);
    }


    public function test_destroy_a_task()
    {
        $task = $this->createTask();

        $this->deleteJson(route('task.destroy', $task->id), ['title' => $task->title])
            ->assertNoContent();

        $this->assertDatabaseMissing('tasks', ['title' => $task->title]);
    }



    public function test_update_a_task()
    {
        $task = $this->createTask();

        $this->patchJson(route('task.update', $task->id), ['title' => 'updated title'])
            ->assertOk();

        $this->assertDatabaseHas('tasks', ['title' => 'updated title']);
    }
}
