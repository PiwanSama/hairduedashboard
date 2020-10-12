<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0">
            <img src="{{ asset('/images/logo.png') }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('images/logo-small.png') }}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="text-custom ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#providers-menu" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="providers-menu">
                        <i class="ni ni-shop text-custom"></i> {{ __('Service Providers') }}
                    </a>
                    <div class="collapse show" id="providers-menu">
                        <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('providers.index') }}">
                                    View All
                              </a>
                          </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('providers.create') }}">
                                      Add New
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#products-menu" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="products-menu">
                        <i class="ni ni-app text-custom"></i> {{ __('Products') }}
                    </a>
                    <div class="collapse show" id="products-menu">
                        <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('products.index') }}">
                                    View All
                              </a>
                          </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products.create') }}">
                                    Add New
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#categories-menu" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="categories-menu">
                        <i class="ni ni-ungroup text-custom"></i> {{ __('Service Categories') }}
                    </a>
                    <div class="collapse show" id="categories-menu">
                        <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('categories.index') }}">
                                    View All
                              </a>
                          </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#admin-menu" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="admin-menu">
                        <i class="ni ni-single-02 text-custom"></i> {{ __('Admins') }}
                    </a>
                    <div class="collapse show" id="admin-menu">
                        <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('user.index') }}">
                                    View All
                              </a>
                          </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.create') }}">
                                    Add New
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        <i class="ni ni-circle-08 text-custom"></i> {{ __('Account') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
