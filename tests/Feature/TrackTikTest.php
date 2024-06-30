<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class TrackTikTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_send_employee_tracktik_404()
    {
        Http::fake([
            env('TRACKTIK_URL') . '/employees' => Http::response([
                'refresh_token' => 'no token',
                'access_token' => 'no token',
            ], 404),
        ]);
        $response = $this->postJson('/api/wrong-url/employee');
        $response->assertStatus(404);
    }

    public function test_employee_tracktik_500_error()
    {
        Http::fake([
            'https://smoke.staffr.net/rest/v1/employees' => Http::response([
                'access_token' => 'no token',
            ], 404),
        ]);
        $response = $this->postJson('https://smoke.staffr.net/rest/v1/employees',[],['Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.'invalid token']);
        $response->assertStatus(404);
    }
}
