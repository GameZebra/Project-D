<?php
    require('header.php');
    require('connect.php');
?>
<body>
    <header>
        <!--Navigation bar-->
        <ul id="nav-bar" >
            <li><a href="index.php">Начало</a></li>
            <li><a href="aboutUs.php">За нас</a></li>
            <?php
                if(isset($_SESSION['userId'])){
                    echo '<li><a class="active" href="profile.php">Профил</a></li>
                    <li class="login"><a href="logout.inc.php">Излез</a></li>';
                    if($_SESSION['status']!=='pleb'){
                        echo'<li><a href="patient.php">Пациенти</a></li>';
                    }
                }
                else{
                    echo '<li class="login"><a href="lo gin.php">Влез</a></li>
                    <li class="login"><a href="register.php">Регистрирай се</a></li>';
                }
            ?>
        </ul>
    </header>
        <!-- header start -->
        <div id="header" class="section backgroundIMG">
            <img alt="" class="img-circle" src="images\ProfilePicture0.jpg">
            <?php
            $id=$_SESSION['userId'];
            $search = "SELECT * FROM profiles WHERE user_id='".$id."'";
            $sql1 = $conn->query($search);
            if ($sql1 -> num_rows > 0)
            {
             $row = $sql1->fetch_assoc();
             print_R("<p>".$row['username']."</p>");
            }
            else{
                echo'<p>error_username_not_found</p>';
            }
            ?>
        </div>
            
            <!-- About Me section start -->
            <hr width = "50%"/>
            <div class="section">
                <h1><span>About Me</span></h1>
                <p style="text-align: center;">
                    <?php
                        print_R($row['aboutMe']);
                    ?>
                </p> 
            </div>
            <!-- About Me section end -->
        <div class="section" style="text-align: center">
        <a href="dailyInput.php" class="button">Въведи</a><br>
        <a href="diary.php" class="button">Дневник</a><br>
        <a href="settings.php" class="button">Редактиране на профила</a>

        </div>
</body>
</html>