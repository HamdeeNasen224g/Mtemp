<script type="text/JavaScript">
    <!--
        function timedRefresh(timeoutPeriod) {
	        setTimeout("location.reload(true);",timeoutPeriod);
			alert "555";
        }
//   -->
</script>

<body onLoad="JavaScript:timedRefresh(3000);"><BR>
<!DOCTYPE html>
<html lang="en">

<?php 
   
    include 'db_con.php';
    $check = true;
    
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        date_default_timezone_set("Asia/Bangkok");
    
        $sql = "SELECT API FROM  device";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
         $api = $row['API'];
    //ดึง json จาก ais มา 
    $response = file_get_contents("$api", false, stream_context_create($arrContextOptions));
    $json = json_decode($response);
    //เลือกแค่ data
    $id_device = $json->IMEI;
    $temp1 = $json->Sensor->Temperature1;
    $temp2 = $json->Sensor->Temperature2;
    $hum =  $json->Sensor->humidity;
    $tempevm=$json->Sensor->temperatureEVM;
    $d1 = date("y-m-d H:i:s");
    
    if($check == true){
        $sql = "INSERT INTO data (`id_device`, `datetime`, `hum`, `tem1`, `tem2`, `temEVM`) 
                VALUES ('".$id_device."', '".$d1."', '". $hum."', '".$gender."', '".$temp1."', '".$temp2."');";
        echo $sql;
        $num = $conn->query($sql);

        header( "location: test_data.php" );
        exit(0);
    }else{
        // Error 
        echo "Incorrect data back to try again";
        }
                                                }
                                    }

    include 'db_close.php'; 
?>