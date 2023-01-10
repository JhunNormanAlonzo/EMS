<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{url('/')}}">
                    <div class="sb-nav-link-icon"><i class="fas text-primary fa-3x fa-tachometer-alt"></i></div>
                    <h5>Dashboard</h5>
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#department" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Departments
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="department" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if(isset(Auth()->user()->role->permission['name']['department']['can-add']))
                        <a class="nav-link" href="{{route('departments.create')}}">Create Department</a>
                        @endif
                        @if(isset(Auth()->user()->role->permission['name']['department']['can-list']))
                        <a class="nav-link" href="{{route('departments.index')}}">View Department</a>
                        @endif
                    </nav>
                </div>
{{--                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#role" aria-expanded="false" aria-controls="collapseLayouts">--}}
{{--                    <div class="sb-nav-link-icon"><i class="fas fa-role"></i></div>--}}
{{--                    Roles--}}
{{--                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="role" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">--}}
{{--                    <nav class="sb-sidenav-menu-nested nav">--}}
{{--                        <a class="nav-link" href="{{route('roles.create')}}">Create Role</a>--}}
{{--                        <a class="nav-link" href="{{route('roles.index')}}">View Role</a>--}}
{{--                    </nav>--}}
{{--                </div>--}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#users" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="users" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#role" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Roles
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="role" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if(isset(Auth()->user()->role->permission['name']['role']['can-add']))
                                <a class="nav-link" href="{{route('roles.create')}}">Create Role</a>
                                @endif
                                @if(isset(Auth()->user()->role->permission['name']['role']['can-list']))
                                <a class="nav-link" href="{{route('roles.index')}}">View Role</a>
                                @endif
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#permission" aria-expanded="false" aria-controls="pagesCollapseError">
                            Permissions
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="permission" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if(isset(Auth()->user()->role->permission['name']['permission']['can-add']))
                                    <a class="nav-link" href="{{route('permissions.create')}}">Create Permission</a>
                                @endif
                                @if(isset(Auth()->user()->role->permission['name']['permission']['can-list']))
                                    <a class="nav-link" href="{{route('permissions.index')}}">View Permission</a>
                                @endif
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#employee" aria-expanded="false" aria-controls="pagesCollapseError">
                            Employees
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="employee" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if(isset(Auth()->user()->role->permission['name']['user']['can-add']))
                                <a class="nav-link" href="{{route('users.create')}}">Create Employee</a>
                                @endif
                                @if(isset(Auth()->user()->role->permission['name']['user']['can-list']))
                                <a class="nav-link" href="{{route('users.index')}}">View Employee</a>
                                @endif

                            </nav>
                        </div>

                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#leave" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                    Leaves
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="leave" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if(isset(Auth()->user()->role->permission['name']['leave']['can-add']))
                            <a class="nav-link" href="{{route('leaves.create')}}">Create Leave</a>
                        @endif
                        @if(isset(Auth()->user()->role->permission['name']['leave']['can-list']))
                            <a class="nav-link" href="{{route('leaves.index')}}">Approve Leave</a>
                        @endif
                    </nav>
                </div>
{{--                <div class="sb-sidenav-menu-heading">Addons</div>--}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#notice" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Notices
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="notice" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @if(isset(Auth()->user()->role->permission['name']['notice']['can-list']))
                        <a class="nav-link" href="{{route('notices.index')}}">View Notice</a>
                        @endif
                        @if(isset(Auth()->user()->role->permission['name']['notice']['can-add']))
                        <a class="nav-link" href="{{route('notices.create')}}">Create Notice</a>
                        @endif
                    </nav>
                </div>

                @if(isset(auth()->user()->role->permission['name']['mail']['can-add']))
                    <a class="nav-link" href="{{route('mails.create')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                        Mail
                    </a>
                @endif
{{--                <a class="nav-link" href="{{route('notices.index')}}">--}}
{{--                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>--}}
{{--                    Notices--}}
{{--                </a>--}}
{{--                <a class="nav-link" href="{{route('notices.create')}}">--}}
{{--                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>--}}
{{--                    Create Notice--}}
{{--                </a>--}}
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: {{auth()->user()->name}}</div>
        </div>
    </nav>
</div>
