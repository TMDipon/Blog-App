<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- font awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

        <!-- Styles -->
        <style>
            .title {
                color:darkslategray;
                font-size: 90px;
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                font-weight: 400;
            }

            .sub {
                font-size: 60px;
                color: #2f596f;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-weight: 300;
            }
            
            nav ul li a {
                color: #4f4c4c;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-size: 17px;
                font-weight: 100;
            }

            header{
                background: url({{url('img/blog.jpg')}});
                background-size : cover;
                background-position: center;
                min-height: 1000px;
            }
            @media screen and (max-width:600px)
            {
                header{
                min-height:550px;
                }
            }
        </style>
    </head>
    <body>
        <header>
            @if (Route::has('login'))
                <nav class="nav-wrapper transparent z-depth-1">
                    <div class="container">
                        <ul class="right">
                            @auth
                                <li><a href="{{ url('/home') }}">Home</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                                
                            @endauth
                        </ul>
                    </div>
                </nav>
            @endif
            <br><br>
            <div class="container">
                <div class="center">
                    <strong class="title">Blogs</strong>
                    <p class="sub"><strong>Share, Read and Enjoy</strong></p>
                </div>
            </div>
        </header>
    </body>
</html>
