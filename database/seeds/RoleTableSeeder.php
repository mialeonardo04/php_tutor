<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'pengajar';
        $role_admin->description = 'Super User';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'siswa';
        $role_user->description = 'Normal User';
        $role_user->save();
    }
}
