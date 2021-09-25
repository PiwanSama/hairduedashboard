<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <p class="h4 mb-0 text-white d-none d-lg-inline-block">{{ auth()->user()->name}}</p>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <a href="{{ route('logout') }}" class="text-white" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
              <i class="ni ni-user-run"></i>
              <span>{{ __('Logout') }}</span>
          </a>
        </ul>
    </div>
</nav>