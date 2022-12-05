<?php
include('connect.php');

if (mysqli_connect_errno()) {
    die('conecnection error' . mysqli_connect_error());
}

$request = $con->query("SELECT * from utilisateurs");
$usernames = [];
while (($fetched_table = $request->fetch_array())  != 0) {
    $usernames[] =   $fetched_table[1];
}
print_r($usernames);
print_r($request);
print_r($fetched_table);




//check if username already exist
$exiest = true;
if (isset($_POST['submit'])) {
    foreach ($usernames as $user => $x) {
        if ($_POST['username'] == $x) {
            echo " username already exists please choose another name";
            $exiest = true;
        } else {
            $exiest = false;
        }
    }
    //pass check
    $passCheck = 0;
}
if (isset($_POST['submit'])) {
    if ($_POST['repass']  !== $_POST['password']) {
        echo "password doesnt match, please retype password";
        die();
    } elseif ($_POST['password'] === $_POST['repass']) {

        $passCheck = true;
    }
}

//singing up the user into the database
if (isset($_POST['submit']) &&  $exiest == 0 && $passCheck = true) {

    var_dump($passCheck);

    $username = $_POST['username'];

    $pwd = $_POST['password'];
    $pwdRep = $_POST['repass'];
    // $currectUsr = $_SESSION[$_POST['username']];
    // echo "conecction successful";
    $sql = "INSERT INTO utilisateurs (`id`, `login`,`password`) VALUES (NULL,?,?)";
    $stmt = mysqli_stmt_init($con);


    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($con));
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $pwd);
    mysqli_stmt_execute($stmt);
    echo "user hes successfully created";
    // sleep(2);
    header('Location: ' . 'connexion.php');
}
