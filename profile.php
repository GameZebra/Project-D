<?php
    require('header.php');
?>
<body>
    <header>
        <!--Navigation bar-->
        <ul id="nav-bar" >
            <li><a href="index.php">Начало</a></li>
            <li><a herf="aboutUs.php">За нас</a></li>
            <?php
                if(isset($_SESSION['userId'])){
                    echo '<li><a class="active" herf="profile.php">Профил</a></li>
                    <li class="login"><a href="logout.inc.php">Излез</a></li>';
                }
                else{
                    echo '<li class="login"><a href="login.php">Влез</a></li>
                    <li class="login"><a href="register.php">Регистрирай се</a></li>';
                }
            ?>
        </ul>
    </header>
        <!-- header start -->
        <div id="header" class="section">
            <img alt="" class="img-circle" src="images\ProfilePicture0.jpg">
            <p>error_username_not_found</p>
        </div>
            <!-- header end -->
            
            <!-- About Me section start -->
            <hr width = "50%"/>
            <div class="section">
                <h1><span>About Me</span></h1>
                <p>
                    Hey! I'm <strong>Alex</strong>. Coding has changed my world. It's not just about apps. Learning to code gave me 
                    <i>problem-solving skills</i> and a way to communicate with others on a technical level. I can also develop 
                    websites and use my coding skills to get a better job. And I learned it all at <strong>SoloLearn</strong> where 
                    they build your self-esteem and keep you motivated. Join me in this rewarding journey. You'll have fun, get help, 
                    and learn along the way!
                </p>
            </div>
            <!-- About Me section end -->
            
</body>
</html>