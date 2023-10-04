<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('countries')->insert([
            'name' => 'Portugal',
        ]);
        \DB::table('countries')->insert([
            'name' => 'Espanha',
        ]);
        \DB::table('countries')->insert([
            'name' => 'França',
        ]);
        \DB::table('countries')->insert([
            'name' => 'Polónia',
        ]);
    }
}
