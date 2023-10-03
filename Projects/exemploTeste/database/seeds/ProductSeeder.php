<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 100; $i++){
            factory(\App\Product::class)->create([
                'id_project' => ceil($i/5),
            ]);
        }
    }
}
