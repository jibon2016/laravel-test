@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card bg-light rounded">
        <img class=" my-3 rounded-circle border-dark border-1 mx-auto d-block" src="{{ asset($user->userInfo->image) }}" alt="" width="100" height="100"> 

        <div class="card-body px-5 my-3 text-center bg-white">
          <p>{{ $user->userInfo->first_name . " " . $user->userInfo->last_name }}</p>
          <p>Phone: {{ $user->phone }}</p>
          <p>Eamil: {{ $user->email }}</p>
          <p>Address: {{ $user->userInfo->address }}</p>
          <p>Registration Date: {{ $user->created_at }}</p>
        </div>


      </div>
        <a href="{{route('users')}}" class="mx-auto d-block btn btn-primary">Back</a>
    </div>
  </div>
</div>
@endsection
