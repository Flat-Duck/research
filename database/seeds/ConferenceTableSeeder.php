<?php

use Illuminate\Database\Seeder;

class ConferenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Conference::class, 5)->create();
    }
}
