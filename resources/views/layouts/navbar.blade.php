
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->



                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        Sign Out
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        {{-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('profile.edit', auth()->user()->id) }}"><i
                                class="mr-50" data-feather="user"></i>
                            Profile</a> --}}

                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item"><i class="mr-50" data-feather="power"></i>
                                Logout</button>
                        </form>

                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->