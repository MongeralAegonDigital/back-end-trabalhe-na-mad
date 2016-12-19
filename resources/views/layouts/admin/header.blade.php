<!--header start-->
            <header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Ocultar menu Principal"></div>
                </div>
                <!--logo start-->
                <a href="{{url('/admin')}}" class="logo"><b>{{ Config::get('info.admin_title') }}</b></a>

                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                        <li><a class="logout" href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </div>
            </header>
            <!--header end-->
