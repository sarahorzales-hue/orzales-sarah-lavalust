<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student User Management</title>

    <link rel="stylesheet" href="<?= base_url('public/css/users.css'); ?>">
</head>

<body>

<div class="container">

    <div class="page-header">
        <div>
            <h1>Student User Management</h1>
            <p>Manage student accounts and records.</p>
        </div>

        <a href="<?= base_url('users/create'); ?>" class="button">
            + Create User
        </a>
    </div>

    <div class="section-header">
        <h2>Student Accounts</h2>

        <span>
            <?= count($users); ?> active users
        </span>
    </div>

    <?php if (empty($users)): ?>

        <div class="empty">
            No active users found.
        </div>

    <?php else: ?>

        <div class="table-container">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Year</th>
                        <th>Course</th>
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

                            <td>
                                <?= htmlspecialchars($user['firstname']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['lastname']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['year']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['course']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['username']); ?>
                            </td>

                            <td class="actions">

                                <a href="<?= base_url('users/edit/' . $user['id']); ?>">
                                    Edit
                                </a>

                                <a
                                    href="<?= base_url('users/delete/' . $user['id']); ?>"
                                    onclick="return confirm('Are you sure you want to delete this user?');"
                                >
                                    Delete
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    <?php endif; ?>

</div>

</body>
</html>