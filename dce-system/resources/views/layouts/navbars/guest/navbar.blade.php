<div class="position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav
                class="navbar navbar-expand-lg blur top-0 z-index-3 shadow position-absolute py-2 start-0 end-0">
                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('home') }}">
                        <img src="./img/dell-logo.png" style='width:170px; height:auto' class="navbar-brand-img h-100" alt="main_logo">
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('register') }}">
                                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                    Sign Up
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('login') }}">
                                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                    Sign In
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('my-ticket') }}">
                                    <i class="fas fa-solid fa-user opacity-6 text-dark me-1"></i>
                                    My Ticket
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('activity-list') }}">
                                    <i class="fas fa-solid fa-person-running  opacity-6 text-dark me-1"></i>
                                    Activity
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('announcement') }}">
                                    <i class="fas fa-sharp fa-solid fa-bullhorn opacity-6 text-dark me-1"></i>
                                    Announcement
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
