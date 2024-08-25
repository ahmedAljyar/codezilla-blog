@extends('layouts.app')

@section('title')
index
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/posts/index.css')}}">
@endsection

@section('content')
<div class="text-center mt-4">
    <a href='{{route("posts.create")}}' class="btn btn-success">Create Post</a>
</div>

<div class="t mt-3">

    <div class="table-header">
        <div class="id">#</div>
        <div class="title">title</div>
        <div class="posted-by">Posted By</div>
        <div class="created-at">Created At</div>
        <div class="actions">Actions</div>
    </div>
    @foreach($posts as $post)
    <div class="post">
        <div class="id">{{$post->id}}</div>
        <div class="title">{{$post->title}}</div>
        <div class="posted-by">{{$post->user ? $post->user->name : ""}}</div>
        <div class="created-at">{{$post->created_at->format('Y-m-d')}}</div>
        <div class="actions">
            <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a>
            <a href="{{route('posts.edit', $post['id'])}}" class="btn btn-primary">Edit</a>
            <form method="POST" action="{{route('posts.destroy', $post->id)}}" style="display:inline;">
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @endforeach

</div>
@endsection