<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $normalUser = Role::where('slug','usuario-normal')->first();
      $responsavelArmazem = Role::where('slug', 'responsavel-do-armazem')->first();
      $superAdmin = Role::where('slug', 'super-admin')->first();


      $user1 = new User();
      $user1->name = 'Super Admin';
      $user1->username = 'super';
      $user1->email = 'danielmasandudzi@gmail.com';
      $user1->password = bcrypt('12345');
      $user1->save();
      $user1->roles()->attach($superAdmin);

      $user1 = new User();
      $user1->name = 'Responsavel do Armazem';
      $user1->username = 'responsavel';
      $user1->email = 'admin@gmail.com';
      $user1->password = bcrypt('12345');
      $user1->save();
      $user1->roles()->attach($responsavelArmazem);

      $user1 = new User();
      $user1->name = 'Usuario Normal';
      $user1->username = 'user';
      $user1->email = 'admin@gmail.com';
      $user1->password = bcrypt('12345');
      $user1->save();
      $user1->roles()->attach($normalUser);

    }
}
