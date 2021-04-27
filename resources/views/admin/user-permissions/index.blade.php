@extends('layouts.app')

@section('title', 'users')

@section('content')
    @can('view users')
        <livewire:admin.user-permissions/>
    @endcan
@endsection
