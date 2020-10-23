<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <!-- used from the auth part-->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
    

    <style>
        nav .badge{
            position: relative;
            top:3px;
            right:32px;
        }

        .box{
            height:200px;
        }

        header{
                background: url({{url('img/acc.jpg')}});
                background-size : cover;
                background-position: center;
                min-height: 800px;
            }
            @media screen and (max-width:600px)
            {
                header{
                min-height:550px;
                }
            }

            .img-wrap {
                width: 100%;
                height: 450px;
                position: relative;
                display: center;
                overflow: hidden;
                margin: 1;
                }
    </style>
    <title>Blog App</title>
</head>

<body>
    <header>
        <nav class="nav-wrapper transparent">
            <div class="container">
                <a href="{{ url('/') }}" class="brand-logo indigo-text text-darken-3">Blog App</a>
                <a href="#" class="sidenav-trigger" data-target="nav-elems">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/posts">Blogs</a></li>
                    <li><a href="/posts/create">Create</a></li>
                    <li class="input-field">
                        <a href="#" id="dd" class="dropdown-trigger btn-small blue-grey darken-2" data-target="delements">{{ Auth::user()->name }}<i class="material-icons right">expand_more</i></a>
                    </li>
                </ul>
                <ul class="dropdown-content" id="delements">
                    <li>
                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                        <i class="material-icons right">exit_to_app</i>
                                        </a>
        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <ul class="sidenav yellow lighten-3" id="nav-elems">
            <li>
                <a href="/posts" class="btn-small blue-grey">
                    <span>Blogs</span>
                </a>
            </li>

            <li>
                <a href="/posts/create" class="btn-small blue-grey">
                    <span>Create</span>
                </a>
            </li>
        </ul>

        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
                $('#dd').dropdown();
                M.updateTextFields();
                $('.materialboxed').materialbox();
            });
        </script>

        @include('custom_layouts.messages')
        @yield('content')
    </header>
</body>