<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $manager = new Role();
      $manager->name = 'Usuario Normal';
      $manager->slug = 'usuario-normal';
      $manager->save();

      $manager = new Role();
      $manager->name = 'Reponsável do Armazem';
      $manager->slug = 'responsavel-do-armazem';
      $manager->save();

      $manager = new Role();
      $manager->name = 'Super Admin';
      $manager->slug = 'super-admin';
      $manager->save();
    }
}
