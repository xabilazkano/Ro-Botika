<?php

use Illuminate\Database\Seeder;

class AssistancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $fecha = date('Y/m/d');
      for ($i=0;$i<20;$i++) {
        $estimated_date = strtotime ( "+".rand(1,31)." day" , strtotime ( $fecha ) ) ;
        $estimated_date = date ( 'Y/m/d' , $estimated_date);

        DB::table('assistances')->insert([
          'patient_id' => rand(1,20),
          'user_id' => rand(1,22),
          'chart_state' => false,
          'estimated_date' => date("Y/m/d"),
          'hour' => '08:00'
        ]);
      }
      for ($i=0;$i<20;$i++) {
        $estimated_date = strtotime ( "+".rand(1,31)." day" , strtotime ( $fecha ) ) ;
        $estimated_date = date ( 'Y/m/d' , $estimated_date);

        DB::table('assistances')->insert([
          'patient_id' => rand(1,20),
          'user_id' => rand(1,22),
          'chart_state' => false,
          'confirmed' => true,
          'estimated_date' => date('Y-m-d', strtotime(' - 1 days')),
          'hour' => '08:00'
        ]);
      }
      for ($i=0;$i<3;$i++) {
        $estimated_date = strtotime ( "+".rand(1,31)." day" , strtotime ( $fecha ) ) ;
        $estimated_date = date ( 'Y/m/d' , $estimated_date);

        DB::table('assistances')->insert([
          'patient_id' => rand(1,20),
          'user_id' => rand(1,22),
          'chart_state' => false,
          'confirmed' => false,
          'estimated_date' => date('Y-m-d', strtotime(' - 1 days')),
          'hour' => '08:00'
        ]);
      }
    }
}
