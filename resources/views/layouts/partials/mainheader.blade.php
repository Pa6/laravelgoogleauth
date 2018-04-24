<header class="main-header">
    <a href="{{ url('home') }}" class="logo">
        Mobilink
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><i class='fa fa-user'></i> {{ Auth::user()->username }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-body">
                            <div class="col-xs-12 text-center">
                                <p><b>{{ Auth::user()->username }} </b></p>
                                <p>{{ Auth::user()->username }}</p>
                            </div>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('users.edit', array(Auth::user()->id)) }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.profile') }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('logout') }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.signout') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
