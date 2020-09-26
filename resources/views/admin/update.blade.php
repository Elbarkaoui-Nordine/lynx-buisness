@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <form method="POST" action="/admin/user/{{$user->id}}">
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
            <label for="role">Role</label>
            <select name="role" id="role">
            <option value="">Change role</option>
            <option value="admin">ADMIN</option>
            <option value="moderator">MODERATOR</option>
            <option value="user">USER</option>
            </select>  
        </div>
            
            <button type="submit" class="btn btn-primary">Update user</button>
            <p class="text-center">{{ session('msg') }}</p>
        </form>
        </div>
    </div>
    @if($errors->any())
        <div id="error-box" class="text-center mt-2">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
        </div>
    @endif
</div>
@endsection