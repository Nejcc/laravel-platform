<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $permissions = Permission::all()->toArray();
//        dd($permissions);
        $permissions = collect($permissions)->groupBy('group_name')->toArray();

        //dd($permissions);

        $me = Auth::user();
        $me->load('permissions');

//        $me = collect($me)->toArray();

//        $me = User::with('permission')
//            ->where('name',($me()->id))
//            ->get();

//        dd($me);


        $me = collect($me->permissions)->mapWithKeys(function ($item) {
            return [$item->id => $item['id']];
        });
//        dd($me);

        return view('permission.index', compact(['permissions', 'me']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->all();
//        dd($request->all());
        $user = Auth::user();
        $user->permissions()->sync($request->input('permissions'));



        return redirect()->back()->with(['message' => 'Permissions updated']);;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PermissionUser $permissionUser
     * @return \Illuminate\Http\Response
     */
    public function show(PermissionUser $permissionUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PermissionUser $permissionUser
     * @return \Illuminate\Http\Response
     */
    public function edit(PermissionUser $permissionUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PermissionUser $permissionUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PermissionUser $permissionUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PermissionUser $permissionUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermissionUser $permissionUser)
    {
        //
    }
}
