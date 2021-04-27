<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $god = Role::create(['name' => 'super-admin']);
        $role_user = Role::create(['name' => 'user']);

//        Creating Admin
        $admin = User::create([
            'name'     => config('app.admin_default_data.name'),
            'email'    => config('app.admin_default_data.email'),
            'password' => bcrypt(config('app.admin_default_data.password')),
        ]);

        $admin->assignRole($god);

//        Creating user
        $user = User::create([
            'name'     => 'user',
            'email'    => 'user@local.local',
            'password' => bcrypt('secret'),
        ]);
        $user->assignRole($role_user);
    }
}
