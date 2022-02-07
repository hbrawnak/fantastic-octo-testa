<?php

namespace Tests\Feature;

use App\Models\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LabelTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = $this->authUser();
    }

    public function test_user_can_create_a_label()
    {
        $label = Label::factory()->raw();

        $this->postJson(route('label.store'), $label)
            ->assertCreated();

        $this->assertDatabaseHas('labels', ['title' => $label['title'], 'color' => $label['color']]);
    }

    public function test_a_user_can_delete_a_label()
    {
        $label = $this->createLabel();

        $this->deleteJson(route('label.destroy', $label->id))
            ->assertNoContent();

        $this->assertDatabaseMissing('labels', ['title' => $label->title]);
    }


    public function test_a_user_can_update_label()
    {
        $label = $this->createLabel();
        $dataArr = ['title' => $label->title, 'color' => 'test-color'];

        $this->patchJson(route('label.update', $label->id),$dataArr)
            ->assertOk();

        $this->assertDatabaseHas('labels', $dataArr);
    }


    public function test_get_all_label_of_a_user()
    {
        $label = $this->createLabel(['user_id' => $this->user->id]);

        $response = $this->getJson(route('label.index'))
            ->assertOk();

        $this->assertEquals($response[0]['title'], $label->title);
    }
}
