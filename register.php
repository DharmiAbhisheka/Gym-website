<?php
if (isset($_POST['submit'])) {
    include("Connection.php");

    $F_name = $_POST['F_name']; 
    $L_name = $_POST['L_name'];  
    $NIC = $_POST['NIC'];
    $address = $_POST['address'];
    $c_no = $_POST['c_no'];
    $member_plan = $_POST['member_plan'];
    $program = $_POST['program'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'FitZoneFitnessCenter');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO user (F_name, L_name, NIC, address, c_no, member_plan, program, email, password) 
            VALUES ('$F_name', '$L_name', '$NIC', '$address', '$c_no', '$member_plan', '$program', '$email', '$password')";

    $results = mysqli_query($conn, $sql);

    if (!$results) {
        $msg = '❌ Registration failed: ' . mysqli_error($conn);
    } else {
        $msg = "✅ Registration successful!";
    }

    if (!$results) {
      echo "<script>alert('❌ Registration failed: " . mysqli_error($conn) . "');</script>";
    } else {
      echo "<script>
      alert('✅ Registration successful!');
      window.location.href = 'home.html';
      </script>";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FitZone Registration</title>
  <style>
    body {
      background-color: #1c1c1c;
      color: #f4f4f4;
    }
    img{
      margin-left:95%;
      width: 40px;
      background-color:white;
      position: fixed;
    }
    .form-box {
      background-color: #2b2b2b;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(255, 255, 0, 0.29);
      width: 500px;
      margin-top:5%;
      margin-bottom:5%;
    }
    h2 {
      text-align: center;
      color:rgb(249, 209, 28);
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-top: 15px;
      font-size: 15px;
      color: #ccc;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: none;
      border-radius: 8px;
      background-color: #1f1f1f;
      color: #fff;
      font-size: 14px;
    }
    input[type="submit"] {
      margin-top: 25px;
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background-color: rgb(253, 208, 10);
      color: #000;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }
    input[type="submit"]:hover {
      background-color: rgb(158, 131, 9);
    }
    .message {
      text-align: center;
      margin-top: 15px;
      color: #ffeb3b;
    }
  </style>
</head>

<body>
<script type="text/javascript">
    function formValidation() {
        var Fname = document.registration.F_name;
        var Lname = document.registration.L_name;
        var nic = document.registration.NIC;
        var address = document.registration.address;
        var c_no = document.registration.c_no;

        if (Emptyfield(Fname, Lname, nic, address, c_no)) {
            if (allLetter(Fname, Lname)) {
                if (alphanumeric(address)) {
                    if (allnumeric(nic, c_no)) {
                        if (validateEmail()) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }

    function Emptyfield(Fname, Lname, nic, address, c_no) {
        if (Fname.value.length == 0 || Lname.value.length == 0 || nic.value.length == 0 || address.value.length == 0 || c_no.value.length == 0) {
            alert("All fields are required!");
            return false;
        }
        return true;
    }

    function allLetter(Fname, Lname) {
        var letters = /^[A-Za-z]+$/;
        if (!Fname.value.match(letters)) {
            alert('First name must have alphabet characters only');
            Fname.focus();
            return false;
        }
        if (!Lname.value.match(letters)) {
            alert('Last name must have alphabet characters only');
            Lname.focus();
            return false;
        }
        return true;
    }

    function alphanumeric(address) {
        var alphanumeric = /^[0-9a-zA-Z\s]+$/;
        if (!address.value.match(alphanumeric)) {
            alert('Address must have alphanumeric characters only');
            address.focus();
            return false;
        }
        return true;
    }

    function allnumeric(NIC, c_no) {
        var numbers = /^[0-9]+$/;
        if (!NIC.value.match(numbers)) {
            alert('NIC must have numeric characters only');
            NIC.focus();
            return false;
        }
        if (!c_no.value.match(numbers)) {
            alert('Contact Number must have numeric characters only');
            c_no.focus();
            return false;
        }
        return true;
    }

    function validateEmail() {
        var email = document.registration.email;
        var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!email.value.match(emailPattern)) {
            alert('Please enter a valid email address');
            email.focus();
            return false;
        }
        return true;
    }
</script>

<a href="home.html"><img src="icons/icons8-cancel-100.png" alt=""></a>
<center>
    <form class="form-box" name="registration" method="post" action="" onSubmit="return formValidation();">
        <br><br><br>
        <h2>FitZone Member Registration</h2>
        
        <label for="F_name">First Name:</label>
        <input type="text" name="F_name" required />

        <label for="L_name">Last Name:</label>
        <input type="text" name="L_name" required />

        <label for="NIC">NIC Number:</label>
        <input type="text" name="NIC" required />

        <label for="address">Address:</label>
        <input type="text" name="address" required />

        <label for="c_no">Contact Number:</label>
        <input type="text" name="c_no" required />

        <label for="member_plan">Membership Plan:</label>
        <select name="member_plan" required>
            <option value="" disabled selected>-- Select Plan --</option>
            <option value="basic">Basic</option>
            <option value="standard">Standard</option>
            <option value="premium">Premium</option>
            <option value="family">Family</option>
            <option value="corporate">Corporate</option>
            <option value="student">Student</option>
            <option value="day_pass">Day Pass</option>
            <option value="vip">VIP</option>
        </select>

        <label for="program">Gym Program:</label>
        <select name="program" required>
            <option value="" disabled selected>-- Select Program --</option>
            <option value="yoga">Yoga</option>
            <option value="zumba">Zumba</option>
            <option value="strength_training">Strength Training</option>
            <option value="boxing">Boxing</option>
            <option value="physiotherapy">Physiotherapy Sessions</option>
        </select>

        <label for="email">Email:</label>
        <input type="email" name="email" required />

        <label for="password">Password:</label>
        <input type="password" name="password" required />

        <input type="submit" name="submit" value="Register">
        <?php if (!empty($msg)) echo "<div class='message'>$msg</div>"; ?>
    </form>
</center>
</body>
</html>
