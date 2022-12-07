<?php
session_start();
include('header.php');

include('../includes/connect.php');

if (mysqli_connect_errno()) {
    die('conecnection error' . mysqli_connect_error());
}
//fetch information
$sql = "SELECT * FROM utilisateurs";
$query = $con->query($sql);
$users = $query->fetch_all();

if (isset($_POST['loginSub'])) {
    foreach ($users as $user) {
        // print_r($user[0]);
        if ($_POST['loginUsr'] == $user[1]) {
            print_r($users);
            if ($_POST['loginPwd'] == $user[2]) {
                $_SESSION['user'] = $user[1];
                // $_SESSION['userInfo'] = [$user[0], $user[1], $user[2]];
                // $_SESSION['userId'] = $user[0];
                print_r("welcome "  . $_SESSION['user'] . " you are now logged in");
            }
        }
    }
}
var_dump($_POST['loginUsr']);
?>

<body>
    <h1>sign in</h1>
    <?php

    ?>

    <form action="connexion.php" method="post">
        <div class="box">
            <input type="text" placeholder="username" name="loginUsr"><br required>

            <input type="text" placeholder="password" name="loginPwd" required><br>

            <button type="submit" name="loginSub">Sign</button>
        </div>

    </form>

</body>

</html>