<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_demo_user_can_log_in_after_seeding_more_than_once(): void
    {
        $this->seed();
        $this->seed();

        $user = User::where('email', 'mahasiswa@upnvj.ac.id')->firstOrFail();

        $this->withoutMiddleware(ValidateCsrfToken::class)->post('/login', [
            'email' => 'mahasiswa@upnvj.ac.id',
            'password' => 'password',
        ])->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseCount('users', 2);
    }
}
