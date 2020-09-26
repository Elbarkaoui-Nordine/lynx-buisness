@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <p class="text-success text-center">{{Session::get('data')}}</p>
        <form method="POST" action="/user/{{$user->id}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username"  name="username" value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email"  name="email" value="{{$user->email}}">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password"  name="password">
        </div>
         
            <button type="submit" class="btn btn-primary">Update profil</button>
            <p class="text-center">{{ session('msg') }}</p>
        @if($errors->any())
            <div id="error-box" class="text-center mt-2">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
            </div>
        @endif
        </form>
        </div>
    </div>
</div>
@endsection