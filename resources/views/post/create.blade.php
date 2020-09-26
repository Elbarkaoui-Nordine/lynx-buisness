@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

    <form method="POST" action="{{ route('post.create') }}" >
        @method('POST')
            @csrf
        <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title"  name="title" placeholder="Enter title">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="2" placeholder="Description"></textarea>
            </div>

            <div class="form-group">
                <label for="article">Article</label>
                <textarea class="form-control" id="article" name="article" rows="5" placeholder="Post's Article"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create post</button>
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