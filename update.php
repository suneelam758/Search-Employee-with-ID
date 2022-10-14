<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include('conn.php');
    

    $userid = $_POST['uid'];
     $fn = $_POST['fn'];
     $ln = $_POST['ln'];
     $dep= $_POST['dep'];
     $des = $_POST['des'];
     $ph = $_POST['ph'];
     $st = $_POST['st'];
     if(preg_match('~[0-9]~', $_POST['fn'])) {
        echo "<script>alert('Name should be in text only')</script>";
        echo "There is some problem while updating the record";
    } else {
        $upd = "UPDATE `employeemaster` SET `FirstName`='$fn',`LastName`='$ln',`Department`='$dep',`Designation`='$des',`Phone`='$ph',`Status`='$st' where Id = {$userid} ";
        $up_data = mysqli_query($conn,$upd);
        
        
        echo 'record updated succefully';
    
    }

    ?>
</body>
 