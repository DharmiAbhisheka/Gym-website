
<?php


session_start();


if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit();
}

include("Connection.php");
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'FitZoneFitnessCenter');
$email = $_SESSION['user'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
$data = mysqli_fetch_assoc($query);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone Fitness Center</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;500&family=Poppins:wght@400;500&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
    <style>
        .details{
            font-weight: bold; color: #555;
        }
        .details_row{
            color: #333;
        }
        
    </style>
</head>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FitZone Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }

        .sidebar {
            position: fixed;
            width: 220px;
            height: 100%;
            background-color:rgb(0, 0, 0);
            padding-top: 30px;
        }

        .sidebar h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 40px;
        }

        .sidebar a {
            display: block;
            color: #ccc;
            padding: 15px 30px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: rgb(212, 177, 0);
            color: white;
        }

        .main-content {
            margin-left: 220px;
            padding: 30px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar h1 {
            color: #333;
        }

        .top-bar .user {
            font-weight: 500;
        }

        .dashboard-cards {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .card {
            background-color: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin-top: 0;
            color: #555;
        }

        .card p {
            color: #888;
        }

        .logout-btn {
            background-color: rgb(254, 225, 3);
            color: black;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-size:large;
            font-weight:bold;
        }

        .logout-btn:hover {
            background-color:rgb(225, 199, 1) ;
        }

        .details-section {
            margin-top: 50px;
        }

        .details-section h2 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #20232a;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

    </style>
</head>
<body>

<div class="sidebar">
    <h2>FitZone FItness Center</h2>
    <a href="welcome.php">Dashboard</a>
    <a href="C_profile.php">Profile</a>
   
    <a href="logout.php">Logout</a>
</div>

<div class="main-content">
    <div class="top-bar">
        <h1>Welcome Back, <?php echo $data['F_name']." ".$data['L_name']?></h1>
        <form action="logout.php" method="post">
            <button class="logout-btn">Logout</button>
        </form>
    </div>

    <div class="dashboard-cards">
        <div class="card">
            <h3>My Profile</h3>
            <p>View or update your personal details, membership info, and more.</p>
        </div>

        <div class="card">
            <h3>My Program</h3>
            <p>Check out your current workout plan and track your progress.</p>
        </div>

        <div class="card">
            <h3>Support</h3>
            <p>Need help? Contact trainers or support staff for assistance.</p>
        </div>
    </div>

    <div class="details-section">
        <h2>My Details</h2>
        <table>

             <tr>
                <th>Registration Number</th>
                <td><?php echo $data['userID']; ?></td>
            </tr>
            <tr>
                <th>Full Name</th>
                <td><?php echo $data['F_name']." ".$data['L_name']; ?></td>
            </tr>
            <tr>
                <th>NIC number</th>
                <td><?php echo $data['NIC']; ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $data['address']; ?></td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td><?php echo $data['c_no']; ?></td>
            </tr>
            <tr>
                <th>Membership Plan</th>
                <td><?php echo $data['member_plan']; ?></td>
            </tr>
            <tr>
                <th>Enrolled Program</th>
                <td><?php echo $data['program']; ?></td>
            </tr>
            
            <tr>
                <th>Email</th>
                <td><?php echo $data['email']; ?></td>
            </tr>
            
            
            
        </table>
    </div>
</div>

</body>
</html>

</html>
