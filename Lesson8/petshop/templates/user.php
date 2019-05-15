<?php
    if (isset($_SESSION['error'])) {
        $message = $_SESSION['error'];
        unset($_SESSION['error']);
    }
?>

<div class="page top-overlap">
    <div class="section-header uppercase">User Profile</div>
    <div class="error"><?= $message; ?></div>
    <form action="user.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
        <input type="hidden" name="administrator" value="<?= $user['administrator']; ?>">
        <div class="form-group">
            <label for="login">User name</label>
            <input id="login" class="form-control" type="text" name="login" value="<?= $user['login'] ?>" placeholder="Your user name">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" class="form-control" type="password" name="password" placeholder="Your new password">
        </div>
        <div class="form-group">
            <label for="firstName">First name</label>
            <input id="firstName" class="form-control" type="text" name="first_name" value="<?= $user['first_name'] ?>" placeholder="First name">
        </div>
        <div class="form-group">
            <label for="lastName">Last name</label>
            <input id="lastName" class="form-control" type="text" name="last_name" value="<?= $user['last_name'] ?>" placeholder="Last name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" class="form-control" type="email" name="email" value="<?= $user['email'] ?>" placeholder="Email Address">
        </div>
        <button class="btn btn-primary" type="submit" name="action" value="updateUser">Update</button>
    </form>
</div>    