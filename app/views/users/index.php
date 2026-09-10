<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student User Management</title>

    <link rel="stylesheet"
          href="<?= base_url('css/users.css'); ?>">
</head>

<body>

<div class="page">

    <div class="header">
        <div>
            <h1>Student User Management</h1>
            <p>Manage student accounts and records.</p>
        </div>

        <a href="<?= base_url('users/create'); ?>"
           class="btn btn-primary">
            + Create User
        </a>
    </div>

    <div class="card">

        <div class="card-title">
            <h2>Student Accounts</h2>
            <span><?= count($users); ?> active users</span>
        </div>

        <?php if (empty($users)): ?>

            <div class="empty">
                No student accounts found.
            </div>

        <?php else: ?>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($users as $user): ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($user['id']); ?>
                            </td>

                            <td class="username">
                                <?= htmlspecialchars($user['username']); ?>
                            </td>

                            <td>

                                <div class="actions">

                                    <a
                                        href="<?= base_url('users/edit/' . $user['id']); ?>"
                                        class="btn btn-edit">
                                        Edit
                                    </a>

                                    <a
                                        href="<?= base_url('users/delete/' . $user['id']); ?>"
                                        class="btn btn-delete"
                                        onclick="return confirm('Are you sure you want to delete this account?');">
                                        Delete
                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php endif; ?>

    </div>

</div>

</body>
</html>