<!DOCTYPE html>
<html lang="bg">
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
                    echo '<li><a href="some.php">Профил</a></li>
                    <li class="login"><a href="logout.inc.php">Излез</a></li>';
                }
                else{
                    echo '<li class="login"><a href="login.php">Влез</a></li>
                    <li class="login active"><a href="register.php">Регистрирай се</a></li>';
                }
            ?>
        </ul>
    </header>
    <section style="margin-top: 50px; margin-left: 20%;">
        <form id="register" action="register.inc.php" onsubmit="return validateForm()" method="POST">
            <table>
                    <tr>
                     <td>Потребителско име :</td> <td><input type="text" name="username" id="username" placeholder="Потребителско име" required></td>
                    </tr>
                    <tr>
                    <td>E-mail :</td> <td><input type="text" name="email" id="email" placeholder="E-mail" required></td><br>
                    </tr>
                    <tr>
                    <td>Password :</td> <td><input type="password" name="password" id="password" placeholder="Password" required></td><br>
                    </tr>
                    <tr>
                    <td>Confirm Password :</td> <td><input type="password" name="cpwd" placeholder="Confirm Password" required><br>
                    </tr>
                    <tr>
                    <td colspan="2"><input type="submit" name="register" value="Регистрирай се"></td>
                    </tr>
                </table>
        </form> 
    </section>
</body>
</html>