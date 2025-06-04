<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Details</title>
</head>
<body>

<?php
if (isset($_GET['delAdmin'])) {
    include 'Connection.php';	
    $id = $_GET['delAdmin'];
    mysqli_query($conn, "DELETE FROM admintbl WHERE adminID=$id");
    $msg = "Admin Account Deleted Successfully";	
    echo "<script type='text/javascript'>alert('$msg');</script>";	
    header("refresh:0.1;url=staff.php");
    


}

if (isset($_GET['delManager'])) {
    include 'Connection.php';	
    $id = $_GET['delManager'];
    mysqli_query($conn, "DELETE FROM management WHERE M_ID=$id");
    $msg = "Manager Account Deleted Successfully";	
    echo "<script type='text/javascript'>alert('$msg');</script>";
    header("refresh:0.1;url=manage.php");
    


}


if (isset($_GET['delUser'])) {
    include 'Connection.php';	
    $id = $_GET['delUser'];
    mysqli_query($conn, "DELETE FROM user WHERE userID=$id");
    $msg = "Customer Account Deleted Successfully";	
    echo "<script type='text/javascript'>alert('$msg');</script>";
    header("refresh:0.1;url=customers.php");
    
   
}


?>

</body>
</html>
