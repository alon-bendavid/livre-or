<?php
// session_start();
include('header.php');
if (!isset($_SESSION['user'])) {
    header('Location: ' . 'connexion.php');
}
?>

<body>
    <h1>Home page</h1>
    <?php
    echo "welcome " . $_SESSION['user'][1] . " you are now logged in";

    ?>
</body>

</html>