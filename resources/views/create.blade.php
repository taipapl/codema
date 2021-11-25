@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }} {{ __('You are logged in!') }}</div>

                    <div class="card-body">


                        <h3 class="green">@lang('Add a ticket')</h3>

                        <form>
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

                                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                                placeholder="name@example.com">
                                        </div>


                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                    aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                rows="3"></textarea>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" class="btn btn-success">@lang("Send")</button>
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
