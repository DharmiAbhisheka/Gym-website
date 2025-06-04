<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone Fitness Center</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;500&family=Poppins:wght@400;500&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
    <style>
   


        .detail{
            flex: 1;
             min-width: 250px;
              text-align: center;
        }

        .icon{
            width: 55px; 
            padding: 5px;
        }

        .detail-sub{
            background-color: #ffffff; 
            border-radius: 50%; 
            width: 60px; 
            height: 60px; 
            margin: auto;
        }
        p{
            margin-top: 12px;
            color:rgb(189, 174, 0);
        }
    </style>
</head>

<body>

<?php
$conn = new mysqli("localhost", "root", "", "FitZoneFitnessCenter");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$full_name = $_POST['Full_name'] ?? '';
$email = $_POST['Email'] ?? '';
$subject = $_POST['Subject'] ?? '';
$message = $_POST['Message'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO queries (Full_name, Email, Subject, Message) 
        VALUES ('$full_name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Your query has been sent successfully!');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>

<!-- Header -->
<div>
    <div style="background-color: black ;color: black;">
        .
    </div>
    <header class="topHeader">
        <div class="ButtonAlign">
            <input type="text" id="searchInput" placeholder="Search..." class="search-bar" style="margin-right:10%;padding: 8px; border-radius: 5px; border: none;width: 200px;height: 40px;">
            <button><a href="login.php">Login</a></button>
            <button><a href="register.php">Register</a></button>
        </div>
        <br>
        <div class="navbar-Section">
            <div class="logo">
            <img src="images/logo.png" alt="FitZone Logo"  style="margin-top: -90px;height:150px;">
            </div>
            <ul class="navbar">
                <li><a href="home.html">Home</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="membership.html">Membership</a></li>
                <li><a href="program.html">Programs</a></li>
                <li><a href="personaltraining.html">Personal Training</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
            </ul>
        </div>
        <br>
    </header>
</div>

<!-- Contact Us Section -->
<section style="background-image: url('images/2fb36f808926f0559fba6f0c779c2b82-Picsart-AiImageEnhancer.jpg'); background-size: cover; background-position: center; padding: 80px 0;">
    <div style="max-width: 1200px; margin: auto; background-color: rgba(0, 0, 0, 0.88); padding: 50px; border-radius: 12px; color: white; font-family: 'Segoe UI', sans-serif; box-shadow: 0 8px 24px rgba(0,0,0,0.5);">
        
        <h1 style="text-align: center; margin-bottom: 40px; font-size: 36px; font-weight: bold;">Contact Us</h1>

        <!-- Contact Details -->
        <div style="display: flex; justify-content: space-between; flex-wrap: wrap; margin-bottom: 50px; gap: 20px;">

            <div class="detail">
                <div class="detail-sub" >
                    <img src="icons/call.png" alt="Phone" class="icon" >
                </div>
                <p>+94 767791387</p>
            </div>

            <div  class="detail" >
                <div   class="detail-sub">
                    <img src="icons/email2.png" alt="Email"  class="icon"  >
                </div>
                <p >fitzoneFC@gmail.com</p>
            </div>

            <div  class="detail" >
                <div  class="detail-sub">
                    <img src="icons/address.png" alt="Address" class="icon" >
                </div>
                <p >Kurunegala, Sri Lanka</p>
            </div>
        </div>

        <!-- Contact Form -->
        <h2 style="text-align: center; margin-bottom: 20px; font-size: 28px;">Send a Message</h2>

        <form action="contactus.php" method="POST" style="max-width: 600px; margin: auto; display: flex; flex-direction: column; gap: 20px;">
            <div>
                <label for="Full_name">Your Name</label><br>
                <input type="text" id="Full_name" name="Full_name" required 
                       style="width: 100%; padding: 12px; border-radius: 6px; border: none; outline: none;">
            </div>

            <div>
                <label for="Email">Your Email</label><br>
                <input type="email" id="Email" name="Email" required 
                       style="width: 100%; padding: 12px; border-radius: 6px; border: none; outline: none;">
            </div>

            <div>
                <label for="Subject">Subject</label><br>
                <input type="text" id="Subject" name="Subject" required 
                       style="width: 100%; padding: 12px; border-radius: 6px; border: none; outline: none;">
            </div>

            <div>
                <label for="Message">Your Message</label><br>
                <textarea id="Message" name="Message" rows="5" required 
                          style="width: 100%; padding: 12px; border-radius: 6px; border: none; outline: none;"></textarea>
            </div>

            <button type="submit" style="padding: 14px; background-color:rgb(252, 232, 9); color: black; font-weight: bold; border: none; border-radius: 6px; cursor: pointer; transition: 0.3s;">
                Send Message
            </button>
        </form>
    </div>
</section>


    <br><br><br><br><br><br><br>
</div>

<!-- Footer -->
<div>
    <div style="background-color: beige;color: beige;">.</div>
    <footer>
        <div style="margin-left: 5%;">
            <ul class="footer_section">
            <img src="images/logo.png" alt="FitZone Logo"  style="margin-top: 0px;height:100px;">
                <li>Kurunagala</li><br>
                <li><img src="icons/call.png" style="width: 25px;padding: 5px;">0767791387</li>
                <li><img src="icons/email2.png" style="width: 25px;padding: 5px;">fitzoneFC@gmail.com</li>
                <li><img src="icons/address.png" style="width: 30px;padding: 5px;">Kurunagala</li>
            </ul>
        </div>
        <div>
            <ul class="footer_section">
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="membership.html">Membership</a></li>
                <li><a href="program.html">Programs</a></li>
                <li><a href="personaltraining.html">Personal Training</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
            </ul>
        </div>
        <div>
            <ul class="footer_section">
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="policy.html">Privacy Policy</a></li>
                <li><a href="terms.html">Terms & Conditions</a></li>
            </ul>
        </div>
        <div>
            <ul class="footer_section">
                <div class="socialmedia">
                    <li><img src="icons/fb2.png" alt="Facebook" style="width: 50px;"></li>
                    <li><img src="icons/inster2.png" alt="Instagram" style="width: 50px;"></li>
                    <li><img src="icons/tiktok.png" alt="TikTok" style="width: 50px;"></li>
                </div>
            </ul>
        </div>
    </footer>
    <div style="background-color: #c4b704; color: rgb(21, 21, 12); text-align: center; font-size: smaller;">
        <br>© 2025 FitZone Fitness Center. All rights reserved<br>
    </div>
</div>

<script>
window.onload = function() {
    document.getElementById("fade").style.opacity = 1;
};

const searchInput = document.getElementById("searchInput");
const navLinks = document.querySelectorAll(".navbar li");

searchInput.addEventListener("keyup", function () {
    const searchTerm = this.value.toLowerCase();
    let matches = false;

    navLinks.forEach(link => {
        const text = link.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
            link.style.display = "inline-block";
            matches = true;
        } else {
            link.style.display = "none";
        }
    });

    const existingMessage = document.getElementById("noResultsMessage");
    if (!matches) {
        if (!existingMessage) {
            const message = document.createElement("p");
            message.id = "noResultsMessage";
            message.textContent = "No results found";
            message.style.color = "white";
            message.style.marginTop = "10px";
            document.querySelector(".navbar-Section").appendChild(message);
        }
    } else {
        if (existingMessage) {
            existingMessage.remove();
        }
    }
});
</script>

</body>
</html>
