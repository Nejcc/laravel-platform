@extends('layouts.app')

@section('title', 'users roles')

@section('content')
    @can('view roles')
        <livewire:admin.user-roles/>
    @endcan
@endsection
