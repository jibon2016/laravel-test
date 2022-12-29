@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-gray">Users</div>
                @if (Session::has('message'))
                <div class="alert alert-info" role="alert">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="card-body">
                    <table class="table table-responsive border-bottom-1">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->userInfo->first_name . " " . $user->userInfo->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td> <img src="{{ $user->userInfo->image }}" alt="" width="50" height="50"></td>
                                <td><a href="{{ route('update.profile', ['user_id'=> $user->id ])}}"><i class="fa-solid fa-pen-to-square text-warning"></i></a> <a href="{{ route('user.view', ['user' => $user->id ])}}" ><i class="fa-solid fa-eye text-success"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection