<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        abort_if(!me()->can('view roles'), 403, 'You dont have permissions to view this resources');
        return view('admin.user-roles.index');
    }
}
