@extends('layouts.app')

@section('title')
edit
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/posts/edit.css')}}">
@endsection

@section('content')
<form method="post" action="{{route('posts.update', $post)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" type="text" class="form-control" value="{{$post->title}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows='3'>{{$post->description}}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Post Creator</label>
        <select name="post_creator" class="form-control">
            @foreach($users as $user)
            <option @selected($user->id == $post->user_id) value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-info">update</button>
</form>
@endsection