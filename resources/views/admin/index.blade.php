@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Created at</th>
                    <th></th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>[
                        @if( $user->roles)
                            @foreach($user->roles as $role)
                                {{$role}}
                            @endforeach
                        @else
                        USER
                        @endif
                        ]
                    </td>
                    <td>{{$user->created_at}}</td>
                    <td><a href='/admin/manage/{{$user->id}}'><button class="btn btn-primary">Manage</button></a></td>
                    <td>
                        <form method="POST" action="/user/{{$user->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger delete-user" value="Delete user">
                            </div>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
@endsection