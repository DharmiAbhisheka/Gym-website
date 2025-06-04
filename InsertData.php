<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if (isset($_POST['submit'])) {  
    //include the code contained in a PHP file within another PHP file
    include("Connection.php");
                            
    $F_name=$_POST['F_name']; 
    $L_name=$_POST['L_name'];  
    $NIC=$_POST['NIC'];
    $address=$_POST['address'];
    $c_no=$_POST['c_no'];
    $member_plan=$_POST['member_plan'];
    $program=$_POST['program'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
    $db= mysqli_select_db($conn,'FitZoneFitnessCenter');                  
    $sql = "INSERT INTO user ". "(F_name,L_name,NIC,address,c_no,member_plan,program,email,password) ". "VALUES('$F_name','$L_name','$NIC','$address','$c_no','$member_plan','$program','$email','$password')";
                                
    $results = mysqli_query($conn, $sql);
        if(!$results) {
        die('Could not enter data: ' . mysqli_error($conn));
        }
        else
            {
            echo "Entered data successfully\n";
            }
                                        
                                        
        }  else {
            echo "Your form is not submitted yet please fill the form and visit again";
        } 
?>
</body>
</html>