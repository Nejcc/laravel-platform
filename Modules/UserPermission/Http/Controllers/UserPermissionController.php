<?php

namespace Modules\UserPermission\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserPermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        abort_if(!me()->can('view permissions'), 403, 'You dont have permissions to view this resources');
        $permissions  = Permission::all();
        $rolePermissions = Role::with('permissions')->get();
        $users = User::with(['permissions','roles'])->get();
        return view('userpermission::index', compact(['rolePermissions','permissions','users']));
    }

    public function syncUserPermissions(Request $request)
    {
        Log::info(__METHOD__ . ' ' . me()->email . ' ' . request()->ip());

        $selectedPermissions = [];
        foreach ($request->input('perms') as $permission) {
            array_push($selectedPermissions, $permission['name']);
        }
        $user = User::query()->find($request->input('user'));
        $user->syncPermissions($selectedPermissions);
    }
}
