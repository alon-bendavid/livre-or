<?php
// session_start();
include('header.php');

include('../includes/connect.php');


if (mysqli_connect_errno()) {
    die('conecnection error' . mysqli_connect_error());
}
if (isset($_POST['loginSub'])) {
    // echo "it works";
    $username = $_POST['loginUsr'];
    $password = $_POST['loginPwd'];

    $sql = "SELECT * FROM utilisateurs WHERE login='$username'";
    $query = mysqli_query($con, $sql);
    $printUser = mysqli_fetch_array($query);
    if (!$printUser == null) {
        if ($password == $printUser[2]) {
            echo "Welcome $printUser[1] You are now logged in";
            $_SESSION['user'] = $printUser;
            header('Location: ' . 'index.php');
        } else {
            echo "Password is worng, please try again";
        }
    } else {
        echo "No user found with that name";
    }
}

?>

<body>
    <h1>Login</h1>
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