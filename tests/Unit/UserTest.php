<?php

namespace Tests\Unit;

use App\Models\Ticket;
use PHPUnit\Framework\TestCase;
use App\Repository\TicketRepository;
use App\Http\Controllers\TicketController;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_check_objects()
    {

        $model = new Ticket;

        $repo = new TicketRepository($model);

        $class = new TicketController($repo);

        $this->assertTrue((bool) $class);
    }
}