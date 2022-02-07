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
        $this->authUser();
    }

    public function test_user_can_create_a_label()
    {
        $label = Label::factory()->raw();

        $this->postJson(route('label.store'), $label)
            ->assertCreated();

        $this->assertDatabaseHas('labels',$label);
    }
}
