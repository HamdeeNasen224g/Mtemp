<?php 
    include 'db_con.php';
    $stID = $_POST["stdid"];  
    
    $studentID = $_POST["studentID"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gpax = $_POST["gpax"];
    $gender = $_POST["gender"];
    $major = $_POST["major"];
    $check = true;
    if(strlen($studentID) != 8 || !is_numeric($studentID)){
        $check = false;
    }
    if(strlen($firstname)<=0 || strlen($firstname)>200){
        $check = false;
    }
    if(strlen($lastname)<=0 || strlen($lastname)>200){
        $check = false;
    }
    if(strlen($gpax)<=0 || !is_numeric($studentID) || $studentID <= 4){
        $check = false;
    }
    if(strlen($major)<=0){
        $check = false;
    }
    
    if($check == true){
        $query = "UPDATE `student` SET `FNAME` = '$firstname', `LNAME` = '$lastname', `GPAX` = '$gpax',`MajorID` = '$major',`GENDER` = '$gender',`STDID` = '$studentID' WHERE `student`.`STDID` = '$stID'";
     
        //echo $query;
        $num = $conn->query($query);
        
        header( "location: student.php" );
        exit(0);
    }else{
        // Error 
        echo "Incorrect data back to try again";
        
    }
    
    include 'db_close.php'; 
?>