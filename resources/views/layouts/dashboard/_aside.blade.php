<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">

    <ul class="app-menu">
        <li><a class="app-menu__item" href="{{ route('dashboard.welcome') }}"><i class="app-menu__icon fa fa-dashboard"></i> <span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="{{ route('dashboard.companies.index') }}"><i class="app-menu__icon fa fa-building-o"></i> <span class="app-menu__label">Companies</span></a></li>
        <li><a class="app-menu__item" href="{{ route('dashboard.employees.index') }}"><i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">Employees</span></a></li>
    </ul>

</aside>
