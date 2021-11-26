@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="ticket justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }} {{ __('You are logged in!') }}</div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3 class="green">@lang('Ticket list')</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@lang('Topic')</th>
                                    <th scope="col">@lang('Email')</th>
                                    <th scope="col">@lang('Date')</th>
                                    <th scope="col">@lang('File')</th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->topic->name }}</td>
                                    <td>{{ $ticket->email }}</td>
                                    <td>{{ $ticket->created_at }}</td>
                                    <td>{{ $ticket->file }}</td>

                                </tr>
                                <tr>
                                    <td colspan="5">
                                        {{ $ticket->text }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
