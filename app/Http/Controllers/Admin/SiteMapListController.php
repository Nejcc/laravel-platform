<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteMapList;
use Illuminate\Http\Request;

class SiteMapListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        abort_if(!me()->can('view sitemap'), 403, 'You dont have permissions to view this resources');
        return view('admin.sitemap.index');
    }

}
