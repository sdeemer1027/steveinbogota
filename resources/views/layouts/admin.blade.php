<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div style="width: 200px; float:left; padding:20px; border-right:1px solid #ccc;">
        <h3>Admin Menu</h3>

        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}">Users</a></li>
            <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
            <li><a href="{{ route('admin.permissions.index') }}">Permissions</a></li>
        </ul>
    </div>

    <div style="margin-left:220px; padding:20px;">
        @yield('content')
    </div>

</body>
</html>