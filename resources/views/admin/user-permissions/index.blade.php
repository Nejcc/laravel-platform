@extends('layouts.app')

@section('title', 'users permissions')

@section('content')
    @can('view permissions')
        <livewire:admin.user-permissions/>
    @endcan
@endsection
