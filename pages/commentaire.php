<?php
// session_start();

include('header.php');
include('../includes/connect.php');
date_default_timezone_set('europe/paris');
//fetch information
if (isset($_SESSION['user'])) {
}
if (isset($_POST['subComment'])) {
    $comment = $_POST['comment'];
    $usrId = $_POST['usrId'];
    $date = $_POST['date'];
    // echo $comment;
    // echo $usrId;
    // echo $date;
    //make query to check if username already exist
    $sql = "SELECT * FROM commentaires ";
    // $query = $con->query($sql);
    $query = mysqli_query($con, $sql);
    $comments = mysqli_fetch_array($query);
    // var_dump($query);
    // print_r($comments[2]);
    // var_dump($comments);
    //create the user and insert into databasse if username dosent exist





    //insert information into databse
    $sql = "INSERT INTO `commentaires`(`id`, `commentaire`, `id_utilisateur`, `date`) VALUES (null,'$comment','$usrId','$date')";
    $query = mysqli_query($con, $sql);
    echo "Comment hes been sent!";
}




?>


<body>
    <h1>sign up page</h1>
    <form action="" method="post">
        <div class="box">
            <textarea name="comment" id="" cols="30" rows="10" required></textarea>
            <input type="hidden" name="usrId" value="<?php echo $_SESSION['user'][0] ?>"><br>
            <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s') ?>"><br>

            <button type="submit" name="subComment">Send</button>

        </div>

    </form>

</body>

</html>