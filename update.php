<?php
include 'header.php';
?>
<div class="container">
<?php
include 'db.php';
$a = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM registration_table WHERE id= '$a'");
$row= mysqli_fetch_array($result);
?>
<h2> Update your information below: </h2>
<form name= "form1" method="post" action="profile.php">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="First name" name="fname" required value="<?php echo $row['first_name']; ?>">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Last name" name="lname" required value="<?php echo $row['last_name']; ?>" >
    </div>
  </div>
  <br> 
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="CONTACT" name="CONTACT" required value="<?php echo $row['CONTACT']; ?>">
    </div>

    <div class="col">
      <input type="text" class="form-control" placeholder="EMAIL" name="EMAIL" required value="<?php echo $row['EMAIL']; ?>">    
    </div>

  </div>
<br>
  <div class="row">
  <div class="col"><button type="submit" class="btn btn-primary" name="submit">Update your Information</button></div>
  <div class="col"><button type="submit" class="btn btn-primary" name="delete">Delete your Information</button></div>
</div>
</form>
<?php 

if (isset($_POST['submit'])){
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $Contact = $_POST['CONTACT'];
    $Email = $_POST['EMAIL'];
    $query = mysqli_query($conn,"UPDATE registration_table set first_name='$fname', last_name='$lname',CONTACT='$Contact',EMAIL='$Email' where id='$a'");
    if($query){
        echo "<h2>Your information is updated  Successfully</h2>";
        
    }
    else { echo "Record Not modified";}
    }

    if (isset($_POST['delete'])){
        $query = mysqli_query($conn,"DELETE FROM registration_table where id='$a'");
        if($query){
            echo "Record Deleted with id: $a <br>";
            
        }
        else { echo "Record Not Deleted";}
        }

$conn->close();
?>
</div><br>
<?php
include 'footer.php';
?>