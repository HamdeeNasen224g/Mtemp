<?php include 'db_con.php'; ?>
<?php include 'header.php'; ?>
<form class="form-horizontal" method="post" action="add_db.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="studentID">Student ID:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="studentID" placeholder="Enter Student ID" name="studentID">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="firstname">Firstname:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="lastname">Lastname:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="gender">Gender:</label>
      <div class="col-sm-10">   
            <label><input type="radio" name="gender" value="1" >ชาย</label>
            <label><input type="radio" name="gender" value="2">หญิง</label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="gpax">GPAX:</label>
      <div class="col-sm-2">          
        <input type="number" class="form-control" id="gpax" placeholder="Enter GPAX" name="gpax">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="major">Major:</label>
      <div class="col-sm-10">          
        <select class="form-control" id="major" name="major">
        <option value="">กรุณาเลือกสาขาที่เรียน</option>
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
        <button type="submit" class="btn btn-info">Submit</button>
      </div>
    </div>
  </form>

<?php include 'footter.php'; ?>
<?php include 'db_close.php'; ?>
