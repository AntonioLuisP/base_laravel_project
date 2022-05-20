<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="#"></a>
            <a class="logo-horizontal text-center fw-bold text-primary" href="{{ route('home') }}">
                RH - UEMA
            </a>
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <div class="dropdown d-lg-none d-md-block d-none">
                    <a href="#" class="nav-link icon" data-bs-toggle="dropdown">
                        <i class="fe fe-search"></i>
                    </a>
                    <div class="dropdown-menu header-search dropdown-menu-start">
                        <div class="input-group w-100 p-2">
                            <input type="text" class="form-control" placeholder="Search....">
                            <div class="input-group-text btn btn-primary">
                                <i class="fe fe-search" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEARCH -->
                <button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            @auth
                                <div class="dropdown d-flex profile-1">
                                    <a href="#" data-bs-toggle="dropdown" class="nav-link icon text-center">
                                        <i class="fe fe-user"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <div class="drop-heading">
                                            <div class="text-center">
                                                <h5 class="text-dark mb-0 fs-14 fw-semibold">{{ Auth::user()->name}}</h5>
                                                <small class="text-muted">Senior Admin</small>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item" href="{{ route('user.show', ['user' => Auth::id()])}}">
                                            <i class="dropdown-icon fe fe-user"></i> Perfil
                                        </a>
                                        <a class="dropdown-item"
                                            href="{{ route('user.edit', ['user' => Auth::user()->id]) }}">
                                            <i class="dropdown-icon fe fe-user text-warning"></i> Editar Conta
                                        </a>
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="dropdown-icon fe fe-alert-circle text-red"></i> Sair
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="d-flex country">
                                    <a class="nav-link icon text-center" href="{{ route('login') }}">
                                        <span class="fs-16 ms-2 d-none d-xl-block">Faça login</span>
                                    </a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
