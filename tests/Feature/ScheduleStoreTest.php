<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ScheduleStoreTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     */
    public function test_successful_request(): void
    {
        Queue::fake();

        $response = $this->postJson(
            '/schedules',
            [
                'phone_number' => '+380993322111',
                'time' => '2023-07-29 12:32',
                'text' => 'Will see you in the evening'
            ]
        );

        $response->assertValid()
            ->assertStatus(201)
            ->assertExactJson([
                'message' => 'Successfully created',
            ]);
    }

    public function test_empty_data(): void
    {
        $response = $this->postJson(
            '/schedules',
            [
                'phone_number' => '',
                'time' => '',
                'text' => ''
            ]
        );

        $response->assertInvalid(['phone_number', 'time', 'text'])
            ->assertStatus(422);
    }

    public function test_wrong_date_format(): void
    {
        $response = $this->postJson(
            '/schedules',
            [
                'phone_number' => '+380993322111',
                'time' => '29.07.2023 16:12',
                'text' => 'Will see you in the evening'
            ]
        );

        $response->assertInvalid(['time'])
            ->assertStatus(422);
    }
}
