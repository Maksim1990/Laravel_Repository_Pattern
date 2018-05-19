@extends('layouts.app')
@section ('content')
    <div>
        <p >Edit Post</p>

        {!! Form::model($post,['method'=>'PATCH','action'=>['PostController@update',$post->id], 'files'=>true])!!}
        <div class="group-form">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="group-form">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id',$category ,null, ['class'=>'form-control']) !!}
        </div>


        <div class="group-form">
            {!! Form::label('body','Body:') !!}
            {{ Form::textarea('body', null, ['class'=>'form-control','id'=>'postInput']) }}
        </div>

        {!! Form::submit('Update Post',['class'=>'btn btn-warning']) !!}

        {!! Form::close() !!}
        {{ Form::open(['method' =>'DELETE' , 'action' => ['PostController@destroy',$post->id]])}}

        {!! Form::submit('Delete Post',['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}
    </div>

@stop

