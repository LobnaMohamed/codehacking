@extends('layouts.blog-post')


@section('content')
    <h1>Post</h1>

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted  {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>


    <hr>
    @if (Session::has('comment_message'))
        {{session('comment_message')}}
    @endif
    <!-- Blog Comments -->
    {{-- if user is logged in --}}
    @if (Auth::check()) 
            <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            {!! Form::open(['method'=>'post','action'=>'PostCommentsController@store'] )!!}
                {{ csrf_field() }}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                    {!! Form::label('body', 'comment:') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3]) !!}

                </div>
                <div class="form-group">
                    {!! Form::submit('save', ['class'=>' btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    @endif


    <hr>

    <!-- Posted Comments -->
     @if (count($comments) >0)
        <!-- Comment -->
        @foreach ($comments as $comment)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    {{$comment->body}}
                    <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary pull-right">reply</button>
                        <div class="comment-reply">
                            {!! Form::open(['method'=>'post','action'=>'CommentRepliesController@store'] )!!}
                                {{ csrf_field() }}
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <div class="form-group">
                                    {!! Form::label('body', 'Reply:') !!}
                                    {!! Form::textarea('replybody', null, ['class'=>'form-control','rows'=>1]) !!}

                                </div>
                                <div class="form-group">
                                    {!! Form::submit('save', ['class'=>' btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    @if (count($comment->replies) > 0)
                        @foreach ($comment->replies as $reply)
                                <!-- Nested Comment -->
                                <div class="media nested-comments">
                                
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at->diffForHumans()}}</small>
                                        </h4>
                                        {{$reply->body}}
                                    </div>
                                   
                                </div>
                                <!-- End Nested Comment -->
                        @endforeach
                    @endif

                </div>
            </div>
        @endforeach

     @endif  
     

@endsection
@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle("slow");

        });
    </script>
@endsection