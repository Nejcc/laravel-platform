@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
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
