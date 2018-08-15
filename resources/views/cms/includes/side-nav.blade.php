<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> 
                    <span>
                        <img alt="image" class="img-circle img-responsive" width="48" 
                            src="{{ (auth()->user()->settings->profile_photo) ? url('storage/profile-photos/'.auth()->user()->settings->profile_photo) :  url('cms/img/avatar.png') }}" 
                        />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ auth()->user()->name }}</strong>
                     </span> <span class="text-muted text-xs block">{{ auth()->user()->roles[0]->name }} <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route('cms.change-profile-photo.index') }}">Profil Fotoğrafı</a></li>
                        <li><a href="{{ route('cms.tasks.index') }}">Yapılacaklar</a></li>
                        <li><a href="{{ route('cms.inbox.index') }}">Inbox</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">Çıkış</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    P
                </div>
            </li>
                <li class="{{ (strpos($currentRouteName, 'home') !== false) ? 'active' : '' }}">
                    <a href="{{ route('cms.home') }}"><i class="fa fa-bar-chart"></i> <span class="nav-label">Anasayfa</span></a>
                </li>

                @can('view_user_management')
                <li class="{{ (strpos($currentRouteName, 'user-management') !== false) ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Kullanıcı Yönetimi</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        @can('manage_roles')
                        <li class="{{ (strpos($currentRouteName, 'user-management.roles') !== false) ? 'active' : '' }}">
                            <a href="{{ route('cms.user-management.roles.index') }}">Roller</a>
                        </li>
                        @endcan
                        @can('manage_permissions')
                        <li class="{{ (strpos($currentRouteName, 'user-management.permissions') !== false) ? 'active' : '' }}">
                            <a href="{{ route('cms.user-management.permissions.index') }}">Yetkiler</a>
                        </li>
                        @endcan
                        @can('manage_users')
                        <li class="{{ (strpos($currentRouteName, 'user-management.users') !== false) ? 'active' : '' }}">
                            <a href="{{ route('cms.user-management.users.index') }}">Kullanıcılar</a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('view_inbox')
                <li>
                    <a href="{{ route('cms.inbox.index') }}">
                        <i class="fa fa-envelope"></i> <span class="nav-label">Inbox </span>
                        @if(unreadMailCount() and auth()->user()->settings->showNotifications)
                        <span class="label label-warning pull-right">{{ unreadMailCount() }}</span>
                        @endif
                    </a>
                </li>
                @endcan
                @can('edit_content')
                <li class=" {{ (strpos($currentRouteName, 'banners') !== false) ? 'active' : '' }}">
                    <a href="{{route('cms.banners.index')}}"><i class="fa fa-image"></i> <span class="nav-label">Banner </span></a>
                </li>
                @endcan


                @can('edit_content')


                <li class=" {{ (strpos($currentRouteName, 'projects') !== false) ? 'active' : '' }}">
                    <a href="{{route('cms.projects.index')}}"><i class="fa fa-image"></i> <span class="nav-label">Proje Görselleri </span></a>
                </li>
                @endcan
                @can('edit_content')
                <li class=" {{ (strpos($currentRouteName, 'events') !== false) ? 'active' : '' }}">
                    <a href="{{route('cms.events.index')}}"><i class="fa fa-bullhorn"></i> <span class="nav-label">Etkinlikler </span></a>
                </li>
                @endcan
                @can('edit_content')
                <li class=" {{ (strpos($currentRouteName, 'marbles') !== false) ? 'active' : '' }}">
                    <a href="{{route('cms.marbles.index')}}"><i class="fa fa-tags"></i> <span class="nav-label">Mermerler </span></a>
                </li>
                @endcan
                @can('edit_content')
                <li class=" {{ (strpos($currentRouteName, 'abouts') !== false) ? 'active' : '' }}">
                    <a href="{{route('cms.abouts.index')}}"><i class="fa fa-briefcase"></i> <span class="nav-label">Kurumsal </span></a>
                </li>

                @endcan
                @can('edit_content')
                <li class=" {{ (strpos($currentRouteName, 'qimages') !== false) ? 'active' : '' }}">
                    <a href="{{route('cms.qimages.index')}}"><i class="fa fa-image"></i> <span class="nav-label">Ocak Görselleri </span></a>
                </li>
                @endcan
                @can('edit_content')
                <li class=" {{ (strpos($currentRouteName, 'quarries') !== false) ? 'active' : '' }}">
                    <a href="{{route('cms.quarries.index')}}"><i class="fa fa-map-marker"></i> <span class="nav-label">Lokasyonlar </span></a>
                </li>
                @endcan
                @can('edit_content')
                <li class=" {{ (strpos($currentRouteName, 'locations') !== false) ? 'active' : '' }}">
                    <a href="{{route('cms.locations.index')}}"><i class="fa fa-info-circle"></i> <span class="nav-label">Ocaklar </span></a>
                </li>
                @endcan
                @can('edit_content')
                <li class=" {{ (strpos($currentRouteName, 'mags') !== false) ? 'active' : '' }}">
                    <a href="{{route('cms.mags.index')}}"><i class="fa fa-globe"></i> <span class="nav-label">E-Marble</span></a>
                </li>
                @endcan
                @can('edit_content')
                <li class="{{ (strpos($currentRouteName, 'popups') !== false) ? 'active' : '' }}">
                    <a href="{{ route('cms.popups.index') }}"><i class="fa fa-bullhorn"></i> <span class="nav-label">Popup Duyuruları </span></a>
                </li>
                @endcan


            </ul>
        </div>
    </nav>
