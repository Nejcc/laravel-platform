<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RegenerateUsersPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'regenerate:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Regenerate permissions and role for all users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        echo " - Truncating Permissions DONE!\n";

        $god        = Role::create(['name' => 'super-admin']);
        $role_admin = Role::create(['name' => 'administrator']);
        $role_user  = Role::create(['name' => 'user']);

        $this->generatePermissionsName(config('userpermissioins.menu'), 1);
        $this->generatePermissions(config('userpermissioins.payload.payload_admin'), $role_admin);

        echo " - Permissions generated DONE!\n";

        $newUsers = User::query()->where('team_id', 1)->get();
        echo 'Assigning permissions to users ';
        foreach ($newUsers as $newUser) {
            switch ($newUser->email) {
                case config('app.admin_default_data.email'):
                    $newUser->assignRole($god);
                    break;
                default:
                    $newUser->assignRole($role_user);
            }
            $newUser->save();
        }
        echo 'Assigning permissions to Tim360 users ';
    }


    private function generatePermissions($permissions, $model)
    {
        foreach ($permissions as $key => $items) {

            foreach ($items as $item) {
                $model->givePermissionTo("{$item} {$key}");
            }
        }
    }

    private function generatePermissionsName($permissions = [], $category = null)
    {
        foreach ($permissions as $key => $items) {
            $type_id = \App\Models\PermissionType::query()->select('id')->where('name', $key)->first();
            foreach ($items as $item) {
                Permission::create([
                    "name"                   => "{$item} {$key}",
                    "permission_category_id" => $category,
                    "permission_type_id"     => $type_id->id,
                    "description"            => 'Lorem ipsum dolor sit amet.',
                    "guard_name"             => "web",
                ]);
            }
        }
    }
}
