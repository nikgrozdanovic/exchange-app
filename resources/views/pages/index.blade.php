@extends('layouts.app')

@section('content')
<div class="content">
    <h1>Welcome to the Exchange app</h1>
    <div class="card text-white bg-default">
        <div class="card-body">
            <a href='{{ route('exchange.index') }}' class="btn btn-primary">
                Click to exchange
            </a>
        </div>
    </div>
</div>
@endsection