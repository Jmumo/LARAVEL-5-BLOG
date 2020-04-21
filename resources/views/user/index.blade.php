@extends('layouts.app')

@section('content')
    <table class="table-striped table-hover table-responsive">

     <H4 class="lead text-capitalize" style="margin-top: 120px;margin-left: 200px;">user profile</H4>


<tr>

    <td class="col-lg-5">

        <img class="img-responsive image-clean img-thumbnail"  style="height: 300px; width: 100%; margin-top: 30px; "  src="/storage/cover_images/{{$user->cover_image}}">
    </td>
    <td class="col-lg-7">
    {!!Form ::open(['action' => ['UserController@index',$user->id],'method' => 'POST','files'=>'true','class'=>'form-group'] ) !!}
    {{form::label('name','Name')}}
    {{form::text('title',$user->name,['class'=>'form-control form-control-lg','placeholder'=>'Title'])}}

        {{form::label('email','Email')}}
        {{form::text('title',$user->email,['class'=>'form-control form-control-lg','placeholder'=>'Title'])}}

        {{form::label('username','Username')}}
        {{form::text('title',$user->username,['class'=>'form-control form-control-lg','placeholder'=>'Title'])}}

        <hr>
        {{--{{form::file('cover_image')}}--}}
     <hr>
    {!! Form::close ()!!}
        @if(!Auth()->guest())
            @if(Auth()->user()->id==$user->id)
        <a href="/user/{{$user->id}}/edit" class="btn btn-primary pull-left">change profile</a>
                @else{
            your not authorised
            }
            @endif
        @endif
   </td>


</tr>


    </table>


    @endsection