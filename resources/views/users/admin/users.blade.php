<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    nav a.active {
        background-color: #007bff;
        border-radius: 4px;
    }

    .card h2 {
        font-size: 2.5rem;
    }

    .sideMenu {
        background-color: #384259;
    }

    .nav-logo>img {
        background-color: white;
        height: 40px;

    }

    .dropdown-toggle::after {
        display: none !important;
        /* Hide the default arrow */
    }
</style>
<!-- FontAwesome for Icons -->
@include('components.admin.sidebars')


<!-- Main Content -->
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item " aria-current="page">Users</li>
        </ol>
    </nav>
    <h3 class="mb-4">Users Overview</h3>

    <!-- User Management Table -->
    <div class="card shadow-sm p-2">
        <div class="d-flex justify-content-between mb-3">
            <h5>All Users</h5>
            <!-- <form method="GET" action="{{ route('admin.dashboard') }}">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control w-100"
                    placeholder="Search users...">
            </form> -->
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Registered</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through all users -->
                @foreach ($users as $user)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            @if(auth()->user()->profile && auth()->user()->profile->profile_picture)
                            <img src="{{ asset('storage/' . auth()->user()->profile->profile_picture) }}" alt="Profile Picture" class="profile-pic">
                            @else
                            <div class="rounded-circle bg-success text-white p-2 me-2">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            @endif

                            <div>
                                <strong>{{ $user->name }}</strong><br>
                                <span class="text-muted">{{ $user->email }}</span>
                            </div>
                        </div>
                    </td>
                    <td> @if ($user->role == 'freelancer')
                        <span class="badge bg-primary">{{ ucfirst($user->role) }}</span>
                        @elseif ($user->role == 'client')
                        <span class="badge bg-info">{{ ucfirst($user->role) }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($user->status == 'active')
                        <span class="badge bg-success">Active</span>
                        @elseif ($user->status == 'suspended')
                        <span class="badge bg-danger">Suspended</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                            <ul class="dropdown-menu">

                                @if ($user->status == 'active')
                                <li>
                                    <form action="{{ route('admin.suspend', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item" style="border: none; background: none;">Suspend</button>
                                    </form>
                                </li>
                                @endif
                                <!-- Activate Action -->
                                @if ($user->status == 'suspended')
                                <li>
                                    <form action="{{ route('admin.activate', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item" style="border: none; background: none;">Activate</button>
                                    </form>
                                </li>
                                @endif
                                <li><a class="dropdown-item" href="#">Change Role</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <!-- Pagination links with padding -->
        <div class="d-flex justify-content-center">

            {{ $users->links('pagination::bootstrap-4') }}

        </div>
    </div>
</div>
</div>