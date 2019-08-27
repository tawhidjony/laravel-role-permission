<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li>
                <a href="{{url('/')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>

            </li>
            <!-- Start Customer -->
            @if((auth()->user()->can('customers.create') || auth()->user()->can('customers.index')) || auth()->user()->hasRole('super-admin'))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Customer Crud</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if(auth()->user()->can('customers.create') || auth()->user()->hasRole('super-admin'))
                    <li><a href="{{route('customers.create')}}"><i class="fa fa-circle-o"></i> Add Customer</a></li>
                    @endif
                    @if(auth()->user()->can('customers.index') || auth()->user()->hasRole('super-admin'))
                    <li><a href="{{route('customers.index')}}"><i class="fa fa-circle-o"></i> All Customer</a></li>
                    @endif
                </ul>
            </li>
            @endif
            <!-- End Customer -->
            <li>
                <a href="{{url('/widgets')}}">
                    <i class="fa fa-th"></i> <span>Widgets</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/general')}}"><i class="fa fa-circle-o"></i> General</a></li>
                    <li><a href="{{url('/icon')}}"><i class="fa fa-circle-o"></i> Icons</a></li>
                    <li><a href="{{url('/button')}}"><i class="fa fa-circle-o"></i> Buttons</a></li>
                    <li><a href="{{url('/models')}}"><i class="fa fa-circle-o"></i> Modals</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/genaral-form')}}"><i class="fa fa-circle-o"></i> General Elements</a></li>
                    <li><a href="{{url('/advance-element')}}"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                    <li><a href="{{url('/editors')}}"><i class="fa fa-circle-o"></i> Editors</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/simple-table')}}"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                    <li><a href="{{url('/data-table')}}"><i class="fa fa-circle-o"></i> Data tables</a></li>
                </ul>
            </li>

            <!-- Start Advance Settings-->
            @if((auth()->user()->can('settings/1/edit') || auth()->user()->can('roles.index') || auth()->user()->can('users.index')) || auth()->user()->hasRole('super-admin'))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Advance Settings</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if(auth()->user()->can('settings/1/edit') || auth()->user()->hasRole('super-admin'))
                    <li><a href="{{url('settings/1/edit')}}"><i class="fa fa-circle-o"></i>General Settings</a></li>
                    @endif
                    @if(auth()->user()->can('roles.index') || auth()->user()->hasRole('super-admin'))
                    <li><a href="{{route('roles.index')}}"><i class="fa fa-circle-o"></i>Create Role</a></li>
                    @endif
                    @if(auth()->user()->can('users.index') || auth()->user()->hasRole('super-admin'))
                    <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i>Create User</a></li>
                    @endif
                </ul>
            </li>
            @endif
            <!-- End Advance Settings-->

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>