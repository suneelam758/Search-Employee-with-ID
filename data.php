<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
<style>
  body{
    background-color: lavender;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  }
</style>
</head>
<body>

   
<?php
include 'conn.php';
$search = $_POST['search'];

$qsearch = "select * from employeemaster where EmpCode = '$search'";

$result = mysqli_query($conn,$qsearch);

if(mysqli_num_rows($result)){
    while($row =mysqli_fetch_assoc($result)){
       if($row['Status'] == 0){
            $ss = 'Inactive';
       }
       if($row['Status'] == 1){
        $ss = 'Active';
   }
        ?>
        
            <form style="padding: 15px;">

       FirstName: <input type="text" class="form-control" value="<?php echo $row['FirstName'];?>" readonly><br><br>
       LastName: <input type="text" class="form-control" value="<?php echo $row['LastName'];?>" readonly><br><br>
       Department: <input type="text" class="form-control" value="<?php echo $row['Department'];?>" readonly><br><br>
       Designation: <input type="text" class="form-control" value="<?php echo $row['Designation'];?>" readonly><br><br>
      Phone:  <input type="number" class="form-control" value="<?php echo $row['Phone'];?>" readonly><br><br>
      Status:  <select name="st" id="s1" class="form-control">
        <option value="<?php echo $row['Status']?>"><?php echo $ss?></option>
      </select>
      
            </form>

  <a href="update_form.php?id=<?= $row['Id']?>" class="btn btn-primary">Update</a>
    <?php
    }
}
else{
  echo "Employee not found";
}


?>

</body>
</html>
