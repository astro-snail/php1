<?php
    if (isset($_SESSION['error'])) {
        $message = $_SESSION['error'];
        unset($_SESSION['error']);
    }
?>

<div class="page top-overlap">
    <div class="section-header uppercase">Log in</div>
    <div class="error"><?= $message; ?></div>
    <form action="controller/user.php" method="POST">
        <label for="login">User name:</label>
        <input id="login" class="form-control" type="text" name="login" placeholder="Your user name"><br>
        <label for="password">Password:</label>
        <input id="password" class="form-control" type="password" name="password" placeholder="Your password"><br>
        <button class="btn btn-primary" type="submit" name="action" value="login">Log in</button>
    </form>
</div>    