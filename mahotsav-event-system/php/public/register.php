<?php require_once "../config/db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="auth-wrapper">

    <h2>User Registration</h2>

    <form action="success.php" method="POST">

        <label>First Name</label>
        <input type="text" name="fname" required>

        <label>Last Name</label>
        <input type="text" name="lname" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Date of Birth</label>
        <input type="date" name="dob" required>

        <label>Phone Number</label>
        <input type="text" name="phone" required>

        <label>Gender</label>
        <select name="gender" required>
            <option value="">Select</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="cpassword" required>

        <hr>

        <label>Select State</label>
        <select id="state" name="state" required>
            <option value="">Select State</option>
            <?php
            $s = $conn->query("SELECT no, name FROM state");
            while ($row = $s->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='".$row['no']."'>".$row['name']."</option>";
            }
            ?>
        </select>

        <label>Select District</label>
        <select id="district" name="district" required>
            <option value="">Select District</option>
        </select>

        <label>Select College</label>
        <select id="college" name="college" required>
            <option value="">Select College</option>
        </select>

        <button type="submit">Register</button>
    </form>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>
