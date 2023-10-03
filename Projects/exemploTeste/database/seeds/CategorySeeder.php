<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('category')->insert([
            'Name' => 'Quarto'
        ]);
        \DB::table('category')->insert([
            'Name' => 'Sala'
        ]);
        \DB::table('category')->insert([
            'Name' => 'Cozinha'
        ]);
        \DB::table('category')->insert([
            'Name' => 'Casa de Banho'
        ]);

    }
}
