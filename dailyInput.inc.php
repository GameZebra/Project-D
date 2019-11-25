<?php
    require 'connect.php';
    session_start();
    if(isset($_POST['input'])){

        $id=$_SESSION['userId'];
        $date = $_POST['datePicker'];
        $daytime = $_POST['dayTime'];
        $bloodGlucose = $_POST['bloodGlucose'];
        $blood = "blood_".$daytime;
        $insuline = $_POST['insuline'];
        $insul = "insulin_".$daytime;
        $message='';
        


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if (empty($daytime) || empty($bloodGlucose) || empty($insuline)){
            header("Location: ../shugardiary/dailyInput.php?error=emptyfields");
            exit();
        }
        $search = "SELECT * FROM bloodglucose WHERE user_id='".$id."' AND day = '".$date."'";
        $sql1 = $conn->query($search);
        if ($sql1->num_rows > 0)
        {
            $sql2="UPDATE bloodglucose SET $blood='$bloodGlucose' WHERE user_id='".$id."' AND day='".$date."'" ;
            $sql3="UPDATE bloodglucose SET $insul='$insuline' WHERE user_id='".$id."' AND day='".$date."'" ;
            if ($conn->query($sql2) === TRUE && $conn->query($sql3)) 
            {
                $message =$message. "bloodGlucose-added";
            }
            
        }
        else{
            if(isset($date)){
                $sql2="INSERT INTO bloodglucose (user_id, day, $blood, $insul) VALUES ($id, $date, $bloodGlucose, $insuline)";
                if ($conn->query($sql2) === TRUE) 
                {
                    print_r($date);
                    $sql3="UPDATE bloodglucose SET day='".$date."' WHERE user_id='".$id."' AND $insul='$insuline' AND $blood='$bloodGlucose'" ;
                    $conn->query($sql3);
                    echo"yes on the rigth place";
                    $message =$message. "bloodGlucose-added";
                }
            } else{
                $sql2="INSERT INTO bloodglucose (user_id, day, $blood, $insul) VALUES ($id, now(), $bloodGlucose, $insuline)";
                if ($conn->query($sql2) === TRUE) 
                {
                $message =$message. "bloodGlucose-added";
                }
            }
        }
            {
           header("Location: ../shugardiary/diary.php?".$message);
        }
    }

