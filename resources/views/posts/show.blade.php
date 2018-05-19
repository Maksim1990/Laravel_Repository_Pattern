@extends('layouts.app')
@section ('content')
    <div>
        <p > <a href="{{ URL::to('posts') }}" class="btn btn-success">All posts</a></p>
        <p ><h1>Show Post</h1></p>
            {{$post->title}}  <a href="{{ URL::to('posts/' . $post->id . '/edit') }}" class="btn btn-warning">Edit</a>

    </div>

@stop