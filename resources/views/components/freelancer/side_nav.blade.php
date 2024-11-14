<!-- IMPORTING THE CSS FILES -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}"> 

<!-- SIDE_NAV_BAR -->
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