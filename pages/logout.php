<?php
include('header.php');
session_start();
session_unset();
session_destroy();
?>

<body>
    <h1>You are now logged off!</h1>
</body>

</html>