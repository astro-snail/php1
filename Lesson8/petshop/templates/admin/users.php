<div class="page top-overlap">
    <div class="section-header uppercase">User Management</div>
    <table>
        <thead>
            <tr>
                <th>Login</th>
                <th>Email</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Administrator</th>
                <th>&nbsp;</th>
            </tr>    
        </thead>
        <tbody>
            <?php foreach($users as $user) { ?>  
            <tr>
                <td>
                    <a href="admin.php?c=user&id=<?= $user['id']; ?>" title="View user">
                        <?= $user['login']; ?>
                    </a>
                </td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['first_name']; ?></td>
                <td><?= $user['last_name']; ?></td>
                <td class="center">
                    <?php if ((bool)$user['administrator']) { ?>
                        <img src="images/icons8-checkmark-48.png">
                    <?php } ?>
                </td>
                <td class="center">
                    <form action="admin.php?c=user" method="POST">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <input type="hidden" name="action" id="<?= $user['id']; ?>">
                        <a href="admin.php?c=user&id=<?= $user['id']; ?>" title="Update user">
                            <img src="images/icons8-edit-file-32.png">
                        </a>
                        <a href="javascript:;" onclick="document.getElementById('<?= $user['id']; ?>').value='deleteUser';parentNode.submit();" title="Delete user">
                            <img src="images/icons8-trash-can-32.png">
                        </a>
                    </form>    
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
	<button class="btn btn-primary" onclick="window.location.href = 'admin.php?c=user&create=true';">New user</button>
</div>