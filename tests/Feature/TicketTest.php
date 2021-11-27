<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TicketTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_guest_go_web()
    {
        $response = $this->get('/')
            ->assertSeeText('Log in')
            ->assertSeeText('Register')
            ->assertStatus(200);
    }

    public function test_guest_try_show_list()
    {
        $response = $this->get('/list')
            ->assertStatus(302);
    }

    public function test_guest_try_show_home()
    {
        $response = $this->get('/home')
            ->assertStatus(302);
    }

    public function test_client_login()
    {
        $user = User::factory(['role' => 0])->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/home')->assertStatus(200);
        $user->delete();
    }

    public function test_client_login_and_show_list()
    {
        $user = User::factory(['role' => 0])->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/list')->assertStatus(403);
        $user->delete();
    }

    public function test_admin_login_show_list()
    {
        $user = User::factory(['role' => 1])->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/list')->assertStatus(200);
        $user->delete();
    }

    public function test_client_add_ticket_and_try_show()
    {

        $user = User::factory(['role' => 0])->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false]);

        $tickiet = Ticket::factory()->create();
        $response->get('/list/' . $tickiet->id)->assertStatus(403);
        $user->delete();
        $tickiet->delete();
    }


    public function test_admin_add_ticket_and_show()
    {

        $user = User::factory(['role' => 1])->create();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false]);

        $tickiet = Ticket::factory()->create();


        $response->get('/list/' . $tickiet->id)->assertStatus(200);
        $user->delete();
        $tickiet->delete();
    }
}