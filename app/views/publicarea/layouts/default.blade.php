<!DOCTYPE html>
<html>
<head>
    <title>Ember Casters</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/main.css')}}
</head>
<body>
<div class="page">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">Ember Casters</a>
                    </div>
                    {{--
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Learn</a></li>
                            <li><a href="/browse">Browse</a></li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>

                        <ul class="nav navbar-nav navbar-right">
                            @if(Auth::check())
                            <li>{{link_to_route('logout', 'Log out')}}</li>
                            @else
                            <li>{{link_to_route('showLoginForm', 'Log in')}}</li>
                            @endif
                        </ul>
                        --}}
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(Session::has('message'))
            <div class="alert-box success">
                <h2>{{ Session::get('message') }}</h2>
            </div>
            @endif
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0">
            @yield('body')            
        </div>
    </div>
</div>
</div>
{{HTML::script(URL::asset('js/jquery.min.js'))}}
{{HTML::script(URL::asset('js/bootstrap.min.js'))}}
{{HTML::script(URL::asset('js/jquery.fitvids.js'))}}
{{HTML::script(URL::asset('js/main.js'))}}
</body>
</html>