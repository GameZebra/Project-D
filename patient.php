<?php
    require('header.php');
    require('connect.php');
?>
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
                        if($_SESSION['status']!=='pleb'){
                            echo'<li><a href="patient.php" class="active">Пациенти</a></li>';
                        }
                    }
                    else{
                        echo '<li class="login"><a href="login.php">Влез</a></li>
                        <li class="login"><a href="register.php">Регистрирай се</a></li>';
                    }
                ?>
            </ul>
        </header>
        <div class="section">
                <h1 style="size:120%">Списък с пациентите</h1>
        </div>
        <div class="section">
            <table width="100%" id="tableOut" style="border-collapse: collapse;">
                <tr>
                    <th colspan="2">Име</th>
                    <th>Дневник</th>
                    <th>Дневник</th>
                    <th>рожденна дата</th>
                    <th>пол</th>
                    <!-- <th>за мен</th> -->
                </tr>
            <?php
            $id=$_SESSION['userId'];
            $sql = "SELECT * FROM profiles WHERE status='pleb'";
            $result = $conn->query($sql);
            if ($result -> num_rows > 0)
            {
            while ($row = $result->fetch_assoc()){
                $link = 'diaryView.php?userId='.$row['user_id'];
                    echo"
                    <tr><a href='index.php?da'>
                        <th>".$row['firstName']."</th>
                        <th>".$row['lastName']."</th>
                        <th><a class='diaryLink'href='$link'>".$row['username']."</a></th>
                        <th>".$row['email']."</th>
                        <th>".$row['dateOfBirth']."</th>
                        <th>".$row['gender']."</th>
                        <!--   <th class='about'>".$row['aboutMe']."</th> -->
                    </tr>
                    ";
                }
                echo "</table>";
            }?>
    </body>
</html>    