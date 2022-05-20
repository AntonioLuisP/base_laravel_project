@php
$currentRoute = \Route::currentRouteName();
@endphp
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1 fw-bold text-primary" href="{{ route('home') }}">
                RH - UEMA
            </a>
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Usuários</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="{{ route('user.index') }}" data-bs-toggle="slide">
                        <i class="side-menu__icon fe fe-users"></i>
                        <span class="side-menu__label">Usuários</span>
                    </a>
                </li>
                <li class="sub-category">
                    <h3>Posts</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="{{ route('user.index') }}" data-bs-toggle="slide">
                        <i class="side-menu__icon fe fe-users"></i>
                        <span class="side-menu__label">Posts</span>
                    </a>
                </li>
            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
        </aside>
    </div>
</div>
