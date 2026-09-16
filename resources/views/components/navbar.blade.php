<style>

    .navbar {
        position: fixed;
        top: 0;
        left: 0;

        width: 100%;

        z-index: 1000;

        padding: 20px 40px;

        background: rgba(15, 118, 110, 0.9);
        backdrop-filter: blur(10px);
    }

    .navbar-container {
        max-width: 1200px;
        margin: 0 auto;

        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .logo {
        text-decoration: none;

        color: white;

        font-size: 26px;
        font-weight: bold;

        letter-spacing: 1px;

        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    .nav-links {
        display: flex;
        align-items: center;

        gap: 30px;
    }

    .nav-links a {
        text-decoration: none;

        color: white;

        font-size: 16px;
        font-weight: 500;

        position: relative;

        transition: 0.25s;
    }

    .nav-links a:not(.login-btn)::after {
        content: "";

        position: absolute;

        left: 0;
        bottom: -6px;

        width: 0;
        height: 2px;

        background: white;

        transition: 0.25s;
    }

    .nav-links a:not(.login-btn):hover::after {
        width: 100%;
    }

    .nav-links a:hover {
        opacity: 0.9;
    }

    .login-btn {
        border: 1px solid rgba(255, 255, 255, 0.8);

        padding: 10px 18px;

        border-radius: 10px;

        transition: 0.25s;
    }

    .login-btn:hover {
        background: white;

        color: #0f766e !important;
    }


    @media (max-width: 768px) {

        .navbar {
            padding: 18px 20px;
        }

        .logo {
            font-size: 21px;
        }

        .nav-links {
            gap: 15px;
        }

        .nav-links a {
            font-size: 14px;
        }

        .login-btn {
            padding: 8px 12px;
        }

    }


    .user-name {
        color: white;
        font-size: 15px;
        font-weight: 600;
    }

    .logout-form {
        margin: 0;
    }

    .logout-btn {
        border: 1px solid rgba(255, 255, 255, 0.8);
        background: transparent;
        color: white;

        padding: 10px 18px;
        border-radius: 10px;

        font-size: 15px;
        font-weight: 500;

        cursor: pointer;

        transition: 0.25s;
    }

    .logout-btn:hover {
        background: white;
        color: #0f766e;
    }



    .user-menu {
        position: relative;
    }

    .user-menu-button {
        display: flex;
        align-items: center;
        gap: 10px;

        border: none;
        background: transparent;

        color: white;

        cursor: pointer;

        font-size: 15px;
    }

    .user-avatar {
        width: 38px;
        height: 38px;

        border-radius: 50%;

        display: flex;
        align-items: center;
        justify-content: center;

        background: white;
        color: #0f766e;

        font-weight: bold;
        font-size: 16px;

        border: 2px solid rgba(255,255,255,.8);
    }

    .user-name {
        color: white;
        font-weight: 600;
    }

    .dropdown-arrow {
        font-size: 13px;
    }

    .user-dropdown {
        display: none;

        position: absolute;

        top: 50px;
        right: 0;

        width: 210px;

        background: white;

        border-radius: 12px;

        padding: 8px;

        box-shadow: 0 10px 30px rgba(0,0,0,.15);

        z-index: 2000;
    }

    .user-dropdown.show {
        display: block;
    }

    .user-dropdown a {
        display: block;

        padding: 11px 12px;

        color: #374151;

        text-decoration: none;

        border-radius: 8px;

        font-size: 14px;
    }

    .user-dropdown a:hover {
        background: #f0fdfa;
        color: #0f766e;
    }

    .dropdown-divider {
        height: 1px;

        background: #e5e7eb;

        margin: 6px 0;
    }

    .dropdown-logout {
        width: 100%;

        border: none;
        background: transparent;

        text-align: left;

        padding: 11px 12px;

        border-radius: 8px;

        color: #dc2626;

        font-size: 14px;

        cursor: pointer;
    }

    .dropdown-logout:hover {
        background: #fef2f2;
    }


    .user-avatar {
        overflow: hidden;
    }

    .user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }


</style>


<nav class="navbar">

    <div class="navbar-container">

        <a href="{{ url('/') }}" class="logo">
            TPDĐ Travel
        </a>

        <div class="nav-links">

            <a href="{{ url('/') }}">
                Trang chủ
            </a>

            <a href="#">
                Khám phá
            </a>

            <a href="#">
                Lịch trình
            </a>

            @guest

                <a href="{{ route('login') }}"
                class="login-btn">
                    Đăng nhập
                </a>

            @endguest


            @auth

                <div class="user-menu">

                    <button
                        type="button"
                        class="user-menu-button"
                        onclick="toggleUserMenu()"
                    >

                        <div class="user-avatar">

                            @if(auth()->user()->avatar)

                                <img
                                    src="{{ asset(auth()->user()->avatar) }}"
                                    alt="{{ auth()->user()->name }}"
                                >

                            @else

                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                            @endif

                        </div>

                        <span class="user-name">
                            {{ auth()->user()->name }}
                        </span>

                        <span class="dropdown-arrow">
                            ▾
                        </span>

                    </button>


                    <div
                        class="user-dropdown"
                        id="userDropdown"
                    >

                        <a href="{{ route('profile') }}">
                            Hồ sơ cá nhân
                        </a>

                        <a href="{{ route('favorites.index') }}">
                            Địa điểm yêu thích
                        </a>

                        <a href="{{ route('itineraries.index') }}">
                            Lịch trình của tôi
                        </a>

                        <a href="#">
                            Đánh giá của tôi
                        </a>

                        <a href="#">
                            Bình luận của tôi
                        </a>


                        <div class="dropdown-divider"></div>


                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="dropdown-logout"
                            >
                                Đăng xuất
                            </button>

                        </form>

                    </div>

                </div>

            @endauth

        </div>

    </div>

</nav>


<script>

    function toggleUserMenu() {

        const dropdown =
            document.getElementById('userDropdown');

        dropdown.classList.toggle('show');

    }


    document.addEventListener('click', function(event) {

        const userMenu =
            document.querySelector('.user-menu');

        const dropdown =
            document.getElementById('userDropdown');

        if (
            userMenu &&
            dropdown &&
            !userMenu.contains(event.target)
        ) {

            dropdown.classList.remove('show');

        }

    });

</script>