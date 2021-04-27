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
            'view'   => [
                'users',
                'sitemap',
                'roles',
                'permissions',
            ],
            'create' => [
                'permission',
                'user',
                'role',
            ],
            'update' => [
                'permission',
                'role',
            ],
            'delete' => [
                'permission',
                'role',
            ],
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
//        Permission::truncate();
        $god = Role::create(['name' => 'super-admin']);

        foreach ($this->roles as $role) {
            $newRole = Role::create(['name' => $role]);
            if (!empty($this->permissionsOnGroup[$role])) {
                foreach ($this->permissionsOnGroup[$role] as $key => $permission) {
                    if (!empty($permission[0])){
                        foreach ($permission as $p) {
                            $newPermission = Permission::updateOrCreate(['name' => "{$key} {$p}"]);
                            $newRole->givePermissionTo($newPermission);
                        }
                    }
                }
//                    var_dump($key, $permission);
//                    dd(1);
//                    $newPermission = Permission::updateOrCreate(['name' => $permission]);
            }
        }

//        Creating Super Admin
        $admin = User::create([
            'name'     => config('app.admin_default_data.name'),
            'email'    => config('app.admin_default_data.email'),
            'password' => bcrypt(config('app.admin_default_data.password')),
        ]);

        $admin->assignRole('admin');


//        Creating user
        $user = User::create([
            'name'     => 'user',
            'email'    => 'user@local.local',
            'password' => bcrypt('secret'),
        ]);
        $user->assignRole('user');


    }
}
