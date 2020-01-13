<?php

use Illuminate\Database\Seeder;

class PatientsRoomsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $fecha = date('Y/m/d');
    for ($i=1; $i < 21; $i++) {
      $up_date = strtotime ( "+".rand(1,31)." day" , strtotime ( $fecha ) ) ;
      $up_date = date ( 'Y/m/d' , $up_date);

      $down_date = strtotime ( "+".rand(30,500)." day" , strtotime ( $fecha ) ) ;
      $down_date = date ( 'Y/m/d' , $down_date );

      if (($i%2) === 0) {
        $bed = 'B';
      } else {
        $bed = 'A';
      }
      DB::table('patient_room')->insert([
        'room_id' => rand(1,20),
        'bed' => $bed,
        'patient_id' => rand(1,20),
        'up_date' => $up_date,
        'down_date' => $down_date
      ]);
    }
  }
}
