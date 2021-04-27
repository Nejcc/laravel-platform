@extends('layouts.app')

@section('content')
    <div class="row">
        @forelse($posts as $post)
           <div class="col-3">
               <div class="card my-3">
                   <img class="card-img-top" src="https://cdn.pixabay.com/photo/2015/03/30/14/07/coding-699318_960_720.jpg" alt="Card image cap">
                   <div class="card-body">
                       <h5 class="card-title">{{ $post->name }}</h5>
                       <p class="card-text">{{ shorten($post->description, 100) }}</p>
                       <small>Created by: {{ ucfirst($post->user->name) }}</small>
                       <br>
                       <a href="#" class="btn btn-primary">Go somewhere</a>
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
