<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomsTableSeeder extends Seeder {
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {
    for ($i=1;$i<=20;$i++){
      DB::table('rooms')->insert([
        'id' => 100 + $i,
        'floor' => 1,
        'beds' => 2
      ]);
    }
  }
}
