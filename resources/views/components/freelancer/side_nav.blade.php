<style>
    .container {
        display: flex;
        padding-top: 20px;
    }

    .sidebar {
        width: 260px;
        background-color: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        height: 400px;
    }

    .sidebar-header h1 {
        font-size: 20px;
        font-weight: bold;
        display: flex;
        align-items: center;
    }

    .icons {
        margin-right: 10px;
    }

    .sidebar-nav .nav-item {
        display: flex;
        align-items: center;
        padding: 10px;
        color: #4a4a4a;
        text-decoration: none;
        margin-top: 8px;
    }

    .nav-item:hover {
        background-color: #f0f0f0;
    }
</style>


<div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>Settings</h2>
        <nav class="sidebar-nav">
            <h5>Billing</h5>
            <a href="#" class="nav-item"><i class="fas fa-bell icons"></i>Billing & Payments</a>
            <h5>User Settings</h5>
            <a href="#" class="nav-item"><i class="fas fa-bell icons"></i>My Profile</a>
            <a href="#" class="nav-item"><i class="fas fa-bell icons"></i>Contact Info</a>
            <a href="#" class="nav-item"><i class="fas fa-bell icons"></i>Password & Security</a>
        </nav>
    </aside>
    @yield('main')
</div>