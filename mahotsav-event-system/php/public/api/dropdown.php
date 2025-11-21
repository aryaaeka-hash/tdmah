<?php
require_once "../../config/db.php";

header("Content-Type: application/json");

$type = $_GET['type'] ?? '';
$id = $_GET['id'] ?? '';

if ($type === "district") {
    $stmt = $conn->prepare("SELECT no, name FROM district WHERE sno = ?");
    $stmt->execute([$id]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

if ($type === "college") {
    $stmt = $conn->prepare("SELECT no, name FROM college WHERE dno = ?");
    $stmt->execute([$id]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}
