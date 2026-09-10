<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Student User</title>

    <link rel="stylesheet" href="/css/users.css">
</head>

<body>

<div class="form-container">

    <div class="page-header">
        <div>
            <h1>Edit Student User</h1>
            <p>Update student account information.</p>
        </div>
    </div>

    <?php if (!empty($error)): ?>

        <div class="error">
            <?= htmlspecialchars($error); ?>
        </div>

    <?php endif; ?>

    <?php $LAVA = lava_instance(); ?>

    <div class="validation-errors">
        <?= $LAVA->form_validation->errors(); ?>
    </div>

    <form method="POST">

        <div class="form-group">
            <label>First Name</label>
            <input
                type="text"
                name="firstname"
                value="<?= htmlspecialchars($user['firstname'] ?? ''); ?>"
            >
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input
                type="text"
                name="lastname"
                value="<?= htmlspecialchars($user['lastname'] ?? ''); ?>"
            >
        </div>

        <div class="form-group">
            <label>Year</label>

            <select name="year">

                <option value="">Select Year</option>

                <option value="1st" <?= (($user['year'] ?? '') === '1st') ? 'selected' : ''; ?>>
                    1st Year
                </option>

                <option value="2nd" <?= (($user['year'] ?? '') === '2nd') ? 'selected' : ''; ?>>
                    2nd Year
                </option>

                <option value="3rd" <?= (($user['year'] ?? '') === '3rd') ? 'selected' : ''; ?>>
                    3rd Year
                </option>

                <option value="4th" <?= (($user['year'] ?? '') === '4th') ? 'selected' : ''; ?>>
                    4th Year
                </option>

            </select>
        </div>

        <div class="form-group">
            <label>Course</label>

            <input
                type="text"
                name="course"
                value="<?= htmlspecialchars($user['course'] ?? ''); ?>"
            >
        </div>

        <div class="form-group">
            <label>Username</label>

            <input
                type="text"
                name="username"
                value="<?= htmlspecialchars($user['username'] ?? ''); ?>"
            >
        </div>

        <div class="form-group">
            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Leave blank to keep current password"
            >
        </div>

        <div class="form-group">
            <label>Confirm Password</label>

            <input
                type="password"
                name="confirm_password"
                placeholder="Leave blank to keep current password"
            >
        </div>

        <div class="form-actions">

            <button type="submit">
                Update User
            </button>

            <a href="<?= base_url('users'); ?>">
                Back to Users
            </a>

        </div>

    </form>

</div>

</body>
</html>