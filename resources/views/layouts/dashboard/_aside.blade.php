<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
    {{--<div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">--}}
    {{--<div>--}}
    {{--<p class="app-sidebar__user-name">John Doe</p>--}}
    {{--<p class="app-sidebar__user-designation">Frontend Developer</p>--}}
    {{--</div>--}}
    {{--</div>--}}

    <ul class="app-menu">

        <li><a class="app-menu__item" href="{{ route('dashboard.welcome') }}"><i class="app-menu__icon fa fa-dashboard"></i> <span class="app-menu__label">Welcome</span></a></li>
        <li><a class="app-menu__item" href="{{ route('dashboard.companies.index') }}"><i class="app-menu__icon fa fa-building-o"></i> <span class="app-menu__label">Companies</span></a></li>
        <li><a class="app-menu__item" href="{{ route('dashboard.employees.index') }}"><i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">Employees</span></a></li>

        {{--<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">@lang('site.settings')</span><i class="treeview-indicator fa fa-angle-right"></i></a>--}}
        {{--<ul class="treeview-menu">--}}
        {{--<li><a class="treeview-item" href="{{ route('dashboard.settings.social_login') }}"><i class="icon fa fa-circle-o"></i> @lang('site.social_login')</a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}

    </ul>
</aside>
