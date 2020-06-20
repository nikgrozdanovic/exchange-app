<?php

namespace App\Http\Controllers\Exchange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Currency;
use App\Models\Order;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::all();

        /*
        $endpoint = 'live';
        $access_key = '82f1f79877a70fe09ec42e1485e6b79b';
        
        // Initialize CURL:
        $ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'&currencies=JPY,GBP,EUR&source=USD&format=1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);
        $exchangeRates = json_decode($json, true);
        
        foreach($exchangeRates['quotes'] as $key=>$value)
        {
            $name = Str::substr($key, 3);
            $currency = Currency::where('name', $name)
                        ->update(['rate' => $value]);
        }
        */

        return view('pages.exchange.index', [
            'currencies' => $currencies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'toBuy' => ['required', 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
            'currency' => ['exists:currencies,id'],
            'toPay' => ['required', 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/']
        ]);

        $data = $request->all();

        $currency = Currency::find($data['currency']);

        $surcharge = (float)$currency->surcharge;
        $discount = (float)$currency->discount;

        $surcharge_amount = (float)$data['toBuy'] * ((float)$surcharge/100);
        $discount_amount = (float)$data['toPay'] * (float)$discount/(100+(float)$discount);
      
        Order::create([
            'currency_id' => $data['currency'],
            'exchange_rate' => $currency->rate,
            'surcharge_percent' => $currency->surcharge,
            'surcharge_amount' => $surcharge_amount,
            'purchased_amount' => $data['toBuy'],
            'usd_amount' => $data['toPay'],
            'discount_percent' => $currency->discount,
            'discount_amount' => $discount_amount
        ]);
       
        return redirect()->to(route('index'))->with('status', 'You have succesefully purchased ' . $data['toBuy'] . $currency->name . '.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function calculate(Request $request)
    {
        $data = $request->all();

        $currency = Currency::find($data['currency']);

        $surcharge = (float)$currency->surcharge;
        $discount = (float)$currency->discount;

        $calculation = (float)$data['amount'] / (float)$currency->rate;
    
        $calculation = $surcharge ? (float)$calculation + ((float)$calculation * (float)$surcharge/100) : $calculation;
        $calculation = $discount ? (float)$calculation - ((float)$calculation * (float)$discount/100) : $calculation;
        
        $formated = number_format($calculation, 2, '.', ',');
        
        return $formated;
    }
}
