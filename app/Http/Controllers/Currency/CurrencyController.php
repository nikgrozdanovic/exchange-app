<?php

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use Illuminate\Support\Str;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
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
        

        $currencies = Currency::all();

        return view('pages.currency.index', [
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        return view('pages.currency.form', [
            'currency' => $currency
        ]);
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
     * @param  App\Models\Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Currency $currency, Request $request)
    {
        $request->validate([
            'discount' => 'required|numeric|between:0,100.00',
            'surcharge' => 'required|numeric|between:0,100.00'
        ]);

        $data = $request->all();

        $currency->update([
            'discount' => $data['discount'],
            'surcharge' => $data['surcharge']
        ]);

        return redirect()->to( route('currency.index', ['currency' => $currency]) )->with('success', 'Successfully updated configuration for ' . $currency->name . '.');
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
}
