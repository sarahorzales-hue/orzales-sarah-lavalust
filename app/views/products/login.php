<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Product Management</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #ffffff;
            color: #000000;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            width: 100%;
            max-width: 380px;
            padding: 30px;
            border: 1px solid #000000;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 24px;
            font-weight: 600;
        }

        .subtitle {
            margin: 0 0 25px;
            font-size: 14px;
        }

        .error {
            border: 1px solid #000000;
            padding: 10px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #000000;
            background: #ffffff;
            color: #000000;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            border: 1px solid #000000;
            background: #000000;
            color: #ffffff;
            font-size: 14px;
            cursor: pointer;
        }

        button:hover {
            background: #ffffff;
            color: #000000;
        }

    </style>
</head>

<body>

<div class="login-container">

    <h1>Product Management</h1>

    <p class="subtitle">Login to continue</p>

    <?php if (!empty($error)): ?>
        <div class="error">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?= base_url('login'); ?>">

        <label for="username">Username</label>

        <input
            type="text"
            id="username"
            name="username"
            required
        >

        <label for="password">Password</label>

        <input
            type="password"
            id="password"
            name="password"
            required
        >

        <button type="submit">
            Login
        </button>

    </form>

</div>

</body>
</html>