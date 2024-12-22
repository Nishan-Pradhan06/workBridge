@include('components.admin.includes')
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
</style>
<!-- FontAwesome for Icons -->
@include('components.admin.sidebars')


<!-- Main Content -->
<div class="container-fluid p-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item " aria-current="page">Dashboard</li>
    </ol>
  </nav>
  <h3 class="mb-4">Dashboard Overview</h3>
  <!-- Overview Cards -->
  <div class="row">
    <div class="col-md-3 mb-3">
      <div class="card text-center shadow-sm p-3">
        <h5>Total Users</h5>
        <h2>256</h2>

      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card text-center shadow-sm p-3">
        <h5>Active Freelancers</h5>
        <h2>180</h2>

      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card text-center shadow-sm p-3">
        <h5>Active Clients</h5>
        <h2>76</h2>

      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card text-center shadow-sm p-3">
        <h5>Suspended Users</h5>
        <h2>12</h2>

      </div>
    </div>
  </div>

  <!-- User Management Table -->
  <div class="card shadow-sm p-3">
    <div class="d-flex justify-content-between mb-3">
      <h5>Recents Users</h5>
      <input type="text" class="form-control w-25"
        placeholder="Search users...">
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>User</th>
          <th>Role</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <div
                class="rounded-circle bg-success text-white p-2 me-2">JD</div>
              <div>
                <strong>John Doe</strong><br>
                <span
                  class="text-muted">john@example.com</span>
              </div>
            </div>
          </td>
          <td><span
              class="badge bg-primary">Freelancer</span></td>
          <td><span
              class="badge bg-success">Active</span></td>

          <td>
            <button class="btn btn-light"><i
                class="fa-solid fa-ellipsis"></i></button>
          </td>
        </tr>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <div
                class="rounded-circle bg-warning text-white p-2 me-2">JS</div>
              <div>
                <strong>Jane Smith</strong><br>
                <span
                  class="text-muted">jane@example.com</span>
              </div>
            </div>
          </td>
          <td><span
              class="badge bg-info">Client</span></td>
          <td><span
              class="badge bg-success">Active</span></td>

          <td>
            <button class="btn btn-light"><i
                class="fa-solid fa-ellipsis"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
