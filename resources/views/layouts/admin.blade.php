<html>
<head>
    <title>@yield('title')</title>
    @include('includes.templates.head-admin-ela')
</head>
<body>
    <style>
        .income-header {
            list-style-type: none;
        }
        .income-header li {
            float: left;
            margin-right: 40px;
            font-size: 20px;
        }
    </style>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                @if(session()->get('user')->account_type == 2)
                    <ul class="nav navbar-nav">
                        <li class="">
                            <a href="/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                        </li>
                        <li class="menu-title">Admin Menu</li><!-- /.menu-title -->
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>USERS</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-user"></i><a href="/users">ACTIVATED</a></li>
                                <li><i class="fa fa-id-badge"></i><a href="/users?status=pending">PENDING</a></li>
                                <li><i class="fa fa-warning"></i><a href="/users?status=deactivated">DEACTIVATED</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>ENCASHMENTS</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-warning"></i><a href="/encashments?status=pending">PENDING</a></li>
                                <li><i class="fa fa-tasks"></i><a href="/encashments?status=processing">PROCESSING</a></li>
                                <li><i class="fa fa-check"></i><a href="/encashments?status=completed">COMPLETED</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-star"></i>REWARDS</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-gift"></i><a href="/rewards/requests">CLAIM REQUESTS</a></li>
                                <li><i class="fa fa-gift"></i><a href="/rewards/requests/completed">COMPLETED CLAIM REQ.</a></li>
                                <li><i class="fa fa-list"></i><a href="/rewards">LIST</a></li>
                                <li><i class="fa fa-plus"></i><a href="/rewards/add">ADD</a></li>
                                <li><i class="fa fa-archive"></i><a href="/rewards/archive">ARCHIVE</a></li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <ul class="nav navbar-nav user-side-bar" style="padding-top:20px;">
                        <li>
                            <a href="/"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                        </li>
                        <li class="">
                            <a href="/typing-captcha"><i class="menu-icon fa fa-keyboard-o"></i>TYPING CAPTCHA </a>
                        </li>
                        <li class="">
                            <a href="/rewards/list"><i class="menu-icon fa fa-star"></i>REWARDS</a>
                        </li>
                        <li class="">
                            <a href="/referrals"><i class="menu-icon fa fa-group"></i>REFERRAL LIST</a>
                        </li>
                        <li class="">
                            <a href="/encashment"><i class="menu-icon fa fa-money"></i>ENCASHMENT</a>
                        </li>
                        {{--<li class="">--}}
                            {{--<a href="/history"><i class="menu-icon fa fa-calendar"></i>HISTORY</a>--}}
                        {{--</li>--}}
                        {{--<li class="">--}}
                            {{--<a href="/code-list"><i class="menu-icon fa fa-laptop"></i>CODELIST</a>--}}
                        {{--</li>--}}
                    </ul>
                @endif
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">TRIHOMEBASED</a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu" style="position: relative;">
                    @if(session()->has('user'))
                        @if(session()->get('user')->account_type == \App\Models\Users::TYPE_USERS)
                            <div class="" style="position: absolute;left: 0px;top:12px;">
                                <ul class="income-header">
                                    <li>
                                        <i class="fa fa-star" style="color:orange;margin-right: 10px;"></i> {{session()->get('user_info')->reward_points}}
                                    </li>
                                    <li>
                                        <i class="fa fa-money" style="color:#04d204;margin-right: 10px;"></i> {{session()->get('user_info')->money_balance}}
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @endif
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/images/profile.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="/logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
               @yield('content')
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
    </div>


</body>
</html>
