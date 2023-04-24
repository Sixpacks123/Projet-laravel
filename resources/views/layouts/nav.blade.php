@vite(['resources/css/nav.css'])

<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="#"><img src="{{ asset('img/nav/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li>
                                                <a href="{{ route('dashboard') }}"
                                                   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                                    {{ __('Dashboard') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('profile.edit') }}">
                                                    {{ __('Profile') }}
                                                </a>
                                            </li>

                                            <li>
                                                <a href="blog.html">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog_details.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('offers') }}">
                                                    {{ __('Offres') }}
                                                </a></li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                                                    {{ __('Se déconnecter') }}
                                                </a>
                                                <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                                      style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>

                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="header-right-btn d-none d-lg-block ml-20">
                                    <a href="contact.html" class="btn header-btn">Créer une session</a>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
