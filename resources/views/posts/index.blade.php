@extends('custom_layouts.basic')

@section('content')
    @if(count($posts) > 0)
        <div class="container col l2 offset-l4">
            <ul class="collection with-header">
                <li class="collection-header center"><h4>Posts</h4></li>
                @foreach($posts as $post)
                    <li class="collection-item avatar transparent">
                        <i class="material-icons circle green">mail</i>
                        <span class="title text-black"><strong>{{$post->title}}</strong></span>
                        <p class="teal-text text-darken-4">Author: {{$post->name}}</p>
                        <p class="grey-text text-darken-1">Created at: {{$post->created_at}}</p>
                    <a href="/posts/{{$post->id}}"><i class="material-icons black-text secondary-content">navigate_next</i></a>
                    </li>
                    
                @endforeach
            </ul>

            {{$posts->render()}}
        </div>
    @else
        <div class="center">No Post to show</div>
    @endif
@endsection