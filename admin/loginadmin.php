<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="registeradmin.css"> <!-- Ensure correct CSS path -->
</head>
<body>

    <div class="register-container">
        <h1>Admin Login</h1>

        <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid') : ?>
            <p style="color: red; text-align: center;">Invalid email or password</p>
        <?php endif; ?>

        <form action="../php/process.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password (Phone Number):</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="login_manager">Login</button>
        </form>
    </div>

</body>
</html>
