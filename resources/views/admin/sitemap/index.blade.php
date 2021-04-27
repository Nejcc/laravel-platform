@extends('layouts.app')

@section('title', 'users')

@section('content')
    @can('view sitemap')
        <livewire:admin.site-map/>
    @endcan
@endsection
