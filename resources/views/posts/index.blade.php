@extends('layouts.app')
@section ('content')
    <div>
        <p ><h1>All Posts</h1>  <a href="{{ URL::to('posts/create') }}" class="btn btn-info">New post</a></p>
        @if(count($posts)>0)
            <ul>
                @foreach($posts as $post)
                    <li>{{$post->id}} :<a href="{{ URL::to('posts/' . $post->id ) }}"> {{$post->title}}</a>
                        <a href="{{ URL::to('posts/' . $post->id . '/edit') }}" class="btn btn-warning">Edit</a>
                    </li>
               @endforeach
            </ul>
        @endif
    </div>

@stop