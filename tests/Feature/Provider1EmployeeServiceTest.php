<?php

namespace Tests\Feature;

use App\Services\Provider1EmployeeService;
use App\Services\TrackTikService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Exception;
use Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class Provider1EmployeeServiceTest extends TestCase
{

    use DatabaseTransactions; // Use this trait to rollback transactions after each test

    protected $service;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();
        $trackTikServiceMock = $this->createMock(TrackTikService::class);
        $this->service = new Provider1EmployeeService($trackTikServiceMock);
    }

    public function it_can_store_an_employee(): void
    {
        $requestData = [
            'name' => 'lendrit',
            'surname' => 'shala',
            'email' => 'lendrit.shala@example.com',
            'username' => 'lendrit',
        ];
        Validator::shouldReceive('make')->andReturn(
            Validator::make([], []) // Mock an empty validator
        );
        $request = new Request([], $requestData);
        $response = $this->service->store($request);
        $this->assertEquals(201, $response->status()); // Adjust based on your expected response
    }


}
