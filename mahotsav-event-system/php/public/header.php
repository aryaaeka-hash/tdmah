<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mahotsav Portal</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-title">
            <h2>Mahotsav</h2>
            <p><?php echo $_SESSION['mhid']; ?></p>
        </div>

        <ul class="sidebar-menu">
            <li><a href="dashboard.php">🏠 Dashboard</a></li>
            <li><a href="events.php">🎭 Events</a></li>
            <li><a href="my_events.php">📝 My Events</a></li>
            <li><a href="profile.php">👤 Profile</a></li>
            <li><a href="change_password.php">🔐 Change Password</a></li>
            <li><a href="logout.php" class="logout">🚪 Logout</a></li>
        </ul>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">
        <header class="topbar">
            <h2>Hello, <?php echo htmlspecialchars($_SESSION['name']); ?></h2>
        </header>

        <div class="content">
