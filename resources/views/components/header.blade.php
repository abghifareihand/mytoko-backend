<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                <!-- Language -->
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/images/icons/icon-flag-id.svg" alt="" width="20px" height="20px"
                            class="rounded-circle object-fit-cover round-20" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="javascript:void(0)"
                                class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                <div class="position-relative">
                                    <img src="../assets/images/icons/icon-flag-id.svg" alt="" width="20px"
                                        height="20px" class="rounded-circle object-fit-cover round-20" />
                                </div>
                                <p class="mb-0 fs-3">Indonesia (ID)</p>
                            </a>
                            <a href="javascript:void(0)"
                                class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                <div class="position-relative">
                                    <img src="../assets/images/icons/icon-flag-en.svg" alt="" width="20px"
                                        height="20px" class="rounded-circle object-fit-cover round-20" />
                                </div>
                                <p class="mb-0 fs-3">English (UK)</p>
                            </a>
                        </div>
                    </div>
                </li>

                {{-- Notification --}}
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-bell-ringing"></i>
                        <div class="notification bg-primary rounded-circle"></div>
                    </a>
                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                        aria-labelledby="drop2">
                        <div class="d-flex align-items-center justify-content-between py-3 px-7">
                            <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                            <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                        </div>
                        <div class="message-body data-simplebar">
                            <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                <span class="me-3">
                                    <img src="../assets/images/profile/user-1.jpg" alt="user" class="rounded-circle"
                                        width="48" height="48" />
                                </span>
                                <div class="w-75 d-inline-block v-middle">
                                    <h6 class="mb-1 fw-semibold lh-base">Roman Joined the Team!</h6>
                                    <span class="fs-2 d-block text-body-secondary">Congratulate him</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                <span class="me-3">
                                    <img src="../assets/images/profile/user-2.jpg" alt="user" class="rounded-circle"
                                        width="48" height="48" />
                                </span>
                                <div class="w-75 d-inline-block v-middle">
                                    <h6 class="mb-1 fw-semibold lh-base">New message</h6>
                                    <span class="fs-2 d-block text-body-secondary">Salma sent you new message</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                <span class="me-3">
                                    <img src="../assets/images/profile/user-3.jpg" alt="user" class="rounded-circle"
                                        width="48" height="48" />
                                </span>
                                <div class="w-75 d-inline-block v-middle">
                                    <h6 class="mb-1 fw-semibold lh-base">Bianca sent payment</h6>
                                    <span class="fs-2 d-block text-body-secondary">Check your earnings</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                <span class="me-3">
                                    <img src="../assets/images/profile/user-4.jpg" alt="user" class="rounded-circle"
                                        width="48" height="48" />
                                </span>
                                <div class="w-75 d-inline-block v-middle">
                                    <h6 class="mb-1 fw-semibold lh-base">Jolly completed tasks</h6>
                                    <span class="fs-2 d-block text-body-secondary">Assign her new tasks</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                <span class="me-3">
                                    <img src="../assets/images/profile/user-5.jpg" alt="user"
                                        class="rounded-circle" width="48" height="48" />
                                </span>
                                <div class="w-75 d-inline-block v-middle">
                                    <h6 class="mb-1 fw-semibold lh-base">John received payment</h6>
                                    <span class="fs-2 d-block text-body-secondary">$230 deducted from account</span>
                                </div>
                            </a>

                        </div>
                        <div class="py-6 px-7 mb-1">
                            <button class="btn btn-outline-primary w-100">See All Notifications</button>
                        </div>

                    </div>
                </li>

                <!-- Cart -->
                <li class="nav-item">
                    <a class="nav-link position-relative nav-icon-hover" href="javascript:void(0)"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="ti ti-basket"></i>
                        <div class="notification bg-primary rounded-circle"></div>
                    </a>
                </li>

                <!-- User -->
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="" width="35"
                            height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="d-flex align-items-center py-6 mx-7">
                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}" class="rounded-circle"
                                width="80" height="80" alt="" />
                            <div class="ms-3">
                                <h5 class="mb-1 fs-3">Hi, {{ auth()->user()->name }}</h5>
                                <p class="mb-0 d-flex align-items-center gap-2">
                                    <i class="ti ti-mail fs-4"></i>{{ auth()->user()->email }}
                                </p>
                            </div>
                        </div>
                        <div class="message-body">
                            <a href="{{ route('profile') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                <span
                                    class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                    <img src="{{ asset('assets/images/icons/icon-account.svg') }}" alt=""
                                        width="24" height="24" />
                                </span>
                                <div class="w-75 d-inline-block v-middle ps-3">
                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                    <span class="fs-2 d-block text-body-secondary">Account Settings</span>
                                </div>
                            </a>
                            <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                                <span
                                    class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                    <img src="{{ asset('assets/images/icons/icon-inbox.svg') }}" alt=""
                                        width="24" height="24" />
                                </span>
                                <div class="w-75 d-inline-block v-middle ps-3">
                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">My Inbox</h6>
                                    <span class="fs-2 d-block text-body-secondary">Messages & Emails</span>
                                </div>
                            </a>
                            <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                                <span
                                    class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                    <img src="{{ asset('assets/images/icons/icon-tasks.svg') }}" alt=""
                                        width="24" height="24" />
                                </span>
                                <div class="w-75 d-inline-block v-middle ps-3">
                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">My Task</h6>
                                    <span class="fs-2 d-block text-body-secondary">To-do and Daily Tasks</span>
                                </div>
                            </a>
                            <a href="#" class="btn btn-outline-primary mx-3 mt-2 mb-2 d-block"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>


            </ul>
        </div>
    </nav>
</header>
