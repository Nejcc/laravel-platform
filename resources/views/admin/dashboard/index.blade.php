@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="row mb-3">
        <div class="col-6">
            <h3>Dashboard</h3>
        </div>
        <div class="col-6">
        </div>
        <div class="col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5>Users</h5>
                    <h2 class="text-right">{{ \App\Models\User::count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5>Routes</h5>
                    <h2 class="text-right">{{ \App\Models\SiteMapList::count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5>Permissions</h5>
                    <h2 class="text-right">{{ \App\Models\Permission::count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>My Role is {{ ucfirst(my_role()) }}</p>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

@endsection
