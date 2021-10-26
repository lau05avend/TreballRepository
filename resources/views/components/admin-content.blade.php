<div>

    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar sticky" style="background-color: #2c606f">
        <div class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                                        collapse-btn"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify"><line x1="21" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="3" y2="18"></line></svg></a></li>
                <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                    </a></li>
                <li>
                    <form class="form-inline mr-auto">
                        <div class="search-element">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200" style="width: 200px;">
                            <button class="btn" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                </a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                    <div class="dropdown-header">
                        Notifications
                        <div class="float-right">
                            <a href="#">Mark All As Read</a>
                        </div>
                    </div>
                    <div class="dropdown-list-content dropdown-list-icons">
                        <a href="#" class="dropdown-item dropdown-item-unread"> <span class="dropdown-item-icon bg-primary text-white"> <i class="fas
                                                    fa-code"></i>
                            </span> <span class="dropdown-item-desc"> Template update is
                                available now! <span class="time">2 Min
                                    Ago</span>
                            </span>
                        </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white">
                                <i class="far
                                                    fa-user"></i>
                            </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                                    Sugiharto</b> are now friends <span class="time">10 Hours
                                    Ago</span>
                            </span>
                        </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white">
                                <i class="fas
                                                    fa-check"></i>
                            </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                                moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                                    Hours
                                    Ago</span>
                            </span>
                        </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span> <span class="dropdown-item-desc"> Low disk space. Let's
                                clean it! <span class="time">17 Hours Ago</span>
                            </span>
                        </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white">
                                <i class="fas
                                                    fa-bell"></i>
                            </span> <span class="dropdown-item-desc"> Welcome to Otika
                                template! <span class="time">Yesterday</span>
                            </span>
                        </a>
                    </div>
                    <div class="dropdown-footer text-center">
                        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt={{ Auth::user()->name }} src={{ Auth::user()->profile_photo_url }} class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                <div class="dropdown-menu dropdown-menu-right pullDown">
                    <div class="dropdown-title"> {{ Auth::user()->name }}</div>
                    <a href={{ route('profile.show') }} class="dropdown-item has-icon"> <i class="far
                                            fa-user"></i> Perfil
                    </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                        Activities
                    </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                        Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();  this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Log Out
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div class="main-sidebar sidebar-style-2 pb-5" style="overflow: auto; outline: none;/* position: static; */" tabindex="1">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index.html"> <img alt="image" src={{asset('assets/img/logo-icon.svg')}} class="header-logo">
                    <span class="logo-name">Treball</span>
                </a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Principal</li>
                <li class="dropdown {{request()->routeIs('dashboard')?'active':'nonee' }}" >
                    <a href="{{ route('dashboard') }}" class="nav-link toggled"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg><span>Inicio</span></a>
                </li>
                <li class="menu-header">Funcionalidades</li>
                <li class="{{request()->routeIs('obra.*')?'active':'nonee' }}">
                    <a class="dropdown" href="{{route('obra.index')}}"><i class="fas fa-project-diagram -ml-1"></i><span>Obras</span></a>
                </li>
                <li class="{{request()->routeIs('calendar.*')?'active':'nonee' }}">
                    <a class="dropdown" href="{{route('calendar.index')}}"><i class="far fa-calendar-minus -ml-1"></i><span>Cronograma</span></a>
                </li>
                <li class="{{request()->routeIs('novedad') ?'active':'nonee'}}" >
                    <a class="dropdown" href="{{route('novedad')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span>Novedades</span></a>
                </li>
                <li class="dropdown  {{request()->routeIs('diseno') || request()->routeIs('secciones')  ?'active': 'nonee'}}">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-palette -ml-1"></i><span>Diseños y Secciones</span></a>
                    <ul class="dropdown-menu" style="display: none;">
                      <li class="{{request()->routeIs('diseno') ?'active':'nonee'}}"><a class="nav-link" href="{{route('diseno')}}">Diseños</a></li>
                      <li class="{{request()->routeIs('secciones') ?'active':'nonee'}}"><a class="nav-link" href={{ route('secciones') }}>Secciones</a></li>
                    </ul>
                </li>
                <li class="{{request()->routeIs('material')?'active':'nonee' }}">
                    <a class="dropdown" href="{{route('material')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg><span>Materiales</span></a>
                </li>
                <li class="{{request()->routeIs('empleado')?'active':'nonee' }}">
                    <a class="dropdown" href="{{route('empleado')}}"><i class="fas fa-user-tie -ml-1"></i><span>Empleados</span></a>
                </li>
                <li class="{{request()->routeIs('planilla')?'active':'nonee' }}">
                    <a class="dropdown" href="{{route('planilla')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg><span>Planilla</span></a>
                </li>
                <li class="{{request()->routeIs('clientes')?'active':'nonee' }}">
                    <a class="dropdown" href="{{route('clientes')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg><span>Clientes</span></a>
                </li>
                <li><a class="dropdown" href="{{route('obra.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg><span>Reportes</span></a>
                </li>
            </ul>
        </aside>
    </div>
</div>