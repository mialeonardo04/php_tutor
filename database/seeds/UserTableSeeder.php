<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Student;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','siswa')->first();
        $role_admin = Role::where('name','pengajar')->first();

        $user = new User();
        $student = new Student();
        $user->name = 'Ignasius Agus Leonardo';
        $user->username = 'ignasiusleo_';
        $user->email = 'ignasiusleonardo@gmail.com';
        $user->password = bcrypt('123456789');
        $user->verified = 1;
        $user->save();

        $student->id_user = $user->id;
        $student->name = $user->name;
        $student->email = $user->email;
        $student->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->name = 'Ignasius Leonardo';
        $admin->username = 'ignasiusleooo';
        $admin->email = 'ignasiusleonardo@student.uns.ac.id';
        $admin->password = bcrypt('1234567890');
        $admin->verified = 1;
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
