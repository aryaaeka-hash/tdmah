<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
require_once "../config/db.php";

$user_id = $_SESSION['user_id'];
$mhid = $_POST['mhid'] ?? '';
$event_name = trim($_POST['event_name'] ?? '');
$category = trim($_POST['category'] ?? '');
$subcategory = trim($_POST['subcategory'] ?? '');
$participant_name = trim($_POST['participant_name'] ?? '');
$phone = trim($_POST['phone'] ?? '');

if (!$participant_name) {
    die("Name required");
}

// prevent duplicate registration
$chk = $conn->prepare("SELECT id FROM event_registrations WHERE user_id = ? AND event_name = ?");
$chk->execute([$user_id, $event_name]);
if ($chk->rowCount() > 0) {
    // user already registered
    die(htmlspecialchars($mhid) . " - You have already registered for " . htmlspecialchars($event_name));
}

// insert
$ins = $conn->prepare("INSERT INTO event_registrations (user_id, mhid, event_name, category, subcategory, participant_name, phone) VALUES (?, ?, ?, ?, ?, ?, ?)");
$ins->execute([$user_id, $mhid, $event_name, $category, $subcategory, $participant_name, $phone]);

$regId = $conn->lastInsertId();
echo htmlspecialchars($mhid . $regId . " - " . $event_name . " registered successfully");
