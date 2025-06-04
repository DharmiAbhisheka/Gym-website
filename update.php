<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Details</title>
</head>
<body>

<?php
include("Connection.php");

// Updating Admin Table
if (isset($_POST['update'])) {
    $name  = $_POST['name'];
    $email = $_POST['email']; 
    $DOB   = $_POST['DOB'];
    $NIC   = $_POST['NIC']; 		

    $sql = "UPDATE admintbl SET email='$email', DOB='$DOB', NIC='$NIC' WHERE F_name ='$name'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $msg = "Administrative Staff Details Updated Successfully";	
        echo "<script type='text/javascript'>alert('$msg');</script>";	
        header("refresh:0.1;url=staff.php");

        exit();
    } else {
        echo "Admin update failed!";
    }
}

// Updating Management Table
elseif (isset($_POST['updateM'])) {
    $name  = $_POST['name'];
    $email = $_POST['email']; 
    $DOB   = $_POST['DOB'];
    $NIC   = $_POST['NIC']; 

    $sql = "UPDATE management SET email='$email', DOB='$DOB', NIC='$NIC' WHERE F_name ='$name'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $msg = " Management Staff Details Updated Successfully";	
        echo "<script type='text/javascript'>alert('$msg');</script>";	
       

        header("refresh:0.1;url=manage.php");
        exit();
    } else {
        echo "Management update failed!";
    }
} else {
    echo "No form submitted!";
}
?>
</body>
</html>






// if(isset($_POST['update'])){ 
//     include("Connection.php");
  
//       $name  =$_POST['name'];
//       $NIC  =$_POST['NIC'];
//       $address  =$_POST['address'];
//      $email  =$_POST['email']; 
//      $c_no  =$_POST['c_no'];
//      $member_plan =$_POST['member_plan'];
//      $program=$_POST['program']; 		

// $sql="UPDATE admintbl SET email='$email',NIC='$NIC', address='$address' , c_no='$c_no' , member_plan='$member_plan' , program='$program' 
// WHERE F_name ='$name'";
  
//  $result=mysqli_query($conn,$sql);
//  if($result){			     

   
//     header("refresh:2;url=customers.php");
//     exit();
// }
// }
// else {
// echo "ERROR";
// }
?>

</body>
</html>
