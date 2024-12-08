
  <style>
    /* Global Styles */
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f2f5;
      color: #333;
    }

    .container {
      display: grid;
      grid-template-columns: 250px 1fr;
      height: 100vh;
    }

    /* Sidebar Styles */
    .sidebar {
      background-color: #2c3e50;
      color: #ecf0f1;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar h2 {
      margin-top: 0;
      font-size: 1.5em;
    }

    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }

    .sidebar li {
      margin-bottom: 15px;
    }

    .sidebar li a {
      color: #ecf0f1;
      text-decoration: none;
      padding: 10px;
      display: block;
      border-radius: 5px;
      transition: background 0.3s;
    }

    .sidebar li a:hover {
      background-color: #34495e;
    }

    /* Main Content Styles */
    .main-content {
      padding: 20px;
      overflow-y: auto;
    }

    .metric-cards {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      grid-gap: 20px;
    }

   
  </style>

<div>
  <div class="container">
    <div class="sidebar">
      <h2>Dashboard</h2>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Users</a></li>
        <li><a href="#">Client</a></li>
        <li><a href="#">Freelancer</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Payment</a></li>
      </ul>
    </div>
    <div class="main-content">
      <div class="metric-cards">
        
        
      </div>
    </div>
  </div>

</div>


