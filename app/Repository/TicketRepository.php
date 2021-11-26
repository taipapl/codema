<?php

namespace App\Repository;

use App\Models\User;
use App\Models\Topic;

use App\Models\Ticket;
use App\Mail\TicketShipped;
use Illuminate\Support\Arr;
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
            $dbFile = '/storage/' . $filePath;
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
        $admin_emails = $this->getAdminEmails();

        Mail::to($admin_emails)->send(new TicketShipped($ticket));
    }

    private function getAdminEmails()
    {
        $users = User::select('email')->where('role', 1)->get()->toArray();

        return  Arr::pluck($users, 'email');
    }
}