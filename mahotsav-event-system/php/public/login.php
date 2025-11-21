<?php
$prefill_mhid = isset($_GET['mhid']) ? htmlspecialchars($_GET['mhid']) : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="auth-body">

<!-- Animated gradient background -->
<div class="bg-gradient"></div>

<div class="auth-wrapper">
    <div class="auth-card glass-card">

        <h2 class="auth-title">Welcome Back</h2>
        <p class="auth-desc">Login to continue</p>

        <form action="process_login.php" method="POST" class="auth-form">

            <div class="input-group">
                <label>MHID</label>
                <input type="text" name="mhid" value="<?php echo $prefill_mhid; ?>" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="primary-btn">Login</button>

        </form>

        <div class="auth-footer">
            <p>Don't have an account?
                <a href="register.php" class="link">Register</a>
            </p>
        </div>

    </div>
</div>

</body>
</html>
