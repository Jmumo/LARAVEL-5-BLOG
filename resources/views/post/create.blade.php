

@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h3 class="text-warning text-capitalize"> create post</h3>

    {!! Form::open(['action' => 'postsController@store','method' => 'POST','files'=>'true'])!!}
    <div>

        {{form::label('title','Title')}}
        {{form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}

        {{form::label('body','Body')}}
        {{form::textarea('body','',['id'=>'editor','class'=>'form-control','placeholder'=>'body text'])}}
        <hr>
        {{--{{form::label('file','upload image')}}--}}
        {{--{{form::file('file')}}--}}

    </div>
    <div class="form-group">
       {{form::file('cover_image')}}
    </div>

<hr>
        {{form::submit('submit',['class'=>'btn btn-primary'])}}


    {!! Form::close() !!}
</div>

@endsection
