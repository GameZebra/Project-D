<?php
    require 'connect.php';
    session_start();

    // Check connection
    $id=$_SESSION['userId'];
    $username=$_POST['username'];
   // $email=$_POST['email'];
    $cPassword=$_POST['cpwd'];
    $password=$_POST['password'];
    $fName=$_POST['fName'];
    $lName=$_POST['lName'];
    $date=$_POST['date'];
    $about=$_POST['aboutMe'];
    if(isset($_POST['gender'])){
        $gender=$_POST['gender'];
    }
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $message = "";
    $error="false";
    if($username!=='')
    {
        $sql = "UPDATE profiles SET username='$username' WHERE user_id='".$id."'";
        
        if ($conn->query($sql) === TRUE) {
            $message =$message. "&username-updated";
        } else {
            $error='true';
            $message+="&username-updateerror";
        }
    }
    else{
        echo "username empty";
    }
    if($fName !=='')
    {
        $sql = "UPDATE profiles SET firstName='$fName' WHERE user_id='".$id."'";
        
        if ($conn->query($sql) === TRUE) {
            $message =$message. "&firstName-updated";
        } else {
            $error='true';
            $message=$message."&firstName-updateerror";
        }
    }
    else{
        echo "works";
    }
    if($lName !=='')
    {
        $sql = "UPDATE profiles SET lastName='$lName' WHERE user_id='".$id."'";
        
        if ($conn->query($sql) === TRUE) {
            $message =$message. "&lastName-updated";
        } else {
            $error='true';
            $message=$message."&lastName-updateerror";
        }
    }
    else{
        echo "works";
    }
    if($date !=='')
    {
        $sql = "UPDATE profiles SET dateOfBirth='$date' WHERE user_id='".$id."'";
        
        if ($conn->query($sql) === TRUE) {
            $message =$message. "&dateOfBirth-updated";
        } else {
            $error='true';
            $message=$message."&dateOfBirth-updateerror";
        }
    }
    else{
        echo "works";
    }
    if(isset($_POST['gender']))
    {
        $sql = "UPDATE profiles SET gender='$gender' WHERE user_id='".$id."'";
        
        if ($conn->query($sql) === TRUE) {
            $message =$message. "&gender-updated";
        } else {
            $error='true';
            $message=$message."&gender-updateerror";
        }
    }
    else{
        echo "works";
    }
    if($about !=='')
    {
        $sql = "UPDATE profiles SET aboutMe='$about' WHERE user_id='".$id."'";
        
        if ($conn->query($sql) === TRUE) {
            $message =$message. "&aboutMe-updated";
            print_R(".$message.");
        } else {
            $error='true';
            $message=$message."&aboutMe-updateerror";
        }
    }
    else{
        echo "works";
    }
    if($password!==$cPassword)
    {
        $msg = '';
        if(isset($_POST['username'])){
            $msg .="&username=".$username; 
        }
        if(isset($_POST['fName'])){
            $msg .= "&fName=".$fName; 
        }
        if(isset($_POST['lName'])){
            $msg .="&lName=". $lName; 
        }
        if(isset($_POST['date'])){
            $msg .="&date=". $date; 
        }
        if(isset($_POST['gender'])){
            $msg .= "&gender=">$gender; 
        }
        if(isset($_POST['aboutMe'])){
            $msg .="&anoutme=" .$about; 
        }
        header("Location: ../shugardiary/settings.php?error=passwordsdonotmatch".$msg);
        exit();
    }
    else{
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE profiles SET password='".$hashedPwd."' WHERE user_id='".$id."'";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../shugardiary/profile.php?update=success");
        } else {
            $error='true';
            $message=$message."&password-updateerror";
        }
    }
    if($error == 'false'){
        //header("Location: ../shugardiary/profile.php?".$message);
    }
    else{
        //header("Location: ../shugardiary/settings.php?".$message);
    }

    $conn->close();
    ?>