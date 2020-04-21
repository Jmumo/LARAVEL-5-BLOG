

@extends('layouts.app')

@section('content')

    <h1> create post</h1>

    {!! Form::open(['action' => ['postsController@update',$post->id],'method' => 'POST','files'=>'true'])!!}
    <div>

        {{form::label('title','Title')}}
        {{form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])}}

        {{form::label('body','Body')}}
        {{form::textarea('body',$post->body,['id'=>'editor','class'=>'form-control','placeholder'=>'body text'])}}

    </div>
    <br>
    <div class="form-group">
        {{form::file('cover_image')}}
    </div>

    <hr>
    {{form::submit('submit',['class'=>'btn btn-primary'])}}

    {{form::hidden('_method','PUT')}}



    {!! Form::close() !!}

@endsection
