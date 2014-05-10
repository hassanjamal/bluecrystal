<!DOCTYPE html>

<html lang="en">

<head id="Starter-Site">

<meta charset="UTF-8">

<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>
    @section('title')
    Administration
    @show
</title>

<meta name="keywords" content="@yield('keywords')" />
<meta name="author" content="@yield('author')" />
<!-- Google will often use this as its description of your page/site. Make it good. -->
<meta name="description" content="@yield('description')" />

<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
<meta name="google-site-verification" content="">

<!-- Dublin Core Metadata : http://dublincore.org/ -->
<meta name="DC.title" content="Project Name">
<meta name="DC.subject" content="@yield('description')">
<meta name="DC.creator" content="@yield('author')">

<!--  Mobile Viewport Fix -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<!-- This is the traditional favicon.
     - size: 16x16 or 32x32
     - transparency is OK
     - see wikipedia for info on browser support: http://mky.be/favicon/ -->
<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">

<!-- iOS favicons. -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">

<!-- CSS -->
{{ HTML::style('/app_assets/admin/css/bootstrap.css')}}
{{ HTML::style('/app_assets/admin/css/colorbox.css')}}
{{ HTML::style('/app_assets/admin/css/datatables-bootstrap.css')}}
{{ HTML::style('/app_assets/admin/css/custom.css')}}
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<style>
body {
    padding: 60px 0;
}
</style>

@yield('styles')

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<!-- Asynchronous google analytics; this is the official snippet.
     Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-31122385-3']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script> -->

</head>

<body>
<!-- Container -->
<div class="container">
    <!-- Navbar -->
    <div class="navbar navbar-default navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    @if(Sentry::check())
                    <li{{ (Request::is('admin') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin') }}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <!-- user -->
                    <li class="dropdown{{ (Request::is('admin/users*|admin/groups*|admin/rank*') ? ' active' : '') }}">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{{ URL::to('admin/users') }}}">
                        <span class="glyphicon glyphicon-user"></span> Users <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        @if(Sentry::getUser()->hasAccess('user-view'))
                        <li{{ (Request::is('admin/users*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/users') }}}"><span class="glyphicon glyphicon-user"></span> Users</a></li>
                        @endif

                        <li{{ (Request::is('admin/branch*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/branch') }}}"><span class="glyphicon glyphicon-user"></span> Branch</a></li>

                        {{--@if(Sentry::getUser()->isSuperUser())  --}} 
                        <!-- <li{{ (Request::is('admin/groups*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/groups') }}}"><span class="glyphicon glyphicon&#45;user"></span> Groups</a></li> -->
                        {{-- @endif --}}


                    </ul>
                    </li>
                    <!-- user end -->

                    <!-- scheme start -->
                    <li class="dropdown{{ (Request::is('admin/fd-scheme*|admin/rd-scheme*') ? ' active' : '') }}">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">
                        <span class="glyphicon glyphicon-cog"></span> Schemes <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li{{ (Request::is('admin/fd-schemes*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/fd-schemes') }}}"><span class="glyphicon glyphicon-user"></span> FD Scheme</a></li>

                        <li{{ (Request::is('admin/rd-schemes*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/rd-schemes') }}}"><span class="glyphicon glyphicon-user"></span> RD Scheme</a></li>

                        <li{{ (Request::is('admin/rank*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/rank') }}}"><span class="glyphicon glyphicon-user"></span> Rank & Commission</a></li>
                    </ul>
                    </li>
                    <!-- scheme end -->

                    <!-- associate start here -->
                    <li class="dropdown{{ (Request::is('admin/associates*|admin/branch*') ? ' active' : '') }}">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">
                        <span class="glyphicon glyphicon-user"></span> Associates <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">

                        <li{{ (Request::is('admin/associates') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/associates') }}}"><span class="glyphicon glyphicon-user"></span>All Associates</a></li>
                        <li{{ (Request::is('admin/associates/commission') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/associates/commission') }}}"><span class="glyphicon glyphicon-user"></span>Associates Commission</a></li>


                    </ul>
                    </li>
                    <!-- associate end here -->


                    <!-- Policy start here -->
                    <li class="dropdown{{ (Request::is('admin/policy*') ? ' active' : '') }}">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">
                        <span class="glyphicon glyphicon-cog"></span> Policy <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">

                        <li{{ (Request::is('admin/policy') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/policy') }}}"><span class="glyphicon glyphicon-cog"></span>All Policy</a></li>

                        <li{{ (Request::is('admin/policy/rd_schemes') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/policy/rd_schemes') }}}"><span class="glyphicon glyphicon-cog"></span>RD Installments</a></li>


                    </ul>
                    </li>
                    <!-- Policy end here -->
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li><a href="{{{ URL::to('/') }}}">View Website</a></li>
                    <li class="divider-vertical"></li>
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span>

                        {{{ Sentry::getUser()->first_name . ' '. Sentry::getUser()->last_name}}}

                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="{{{ URL::to('#') }}}"><span class="glyphicon glyphicon&#45;wrench"></span> Settings</a></li> -->
                        <!-- <li class="divider"></li> -->
                        <li><a href="{{{ URL::to('user/logout') }}}"><span class="glyphicon glyphicon-share"></span> Logout</a></li>
                    </ul>
                    </li>
                    @endif <!-- end of sentry check condition -->
                </ul>
            </div>
        </div>
    </div>
    <!-- ./ navbar -->

    <!-- Notifications -->
    @include('notifications')
    <!-- ./ notifications -->

    <!-- Content -->
    @yield('content')
    <!-- ./ content -->

    <!-- Footer -->
    <footer class="clearfix">
        @yield('footer')
    </footer>
    <!-- ./ Footer -->

</div>
<!-- ./ container -->

<!-- Javascripts -->
{{ HTML::script('/app_assets/admin/js/jquery.js')}}
{{ HTML::script('/app_assets/admin/js/jquery.dataTables.min.js')}}
{{ HTML::script('/app_assets/admin/js/datatables-bootstrap.js')}}
{{ HTML::script('/app_assets/admin/js/datatables.fnReloadAjax.js')}}
{{ HTML::script('/app_assets/admin/js/jquery.colorbox.js')}}
{{ HTML::script('/app_assets/admin/js/prettify.js')}}
{{ HTML::script('/app_assets/admin/js/bootstrap.min.js')}}
{{ HTML::script('http://code.jquery.com/ui/1.10.3/jquery-ui.js')}}

<script type="text/javascript">
$(prettyPrint);
</script>

@yield('scripts')

</body>

</html>

