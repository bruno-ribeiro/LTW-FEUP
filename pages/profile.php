<?php
session_start();
$title = "Welcome";      // Set the title
include_once "header.php";
include_once "../dbActions/user.php";
?>

    <h1>Edit Profile</h1>

    <?php

    $username = $_SESSION['login-user'];
    echo $username;

    echo 'fullName';
    echo getUserInfoByUserName($username,'fullName');

    $id=getIdByUserName($username);
    echo "id";
    echo $id;
    ?>

    <body>
    <div id="container">
        <div id="left">
            <img class="img-item" src="../assets/profile-icon.png"><br>
            <p>Upload a different photo...</p>
        </div>
        <div id="right">
            <form action="../database/editProfile.php" method="post">
                First name:<br>
                <input type="text" name="fullName" placeholder="<?php echo $fullName?>"><br>
                Last name:<br>
                <input type="text" name="userName" placeholder="<?php echo $username?>"><br>
             <!--   Date:<br>
                <input type="date" name="birtdDate" placeholder=""><br>-->
                <input type="submit" value="Save Changes">
            </form>
            <button class="button-item" type="button" onclick="location.href='index.php';">Exit</button>
        </div>
        <div class="clear"></div>
    </div>
    </body>

    <?php echo $id?>


<?php
include "footer.php";
?>