<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Survey::factory()->count(1)->create();
    }
}