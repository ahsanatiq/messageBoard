<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
            @if(auth()->user())
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">My Events</a></li>
                <li class="dropdown">
                    <a href="javascript:;" class="user">
                        <span class="text">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                        <span class="image"><img src="{{ asset_avatars(Auth::user()->avatar) }}" alt="{{ Auth::user()->first_name }}"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile.password') }}">Change Password</a></li>
                        <li><a href="{{ route('profile.index') }}">Edit Profile</a></li>
                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            {!! Form::open(['route'=>'logout','id'=>'logout-form']) !!}
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </li>
            </ul>
            @else
            <ul class="nav navbar-nav">
                <li><a href="#">Learn More</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}" class="sign-up-btn def-btn">Sign Up</a></li>
            </ul>
            @endif
        </div>
    </div>
</nav>
