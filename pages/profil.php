<?php
session_start();

include('header.php');
include('../includes/connect.php');

// session_start();

$editUsr = $_POST['editUsr'];
$usrId = $_SESSION['useInfo'][0];
$editPass = $_POST['editPwd'];
var_dump($usrId);
if (isset($_POST['editSub'])) {
    // $sql = "UPDATE utilisateurs SET login='$editUsr', password='$editPass' WHERE id='$usrId'";
    $sql =  "UPDATE `utilisateurs` SET `login`='$editUsr',`password`='$editPass' WHERE $usrId";
    $query = $con->query($sql);
}

if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
?>

<body>
    <h1>edit your profile</h1>
    <?php
    // var_dump($_SESSION['user']);
    // var_dump($_SESSION['useInfo'][0]);
    // var_dump($_POST['editUsr']);
    // var_dump($usrId);
    var_dump($_SESSION['userInfo'][0]);

    ?>
    <div>
        <form action="profil.php" method="post">
            <input type="text" placeholder='New Username' name="editUsr"><br>
            <input type="text" placeholder="New Password" name="editPwd"><br>
            <input type="text" placeholder="Retype password" name="repPwd"><br>

            <button type="submit" name="editSub">edit</button>
        </form>
    </div>
</body>






</html>