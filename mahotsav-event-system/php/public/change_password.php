<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include "header.php";
?>

<div class="content">
    <div class="profile-card">
        <h2>Change Password</h2>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert error">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert success">
                Password updated successfully!
            </div>
        <?php endif; ?>

        <form class="profile-form" action="change_password_action.php" method="POST">
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" name="current" required>
            </div>

            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new" required>
            </div>

            <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" name="confirm" required>
            </div>

            <button type="submit">Update Password</button>
        </form>
    </div>
</div>

<?php include "footer.php"; ?>