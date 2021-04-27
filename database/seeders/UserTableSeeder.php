<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{

    private $roles = ['admin', 'writer', 'power user', 'user'];
    private $permissionsOnGroup = [
        'admin' => [
            'view users',
            'view sitemap',
        ],
        'user'  => [

        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $god = Role::create(['name' => 'super-admin']);

        foreach ($this->roles as $role) {
            $newRole = Role::create(['name' => $role]);
            if (!empty($this->permissionsOnGroup[$role])) {
                foreach ($this->permissionsOnGroup[$role] as $permission) {
                    $newPermission = Permission::updateOrCreate(['name' => $permission]);
                    $newRole->givePermissionTo($newPermission);
                }
            }
        }

//        Creating Super Admin
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
        $user->assignRole('user');


    }
}
