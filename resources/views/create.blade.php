@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }} {{ __('You are logged in!') }}</div>

                    <div class="card-body">


                        <h3 class="green">@lang('Add a ticket')</h3>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="container">

                                <div class="row">
                                    <div class="col">

                                        <div class="form-group">

                                            <select class="form-control  @error('topic') is-invalid @enderror" id="topic"
                                                name="topic">
                                                <option value="">@lang("Choose a topic")</option>
                                                @foreach ($topic as $top)
                                                    <option value="{{ $top->id }}" @if (old('topic') == $top->id) selected="selected" @endif>
                                                        {{ $top->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('topic')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">

                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror " id="email"
                                                placeholder="name@example.com">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>



                                        <div class="custom-file mb-3">
                                            <input type="file"
                                                class="custom-file-input  @error('file') is-invalid @enderror" id="file"
                                                name="file">
                                            <label class="custom-file-label" for="file">@lang('Choose file...') </label>
                                            @error('file')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror



                                        </div>


                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <textarea class="form-control  @error('email') is-invalid @enderror" id="text"
                                                name="text" rows="3"></textarea>

                                            @error('text')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success">@lang("Send")</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
