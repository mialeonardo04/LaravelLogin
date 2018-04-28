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
        $role_user = Role::where('name','user')->first();
        $role_admin = Role::where('name','admin')->first();

        $user = new User();
        $user->name = 'Ignasius Leonardo';
        $user->email = 'ignasiusleonardo@student.uns.ac.id';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->name = 'Ignasius Agus Leonardo';
        $admin->email = 'ignasiusleonardo@gmail.com';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
