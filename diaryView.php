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
        <div id="diary-header" class="section backgroundIMG">
            <img alt="" class="img-circle" src="images\ProfilePicture0.jpg">
            <?php
            if(isset($_GET['userId'])){
                $id=$_GET['userId'];
            }
            $search = "SELECT * FROM profiles WHERE user_id='".$id."'";
            $sql1 = $conn->query($search);
            if ($sql1->num_rows > 0)
            {
             $row = $sql1->fetch_assoc();
             print_R("<p>".$row['firstName']." ".$row['lastName']."</p>");
            }
            else{
                echo'<p>error_username_not_found</p>';
            }
            ?>
        </div>
        <div class="section">
            <table width="100%" id="tableOut" style="border-collapse: collapse;">
                <tr>    
                    <th rowspan = '2'>Дата</th>
                    <th colspan='3'>инсулинови дози</th>
                    <th colspan='7'>кръвна глюкоза</th>
                </tr>
                <tr>
                    <th>сутрин</th>
                    <th>обед</th>
                    <th>вечер</th>

                    <th>преди закуска</th>
                    <th>след закуска</th>
                    <th>преди обяд</th>
                    <th>след обяд</th>
                    <th>преди вечеря</th>
                    <th>след вечеря</th>
                    <th>нощ</th>
                </tr>
            <?php
            if(isset($_GET['userId'])){
                $id=$_GET['userId'];
            }
            $sql = "SELECT * FROM bloodglucose WHERE user_id='".$id."'";
            $result = $conn->query($sql);
            if ($result -> num_rows > 0)
            {
            while ($row = $result->fetch_assoc()){
                    echo"
                    <tr>
                        <th>".$row['day']."</th>
                        <th>".$row['insulin_before_brekfast']."</th>
                        <th>".$row['insulin_before_lunch']."</th>
                        <th>".$row['insulin_before_dinner']."</th>

                        <th>".$row['blood_before_brekfast']."</th>
                        <th>".$row['blood_after_brekfast']."</th>
                        <th>".$row['blood_before_lunch']."</th>
                        <th>".$row['blood_after_lunch']."</th>
                        <th>".$row['blood_before_dinner']."</th>
                        <th>".$row['blood_after_dinner']."</th>
                        <th>".$row['blood_night']."</th>
                    </tr>
                    ";
                }
                echo "</table>";
            }
                else{
                }
            
            ?>
            </table>

        </div>