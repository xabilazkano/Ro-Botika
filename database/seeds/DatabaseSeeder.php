<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // La creación de datos de roles debe ejecutarse primero
      /*$this->call(RoleTableSeeder::class);
      // Los usuarios necesitarán los roles previamente generados
      $this->call(UserTableSeeder::class);
      $this->call(PatientsTableSeeder::class);
      $this->call(BedsTableSeeder::class);
      $this->call(AssistancesTableSeeder::class);
      $this->call(MedicinesTableSeeder::class);
      $this->call(AssistancesMedicinesTableSeeder::class);*/
      $this->call(BedsPatientsTableSeeder::class);
    }
}
