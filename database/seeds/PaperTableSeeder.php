<?php

use Illuminate\Database\Seeder;

class PaperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Paper::class, 5)->create()->each(function ($paper) {
            $paper->addMediaFromUrl('http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf')
                ->toMediaCollection('attachments')
            ;
        });
    }
}
