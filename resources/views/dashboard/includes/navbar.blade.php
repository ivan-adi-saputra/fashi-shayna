 <!-- Header-->
 <header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="./"><img src="{{ url('images/logo.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ url('images/logo2.png') }}" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                    Wellcome {{ auth()->user()->name }}
                </a>
                {{-- <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-house-door"></i> Homepage</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul> --}}
                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="{{ route('home') }}"><i class="bi bi-house-door"></i> Homepage</a>
                    <form action="{{ route('logout') }}" method="post">
                    @csrf
                        <button class="nav-link border-0"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                </div>
            </div>
       
        </div>
    </div>
</header>
<!-- /#header -->