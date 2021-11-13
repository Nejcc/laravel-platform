{{--@extends('userpermission::layouts.master')--}}
{{--@extends('layouts.master')--}}
@extends('layouts.app')

@section('content')
   <div class="container">
       @can('view permissions')
           <permissions :roles_permissions="{{$rolePermissions}}" :permissions="{{$permissions}}" :users="{{$users}}"></permissions>
       @endcan
   </div>
@endsection
