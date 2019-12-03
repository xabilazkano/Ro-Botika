<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_user = Role::where('name', 'standar')->first();
      $role_admin = Role::where('name', 'admin')->first();

      $user = new User();
      $user->name = 'Standar';
      $user->lastname = 'StandarLastname';
      $user->email = 'agonzalezam18dw@ikzubirimanteo.com';
      $user->password = bcrypt('secret');
      $user->phone_number = '666666666';
      $user->type_of_user = 'standar';
      $user->save();
      $user->roles()->attach($role_user);

      $user = new User();
      $user->name = 'Admin';
      $user->lastname = 'AdminLastname';
      $user->email = 'angoaminf3@gmail.com';
      $user->password = bcrypt('secret');
      $user->phone_number = '943943943';
      $user->type_of_user = 'admin';
      $user->save();
      $user->roles()->attach($role_admin);
    }
}
