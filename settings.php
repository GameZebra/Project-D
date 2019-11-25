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
        <!-- add the option to edit profile picture -->
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
        <div class="section">
        <form id="settings" action="settings.inc.php" onsubmit="return validateForm()" method="POST"style="overflow: auto">
            <table>
                <?php
                if(!isset($_POST['register'])){
                    echo'<tr>
                    <td>Потребителско име :</td> <td><input type="text" name="username" id="username" placeholder="Потребителско име"</td>
                   </tr>
                   <td>New Password :</td> <td><input type="password" name="password" id="password" placeholder="New Password"></td><br>
                   </tr>
                   <tr>
                   <td>Confirm New Password :</td> <td><input type="password" name="cpwd" placeholder="Confirm New Password"><br>
                   </tr>';
                }
                ?>
                    <tr>
                    <td style="margin-top: 18px;">име :</td> <td><input type="text" name="fName" id="fName" placeholder="Потребителско име"></td>
                    <td>Фамилия :</td> <td><input type="text" name="lName" id="lName" placeholder="Потребителско име"></td>
                    </tr>
                    <tr>
                    <td>Дата на раждане :</td> <td><input type="date" name="date" id="date" placeholder="Потребителско име"></td>
                    <td>Пол :</td> 
                    <td> 
                        <input type="radio" name="gender" value="мъж"> Male
                        <input type="radio" name="gender" value="жена"> Female
                        <input type="radio" name="gender" value="друг"> Other  
                    </td>
                    </tr>
                    <tr><td>About me :</td><td colspan="4"><textarea name="aboutMe" placeholder="Write something about yourself" style="margin: 8px, 0px; border: 1px solid #72E89F; width: 90%; border-radius: 4px;resize: none;padding: 12px 20px;height: 80px;"></textarea></td></tr>
                    <tr>                      
                    <td style="width:90%" colspan="4"><input type="submit" name="save" value="Запази"></td>
                    </tr>
                </table>
        </form> 
        </div>
</body>
</html>