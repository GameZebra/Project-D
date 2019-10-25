<?php
    require('header.php');
?>
    <body>
        <header>
            <!--Navigation bar-->
            <ul id="nav-bar">
                <li><a href="index.php">Начало</a></li>
                <li><a href="aboutUs.php" class="active">За нас</a></li>
                <?php
                    if(isset($_SESSION['userId'])){
                        echo '<li><a href="profile.php">Профил</a></li>
                        <li class="login"><a href="logout.inc.php">Излез</a></li>';
                    }
                    else{
                        echo '<li class="login"><a href="login.php">Влез</a></li>
                        <li class="login"><a href="register.php">Регистрирай се</a></li>';
                    }
                ?>
            </ul>
        </header>
    </body>
</html>