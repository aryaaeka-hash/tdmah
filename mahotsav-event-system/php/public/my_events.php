<?php
session_start();
require "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM event_registrations WHERE user_id = ? ORDER BY id DESC");
$stmt->execute([$_SESSION['user_id']]);
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

include "header.php";
?>

<link rel="stylesheet" href="sassets/css/style.css">

<div class="page-container">
    <div class="card">
        <h2 class="section-title">My Registered Events</h2>

        <?php if (count($events) == 0): ?>
            <p class="empty">You haven't registered for any events yet.</p>
        <?php endif; ?>

        <div class="events-list">
            <?php foreach ($events as $ev): ?>
                <div class="event-row">
                    <div class="event-info">
                        <h3 class="event-title"><?= $ev['event_name'] ?></h3>
                        <p class="meta"><strong>Category:</strong> <?= $ev['category'] ?></p>
                        <p class="meta"><strong>Registered on:</strong> <?= $ev['registered_at'] ?></p>
                    </div>

                    <form action="delete_event.php" method="POST">
                        <input type="hidden" name="event_id" value="<?= $ev['id'] ?>">
                        <button type="submit" class="delete-btn">Remove</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<?php include "footer.php"; ?>
