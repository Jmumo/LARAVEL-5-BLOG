@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="well-lg">
        <a href="/post" class="btn btn-default" style="margin-top: 26px; margin-left: 0px;">go back</a>
    {{--<h3 class="text-capitalize">{{$post->title}}</h3>--}}
        <hr>

        <div class="row">
        <div class="col-lg-6 col-sm-11">
            <img class="img-responsive image-clean img-rounded img-thumbnail"  style="height: 400px;width: 400px" src="/storage/cover_images/{{$post->cover_image}}">
</div>
       <div class="col-lg-6">
            <div >{!! $post->body !!}</div>


        <hr>
<small> written on   {{$post->created_at->diffForHumans()}} by {{$post->user->name}}</small>
    </div>
<hr>
        </div>
        <hr>
        <div class="well">

    @if(!Auth()->guest())
        {!!Form::open(['action'=>'CommentsController@store'])  !!}
            {{Form::hidden('post_id',$post->id)}}

            {{form::label('comment','leave a comment',['class'=>'text-warning'])}}
            {{form::textarea('body','',['class'=>'form-control form-control-sm','placeholder'=>'enter your comments here','cols'=>'3','rows'=>'2'])}}

        <hr>

            {{form::submit('save comment',['class'=>' btn btn-info'])}}
        {!! Form::close() !!}
        </div>

        <hr>


        @foreach($post->comments as $comment)
        <div class="media">
            <img src="/storage/cover_images/{{$comment->image}}" class="mr-3" alt="..." style="width: 50px">
            <div class="media-body">
                <h5 class="mt-0 lead">{{$comment->username}} </h5><p class="">commented on this {{$comment->created_at->diffForHumans()}}</p>
               <p>{{$comment->body}}</p>
            </div>
        </div>
        @endforeach


        @if(Auth()->user()->id == $post->user_id)

    <a href="/post/{{$post->id}}/edit" class="btn btn-primary pull-left">edit</a>

    {!! Form::open (['action'=>['postsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
    {{Form::hidden('_method','DELETE')}}

    {!! Form::close ()!!}
    @endif
@endif
@endsection
    </div>
    </div>
