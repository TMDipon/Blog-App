@extends('custom_layouts.basic')

@section('content')
    <h3 class="center indigo-text text-darken-4">Edit your Post</h3>
    <div class="container transparent">
        <div class="row">
            <div class="col s12 l6 offset-l3">
                {{ Form::open(array('action' => ['PostsController@update',$post->id], 'method' => 'POST','enctype' => 'multipart/form-data')) }}
                    <div class="input-field">
                        <i class="material-icons prefix">title</i>
                        <input type="text" id="title" name="title" value = {{$post->title}}>
                        <label for="title" class="active">Post Title</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">message</i>
                        <textarea id="post" name="post" class="materialize-textarea">{{$post->body}}</textarea>
                        <label for="post" class="active">Your Post</label>
                    </div>
                    <div class="file-field input-field">
                        <div class="btn-small green darken-4">
                          <span>File</span>
                          <i class="material-icons right">file_upload</i>
                          <input type="file" name="cover_image_file">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text" name="cover_image">
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light teal darken-4" type="submit">
                        <i class="material-icons right">send</i>
                        Submit
                    </button>
                    {{ Form::hidden('_method','PUT') }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection