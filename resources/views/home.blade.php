@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-12 main-title d-flex align-items-center">
                    <h1 class="text-center col-12 display-2">
                        Lynx buisness
                    </h1>
                </div>
                <div class="justify-content-center d-flex col-12 ">
                @if (Auth::check())
                    <div class="col-3 border-right border-primary text-center">
                        <div>
                            <div class="col-12 pb-3">
                            See all users posts
                            </div>
                            <a href="/post"><button class="btn btn-primary">All posts</button></a>
                        </div>
                    </div>

                    <div class="col-3 border-right border-primary text-center">
                        <div>
                            <div class="col-12 pb-3">
                            See your own posts
                            </div>
                            <a href="/profil"><button class="btn btn-primary">Own posts</button></a>
                        
                        </div>
                    </div>

                    <div class="col-3 text-center">
                        <div>
                            <div class="col-12 pb-3">
                            Create your own posts
                            </div>
                            <a href='/post/create'><button class="btn btn-primary">Create</button></a>
                        </div>
                    </div>
                @else
                <div class="col-3 border-right border-primary text-center">
                        <div>
                            <div class="col-12 pb-3">
                            Create an account
                            </div>
                            <a href="/register"><button class="btn btn-primary">Register</button></a>
                        </div>
                    </div>

                    <div class="col-3 border-primary text-center">
                        <div>
                            <div class="col-12 pb-3">
                            Already have an acount ?
                            </div>
                            <a href="/login"><button class="btn btn-primary">Login</button></a>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
@endsection