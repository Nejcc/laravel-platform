@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2>Posts</h2>
        </div>
        <div class="col-6 text-right">
            <a href="" class="btn btn-primary">Create new post</a>
        </div>
    </div>
    <div class="row">
        @forelse($posts as $post)
           <div class="col-3">
               <div class="card my-3">
                   <img class="card-img-top" src="https://cdn.pixabay.com/photo/2015/03/30/14/07/coding-699318_960_720.jpg" alt="Card image cap">
                   <div class="card-body" style="height: 190px">
                       <h5 class="card-title"><a href="{{ route('posts.show', $post->slug) }}">{{ shorten(ucfirst($post->name), 50) }}</a></h5>
                       <p class="card-text">{{ shorten($post->description, 80) }}</p>
                   </div>
                   <div class="card-body">
                       <small>Created by: {{ ucfirst($post->user->name) }}</small> | <small>Views: {{ number_format($post->views, 0) }}</small>
                   </div>
               </div>
           </div>
        @empty
            <div class="col-12">
                <p class="text-center">There are no post!</p>
            </div>
        @endforelse
    </div>
@endsection
