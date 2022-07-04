@extends('layouts.app')

@section('content')
    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('permission.store')}}">
        @csrf

        @if(session()->has('message'))
            {{ session('message') }}
        @endif

        <div class="row">

            @foreach($permissions as $key => $permission)
                {{--            {{ dd($permission) }}--}}
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header">
                            {{--                    {{ $permission['name'] }}--}}
                            {{ strtoupper($key) }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($permission as $data)
                                    {{--                                {{ dd($me[$data['id']]) }}--}}
                                    {{--                                {{ dd($data['id'], $me[$data['id']], collect($me[$data['id']])->toArray()) }}--}}
                                    <div class="col-2">
                                        @if(!empty($me[$data['id']]))
                                            <input type="checkbox"
                                                   name="permissions[]"
                                                   value="{{ $data['id']}}"
                                                {{ ($data['id'] == $me[$data['id']]) ? 'checked' : '' }}>
                                        @else
                                            <input type="checkbox"
                                            name="permissions[]"
                                            value="{{ $data['id']}}">
                                        @endif
                                    </div>
                                    <div class="col-10">
                                        {{--                                    {{ str_replace($key, '', $data['name']) }}--}}
                                        {{ explode(' ', $data['name'])[0] }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
