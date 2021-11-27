<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Repository\TicketRepository;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreTicketRequest;

class TicketController extends Controller
{

    private TicketRepository $ticket;

    public function __construct(TicketRepository $TicketRepository)
    {
        $this->ticket = $TicketRepository;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Gate::denies('role') == 1) {
            abort(403);
        }

        $tickets = $this->ticket->get();

        return view('index', ['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic = $this->ticket->getTopic();

        return view('create', ['topic' => $topic]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreticketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreticketRequest $request)
    {
        $ticket = $this->ticket->store($request);

        $this->ticket->send($ticket);

        $mess = ($ticket) ? __('Record was added') : __('Record was no added');

        return redirect()->route('home')->with('status', $mess);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {

        if (Gate::denies('role') == 1) {
            abort(403);
        }

        $ticket = $this->ticket->show($id);

        return view('show', ['ticket' => $ticket]);
    }
}