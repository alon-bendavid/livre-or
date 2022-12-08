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
    // $printUser = mysqli_fetch_array($query);
    // var_dump($query);
    // print_r($printUser[2]);
    // var_dump($printUser);
}
//fetch information
// if ($printUser == true) {
//     $username = $_POST['loginUsr'];
//     $password = $_POST['loginPwd'];
// }

// $query = $con->query($sql);
// $users = $query->fetch_all();

// if (isset($_POST['loginSub'])) {
//     foreach ($users as $user) {
//         // print_r($user[0]);
//         if ($_POST['loginUsr'] == $user[1]) {
//             print_r($users);
//             if ($_POST['loginPwd'] == $user[2]) {
//                 $_SESSION['user'] = $user[1];
//                 // $_SESSION['userInfo'] = [$user[0], $user[1], $user[2]];
//                 // $_SESSION['userId'] = $user[0];
//                 print_r("welcome "  . $_SESSION['user'] . " you are now logged in");
//             }
//         }
//     }
// }
// var_dump($_POST['loginUsr']);
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