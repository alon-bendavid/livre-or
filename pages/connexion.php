<?php
// session_start();
// include('header.php');
include('../includes/head.php');
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
            echo "<p class='error'>Password is worng, please try again</p>";
        }
    } else {
        echo "<p class='error'>No user found with that name</p>";
    }
}
$con->close();

?>

<body>
    <div class="connection_body">
        <div class="photo ">

            <img class="mainPhoto" src="..\media\pexels-photo-1078983.jpg" alt="connection age photo">
            <img class="logo" src="..\media\logo-01.png" alt="connection age photo">

            <h3 class="photo_text2">Send a comment in a bottle!</h3>
            <h2 class="photo_text">Welcome aboard!</h2>
        </div>
        <?php

        ?>

        <div class="box ">
            <div class="connection_form">
                <h2>Sign in!</h2>
                <form action="connexion.php" method="post">
                    <input type="text" placeholder="username" name="loginUsr"><br required>

                    <input type="password" placeholder="password" name="loginPwd" required><br>

                    <button type="submit" name="loginSub">
                        <h2 class="sign">Sign in</h2>
                    </button>

                </form>
                <h3 class="small_link"><a href="inscription.php">
                        Not a member yet? <strong>Sign Up!</strong>
                    </a></h3>
                <a class="logoGit" href="https://github.com/alon-bendavid/livre-or"><img src="..\media\GitHub-Logo.png" alt=""></a>
            </div>
        </div>
    </div>
</body>

</html>