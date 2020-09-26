@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12 p-3 border-bottom border-secondary pb-4">
            @if((isset(Auth::user()->roles) and auth()->user()->hasRole('MODERATOR')) or Auth::user()->id == $post->user_id )
            <div class="float-right d-flex">
                <a href='/post/update/{{$post->id}}' class="mr-2"><button class="btn btn-info btn-sm">Modify</button></a>
                @if((isset(Auth::user()->roles) and auth()->user()->hasRole('ADMIN')) or Auth::user()->id == $post->user_id)
                <form method="POST" action="/post/{{$post->id}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger delete-user btn-sm" value="Delete post">
                    </div>
                </form>
                @endif
            </div>
            @endif
            <div class="border-bottom border-secondary col-12 p-3 mb-3 justify-content-between d-flex article-bg rounded">
                <div>
                    <h4 class="blog-title m-0">{{$post->title}}</h4>
                </div>
                <div class="pt-2 pr-2">
                    {{ $post->created_at->format('d/m/Y') }}
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class=" blog-description font-weight-bold p-3 mt-2">
                    {{$post->description}}
                </div>
                <div>
                    Author: {{ $post->user->name }}
                </div>
            </div>
            <div class="col-12 article-bg p-4 rounde">
                {{$post->article}}
            </div>
            <div class="mt-3">
                <a class='blue-link' href="/post">&larr; Back to posts</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection