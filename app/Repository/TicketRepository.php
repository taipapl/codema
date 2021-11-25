<?php

namespace App\Repository;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTicketRequest;

class TicketRepository
{

    private Ticket $TicketModel;

    public function __construct(Ticket $TicketModel)
    {
        $this->ticket = $TicketModel;
    }

    public function get()
    {
        return $this->ticket->paginate(5);
    }

    public function show(int $id)
    {
        return  $this->ticket->where('id', $id)->first();
    }
}