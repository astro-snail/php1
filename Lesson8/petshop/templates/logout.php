<?php
    if (isset($_SESSION['error'])) {
        $message = $_SESSION['error'];
        unset($_SESSION['error']);
    }
?>

<div class="page top-overlap">
    <div class="section-header uppercase">Log out</div>
    <div class="error"><?= $message; ?></div>
    <form action="user.php" method="POST">
        <button class="btn btn-primary" type="submit" name="action" value="logout">Log out</button>
    </form>
</div>   