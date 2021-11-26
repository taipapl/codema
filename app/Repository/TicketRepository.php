<?php

namespace App\Repository;

use Throwable;
use App\Models\Topic;
use App\Models\Ticket;

use App\Mail\TicketShipped;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreTicketRequest;

class TicketRepository
{

    private Ticket $ticket;

    public function __construct(Ticket $TicketModel)
    {
        $this->ticket = $TicketModel;
    }

    public function get()
    {
        return $this->ticket->with('topic')->OrderBy('id', 'DESC')->paginate(5);
    }

    public function show(int $id)
    {
        return  $this->ticket->where('id', $id)->first();
    }

    public function getTopic()
    {
        return Topic::all();
    }

    public function store(StoreTicketRequest $request)
    {

        $dbFile = '';
        if ($request->file) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $$dbFile = '/storage/' . $filePath;
        }

        $ticket = Ticket::create([
            'topic_id' => $request->topic,
            'email' => $request->email,
            'text' => $request->text,
            'file' =>  $dbFile
        ]);

        return $ticket;
    }

    public function send($ticket)
    {
        $email = config('mail.from.address');

        Mail::to($email)->send(new TicketShipped($ticket));
    }
}