<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", sans-serif;
    }

    body {
      display: flex;
      min-height: 100vh;
      background: #f4f4f4;
    }

    .sidebar {
      width: 230px;
      background-color: rgb(12, 29, 55);
      color: black;
      padding: 20px;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 22px;
      color: #fefefe;
    }

    .sidebar a {
      display: block;
      text-decoration: none;
      color: #dcdcdc;
      padding: 10px 15px;
      margin-bottom: 12px;
      border-radius: 6px;
      transition: 0.2s ease-in-out;
      font-weight:bold;
    }

    .sidebar a:hover {
      background-color: #3a4b5c;
      color: #fff;
    }
    .main {
      flex: 1;
      padding: 25px;
    }

    .header {
      background-color: rgb(70, 104, 155);
      padding: 18px 25px;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 35px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
      border-radius: 6px;
      color:white;
      text-align:center;
    }

   
  

  </style>
</head>
<body>
<div class="sidebar">
    <h2>Administration</h2>
    <a href="admin.php">Dashboard</a>
    <a href="staff.php">Administration </a>
    <a href="manage.php">Management</a>
    <a href="customers.php">Customers</a>
    <a href="logout.php">Logout</a>
  </div>

  <div class="main">
    <div class="header">Administrator Dashboard</div>

    <div class="content">
      <h3>Welcome back, Admin</h3>
     
    </div>


    
  </div>

  
</body>
</html>
