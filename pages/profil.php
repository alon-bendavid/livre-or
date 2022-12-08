 <?php
    // session_start();
    // var_dump($_SESSION);
    include('header.php');
    include('../includes/connect.php');

    $id = $_SESSION['user'][0];


    // var_dump($usrId);
    if (isset($_POST['editSub'])) {
        // print_r($_POST['editUsr']);

        $editUsr = $_POST['editUsr'];
        // $usrId = $_SESSION['useInfo'][0];
        $editPass = $_POST['editPwd'];
        $rePwd = $_POST['rePwd'];
        if ($editPass == $rePwd) {
            // $sql = "UPDATE utilisateurs SET 'login'=  '" . $_POST['editUsr'] . "'  , 'password'='" . $_POST['editPwd'] . "'   WHERE 'id' = 2 ";
            // $sql =  "UPDATE `utilisateurs` SET `login`='$editUsr',`password`='$editPass' WHERE $usrId";
            $sql = "UPDATE `utilisateurs` SET `login`='$editUsr',`password`='$editPass' WHERE id = $id ";
            $query = $con->query($sql);
            if ($con->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $con->error;
            }
            session_unset();
            session_destroy();
            header('Location: ' . 'connexion.php');
        } else {
            echo "Password dosent match, please make sure you type the same password";
        }
    }


    ?>

 <body>
     <h1>Edit your profile</h1>
     <?php
        // var_dump($_SESSION['user']);
        // var_dump($_SESSION['useInfo'][0]);
        // var_dump($_POST['editUsr']);
        // var_dump($usrId);
        // var_dump($_SESSION['userInfo'][0]);

        ?>
     <div>
         <form action="profil.php" method="post">
             <input type="text" placeholder='New Username' name="editUsr"><br>
             <input type="text" placeholder="New Password" name="editPwd"><br>
             <input type="text" placeholder="Retype password" name="rePwd"><br>
             <button type="submit" name="editSub">Edit</button>
             <!-- <input type="submit" name="editSub">edit</input> -->
         </form>
     </div>
 </body>

 </html>