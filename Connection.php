<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</form>
    <?php 
        $dbhost = 'localhost';
        $dbuser = 'root'; 
        $dbpass = '';
		$DB='FitZoneFitnessCenter';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$DB);
          if(!$conn ) { 
         die('Could not connect: ' . mysqli_error($conn));
          }
        //    echo 'Connected successfully';

          
            // mysqli_close($conn);
    ?>
</body>
</html>