<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Details</title>
</head>
<body>

<?php


if(isset($_POST['update'])){ 
    include("Connection.php");
  
      $name  =$_POST['name'];
      $NIC  =$_POST['NIC'];
      $address  =$_POST['address'];
     $email  =$_POST['email']; 
     $c_no  =$_POST['c_no'];
     $member_plan =$_POST['member_plan'];
     $program=$_POST['program']; 		

$sql="UPDATE user SET email='$email',NIC='$NIC', address='$address' , c_no='$c_no' , member_plan='$member_plan' , program='$program' 
WHERE F_name ='$name'";
  
 $result=mysqli_query($conn,$sql);
 if($result){
    $msg = "Customer Details Updated Successfully";	
    echo "<script type='text/javascript'>alert('$msg');</script>";				     

   
    header("refresh:0.1;url=customers.php");
    exit();
}
}
else {
echo "ERROR";
}
?>

</body>
</html>