<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Management Dashboard</title>
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
      background-color:rgb(0, 55, 2);
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
      font-weight:bold;
      text-decoration: none;
      color: #dcdcdc;
      padding: 10px 15px;
      margin-bottom: 12px;
      border-radius: 6px;
      transition: 0.2s ease-in-out;
    }

    .sidebar a:hover {
      background-color: rgba(69, 163, 72, 0.57);
      color: #fff;
    }

    .main {
      flex: 1;
      padding: 25px;
    }

    .header {
      background-color: rgb(31, 123, 37);
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
    <h2>Management</h2>
    <a href="management.php">Dashboard</a>
    <a href="Inquiries.php">Inquiries</a>
    
    <a href="logout.php">Logout</a>
  </div>

  <div class="main">
    <div class="header">Management Dashboard</div>

    <div class="content">
      <h3>Welcome back, Manager </h3>
      <p>Here is a quick overview of your dashboard. You can view Inquiries, send reply, and customize settings.</p>
    </div>

   
  </div>

</body>
</html>
