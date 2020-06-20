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
            'rate' => 0
        ]);

        App\Models\Currency::create([
            'name' => 'GBP',
            'discount' => 0,
            'rate' => 0
        ]);

        App\Models\Currency::create([
            'name' => 'EUR',
            'discount' => 2,
            'rate' => 0
        ]);
    }
}
