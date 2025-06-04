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
      background-color: rgb(0, 55, 2);
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

    .main3 {
      padding: 25px;
      background: #fff;
      margin: 15px 25px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
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

    input[type="text"], textarea {
      padding: 10px;
      margin: 10px 0;
      border-radius: 8px;
      border: 1px solid #ddd;
      width: 100%;
      font-size: 16px;
    }

    input[type="submit"] {
      padding: 10px;
      margin-top: 10px;
      border-radius: 8px;
      border: none;
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
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
    <div class="header">Inquiries</div>

    <div class="main3">
      <h2>View & Reply</h2>
      <br><br>

      <?php
      include 'Connection.php';

      // Handle reply form submission
      if (isset($_POST['submit_reply'])) {
        $query_id = mysqli_real_escape_string($conn, $_POST['query_id']);
        $reply_message = mysqli_real_escape_string($conn, $_POST['reply_message']);

        $update_sql = "UPDATE queries SET Reply = '$reply_message' WHERE id = $query_id";
        
        if (mysqli_query($conn, $update_sql)) {
          echo "<script>alert('Reply sent successfully!'); window.location.href='Inquiries.php';</script>";
        } else {
          echo "Error updating reply: " . mysqli_error($conn);
        }
      }

      // Display queries
      $sql = "SELECT * FROM queries";
      $result = mysqli_query($conn, $sql);

      echo "<table>
      <tr>
        <th>Message Id</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Date</th>
        <th>Reply</th>
      </tr>";

      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['Full_name'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Subject'] . "</td>";
        echo "<td>" . $row['Message'] . "</td>";
        echo "<td>" . $row['submitted_at'] . "</td>";
        echo "<td>
                <form action='' method='POST'>
                  <input type='hidden' name='query_id' value='" . $row['id'] . "'>
                  <textarea name='reply_message' rows='4' placeholder='Type your reply here...'>" . $row['Reply'] . "</textarea><br>
                  <input type='submit' name='submit_reply' value='Send Reply'>
                </form>
              </td>";
        echo "</tr>";
      }

      echo "</table>";
      mysqli_close($conn);
      ?>
    </div>
  </div>

</body>
</html>
