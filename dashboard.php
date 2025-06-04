<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - FitZone</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #2c3e50;
    color: white;
    padding: 20px;
    text-align: center;
}

header h1 {
    margin: 0;
    font-size: 36px;
}

nav a {
    color: white;
    margin: 0 15px;
    text-decoration: none;
    font-size: 18px;
}

nav a:hover {
    text-decoration: underline;
}

main {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

/* Section Styles */
section {
    background-color: white;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

section h2 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #2c3e50;
}

section p {
    font-size: 18px;
    margin: 10px 0;
}

section ul {
    list-style: none;
    padding: 0;
}

section ul li {
    font-size: 18px;
    margin: 8px 0;
}

/* Query Form Styles */
.query-form form {
    display: flex;
    flex-direction: column;
}

.query-form textarea {
    padding: 10px;
    font-size: 16px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    height: 150px;
}

.query-form button {
    background-color: #27ae60;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
}

.query-form button:hover {
    background-color: #2ecc71;
}


.membership-info, .personal-training, .schedule, .payment-info {
    background-color: #ecf0f1;
    border-left: 5px solid #27ae60;
}


.goal-tracker {
    background-color: #f9f9f9;
    border-left: 5px solid #3498db;
}


@media screen and (max-width: 768px) {
    header h1 {
        font-size: 28px;
    }

    nav a {
        font-size: 16px;
    }

    section h2 {
        font-size: 20px;
    }

    section p, section ul li {
        font-size: 16px;
    }

    .query-form textarea {
        height: 120px;
    }
}

    </style>
</head>
<body>
    <?php 

$servername = "localhost"; 
$username = "email"; 
$password = "password";  
$dbname = "FitZoneFitnessCenter"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/
$sql = "SELECT F_name, L_name, email FROM user";  
$result = $conn->query($sql);


if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
        echo "<div style='font-family: Arial, sans-serif; padding: 20px;'>";
        echo "<h2>Customer Dashboard</h2>";
        echo "<p><strong>Name:</strong> " . $row["F_name"] . "</p>";
        echo "<p><strong>Name:</strong> " . $row["L_name"] . "</p>";
        echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
        echo "</div>";
    }
} else {
    echo "No results found";
}


$conn->close();
?>


    <header>
        <h1>Welcome, [Customer Name]!</h1>
        <nav>
            <a href="profile.php">Profile</a>
            <a href="workouts.php">Workouts</a>
            <a href="membership.php">Membership</a>
            <a href="queries.php">Support</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <section class="membership-info">
            <h2>Your Membership</h2>
            <p><strong>Membership Type:</strong> [Type]</p>
            <p><strong>Expiry Date:</strong> [Expiry Date]</p>
            <p><strong>Status:</strong> [Active/Expired]</p>
            <p><strong>Remaining Sessions:</strong> [Number]</p>
        </section>

        <section class="personal-training">
            <h2>Your Personal Trainer</h2>
            <p><strong>Trainer:</strong> [Trainer Name]</p>
            <p><strong>Next Session:</strong> [Date & Time]</p>
        </section>

        <section class="schedule">
            <h2>Your Class Schedule</h2>
            <ul>
                <li>Yoga - [Date]</li>
                <li>Zumba - [Date]</li>
                <li>Strength Training - [Date]</li>
            </ul>
        </section>

        <section class="payment-info">
            <h2>Payment Information</h2>
            <p><strong>Last Payment:</strong> [Amount] on [Date]</p>
            <a href="invoices.php">View Invoice History</a>
        </section>

        <section class="query-form">
            <h2>Have a Question?</h2>
            <form action="submit_query.php" method="POST">
                <textarea name="query" placeholder="Enter your query..." required></textarea>
                <button type="submit">Submit</button>
            </form>
        </section>

        <section class="goal-tracker">
            <h2>Your Fitness Goals</h2>
            <p><strong>Goal:</strong> [Goal]</p>
            <p><strong>Progress:</strong> [Percentage]% completed</p>
        </section>
    </main>

</body>
</html>
