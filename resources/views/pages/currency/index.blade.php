@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">Currency</th>
                      <th class="text-center">Rate</th>
                      <th class="text-center">Discount(%)</th>
                      <th class="text-center">Surcharge(%)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($currencies as $currency)
                    <tr>
                        <td>
                            <a href="{{ route('currency.show', ['currency'=>$currency]) }}">{{ $currency->name }}</a>
                        </td>
                        <td class="text-center">{{ number_format($currency->rate,2,',','.') }}</td>
                        <td class="text-center">{{ $currency->discount }}</td>
                        <td class="text-center">{{ $currency->surcharge }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection