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
        $task = $this->createTask();

       $response = $this->getJson(route('task.index'))
           ->assertOk()
           ->json();

       $this->assertEquals(1, count($response));

       $this->assertEquals($task->title, $response[0]['title']);
    }


    public function test_store_a_task()
    {
        $task = Task::factory()->make();

        $this->postJson(route('task.store'), ['title' => $task->title])
            ->assertCreated();

        $this->assertDatabaseHas('tasks', ['title' => $task->title]);
    }


    public function test_destroy_a_task()
    {
        $task = $this->createTask();

        $this->deleteJson(route('task.destroy', $task->id), ['title' => $task->title])
            ->assertNoContent();

        $this->assertDatabaseMissing('tasks', ['title' => $task->title]);
    }
}
