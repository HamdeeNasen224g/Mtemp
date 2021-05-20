<?php include 'db_con.php'; ?>
<?php include 'header.php'; ?>
<table class="table table-hover" onload="myFunction()">
    <thead>
      <tr>
        <th>Device</th>
        <th>Timestamp</th>
        <th>Humidity</th>
        <th>Temperature1</th>
        <th>Temperature2</th>
        <th>TemperatureEVM</th>
      </tr>
    </thead>
    <tbody>
    <button id="btn-add" class="btn btn-success" type="button">Update</button>
    <?php
$page = $_SERVER['PHP_SELF'];
$sec = "10";
?>
<?php 
    $sql = "SELECT * FROM data join device on data.id_device = device.id_device ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

        ?>
            <tr>
                <td> <button type="button" class="btn" id="<?php  $row['id_device'];?>"> <h3> <?php echo $row['name_device'];?> </h3></button> </td>            
                <td><?php echo $row['datetime'];?></td>
                <td><?php echo $row['hum'];?></td>
                <td><?php echo $row['tem1'];?></td>
                <td><?php echo $row['tem2'];?></td>
                <td><?php echo $row['temEVM'];?></td>               
            </tr>
        <?php
      }
    } else {
      echo "0 results";
    }
    ?>
      <script>
    function myFunction() {
  alert("Page is loaded");
    }

    $(document).ready(function(){
      $("#btn-add").click(function(){
            $(location).attr('href', 'add_db.php');
        });})
</script>
