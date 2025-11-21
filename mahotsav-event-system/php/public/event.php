<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");

$events = require_once __DIR__ . '/../src/events.php';
$category = $_GET['category'] ?? '';
$sub = $_GET['sub'] ?? '';
$slug = $_GET['event'] ?? '';

if (!isset($events[$category]['subcategories'][$sub])) die("Not found");
$found = null;
foreach ($events[$category]['subcategories'][$sub]['events'] as $ev) {
    if ($ev['slug'] === $slug) { $found = $ev; break; }
}
if (!$found) die("Event not found");

require_once "../config/db.php";
$stmt = $conn->prepare("SELECT phone FROM registrations WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$userPhone = ($r = $stmt->fetch(PDO::FETCH_ASSOC)) ? $r['phone'] : '';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo htmlspecialchars($found['name']); ?></title>
  <link rel="stylesheet" href="assets/css/style.css?v=6">
</head>

<body class="web3-bg">

<!-- BACK BUTTON -->
<div class="back-btn-area">
  <a href="events.php?category=<?php echo urlencode($category); ?>&sub=<?php echo urlencode($sub); ?>" class="back-btn">
    ⟵ Back to Events
  </a>
</div>

<!-- HERO -->
<section class="event-hero">
  <h1 class="event-title"><?php echo htmlspecialchars($found['name']); ?></h1>
  <p class="event-subtitle"><?php echo htmlspecialchars($category . " • " . $sub); ?></p>
</section>

<!-- MAIN CONTENT -->
<div class="event-section">

  <!-- EVENT CARD -->
  <div class="event-wrapper">

    <div class="event-left">
      <img src="<?php echo htmlspecialchars($found['image']); ?>" class="event-main-img">
    </div>

    <div class="event-right glass-card">
      <h2 class="section-head">About This Event</h2>

      <div class="event-info">
        <h3>Description</h3>
        <p><?php echo htmlspecialchars($found['short']); ?></p>
      </div>

      <div class="event-info">
        <h3>Rules</h3>
        <p><?php echo nl2br(htmlspecialchars($found['rules'])); ?></p>
      </div>

      <div class="event-info">
        <h3>Prizes</h3>
        <p><?php echo htmlspecialchars($found['prizes']); ?></p>
      </div>

      <div class="event-info">
        <h3>Contacts</h3>
        <p><?php echo htmlspecialchars(implode(" • ", $found['contact'])); ?></p>
      </div>

    </div>

  </div>


  <!-- REGISTRATION SECTION -->
  <div class="register-card glass-card">
    <h2>Register Now</h2>

    <form action="register_event.php" method="POST" class="reg-form">
      <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
      <input type="hidden" name="subcategory" value="<?php echo htmlspecialchars($sub); ?>">
      <input type="hidden" name="event_name" value="<?php echo htmlspecialchars($found['name']); ?>">

      <label>MHID</label>
      <input type="text" name="mhid" value="<?php echo htmlspecialchars($_SESSION['mhid']); ?>" readonly>

      <label>Phone</label>
      <input type="text" name="phone" value="<?php echo htmlspecialchars($userPhone); ?>" required>

      <label>Name (for certificate)</label>
      <input type="text" name="participant_name" required>

      <button class="primary-btn" type="submit">Register</button>
    </form>
  </div>

</div>

</body>
</html>
