<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ asset('images/logo_header.png') }}" style="height: 56px;
    width: 79px;" alt="G&B Logo">
        <img class="navbar-brand-minimized" src="{{ asset('images/logo_header.png') }}" width="30" height="30" alt="G&B">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
{{--        <li class="nav-item d-md-down-none">--}}
{{--            <a class="nav-link" href="#">--}}
{{--                <i class="icon-bell"></i>--}}
{{--                <span class="badge badge-pill badge-danger">5</span>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="nav-item dropdown">
            <a class="nav-link" style="margin-right: 10px" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
               
                <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="{{url('c~AiN:2)Y42,&*/change-password')}}">
                        <i class="dropdown-icon mdi mdi-account-outline"></i> Change Password
                        </a>
                <a href="{{ url('/c~AiN:2)Y42,&*/logout') }}" class="dropdown-item btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i>Logout
                </a>
                <form id="logout-form" action="{{ url('/c~AiN:2)Y42,&*/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</header>
