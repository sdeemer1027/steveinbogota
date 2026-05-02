<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white vh-100 p-3" style="width: 260px;">

        <h4 class="mb-4">
            <i class="bi bi-grid-fill"></i> Admin Panel
        </h4>

        <ul class="nav flex-column">

            <li class="nav-item mb-2">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ route('admin.users.index') }}" class="nav-link text-white">
                    <i class="bi bi-people-fill"></i> Users
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ route('admin.roles.index') }}" class="nav-link text-white">
                    <i class="bi bi-person-badge-fill"></i> Roles
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ route('admin.permissions.index') }}" class="nav-link text-white">
                    <i class="bi bi-key-fill"></i> Permissions
                </a>
            </li>

        </ul>

    </div>

    <!-- Main Content -->
    <div class="flex-grow-1">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom px-4">
            <div class="container-fluid">

                <span class="navbar-brand">
                    Enterprise Dashboard
                </span>

                <div>
                    Logged in as:
                    <strong>{{ auth()->user()->name }}</strong>
                </div>

            </div>
        </nav>

        <!-- Content Area -->
        <div class="p-4">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>