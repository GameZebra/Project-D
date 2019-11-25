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
        <div class="section">
            <form action="dailyInput.inc.php" onsubmit="return validateForm()" method="POST"style="overflow: auto">
            <table style="text-align: center;">
                <tr>
                   <td> дата</td>
                   <td> daytaime</td>
                   <td> кръвна захар</td>
                   <td> инсулин</td>
                   <td style="hight:100% width:90%" rowspan="2"><input type="submit" name="input" id="input" value="въведи"></td>
                </tr>
                <tr>
                    <script>
                        document.getElementById('datePicker').value = new Date().toDateInputValue();
                    </script>
                    <td><input type="date" name="datePicker" id="datePicker"> </td>
                <td>    
                <select name="dayTime" id="dayTime">
                    <option value="before_brekfast">преди закуска</option>
                    <option value="after_brekfast">след закуска</option>
                    <option value="before_lunch">преди обяд</option>
                    <option value="after_lunch">след обяд</option>
                    <option value="before_dinner">преди вечеря</option>
                    <option value="after_dinner">след вечеря</option>
                    <option value="night">нощ</option>
                </select>
                </td>
                <td><input type="text" name="bloodGlucose" id="bloodGlucose" placeholder="Ниво на кръвната захар"></td>
                <td><input type="text" name="insuline" id="insuline" placeholder="Инсулин"></td>
                </tr>
            </table>
            </form>


        </div>