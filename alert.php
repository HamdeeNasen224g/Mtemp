
<div class="col">
  <?php 
    $sql = "SELECT * FROM `hospital`
    JOIN `dht11` ON `dht11`.`HID` = `hospital`.`hospital_ID` group by hospital.`hospital_ID` ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $temp = $row['temperature'];
        $id = $row['ID'];
        $date = $row['date'];
        $timestamp = date($date);
        $HID =$row['HID'];
        if ($temp > 10){ 
?>
  <a class="row">
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Alert!</strong> 
    <?php 
    
    
      
        echo "Hospital : ".$row['name_hospital']."<br> Temperature 1 : ".$temp."<br> Temperature 2 : ".$row['temperature2']."<br> Humidity : ".$row['humidity']."<br> Timestamp : ".$timestamp;
      
        
        
    }
          ?>
        
    </div>
  </a>
  <?php   }  }?>
   
</div>