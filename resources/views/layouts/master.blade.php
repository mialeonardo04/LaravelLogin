<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link href="{{ asset('theme/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('theme/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" sizes="114x114" href="{{ asset('theme2/img/gears.png') }}">
</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">PEMROGRAMAN WEB LANJUT</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome, {{ Auth::user()->name }}
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            @section('sidebar')
                <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/"><i class="fa fa-dashboard fa-fw"></i>Dashboard Page</a>
                        </li>
                
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Options<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Data Siswa</a>
                                </li>
                                <li>
                                    <a href="#">Data Guru</a>
                                </li>
                                <li>
                                    <a href="#">Data Pembayaran</a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
            @show
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('theme/vendor/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('theme/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('theme/vendor/metisMenu/metisMenu.min.js') }}"></script>

    <script src="{{ asset('theme/dist/js/sb-admin-2.js') }}"></script>

</body>

</html>
