<style>
    .container {
        display: flex;
        /* height: 100vh; */
    }

    /* Sidebar */
    .sidebar {
        width: 260px;
        background-color: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar-header h1 {
        font-size: 20px;
        font-weight: bold;
        display: flex;
        align-items: center;
    }

    .icon {
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

    .account-section h2 {
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        margin: 20px 0 10px;
        color: #666;
    }

    .profile-item {
        display: flex;
        align-items: center;
        padding: 10px;
        background-color: #e0e0e0;
        text-decoration: none;
        color: #4a4a4a;
        border-radius: 4px;
    }

    .help-section .help-box {
        background-color: #e5f1ff;
        padding: 15px;
        border-radius: 8px;
        margin-top: 20px;
    }

    .button {
        display: block;
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
    }

    .button.secondary {
        background-color: #6c757d;
    }

    /* Main Content */
    .main-content {
        flex: 1;
        padding: 30px;
        overflow-y: auto;
    }

    .content-wrapper {
        max-width: 700px;
        margin: 0 auto;
        background-color: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .content-header h2 {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
    }

    section {
        margin-bottom: 30px;
    }

    section h3 {
        font-size: 18px;
        font-weight: 500;
        color: #666;
        margin-bottom: 15px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    label {
        font-size: 14px;
        color: #666;
        margin-bottom: 5px;
    }

    input,
    textarea {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    textarea {
        resize: vertical;
    }

    .full-width {
        grid-column: span 2;
    }
</style>


<div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="#" class="nav-item"><span class="icon laptop-icon"></span>Dashboard</a>
            <a href="#" class="nav-item"><span class="icon table-icon"></span>Tables</a>
            <a href="#" class="nav-item"><span class="icon credit-card-icon"></span>Billing</a>
            <a href="#" class="nav-item"><span class="icon cube3d-icon"></span>Virtual Reality</a>
            <a href="#" class="nav-item"><span class="icon globe-icon"></span>RTL</a>
            <a href="#" class="nav-item"><span class="icon user-icon"></span>Profile</a>
        </nav>
    </aside>
    @yield('main')
</div>