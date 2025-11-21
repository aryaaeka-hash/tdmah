<?php
session_start();
require "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$event_id = $_POST['event_id'];

$stmt = $conn->prepare("DELETE FROM event_registrations WHERE id = ? AND user_id = ?");
$stmt->execute([$event_id, $_SESSION['user_id']]);

header("Location: my_events.php");
