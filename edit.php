<?php include 'db_con.php'; ?>
<?php include 'header.php'; ?>
<?php $ID = $_GET["stdid"]; 

$sql = "SELECT * FROM student WHERE STDID LIKE $studentID ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     // echo "<br> id: ". $row["STDID"]. " - Name: ". $row["FNAME"]. " " . $row["LNAME"] . " " . $row["GENDER"] . " " . $row["MajorID"] . "<br>";
      $fname =$row["FNAME"];
      $lname =$row["LNAME"];
      $gen = $row["GENDER"];
      $major = $row["MajorID"];
      $gpax = $row["GPAX"];
  }
} else {
  echo "0 results";
}


?>

<form class="form-horizontal" method="post" action="edit_db.php">

    <div class="form-group">
    <input type="hidden" name="ID" value="<?php echo $ID ; ?>">
      <label class="control-label col-sm-2" for="studentID">Student ID:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="studentID" placeholder="Enter Student ID" name="studentID" value="<?php echo $studentID;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="firstname">Firstname:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname" value="<?php echo $fname;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="lastname">Lastname:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname" value="<?php echo $lname;?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="gender">Gender:</label>
      <div class="col-sm-10">   
            <label><input type="radio" name="gender" value="1" <?php echo($gen == "1")? "checked":""; ?>>ชาย</label>
            <label><input type="radio" name="gender" value="2" <?php echo($gen == "2")? "checked":""; ?> >หญิง</label>
      

      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="gpax">GPAX:</label>
      <div class="col-sm-2">          
        <input type="number" class="form-control" id="gpax" placeholder="Enter GPAX" name="gpax" value="<?php echo $gpax;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="major">Major:</label>
      <div class="col-sm-10">          
        <select class="form-control" id="major" name="major">
        <option value="<?php echo $major;?>"><?php 
            $sql = "SELECT * FROM Major WHERE MID LIKE $major";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<br>".$row["Name"]."<br>";
                }
            }
        ?></option>
        <?php 
            $sql = "SELECT * FROM Major";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row["MID"].'">'.$row["Name"].'</option>';
                }
            }
        ?>
        </select>
      </div>
    </div>


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info" id="<?php echo $studentID?>">Submit</button>
      </div>
    </div>
  </form>

<?php include 'footter.php'; ?>
<?php include 'db_close.php'; ?>