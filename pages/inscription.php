<?php
include('header.php');
include('../includes/sign_up.php');

?>

<body>
    <h1>sign up page</h1>
    <form action="inscription.php" method="post">
        <div class="box">
            <input type="text" placeholder="username" name="username"><br required>
            <input type="text" placeholder="password" name="password" required><br>
            <input type="text" placeholder="retype password" name="repass" required><br>
            <button type="submit" name="submit">Sign</button>

        </div>

    </form>

</body>

</html>