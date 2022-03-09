<div class="sidebar" data-color="orange" data-background-color="white"
     data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="https://creative-tim.com/" class="simple-text logo-normal">
            {{ __('Comunidade de Cristo') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav" id="dropdown-nav">
            <li class="nav-item dropdown" >
                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                        Account
                    </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right showing hiding" aria-labelledby="navbarDropdownProfile"
                     x-placement="bottom-end">
                    <a class="dropdown-item"
                       href="{{url('/profile')}}">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('/logout')}}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a>
                </div>
            </li>
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                    <p>{{ __('Cadastros') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExample">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'visitantes' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('visitantes') }}">
                                <span class="sidebar-mini"> VI </span>
                                <span class="sidebar-normal">{{ __('Visitantes') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'integrantes' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('integrantes') }}">
                                <span class="sidebar-mini"> IN </span>
                                <span class="sidebar-normal"> {{ __('Integrantes') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'acessos' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('acesso') }}">
                                <span class="sidebar-mini"> AC </span>
                                <span class="sidebar-normal"> {{ __('Acesso') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item{{ $activePage == 'configuracoes-de-cadastro' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('configuracoes') }}">
                    <i class="material-icons">settings</i>
                    <p>{{ __('Configurações do Cadastro') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
