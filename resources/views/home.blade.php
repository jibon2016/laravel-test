@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>
                @if (Session::has('message'))
                <div class="alert alert-info" role="alert">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="card-body">
                    <a href="{{ route('users')}}" class="btn btn-success btn-lg">Users</a>
                    <a href="{{route('update.profile', ['user_id' => Auth::user()->id ])}}" class="btn btn-warning btn-lg">Update information</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
