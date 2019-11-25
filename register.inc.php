<?php
if(isset($_POST['register'])){

    require 'connect.php';

    // Check connection
    $username=$_POST['username'];
    $email=$_POST['email'];
    $cPassword=$_POST['cpwd'];
    $password=$_POST['password'];

    if (empty($username) || empty($email) || empty($cPassword) || empty($password)){
        header("Location: ../shugardiary/register.php?error=emptyfields&username=".$username."&email=".$email);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*&/", $username)){
        header("Location: ../shugardiary/register.php?error=invalidemail&invalidusername");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../shugardiary/register.php?error=invalidemail&username=".$username);
        exit();
    }
    // else if(!preg_match("/^[a-zA-Z0-9]*&/", $username)){
    //     header("Location: ../shugardiary/register.php?error=invalidusername&email=".$email);
    //     exit();
    // }
    else if($cPassword!==$password){
        header("Location: ../shugardiary/register.php?error=checkpassword&email=".$email."&usernam=".$username);
        exit();
    }
    else{
        $sql="SELECT username FROM profiles WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../shugardiary/register.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../shugardiary/register.php?error=usernametaken&email=".$email);
                exit();
            }
            else{
                $sql="INSERT INTO profiles(username, email, password) VALUES(?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../shugardiary/register.php?error=sqlerror");
                    exit();
                }
                else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    $sql1 = "SELECT * FROM profiles WHERE username='".$username."' AND password = '".$hashedPwd."'";
                    $result = $conn->query($sql1);
                    if ($result -> num_rows > 0){
                    $row = $result->fetch_assoc();
                    session_start();
                    $_SESSION['userId'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['status'] = $row['status'];
                    header("Location: ../shugardiary/settings.php?registration=success");
                    exit();
                    }
                }
                
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../shugardiary/register.php");
    exit();
}
?>