<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Student User</title>

    <link rel="stylesheet"
          href="<?= base_url('css/users.css'); ?>">

</head>

<body>

<div class="form-page">

    <div class="form-card">

        <div class="form-header">

            <h1>Create Student User</h1>

            <p>
                Add a new student account.
            </p>

        </div>

        <?php $LAVA = lava_instance(); ?>

        <?php if (!empty($error)): ?>

            <div class="alert error">
                <?= htmlspecialchars($error); ?>
            </div>

        <?php endif; ?>

        <?php $errors = $LAVA->form_validation->errors(); ?>

        <?php if ($errors): ?>

            <div class="alert error">
                <?= $errors; ?>
            </div>

        <?php endif; ?>

        <form
            method="POST"
            action="<?= base_url('users/create'); ?>">

            <div class="form-group">

                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    placeholder="Enter username"
                    value="<?= htmlspecialchars($_POST['username'] ?? ''); ?>">

            </div>

            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter password">

            </div>

            <div class="form-group">

                <label>Confirm Password</label>

                <input
                    type="password"
                    name="confirm_password"
                    placeholder="Confirm password">

            </div>

            <button
                type="submit"
                class="btn btn-primary full">
                Create User
            </button>

        </form>

        <a
            href="<?= base_url('users'); ?>"
            class="back-link">
            ← Back to Student Users
        </a>

    </div>

</div>

</body>
</html>