<?php

use Illuminate\Database\Seeder;
use App\Medicine;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0;$i<20;$i++){
        factory(Medicine::class)->create();
      }
    }
}
