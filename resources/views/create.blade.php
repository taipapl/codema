@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }} {{ __('You are logged in!') }}</div>

                    <div class="card-body">


                        <h3 class="green">@lang('Add a ticket')</h3>

                        <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="container">

                                <div class="row">
                                    <div class="col">

                                        <div class="form-group">

                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>@lang("Choose a topic")</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">

                                            <input type="email" value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror "
                                                id="exampleFormControlInput1" placeholder="name@example.com">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>


                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file"
                                                    aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="file">Choose file</label>
                                            </div>
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

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
