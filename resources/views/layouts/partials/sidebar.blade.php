<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="{{ isActiveRoute('dashboard') }}"><a href="{{ url('home') }}"><i class='fa fa-home'></i>
                    <span>Home</span></a></li>


            {{--<li class="#"><a href="{{ url('home') }}"><i class='fa fa-users'></i>--}}
                    {{--<span>Registration</span></a></li>--}}

            <li class="treeview {{ isActiveMatch('financial') }}">
                <a href="#"><i class='fa fa-wrench'></i> <span>Registration</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('financial') }}">Financial institution</a></li>
                </ul>

                <ul class="treeview-menu">
                    <li><a href="{{ url('vdcs') }}">VDC</a></li>
                </ul>


            </li>


            <li class="#"><a href="{{ url('home') }}"><i class='fa fa-dollar'></i>
                    <span>Savings</span></a></li>


            <li class="#"><a href="{{ url('home') }}"><i class='fa fa-suitcase'></i>
                    <span>VDC LAF</span></a></li>

            <li class="#"><a href="{{ url('home') }}"><i class='glyphicon glyphicon-retweet'></i>
                    <span>Transaction</span></a></li>

            <li class="#"><a href="{{ url('home') }}"><i class='fa fa-archive'></i>
                    <span>Accounts</span></a></li>

            <li class="treeview {{ isActiveMatch('users') }}">
                <a href="#"><i class='fa fa-wrench'></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('users') }}">Administrators</a></li>
                </ul>
            </li>
            <li><a href="{{ url('logout') }}"><i class='fa fa-sign-out'></i> <span>Sign out</span></a></li>
        </ul>
    </section>
</aside>