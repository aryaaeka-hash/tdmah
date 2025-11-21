<?php
require_once "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request");
}

$fname      = trim($_POST['fname']);
$lname      = trim($_POST['lname']);
$email      = trim($_POST['email']);
$dob        = trim($_POST['dob']);
$phone      = trim($_POST['phone']);
$gender     = trim($_POST['gender']);
$state      = trim($_POST['state']);
$district   = trim($_POST['district']);
$college    = trim($_POST['college']);
$password   = $_POST['password'];
$cpassword  = $_POST['cpassword'];

if ($password !== $cpassword) {
    die("<h3>Error: Passwords do not match!</h3>");
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$last = $conn->query("SELECT mhid FROM registrations ORDER BY id DESC LIMIT 1");

if ($last && $row = $last->fetch(PDO::FETCH_ASSOC)) {
    $number = intval(substr($row['mhid'], 2)) + 1;
    $mhid = "MH" . str_pad($number, 3, '0', STR_PAD_LEFT);
} else {
    $mhid = "MH001";
}

$sql = "INSERT INTO registrations 
        (mhid, firstname, lastname, email, dob, phone, gender, password, state_id, district_id, college_id)
        VALUES 
        (:mhid, :fname, :lname, :email, :dob, :phone, :gender, :password, :state, :district, :college)";

$stmt = $conn->prepare($sql);

$success = $stmt->execute([
    ':mhid'     => $mhid,
    ':fname'    => $fname,
    ':lname'    => $lname,
    ':email'    => $email,
    ':dob'      => $dob,
    ':phone'    => $phone,
    ':gender'   => $gender,
    ':password' => $hashedPassword,
    ':state'    => $state,
    ':district' => $district,
    ':college'  => $college
]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="auth-body">

<div class="bg-gradient"></div>

<div class="auth-wrapper">
    <div class="auth-card glass-card">

<?php if ($success): ?>

        <h2 class="auth-title">🎉 Registration Successful!</h2>
        <p class="auth-desc">Your account has been created</p>

        <div class="success-box">
            <p>Your MHID</p>
            <h1 class="mhid-display"><?php echo $mhid; ?></h1>
        </div>

        <a href="login.php?mhid=<?php echo $mhid; ?>" class="primary-btn">
            Proceed to Login
        </a>

<?php else: ?>

        <h2 class="auth-title">❌ Error</h2>
        <p class="auth-desc">Something went wrong during registration.</p>

<?php endif; ?>

    </div>
</div>

</body>
</html>
