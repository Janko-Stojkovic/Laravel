<section class="w3l-banner-slider-main">
    <div class="top-header-content">

        <section class="hero" id="hero">
            <nav class="navbar navbar-expand-lg" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{route('home')}}">
                        <strong><span class="logo">Kingsman</span> <span class="logo2">Watches</span></strong>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto" id="menu">
                            @foreach($nav as $link)
                                <li class="nav-item @if(request()->routeIs($link->route)) active @endif">
                                    <a class="nav-link" href="{{ $link->route }}">{{ $link->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <span class="cart ms-3 me-3">
                                <a href="{{route('cart')}}" class="cart-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="number"></span>
                                </a>
                                </span>
                        @if(session()->has("user"))
                            <span class="ms-3 me-3 dropdown">

                                {{session('user')->username}}


                                <div class="dropdown-content flex-column">

                                    @if(session("user")->role_name == "admin")
                                        <a href="{{route('admin.dashboard')}}" class="cart-icon">
                                            Admin Panel
                                        </a>
                                    @endif
                                  <a href="{{route('logout')}}" class="cart-icon">
                                    Logout
                                  </a>
                                </div>
                                </span>
                        @else
                            <a href="{{route("loginForm")}}" class="ms-3 me-3 dropdown">
                                Login
                                </a>
                        @endif
                    </div>
                </div>
            </nav>
            <div class="heroText">
                @yield('heroText')
            </div>


            @yield('videoWrapper')

            <div class="overlay">
            </div>

        </section>
        <!--/nav-->

        <!--//nav-->
    </div>
</section>
