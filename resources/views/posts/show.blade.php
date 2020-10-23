@extends('custom_layouts.basic')

@section('content')

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col s12 l12">
                @if($post->cover_image !== 'no_image.jpg')
                    <div class="card grey lighten-5">
                        <div class="card-image responsive-img materialboxed">
                            <img src="/storage/cover_images/{{$post->cover_image}}">
                        </div>

                        <div class="card-content">
                            <div class="card-title"><strong>{{$post->title}}</strong></div>
                            <h5><strong>Created at:</strong>{{$post->created_at}}</h5>
                            <br>
                            <h6><p>{{$post->body}}</p></h6>
                        </div>

                        <div class="card-action">
                            @if(Auth::user()->id == $post->user_id)
                                <a href="/posts/{{$post->id}}/edit" class="btn-small light-green darken-4 white-text">Edit<i class="material-icons right">edit</i></a>

                                {{ Form::open(array('action' => ['PostsController@destroy',$post->id], 'method' => 'POST')) }}
                                    {{ Form::hidden('_method','DELETE') }}
                                    <button class="btn-small waves-effect waves-light red darken-4 right" type="submit">
                                        <i class="material-icons right">delete</i>
                                        Delete
                                    </button>
                                {{ Form::close() }}
                            @endif
                        </div>
                    </div>
                @else
                    <div class="card transparent">
                        <div class="card-content">
                            <div class="card-title"><strong>{{$post->title}}</strong></div>
                            <h5><strong>Created at:</strong>{{$post->created_at}}</h5>
                            <br>
                            <h6><p>{{$post->body}}</p></h6>
                        </div>

                        <div class="card-action">
                            @if(Auth::user()->id == $post->user_id)
                                <a href="/posts/{{$post->id}}/edit" class="btn-small light-green darken-4 white-text">Edit<i class="material-icons right">edit</i></a>

                                {{ Form::open(array('action' => ['PostsController@destroy',$post->id], 'method' => 'POST')) }}
                                    {{ Form::hidden('_method','DELETE') }}
                                    <button class="btn-small waves-effect waves-light red darken-4 right" type="submit">
                                        <i class="material-icons right">delete</i>
                                        Delete
                                    </button>
                                {{ Form::close() }}
                            @endif
                        </div>
                    </div>
                @endif
                
                <a href="/posts" class="btn-small teal darken-4 white-text">Back<i class="material-icons right">arrow_back_ios</i></a>
            </div>
        </div>
    </div>

@endsection