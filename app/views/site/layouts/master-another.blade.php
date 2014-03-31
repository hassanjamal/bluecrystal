<!DOCTYPE html>
<html lang="en">
    <head>
        @section('mainhead')
        <title>
            @section('title')
            WELCOME TO BLUE CRYSTAL MUTUAL BENEFIT INDIA LIMITED
            @show
        </title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap core CSS -->
        {{HTML::style('/css/compiled/bootstrap.css')}}
        {{HTML::style('/css/compiled/bootstrap-overrides.css')}}
        {{HTML::style('/css/compiled/theme.css')}}
        <link href='http://fonts.googleapis.com/css?family=Stint+Ultra+Expanded' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Average+Sans' rel='stylesheet' type='text/css'>

        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        @show
    </head>

    <body class="pull_top">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a href="{{{ URL::to('/')}}}" class="navbar&#45;brand"><strong><span style="color:blue">Blue </span>Crystal </strong></a> -->
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse" role="navigation">
                    <ul class="nav navbar-nav">
                        <li {{ (Request::is('/') ? ' class="active"' : '')  }}><a href="{{{ URL::to('/')}}}"><i class="fa fa-home"></i> Home</a></li>
                        @if(! Sentry::check())
                        <li {{{ (Request::is('about') ? ' class=active' : '')  }}}><a href="{{{ URL::to('/about')  }}}"><i class="fa fa-group "></i> About Us</a> </li>
                        <li {{{ (Request::is('schemes') ? ' class=active' : '')  }}}><a href="{{{ URL::to('/schemes')  }}}"><i class="fa fa-rocket"></i> Schemes</a> </li>
                        <li {{{ (Request::is('loans') ? ' class=active' : '')   }}}><a href="{{{ URL::to('/loans')  }}}"><i class="fa fa-rupee "></i> Loans</a> </li>
                        <li {{{ (Request::is('branches') ? ' class=active' : '')   }}}><a href="{{{ URL::to('/branches')  }}}"><i class="fa fa-globe "></i> Branches</a> </li>
                        <li {{{ (Request::is('media') ? ' class=active' : '')   }}}><a href="{{{ URL::to('/media')  }}}"><i class="fa fa-youtube-play "></i> Media </a> </li>
                        <li {{{ (Request::is('career') ? ' class=active' : '')   }}}><a href="{{{ URL::to('/career')  }}}"><i class="fa fa-signal "></i> Career</a> </li>
                        <li {{{ (Request::is('faq') ? ' class=active' : '')  }}}><a href="{{{ URL::to('/faq')  }}}"><i class="fa fa-question "></i> FAQ's</a> </li>
                        @endif
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        @if (Sentry::check())
                        <? $user_logged = Sentry::getUser();
                        $super_admin_group = Sentry::FindGroupByName('SuperUser'); 
                        $branch_admin_group = Sentry::FindGroupByName('Branch-Admin'); 
                        $branch_user_group = Sentry::FindGroupByName('Branch-User'); 
                        ?>
                        @if ($user_logged->inGroup($super_admin_group))
                        <li><a href="{{{ URL::to('admin') }}}">Admin Panel</a></li>
                        @endif
                        @if ($user_logged->inGroup($branch_admin_group))
                        <li><a href="{{{ URL::to('admin') }}}">Admin Panel</a></li>
                        @endif
                        <li><a href="{{{ URL::to('/') }}}">Logged in as {{{ Sentry::getUser()->first_name .' '.Sentry::getUser()->last_name}}}</a></li>
                        <li><a href="{{{ URL::to('user/logout') }}}">Logout</a></li>
                        @else
                        <li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a 	href="{{{ URL::to('user/login') }}}"><i class="fa fa-lock"></i> Login</a></li>
                        <!-- <li {{ (Request::is('user/register') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">Register</a></li> -->
                        @endif
                    </ul>                   
                </div>
            </div>
        </div>
        <!--     container start here
        -->

        <div id="container" style="padding-top:60px">
            @if (Session::has('message'))
            <p id="message"> {{ Session::get('message')}}</p>
            @endif
            @yield('container')
        </div>
        <!--     container ends here-->    
        <!--     footer start here --> 
        <footer id="footer" >
            <div class="container">
                <div class="row credits">
                    <div class="col-md-12">
                        <div class="row social">
                            <div class="col-md-12">
                                <a href="#" class="facebook">
                                    <span class="socialicons ico1"></span>
                                    <span class="socialicons_h ico1h"></span>
                                </a>
                                <a href="#" class="twitter">
                                    <span class="socialicons ico2"></span>
                                    <span class="socialicons_h ico2h"></span>
                                </a>
                                <a href="#" class="gplus">
                                    <span class="socialicons ico3"></span>
                                    <span class="socialicons_h ico3h"></span>
                                </a>
                            </div>
                        </div>
                        <div class="row copyright">
                            <div class="col-md-12">
                                <p>&copy; {{ 'Blue Crystal Group' }} {{ date('Y') }} </p>
                            </div>
                        </div>
                    </div>            
                </div>
            </div>

        </footer>  
        <!--     footer end here   -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        {{HTML::script('/js/jquery.js')}}
        {{HTML::script('/js/bootstrap.min.js')}}
        {{HTML::script('/js/theme.js')}}
        @yield('script')
    </body>
</html>

