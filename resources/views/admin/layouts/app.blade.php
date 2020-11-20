<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ mix('/css/admin/vendor.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/admin/app.css') }}" rel="stylesheet">

    {{-- You can put page wise internal css style in styles section --}}
    @stack('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body dir="rtl" class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        {{-- Header --}}
        <header class="main-header">

            {{--  Logo  --}}
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <span class="logo-mini">{{ config('app.name') }}</span>
                <span class="logo-lg">{{ config('app.name') }}</span>
            </a>

            {{--  Header Navbar  --}}
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        {{--  User Account Menu  --}}
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('images/admin-avatar.png') }}" class="user-image" alt="Admin avatar">

                                <span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="{{ asset('images/admin-avatar.png') }}" class="img-circle"
                                        alt="Admin avatar">

                                    <p>{{ Auth::guard('admin')->user()->name }}</p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">
                                            Profile
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign
                                            out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            {{--  Sidebar  --}}
            <section class="sidebar">

                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('images/admin-avatar.png') }}" class="img-circle" alt="Admin avatar">
                    </div>

                    <div class="pull-left info">
                        <p>{{ Auth::guard('admin')->user()->name }}</p>
                    </div>
                </div>

                {{--  Sidebar Menu  --}}
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU</li>

                    <li {{ $page == 'dashboard' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-building"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li {{ $page == 'admins' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.admins.index') }}">
                            <i class="fa fa-building"></i>
                            <span>إدارة المستخدمين</span>
                        </a>
                    </li>

                    <li {{ $page == 'teacher' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.teachers.index') }}">
                            <i class="fa fa-arrow-right"></i>
                            <span>أعضاء هيئة التدريس</span>
                        </a>
                    </li>

                    <li {{ $page == 'department' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.departments.index') }}">
                            <i class="fa fa-arrow-right"></i>
                            <span>الاقسام</span>
                        </a>
                    </li>

                    <li {{ $page == 'ad' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.ads.index') }}">
                            <i class="fa fa-arrow-right"></i>
                            <span>الاعلانات</span>
                        </a>
                    </li>

                    <li {{ $page == 'paper' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.papers.index') }}">
                            <i class="fa fa-arrow-right"></i>
                            <span>الاوراق البحثية</span>
                        </a>
                    </li>

                    <li {{ $page == 'nationality' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.nationalities.index') }}">
                            <i class="fa fa-arrow-right"></i>
                            <span>الجنسيات</span>
                        </a>
                    </li>

                    <li {{ $page == 'college' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.colleges.index') }}">
                            <i class="fa fa-arrow-right"></i>
                            <span>الكليات</span>
                        </a>
                    </li>

                    <li {{ $page == 'classification' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.classifications.index') }}">
                            <i class="fa fa-arrow-right"></i>
                            <span>التصنيفات</span>
                        </a>
                    </li>

                    <li {{ $page == 'qualification' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.qualifications.index') }}">
                            <i class="fa fa-arrow-right"></i>
                            <span>المؤهلات</span>
                        </a>
                    </li>

                    <li {{ $page == 'magazine' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.magazines.index') }}">
                            <i class="fa fa-arrow-right"></i>
                            <span>المجلات</span>
                        </a>
                    </li>

                    <li {{ $page == 'conference' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.conferences.index') }}">
                            <i class="fa fa-arrow-right"></i>
                            <span>المؤتمرات</span>
                        </a>
                    </li>
                    <li {{ $page == 'report' ? ' class=active' : '' }}>
                        <a href="{{ route('admin.reports.index') }}">
                            <i class="fa fa-arrow-right"></i>
                            <span>التقارير</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>


        <div class="content-wrapper">
            {{--  Page header  --}}
            <section class="content-header">
                <h1>
                    @yield('title')
                </h1>
            </section>

            {{--  Page Content  --}}
            <section class="content container-fluid">
                @if ($errors->all())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

                @yield('content')
            </section>
        </div>
    </div>

    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
    <script src="{{ mix('/js/admin/app.js') }}"></script>

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

    @if (session('message'))
    <script>
        showNotice("{{ session('type') }}", "{{ session('message') }}");
    </script>
    @endif
    <script>
        $(document).ready(function () {
                // $('#table').DataTable();
                $('[data-toggle="tooltip"]').tooltip();
            });
            $(document).ready(function() {
                $('#table').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                'print'
                ]
                } );
                } );
    </script>

    {{-- @if (session('message'))
        <script>
            showNotice("{{ session('type') }}", "{{ session('message') }}");
    </script>
    @endif --}}

    {{-- You can put page wise javascript in scripts section --}}
    @yield('scripts')
</body>

</html>