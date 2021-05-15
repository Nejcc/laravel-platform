@extends('layouts.app')

@section('content')
    <div class="row">
       <div class="col-12">
           <h1>{{ $post->name }}</h1>
           <p>{{ $post->description }}</p>
           <p>Created by: {{ $post->user->name }} | {{ $post->created_at->diffforhumans() }} | Views: {{ number_format($post->views, 0) }}</p>
{{--           {{ $post }}--}}
       </div>
    </div>
    <livewire:posts.comments :post="$post"/>
@endsection
