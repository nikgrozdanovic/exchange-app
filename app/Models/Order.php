<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'currency_id',
        'exchange_rate',
        'surcharge_percent',
        'surcharge_amount',
        'purchased_amount',
        'usd_amount',
        'discount_percent',
        'discount_amount'
    ];

    public function currency()
    {
        return $this->hasOne('App\Models\Currency', 'id', 'currency_id');
    }
}
