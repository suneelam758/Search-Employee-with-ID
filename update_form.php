<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Task1</title>
    <style>
    body {
        
      
    background-color: lavender;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  
      }
    </style>
</head>
<body>
<?php
include 'conn.php';
        $uid = $_GET['id'];
         $q = " select * from employeemaster where Id = $uid ";
       
        $uresult = mysqli_query($conn,$q);
        $urow = mysqli_fetch_assoc($uresult);
        
        if($urow){
            ?>
    <form action="update.php" method="POST" id="form" name="form" style="padding: 15px;">
    <input type="hidden" name="uid" value="<?=$urow['Id']?>">
  
       FirstName: <input type="text" class="form-control" value="<?php echo $urow['FirstName'];?>" name="fn" id="fn" onchange="return allowOnlyLetters(event,this);"><br><br>
       
       LastName: <input type="text" class="form-control" value="<?php echo $urow['LastName'];?>" name="ln" onchange="return allowOnlyLetters(event,this);"><br><br>
       Department: <input type="text" class="form-control" value="<?php echo $urow['Department'];?>" name="dep" ><br><br>
       Designation: <input type="text" class="form-control" value="<?php echo $urow['Designation'];?>" name="des"><br><br>
      Phone:  <input type="tel" class="form-control" value="<?php echo $urow['Phone'];?>" name="ph" maxlength="10" ><br><br>
      
      Status:  <select name="st" class="form-control">
      <option>Status</option>
        <option value="1">Active</option>
        <option value="0">Inactive</option>

      </select>
    <center>  <br><input type="submit" value="update" class="btn btn-primary"> </center>
    </form>
    <?php } ?>
    <script>
     
     function allowOnlyLetters(e, t)   
{    
   if (window.event)    
   {    
      var charCode = window.event.keyCode;    
   }    
   else if (e)   
   {    
      var charCode = e.which;    
   }    
   else { return true; }    
   if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))    
       return true;    
   else  
   {    
      alert("Please enter only alphabets");    
      location.reload();
      return false;    
   }           
}      
      
    </script>

</body>
</html>