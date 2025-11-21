<?php
session_start();
require "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];

// fetch current hashed password
$stmt = $conn->prepare("SELECT password FROM registrations WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// validate
if (!password_verify($_POST['current'], $user['password'])) {
    header("Location: change_password.php?error=Incorrect current password");
    exit;
}

if ($_POST['new'] != $_POST['confirm']) {
    header("Location: change_password.php?error=Passwords do not match");
    exit;
}

$newHash = password_hash($_POST['new'], PASSWORD_DEFAULT);

$update = $conn->prepare("UPDATE registrations SET password = ? WHERE id = ?");
$update->execute([$newHash, $id]);

header("Location: change_password.php?success=1");
