<!-- IMPORTING THE CSS FILES -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!-- SIDE_NAV_BAR -->
<div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>Settings</h2>
        <nav class="sidebar-nav">
            <h5>Billing</h5>
            <a href="/billing-and-payments" class="nav-item"><i class="fas fa-credit-card icons"></i> Billing & Payments</a>
            <h5>User Settings</h5>
            <a href="/freelancer/profile" class="nav-item"><i class="fas fa-user icons"></i> My Profile</a>
            <a href="/freelancer/setting/contactInfo" class="nav-item"><i class="fas fa-address-book icons"></i> Contact Info</a>
            <a href="/password-and-security" class="nav-item"><i class="fas fa-lock icons"></i> Password & Security</a>
        </nav>
    </aside>
    @yield('main')
</div>