<?php
session_start();
require_once "../config/db.php";

$mhid = trim($_POST['mhid']);
$password = $_POST['password'];

// Fetch user by MHID
$sql = "SELECT id, mhid, firstname, password FROM registrations WHERE mhid = :mhid LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute([':mhid' => $mhid]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("<h3>Invalid MHID. <a href='login.php'>Try again</a></h3>");
}

// Verify password
if (!password_verify($password, $user['password'])) {
    die("<h3>Incorrect password. <a href='login.php?mhid=$mhid'>Try again</a></h3>");
}

// Save user session
$_SESSION['user_id'] = $user['id'];
$_SESSION['mhid']    = $user['mhid'];
$_SESSION['name']    = $user['firstname'];

header("Location: dashboard.php");
exit;
?>
