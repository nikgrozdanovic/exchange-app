@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-black bg-default">
                    <div class="card-header text-white bg-danger">
                        Purchase currency
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="usd">USD</label>
                            <input type="text" name="usd" id="usd" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="currency">Select a currency you want to buy</label>
                            <select name="currency" id="currency" class="form-control">
                                <option value="0">Choose a currency</option>
                                @foreach ($currencies as $currency)
                                    <option value='{{ $currency->id }}'>{{$currency->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exchanged">You get:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="currency-icon">&dollar;</span>
                                </div>
                                <input type="text" class="form-control" name="exchanged" id="exchanged">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script>
        $(document).ready(function(){
            $('#currency').change(function(){
                let curr = $(this).val();
                
                if(curr == 1) {
                    $('#currency-icon').html('&yen;');
                } else if(curr == 2) {
                    $('#currency-icon').html('&pound;');
                } else if(curr == 3) {
                    $('#currency-icon').html('&euro;');
                } else {
                    $('#currency-icon').html('&dollar;');
                }
            });
        });
    </script>
@endpush