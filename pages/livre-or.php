<?php
include('../includes/connect.php');
include('header.php');
?>

<body>
    <?php
    //create the query 
    $result = mysqli_query($con, "SELECT * FROM commentaires ");
    //echo the table with comments including user infomation
    echo "<table border='1'>
<tr>
<th>Date</th>
<th>From user</th>
<th>Comment</th>

</tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['id_utilisateur'] . "</td>";
        // echo "<td>" . $row['id_utilisateur'] . "</td>";

        echo "<td>" . $row['commentaire'] . "</td>";



        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($con);
    ?>




</body>

</html>