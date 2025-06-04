<?php
session_start();

if(isset($_POST['submit'])) {
	
 include 'Connection.php';
 
 
 $UserName=$_POST["UserName"];
 $pass=$_POST["password"]; 
 $role=$_POST["role"];



 if ($role=="customer"){
  $sql="SELECT * FROM user WHERE email='$UserName' and password ='$pass'";

  $result = mysqli_query($conn,$sql);

  $row= mysqli_fetch_array($result);
   
   
	if(mysqli_num_rows($result) == 1) {
         $_SESSION['user']=$row['email'];
       	header("location: welcome.php");
      }else 
	  {
        $msg = "Your Login Name or Password is invalid";		 
      }
	  
	  echo "<script type='text/javascript'>alert('$msg');</script>";
  }


  if ($role=="admin"){
    $sql="SELECT * FROM admintbl WHERE email='$UserName' and password ='$pass'";
  
    $result = mysqli_query($conn,$sql);
  
    $row= mysqli_fetch_array($result);
     
     
    if(mysqli_num_rows($result) == 1) {
           $_SESSION['user']=$row['email'];
           header("location: admin.php");
        }else 
      {
          $msg = "Your Login Name or Password is invalid";		 
        }
      
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }

    if ($role=="management"){
      $sql="SELECT * FROM management WHERE email='$UserName' and password ='$pass'";
    
      $result = mysqli_query($conn,$sql);
    
      $row= mysqli_fetch_array($result);
       
       
      if(mysqli_num_rows($result) == 1) {
             $_SESSION['user']=$row['email'];
             header("location: management.php");
          }else 
        {
            $msg = "Your Login Name or Password is invalid";		 
          }
        
        echo "<script type='text/javascript'>alert('$msg');</script>";
      }


 }
 

 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gym Login</title>
  <style>
    body {
      
      background-color: #1c1c1c;
      /* font-family: 'Segoe UI', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center; */
      color: #f4f4f4;
    }
    img{
      margin-left:95%;
      width: 40px;
      background-color:white;
      boder-radius: 5px;
     
    }

    .login-container {
      background-color: #2b2b2b;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(255, 255, 0, 0.29);
      width: 350px;
      text-align: center;
      margin-top:50px
     
    }

    .login-container h2 {
      margin-bottom: 20px;
      color:rgb(253, 208, 10);
    }

    .buttons{
      width: 48%;
      padding: 10px;
      margin: 5px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      background-color:rgb(253, 208, 10);
      color: #000;
      cursor: pointer;
      transition: 0.3s;
      
    }

    input,select {
      width: 100%;
      padding: 12px;
      margin: 10px 0 20px;
      border: 1px solid #444;
      border-radius: 8px;
      background-color: #1f1f1f;
      color: #fff;
      font-size: 15px;
    }

    

    .buttons:hover{
      background-color:rgb(158, 131, 9);
    }

    .login-container a {
      color: #ccc;
      text-decoration: none;
      display: block;
      margin-top: 15px;
      font-size: 14px;
    }

    .login-container a:hover {
      color: #fdd835;
    }
  </style>
</head>
<body >

 <a href="home.html"><img src="icons\icons8-cancel-100.png" alt=""></a>
<center>
<form class="login-container" method="post" action="">
    <h2>FitZone Login</h2>
    
    <input type="text" name="UserName" placeholder="Enter Username" required>
    <input type="password" name="password" placeholder="Enter Password" required>
    
    <select name="role" placeholder="Select Role" required>
      
      <option value="customer">Customer</option>
      <option value="admin">Admin</option>
      <option value="management">Management</option>
      
    </select>

    <input type="submit" name="submit" value="Login" class="buttons">
    <input type="reset" value="Clear" class="buttons">

    <a href="forgot-password.php">Forgot your password?</a>
  </form>

</center>
  

</body>
</html>
