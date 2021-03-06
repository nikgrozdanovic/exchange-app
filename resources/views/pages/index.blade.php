@extends('layouts.app')

@section('content')
<div class="content">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h1>Welcome to the Exchange app</h1>
    <div class="card text-white bg-default">
        <div class="card-body">
            <a href='{{ route('exchange.index') }}' class="btn btn-danger">
                Click to exchange
            </a>
        </div>
    </div>
    <br>
    <div class="card text-white bg-default">
        <div class="card-body">
            <a href='{{ route('currency.index') }}' class="btn btn-success">
                Configure currencies
            </a>
        </div>
    </div>
</div>
@endsection