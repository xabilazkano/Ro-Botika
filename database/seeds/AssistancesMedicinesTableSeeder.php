<?php

use Illuminate\Database\Seeder;

class AssistancesMedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('assistances_medicines')->insert([
        'assistance_id' => rand(1,20),
        'medicine_id' => rand(1,20)
      ]);
    }
}
