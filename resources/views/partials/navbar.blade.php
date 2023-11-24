<nav class="navbar navbar-expand-lg bg-transparent shadow-sm sticky-top" data-bs-theme="light">
    <div class="container">
        <a class="navbar-brand text-uppercase fs-4 fw-bold d-flex align-items-center me-4 link-success" href="/">
            {{-- <img src="/img/ym-icon.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top" /> --}}
            DJUALYA
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Produk' ? 'active fw-semibold' : '' }}"
                        href="/products">Produk</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Jual' ? 'active fw-semibold' : '' }}"
                            href="/jual/{{ Auth()->user()->username }}">Jual</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto align-items-center gap-3">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <strong>{{ Auth()->user()->username }}</strong>
                            <img src="/img/pp-default.png" alt="avatar" width="30" height="30"
                                class="rounded-circle border ms-2 me-2">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profile">
                                    <i class="bi bi-person-vcard me-3"></i>
                                    Profile
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="/jual/{{ Auth()->user()->username }}">
                                    <i class="bi bi-layout-text-sidebar-reverse me-3"></i>
                                    MyDashboard
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-devider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="bi bi-box-arrow-right me-3"></i> Log out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nan-link text-dark fw-semibold">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-dark">
                            <a href="/register" class="nan-link text-light fw-semibold">Sign up</a>
                        </button>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
