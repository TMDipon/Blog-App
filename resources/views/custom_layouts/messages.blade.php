@if(count($errors) > 0)
    <div class="container">
        <br><br>
        <ul class="collection">
            @foreach ($errors->all() as $error)
                <li class="collection-item red lighten-4">
                    <i class="material-icons red-text text-darken-4">error</i>
                    <span class="title text-black"><strong>{{$error}}</strong></span>
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="container">
        <ul class="collection">
            <li class="collection-item avatar light-green accent-1">
                <i class="material-icons circle green teal-text text-darken-4">done</i>
                <span class="title text-black"><strong>{{session('success')}}</strong></span>
            </li>
        </ul>
    </div>
@endif

@if (session('error'))
    <ul class="collection">
        <li class="collection-item red lighten-4">
            <i class="material-icons red-text text-darken-4">error</i>
            <span class="title text-black"><strong>{{session('error')}}</strong></span>
        </li>
    </ul>
@endif