<?php

use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('todos')->insert([
            'todo' => 'something 1',
        ]);
        \DB::table('todos')->insert([
            'todo' => 'something 2',
        ]);
        \DB::table('todos')->insert([
            'todo' => 'something 3',
        ]);
        
        factory(\App\todo::class, 100)->create();
    }
}
