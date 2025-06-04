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
      color: #333;
    }

    .sidebar {
      width: 230px;
      background-color: rgb(12, 29, 55);
      color: #fff;
      padding: 20px;
      transition: width 0.3s ease;
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
      padding: 12px 18px;
      margin-bottom: 14px;
      border-radius: 8px;
      transition: 0.3s ease-in-out;
    }

    .sidebar a:hover {
      background-color: #3a4b5c;
      color: #fff;
    }

    .content {
      flex: 1;
      display: flex;
      flex-direction: column;
      padding: 20px;
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

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 25px;
      margin-bottom: 30px;
    }

    .card {
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card h3 {
      font-size: 20px;
      margin-bottom: 15px;
      color: #333;
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    .main2, .main3, .main4 {
      padding: 25px;
      background: #fff;
      margin: 15px 25px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      transition: box-shadow 0.3s ease;
    }

    .main2:hover, .main3:hover, .main4:hover {
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    input[type="text"], input[type="submit"] {
      padding: 10px;
      margin: 10px 0;
      border-radius: 8px;
      border: 1px solid #ddd;
      width: 100%;
      font-size: 16px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }

    table, th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #f4f4f4;
      font-weight: bold;
    }

    a {
      color: #f44336;
      text-decoration: none;
      font-weight: bold;
    }

   
  </style>
</head>
<body>

<div class="sidebar">
    <h2>Administation</h2>
    <a href="admin.php">Dashboard</a>
    <a href="staff.php">Administration</a>
    <a href="manage.php">Management</a>
    <a href="customers.php">Customers</a>
    <a href="logout.php">Logout</a>
  </div>

  <div class="content">
    <div class="main">
      <div class="header">Management Staff Dashboard</div>

      <div class="cards">
        <div class="card"><h3>View Staff</h3></div>
        <div class="card"><h3>Search Staff</h3></div>
        <div class="card"><h3>Update</h3></div>
        <div class="card"><h3>Delete</h3></div>
      </div>
    </div>

    <div class="main3">

    <h2>Staff Details </h2>
    <br><br>

    <?php include 'Connection.php';	
	$sql=	"SELECT * FROM management";	
	$result = mysqli_query($conn,$sql);
	echo "<table>
	<tr>
	<th>Employee Id</th>
	<th>Employee Name</th>

	<th>Employee NIC</th>
	<th>DOB</th>
	<th>Email</th>
    </tr>";
	// Fetching rows
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $row['M_ID'] . "</td>";
		echo "<td>" . $row['F_name'] . " " . $row['L_name'] . "</td>";
		echo "<td>" . $row['NIC'] . "</td>";
		echo "<td>" . $row['DOB'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($conn);
	?>
    </div>

    <div class="main2">

    <h2>Search Staff</h2>
    <br><br>
      <form method="post"> 
        <input type="text" name="name" placeholder="Enter First Name" required> 
        <input type="submit" name="submit" value="Search"> 
      </form>

      <?php 
      if (isset($_POST['submit'])) {
          include("Connection.php");

          $search = $_POST['name'];

          $sql = 'SELECT * FROM management WHERE F_name = "'.$search.'"';

          $result = mysqli_query($conn, $sql) or die("Couldn't execute query. ". mysqli_error($conn));	

          if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_array($result);
      ?>
          <form name="form" method="POST" action="update.php">
          <input type="hidden" name="account_type" value="admin">
              <p>Employee Name:
              <input type="text" name="F_name" 
              value="<?php echo $row['F_name'] . ' ' . $row['L_name']; ?>" disabled="disabled"/></p>
              

              <p>Employee NIC:
              <input type="text" name="NIC" 
              value="<?php echo $row['NIC']; ?>"/></p>

              <p>Employee DOB:
              <input type="text" name="DOB" 
              value="<?php echo $row['DOB']; ?>"/></p>

              

              <p>Employee email:
              <input type="text" name="email" 
              value="<?php echo $row['email']; ?>"/></p>

              <input type="hidden" name="name" value="<?php echo $search; ?>" />

              <input type="submit" name="updateM" id="update" value="Update" />
          </form>
      <?php
          } else {
              echo "<p>No results found.</p>"; 
          }
      }
      ?>
    </div>

    <div class="main4">


    <h2>Delete Staff  </h2>
    <br><br>
    <?php
    include 'Connection.php';	
    $sql = "SELECT * FROM management";
    $result = mysqli_query($conn, $sql);

    echo "<table>
    <tr>
    <th>Employee Id</th>
    <th>Employee Name</th>
    <th>Employee NIC</th>
	<th>DOB</th>
    <th>Email</th>
    <th>Remove</th>
    </tr>";

    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['M_ID'] . "</td>";
        echo "<td>" . $row['F_name'] . " " . $row['L_name'] . "</td>";
        echo "<td>" . $row['NIC'] . "</td>";
		    echo "<td>" . $row['DOB'] . "</td>";
        
        echo "<td>" . $row['email'] . "</td>";
        echo "<td><a href='delete.php?delManager=" . $row['M_ID'] . "' onClick=\"return confirm('Do you really need to delete?');\">Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
    </div>
  </div>

</body>
</html>
