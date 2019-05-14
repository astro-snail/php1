<div class="page top-overlap">
    <div class="section-header uppercase">User Profile</div>
    <form action="admin.php?c=user" method="POST">
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
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
            <input id="email" class="form-control" type="email" name="email" value="<?= $user['email'] ?>" placeholder="Email address">
        </div>
        <div class="form-check">
            <input id="administrator" class="form-check-input" type="checkbox" name="administrator" value="true" <?= (bool)$user['administrator'] ? "checked" : "" ?>>
            <label class="form-check-label" for="administrator">Administrator</label>
        </div>
		<?php if (!empty($user['id'])) { ?>
			<button class="btn btn-primary" type="submit" name="action" value="updateUser">Update</button>
		<?php } else { ?>
			<button class="btn btn-primary" type="submit" name="action" value="createUser">Create</button>
		<?php } ?>	
    </form>
</div>    