<?php
// session_start();

include('header.php');
include('../includes/connect.php');
//fetch information
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repass = $_POST['repass'];
    //make query to check if username already exist
    $sql = "SELECT * FROM utilisateurs WHERE login='$username'";
    // $query = $con->query($sql);
    $query = mysqli_query($con, $sql);
    $printUser = mysqli_fetch_array($query);
    // var_dump($query);
    // print_r($printUser[2]);
    // var_dump($printUser);
    //create the user and insert into databasse if username dosent exist
    if ($printUser == null) {
        if ($password == $repass) {

            echo "Acount hes successfully created!";
            //insert information into databse
            $sql = "INSERT INTO `utilisateurs`(`id`, `login`, `password`) VALUES (null,'$username','$password')";
            $query = mysqli_query($con, $sql);
            header('Location: ' . 'connexion.php');
        } elseif ($password != $repass) {
            echo "Password doesnt match, please retype password";
        }
    } else {
        echo "Username already taken, please choose another username";
    }
}


$con->close();

?>


<body class="body_signUP">
    <div class="sign_up_box center">
        <div class="signup center">
            <h1>sign up page</h1>
            <form action="inscription.php" method="post">
                <input type="text" placeholder="username" name="username"><br required>
                <input type="password" placeholder="password" name="password" required><br>
                <input type="password" placeholder="retype password" name="repass" required><br>
                <button type="submit" name="submit">
                    <p class="sign">Sign Up!</p>
                </button>


            </form>
        </div>
        <!-- </div> -->
</body>

</html>