<?php
include('../includes/connect.php');
include('header.php');




?>


<body>
    <?php
    //randomise profile picture
    // $dir_path = "..\media";

    // $files = scandir($dir_path);

    // $count = count($files);
    // $index = rand(2, ($count - 1));
    // $filename = $files[$index];

    if (!isset($_SESSION['user'])) {
        echo "You have to be connected in order to write a comment.";
    }
    //create the query 
    $result = mysqli_query($con, "SELECT * FROM commentaires ");
    //echo the table with comments including user infomation
    echo "<table class='post' >
<tr>
<th>Date</th>
<th class='date'>From user</th>
<th class='comment'>Comment</th>

</tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td class='date'>"   . $row['date'] . "</td>";
        echo "<td class='profil'>" . '<img src="..\media\profile.png" alt="">' . $row['id_utilisateur'] . "</td>";
        //line to randomise profile picture
        // echo "<td class='profil'>" . '<img src="' . $dir_path . "/" . $filename++ . '" alt="' . $filename . '"">' . $row['id_utilisateur'] . "</td>";

        // echo "<td>" . $row['id_utilisateur'] . "</td>";

        echo "<td>" . $row['commentaire'] . "</td>";



        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($con);
    ?>




</body>

</html>