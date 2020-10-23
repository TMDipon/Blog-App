@extends('custom_layouts.basic')

@section('content')
<div class="container">
    <br><br>
    <div class="row">
        <div class="col s12 l10 offset-l1">
            <div class="card transparent">
                <div class="card-image">
                    <img src="img/dboard.jpg" width="500" height="220" style="vertical-align:middle">
                    <a href="/posts" class="halfway-fab btn-small green darken-4 waves-effect waves-light right">
                        Your blogs
                        <i class="material-icons right">mail_outline</i>
                    </a>
                </div>

                <div class="card-content">
                    <div class="card-title"><strong>Dashboard</strong></div>
                    <br>
                    <h6>
                        <p>
                            @if (session('status'))
                                {{ session('status') }}
                            @endif
                            {{ __('You are logged in!') }}
                        </p>
                    </h6>
                </div>

                <div class="card-action">
                    <a href="/posts" class="btn-small teal darken-4 white-text">Show Blogs<i class="material-icons right">navigate_next</i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
