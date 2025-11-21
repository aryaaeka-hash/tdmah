<?php
session_start();
require "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];

$stmt = $conn->prepare("
    UPDATE registrations SET
        firstname = ?, lastname = ?, email = ?, dob = ?, phone = ?, gender = ?
    WHERE id = ?
");

$ok = $stmt->execute([
    $_POST['firstname'],
    $_POST['lastname'],
    $_POST['email'],
    $_POST['dob'],
    $_POST['phone'],
    $_POST['gender'],
    $id
]);

if ($ok) {
    $_SESSION['name'] = $_POST['firstname']; // update session name
    header("Location: profile.php?updated=1");
} else {
    echo "Error updating profile.";
}
