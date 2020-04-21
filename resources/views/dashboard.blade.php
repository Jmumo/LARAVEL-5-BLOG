@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                <h3>your blog posts</h3>
                        @if(count($posts ) > 0)
                    <table class="table table-responsive table-hover table-striped">
                        <tr>
                            <th class="text-center">your post</th>
                            <th></th>
                            <th></th>


                        </tr>

                        @foreach($posts as $post)
                            <tr class="row">
                                <td class="col-sm-6 col-lg-5">
                                    <img class=" image-clean" src="/storage/cover_images/{{$post->cover_image}}"
                                    style="height: 40%; width: 30%"
                                    >
                                </td>
                            <td class="text-center">{{$post->title}}</td>
                            <td><a href="/post/{{$post->id}}/edit" class="btn btn-default">edit</a> </td>
                                <td>
                                    {!! Form::open (['action'=>['postsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('delete',['class'=>' btn btn-danger'])}}
                                    {!! Form::close ()!!}
                                </td>
                            </tr>
                            @endforeach

                    </table>
                            @else
                            <p>you have no posts</p>
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
