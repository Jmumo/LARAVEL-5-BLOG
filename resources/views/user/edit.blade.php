@extends('layouts.app')

@section('content')
    <table class="table-striped table-hover table-responsive">

        <H4 class="lead ">user profile</H4>


        <tr>

            <td class="col-lg-5">
                <img class="img-responsive image-clean image-rounded" style="width: 80%; height: 60%" src="/storage/cover_images/{{$user->cover_image}}">

            </td>
            <td class="col-lg-7">
                {!!Form ::open(['action' => ['UserController@update',$user->id],'method' => 'POST','files'=>'true','class'=>'form-group'] ) !!}

                {{form::label('name','Name')}}
                {{form::text('name',$user->name,['class'=>'form-control form-control-lg','placeholder'=>'Title'])}}

                {{form::label('email','Email')}}
                {{form::text('email',$user->email,['class'=>'form-control form-control-lg','placeholder'=>'Title'])}}

                {{form::label('username','Username')}}
                {{form::text('username',$user->username,['class'=>'form-control form-control-lg','placeholder'=>'Title'])}}

                {{form::file('cover_image')}}
                <hr>
                {{form::hidden('_method','PUT')}}
                {{form::submit('save changes',['class'=>'btn btn-primary'])}}

                {!! Form::close ()!!}

            </td>


        </tr>

    </table>


@endsection