@extends('layouts.app')
@section('content')
    <div class="container" style="">
    <h4 class="lead" style="margin-left: 30%"> welcome to mumo dev</h4>
    <div class="row">
        <div class="col-lg-2 pull-left" style="position: fixed; margin-top: -10px; margin-left:-80px;">
            <h4 class="well text-success">Archives</h4>
            @if(count($archives)>0)
                @foreach($archives as $stats)

            <div class="media" style="margin-left: 25px">
                <a href="/post?month={{$stats['month']}} & year={{$stats['year']}}">
                    {{$stats['month'] . ' ' .$stats['year']}} <span class="badge ">{{$stats['published']}}</span>

                </a>
            </div>


                @endforeach
                @endif
        </div>


        <div class="col-lg-8" style="margin-left: 120px;">
            @if(count($posts)>0)
                @foreach($posts as $post)
                    <div class="well">
                        <a href="/user">
                            <img src="/storage/cover_images/{{$post->user->cover_image}}" class="img-circle"
                                 style="width: 40px;height: 34px">
                            </a>


                        <div>
                            <p class="lead text-primary"> posted
                                by {{$post->user->username}} {{$post->created_at->diffForHumans()}}</p>



                        </div>
                        <div class="text-capitalize">
                            <a href="/post/{{$post->id}}" class="text-danger"><h3>{{$post->title}}</h3>

                                <img class="img-responsive img-thumbnail" style="width: 500px;height: 500px"
                                     src="/storage/cover_images/{{$post->cover_image}}">
                            </a>
                            <br>
                            <small> created {{$post->created_at->diffForHumans()}} by {{$post->user->name}}</small>
                        </div>
                    </div>
                @endforeach
                {{--{{$posts->links()}}--}}
            @else
                <p>no post found</p>
            @endif

        </div>
        <div style=" position: fixed !important; margin-left: 900px;margin-top: -10px;overflow: hidden">
            <h4 class="well text-success">Recent Posts</h4>

                @foreach($posts1 as $post)
                <div class="media">

                <div class="media-body">
                    <a href="/post/{{$post ->id}}" class="text-danger">
                        <img class="img-responsive img-thumbnail" style="width: 110px;height: 70px; margin-left: 90px;";
                             src="/storage/cover_images/{{$post->cover_image}}">
                        <h5 style="margin-left: 90px;">{{$post->title}}</h5>

                    </a>

                </div>
                </div>
                    @endforeach

        </div>
    </div>

        </div>

@endsection
