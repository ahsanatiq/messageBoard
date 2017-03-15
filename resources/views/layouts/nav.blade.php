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
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @foreach($pagesList as $page)
                <li><a href="{{ route('pages.view',['id'=>$page->id]) }}">{{ $page->name }}</a></li>
                @endforeach
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('http://public.'.parse_url(config('app.url'))['host']) }}">Public Messages</a></li>
                @if(auth()->user())
                <li class="dropdown">
                    <a id="user-menu" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile.password') }}">Change Password</a></li>
                        <li><a href="{{ route('profile.index') }}">Edit Profile</a></li>
                        @if(auth()->user()->role->name=='Admin')
                            <li><a id="nav-bar-add-message" href="{{ route('messages.add') }}">Add Message</a></li>
                        @endif
                        <li><a href="{{ url('http://private.'.parse_url(config('app.url'))['host']) }}">Private Messages</a></li>
                        @if(auth()->user()->role->name=='Super Admin')
                        <li><a id="nav-bar-manage-users" href="{{ route('users.index') }}">Manage Users</a></li>
                        <li><a id="nav-bar-manage-pages" href="{{ route('pages.index') }}">Manage Pages</a></li>
                        @endif
                        <li role="separator" class="divider"></li>
                        <li>
                            <a id="nav-bar-logout" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            {!! Form::open(['route'=>'logout','id'=>'logout-form']) !!}
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </li>
                @else
                <ul class="nav navbar-nav">
                    <li><a id="nav-bar-login" href="{{ route('login') }}">Login</a></li>
                </ul>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>