@extends('layouts.app')
@section ('content')
    <div>
        <p >Create Post</p>

        {!! Form::open(['method'=>'POST','action'=>'PostController@store', 'files'=>true])!!}
        <div class="group-form">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
        <div class="group-form">
            {!! Form::label('category_id','Category ID:') !!}
            {!! Form::text('category_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="group-form">
            {!! Form::label('body','Body:') !!}
            {{ Form::textarea('body', null, ['class'=>'form-control','id'=>'postInput']) }}
        </div>
        {!! Form::submit('Create Post',['class'=>'btn btn-warning']) !!}

        {!! Form::close() !!}
    </div>

@stop
