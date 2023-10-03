<?php

use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Player::class, 100)->create();

        for($i = 1; $i <= 100; $i++){
            factory(\App\Address::class)->create([
                'id' => $i,
            ]);
        }
    }
}
