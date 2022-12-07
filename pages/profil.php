 <?php
    session_start();
    var_dump($_SESSION);
    include('header.php');
    include('../includes/connect.php');


    // var_dump($usrId);
    if (isset($_POST['editSub'])) {
        print_r($_POST['editUsr']);
        $id = $_SESSION['userId'];
        $editUsr = $_POST['editUsr'];
        // $usrId = $_SESSION['useInfo'][0];
        $editPass = $_POST['editPwd'];
        // $sql = "UPDATE utilisateurs SET 'login'=  '" . $_POST['editUsr'] . "'  , 'password'='" . $_POST['editPwd'] . "'   WHERE 'id' = 2 ";
        // $sql =  "UPDATE `utilisateurs` SET `login`='$editUsr',`password`='$editPass' WHERE $usrId";
        $sql = "UPDATE `utilisateurs` SET `login`='$editUsr',`password`='$editPass' WHERE id = $id ";
        $query = $con->query($sql);
        if ($con->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }


    ?>

 <body>
     <h1>edit your profile</h1>
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
             <input type="text" placeholder="Retype password" name="repPwd"><br>

             <input type="submit" name="editSub">edit</input>
         </form>
     </div>
 </body>

 </html> -->