@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2>Posts</h2>
        </div>
        <div class="col-6 text-right">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#create-new-post">Create new post</a>
        </div>
    </div>
    <div class="row">
        @forelse($posts as $post)
            <div class="col-4">
                <div class="card my-3">
                    <img class="card-img-top"
                         src="https://cdn.pixabay.com/photo/2015/03/30/14/07/coding-699318_960_720.jpg"
                         alt="Card image cap">
                    <div class="card-body" style="height: 110px">
                        <h5 class="card-title"><a
                                href="{{ route('posts.show', $post->slug) }}">{{ shorten(ucfirst($post->name), 50) }}</a>
                        </h5>
                        <p class="card-text">{{ shorten($post->description, 80) }}</p>
                    </div>
                    <div class="card-body">
                        <small>Created by: {{ ucfirst($post->user->name) }}</small> |
                        <small>Views: {{ number_format($post->views, 0) }}</small>
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

@section('modal')
    <div id="create-new-post" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create new post</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="title"  value="{{ old('title') }}"required>
                                    @error('title')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="title">Content</label>
                                    <textarea name="content"  cols="30" rows="5" class="form-control @error('content') is-invalid @enderror"  value="{{ old('content') }}" placeholder="write your post"></textarea>
                                    @error('content')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
