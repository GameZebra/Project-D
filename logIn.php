<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="10000">
    <link rel="stylesheet" type="text/css" href="css\style.css">
    <link rel="stylesheet" type="text/css" href="css\login.css">
    <title>ShugarDiary</title>
</head>
<body>
    <header>
        <!--Navigation bar-->
        <ul id="nav-bar">
            <li><a href="index.php">Начало</a></li>
            <li><a href="aboutUs.php">За нас</a></li>
            <?php
                if(isset($_SESSION['userId'])){
                    echo '<li><a href="profile.php">Профил</a></li>
                    <li class="login"><a href="logout.inc.php">Излез</a></li>';
                }
                else{
                    echo '<li class="login active"><a href="login.php">Влез</a></li>
                    <li class="login"><a href="register.php">Регистрирай се</a></li>';
                }
            ?>
        </ul>
    </header>
    <form action="/ShugarDiary/login.inc.php" method="POST">
        <table>
                <tr>
                 <td>E-mail :</td> <td><input type="text" name="email" placeholder="Потребителско име или e-mail"></td><br>
                </tr>
                <tr>
                 <td>Парола :</td> <td><input type="password" name="pwd" placeholder="Парола"></td><br>
                </tr>
                <tr>
                 <td colspan="2"><input type="submit" name="login" value="Влез"></td>
                </tr>
               </table>
      </form> 
</body>
</html>