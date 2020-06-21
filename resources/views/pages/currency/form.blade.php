@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('currency.update', ['currency' => $currency]) }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card text-black bg-default">
                        <div class="card-header text-white bg-success">
                            Purchase currency
                        </div>
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('discount') ? ' has-error' : '' }}">
                                <label for="discount">Discount</label>
                                <input type="discount" name="discount" id="discount" class="form-control" value="{{ old('discount', $currency->discount ?? 0) }}">
                            </div>
                            <div class="form-group {{ $errors->has('surcharge') ? ' has-error' : '' }}">
                                <label for="surcharge">Surcharge</label>
                                <input type="surcharge" name="surcharge" id="surcharge" class="form-control" value="{{ old('surcharge', $currency->surcharge ?? 0) }}">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success float-right" id="purchase">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection