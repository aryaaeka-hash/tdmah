<?php
session_start();
require "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// fetch user info
$stmt = $conn->prepare("SELECT * FROM registrations WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

include "header.php";
?>

<div class="content">
    <div class="profile-card">
        <h2>Profile Settings</h2>

        <form class="profile-form" action="profile_update.php" method="POST">
            <div class="form-group">
                <label>MHID</label>
                <input type="text" value="<?= htmlspecialchars($user['mhid']) ?>" disabled>
            </div>

            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" value="<?= htmlspecialchars($user['firstname']) ?>" required>
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lastname" value="<?= htmlspecialchars($user['lastname']) ?>" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>

            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="dob" value="<?= htmlspecialchars($user['dob']) ?>" required>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <select name="gender" required>
                    <option value="Male" <?= $user['gender']=="Male" ? "selected" : "" ?>>Male</option>
                    <option value="Female" <?= $user['gender']=="Female" ? "selected" : "" ?>>Female</option>
                    <option value="Other" <?= $user['gender']=="Other" ? "selected" : "" ?>>Other</option>
                </select>
            </div>

            <button type="submit">Save Changes</button>
        </form>
    </div>
</div>

<?php include "footer.php"; ?>