@extends('layouts.app')

@section('title')
show
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/posts/show.css')}}">
@endsection

@section('content')
<div class="container mt-3">

    <div class="card">
        <div class="card-header">Post Info</div>
        <div class="card-body">
            <div class="card-title">Title: {{$post->title}}</div>
            <div class="card-text">Description: {{$post->description}}</div>
            <div class="card-text">Created At: {{$post->created_at}}</div>
        </div>
    </div>
    <div class="card mt-2">
        <div class="card-header">User Information</div>
        <div class="card-body">
            <div class="card-title">Name: {{$post->user ? $post->user->name : ""}}</div>
            <div class="card-text">Email: {{$post->user ? $post->user->email : ""}}</div>
        </div>
    </div>

</div>
@endsection