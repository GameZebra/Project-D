<?php 
if(isset($_POST['login'])){

    require 'connect.php';

    $mailuid = $_POST['email'];
    $password = $_POST['pwd'];

    if(empty($mailuid) || empty($password)){
        header("Location: ../shugardiary/login.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM profiles WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../shugardiary/login.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($results)){
                $pwdCheck=password_verify($password, $row['password']);
                if($pwdCheck==false){
                    header("Location: ../shugardiary/login.php?error=wrongpassword");
                    exit();
                }
                else if($pwdCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];

                    header("Location: ../shugardiary/profile.php?loggedin=success");
                    exit();
                }
                else{
                    header("Location: ../shugardiary/login.php?error=wrongpassword");
                    exit();
                }
            }
            else{
                header("Location: ../shugardiary/login.php?error=nouser");
                exit();
            }
        }
    }
}
else{
    header("Location: ../shugardiary/index.php");
    exit();
}