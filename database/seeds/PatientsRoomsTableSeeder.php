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

    //1
    DB::table('patient_room')->insert([
      'room_id' => 101,
      'bed' => 'A',
      'patient_id' => 1,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //2
    DB::table('patient_room')->insert([
      'room_id' => 101,
      'bed' => 'B',
      'patient_id' => 2,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //3
    DB::table('patient_room')->insert([
      'room_id' => 102,
      'bed' => 'A',
      'patient_id' => 3,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //4
    DB::table('patient_room')->insert([
      'room_id' => 102,
      'bed' => 'B',
      'patient_id' => 4,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //5
    DB::table('patient_room')->insert([
      'room_id' => 104,
      'bed' => 'A',
      'patient_id' => 5,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //6
    DB::table('patient_room')->insert([
      'room_id' => 104,
      'bed' => 'B',
      'patient_id' => 6,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //7
    DB::table('patient_room')->insert([
      'room_id' => 107,
      'bed' => 'A',
      'patient_id' => 7,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //8
    DB::table('patient_room')->insert([
      'room_id' => 108,
      'bed' => 'B',
      'patient_id' => 8,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //9
    DB::table('patient_room')->insert([
      'room_id' => 109,
      'bed' => 'A',
      'patient_id' => 9,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //10
    DB::table('patient_room')->insert([
      'room_id' => 110,
      'bed' => 'B',
      'patient_id' => 10,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //11
    DB::table('patient_room')->insert([
      'room_id' => 111,
      'bed' => 'A',
      'patient_id' => 11,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //12
    DB::table('patient_room')->insert([
      'room_id' => 112,
      'bed' => 'B',
      'patient_id' => 12,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //13
    DB::table('patient_room')->insert([
      'room_id' => 113,
      'bed' => 'A',
      'patient_id' => 13,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //14
    DB::table('patient_room')->insert([
      'room_id' => 114,
      'bed' => 'B',
      'patient_id' => 14,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //15
    DB::table('patient_room')->insert([
      'room_id' => 115,
      'bed' => 'A',
      'patient_id' => 15,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //16
    DB::table('patient_room')->insert([
      'room_id' => 116,
      'bed' => 'A',
      'patient_id' => 16,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //17
    DB::table('patient_room')->insert([
      'room_id' => 117,
      'bed' => 'A',
      'patient_id' => 17,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //18
    DB::table('patient_room')->insert([
      'room_id' => 118,
      'bed' => 'A',
      'patient_id' => 18,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //19
    DB::table('patient_room')->insert([
      'room_id' => 119,
      'bed' => 'A',
      'patient_id' => 19,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);

    //20
    DB::table('patient_room')->insert([
      'room_id' => 120,
      'bed' => 'A',
      'patient_id' => 20,

      'up_date' => date("Y/m/d"),
      'disease' => 'Coronavirus'
    ]);


    //for ($i=1; $i < 21; $i++) {
    //  $up_date = strtotime ( "+".rand(1,31)." day" , strtotime ( $fecha ) ) ;
    //  $up_date = date ( 'Y/m/d' , $up_date);
    //  $down_date = strtotime ( "+".rand(30,500)." day" , strtotime ( $fecha ) ) ;
    //  $down_date = date ( 'Y/m/d' , $down_date );
    //
    //  if (($i%2) === 0) {
    //    $bed = 'B';
    //  } else {
    //    $bed = 'A';
    //  }
    //  DB::table('patient_room')->insert([
    //    'room_id' => rand(1,20),
    //    'bed' => $bed,
    //    'patient_id' => rand(1,20),
    //
    //    //'up_date' => $up_date,
    //    // denak gaurkoak izateko
    //    'up_date' => date("Y/m/d"),
    //    'down_date' => $down_date
    //  ]);
    //}
  }
}
