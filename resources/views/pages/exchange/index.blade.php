@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('exchange.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card text-black bg-default">
                        <div class="card-header text-white bg-danger">
                            Purchase currency
                        </div>
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('exchanged') ? ' has-error' : '' }}">
                                <label for="currency">Select a currency you want to buy</label>
                                <select name="currency" id="currency" class="form-control">
                                    <option value="0">Choose a currency</option>
                                    @foreach ($currencies as $currency)
                                        <option value='{{ $currency->id }}' @if(old('currency') == $currency->id) selected='selected' @endif)>{{$currency->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group {{ $errors->has('toBuy') ? ' has-error' : '' }}">
                                <label for="toBuy">Amount you want to buy: <span class='has-error'>*</span></label>
                                <input type="text" name="toBuy" id="toBuy" class="form-control" value="{{ old('toBuy') ?? '' }}">

                                @if ($errors->has('toBuy'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('toBuy') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('toPay') ? ' has-error' : '' }}">
                                <label for="toPay">Amount to pay:</label>
                                <input type="text" name="toPay" id="toPay" class="form-control" value="{{ old('toPay') ?? '' }}">

                                @if ($errors->has('toPay'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('toPay') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-danger float-right" id="purchase">
                                Purchase
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('javascript')
    <script>
        $(document).ready(function(){
            $('#toBuy').change(function(){
                let curr = parseInt($('#currency').val());
                let amount = $(this).val();

                if(curr) {
                    $.ajax({
                        url: "{{ route('exchange.calculate') }}",
                        method: 'post',
                        data: {
                            _token: "{{ csrf_token() }}",
                            amount:amount,
                            currency: curr
                        },
                        success: function(data) {
                            $('#toPay').val(data);
                        }
                    });
                }
            });

            $('#currency').change(function(){
                let curr = parseInt($(this).val());
                let amount = $('#toBuy').val();
              
                if(amount) {
                    $.ajax({
                        url: "{{ route('exchange.calculate') }}",
                        method: 'post',
                        data: {
                            _token: "{{ csrf_token() }}",
                            amount:amount,
                            currency: curr
                        },
                        success: function(data) {
                            $('#toPay').val(data);
                        }
                    });
                }
            });
        });
    </script>
@endpush