<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ URL::asset('images/favicon.ico')}}">

    <title>Admin Dashboard</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ URL::asset('css/adminStyle.css')}}" rel="stylesheet" type="text/css" media="all">

    <style>
        ol,
        ul {
            padding-left: 0rem;
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-logo">
                <i class="fas fa-chart-line"></i>
                Dashboard
            </div>
            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="fas fa-home"></i>
                            Overview
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.responses') }}"
                            class="nav-link {{ request()->routeIs('admin.responses') ? 'active' : '' }}">
                            <i class="fas fa-list"></i>
                            Responses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.editForm') }}"
                            class="nav-link {{ request()->routeIs('admin.editForm') ? 'active' : '' }}">
                            <i class="fa-solid fa-file-pen"></i>
                            Edit Form
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings') }}"
                            class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i>
                            Settings
                        </a>
                    </li>

                    <li class="nav-item" style="margin-top:250px;">
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-link" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </aside>

        <main class="main-content">

            @yield ('adminContent')

        </main>
    </div>

</body>

</html>