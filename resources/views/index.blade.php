@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="ticket justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }} {{ __('You are logged in!') }}</div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3 class="green">@lang('Ticket list')</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@lang('Topic')</th>
                                    <th scope="col">@lang('Email')</th>
                                    <th scope="col">@lang('Date')</th>
                                    <th scope="col">@lang('File')</th>
                                    <th scope="col">@lang('Show')</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($tickets ?? [] as $key => $ticket)
                                    <tr>
                                        <td>{{ $ticket->id }}</td>
                                        <td>{{ $ticket->topic_id }}</td>
                                        <td>{{ $ticket->email }}</td>
                                        <td>{{ $ticket->created_at }}</td>
                                        <td>{{ $ticket->file }}</td>
                                        <td>

                                            <a href="{{ route('show', $ticket) }}">
                                                <i class="bi bi-pencil-square"></i>
                                                @lang('Show')
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        @if ($tickets->total() > $tickets->perPage())

                            <div>

                                {{ $tickets->links('vendor.pagination.bootstrap-4') }}

                            </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
