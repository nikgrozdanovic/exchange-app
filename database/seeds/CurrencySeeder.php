<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Currency::create([
            'name' => 'JPY',
            'discount' => 0,
            'rate' => 0,
            'surcharge' => 7.5
        ]);

        App\Models\Currency::create([
            'name' => 'GBP',
            'discount' => 0,
            'rate' => 0,
            'surcharge' => 5
        ]);

        App\Models\Currency::create([
            'name' => 'EUR',
            'discount' => 2,
            'rate' => 0,
            'surcharge' => 5
        ]);
    }
}
