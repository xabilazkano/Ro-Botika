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
        for ($i = 0;$i<20;$i++){
            DB::table('assistance_medicine')->insert([
                'assistance_id' => rand(1,20),
                'medicine_id' => rand(1,20),
                'amount' => rand(1,15)
            ]);
        }

    }
}
