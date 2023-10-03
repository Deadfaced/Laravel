<?php

use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 400; $i++) {
            factory(\App\Pet::class)->create([
                'person_id' => ceil($i/4),
            ]);
        }
    }
}
