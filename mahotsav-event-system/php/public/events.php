<?php
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");

$eventsData = require_once __DIR__ . '/../src/events.php';

// read params
$category = isset($_GET['category']) ? $_GET['category'] : null;
$sub = isset($_GET['sub']) ? $_GET['sub'] : null;

include "header.php";
?>

<div class="content">
    <div class="topbar">
        <h2>Mahotsav Events</h2>
        <a href="dashboard.php" class="back-btn">&larr; Back to Dashboard</a>
    </div>

    <div class="events-container">
        <?php if (!$category): ?>
        <!-- Show categories -->
        <div class="section-header">
            <h1>Event Categories</h1>
            <p class="section-subtitle">Choose a category to explore events</p>
        </div>
        
        <div class="events-grid">
            <?php foreach ($eventsData as $catName => $cat): ?>
            <div class="event-card category-card" style="border-top: 4px solid <?php echo $cat['meta']['color'] ?? '#7b5bff'; ?>">
                <div class="card-image">
                    <img src="<?php echo htmlspecialchars($cat['meta']['image']); ?>" alt="<?php echo htmlspecialchars($catName); ?>">
                </div>
                <div class="card-body">
                    <h3><?php echo htmlspecialchars($catName); ?></h3>
                    <p class="card-description"><?php echo htmlspecialchars($cat['meta']['description'] ?? 'Explore events in this category'); ?></p>
                    <a class="btn" href="events.php?category=<?php echo urlencode($catName); ?>">
                        Explore <?php echo htmlspecialchars($catName); ?>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php elseif ($category && !$sub): 
        // show subcategories for this category
        if (!isset($eventsData[$category])) { 
            echo "<div class='alert error'>Unknown category.</div>"; 
            include "footer.php";
            exit; 
        }
        $subcats = $eventsData[$category]['subcategories'];
        ?>
        <div class="section-header">
            <h1><?php echo htmlspecialchars($category); ?></h1>
            <p class="section-subtitle">Choose a subcategory</p>
            <a href="events.php" class="back-link">&larr; All Categories</a>
        </div>
        
        <div class="events-grid">
            <?php foreach ($subcats as $subName => $sub): ?>
            <div class="event-card subcat-card">
                <div class="card-image">
                    <img src="<?php echo htmlspecialchars($sub['meta']['image']); ?>" alt="<?php echo htmlspecialchars($subName); ?>">
                </div>
                <div class="card-body">
                    <h4><?php echo htmlspecialchars($subName); ?></h4>
                    <p class="card-description"><?php echo htmlspecialchars($sub['meta']['description'] ?? 'Explore events in this subcategory'); ?></p>
                    <a class="btn" href="events.php?category=<?php echo urlencode($category); ?>&sub=<?php echo urlencode($subName); ?>">
                        View Events
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php else: 
        // show events inside category+sub
        if (!isset($eventsData[$category]['subcategories'][$sub])) { 
            echo "<div class='alert error'>Unknown subcategory.</div>"; 
            include "footer.php";
            exit; 
        }
        $list = $eventsData[$category]['subcategories'][$sub]['events'];
        ?>
        <div class="section-header">
            <h1><?php echo htmlspecialchars($category); ?> <span class="text-muted">/</span> <?php echo htmlspecialchars($sub); ?></h1>
            <p class="section-subtitle">Available events</p>
            <div class="breadcrumb">
                <a href="events.php">Categories</a> 
                <span class="text-muted">/</span>
                <a href="events.php?category=<?php echo urlencode($category); ?>"><?php echo htmlspecialchars($category); ?></a>
                <span class="text-muted">/</span>
                <span><?php echo htmlspecialchars($sub); ?></span>
            </div>
        </div>
        
        <div class="events-grid">
            <?php if (empty($list)): ?>
            <div class="empty-state">
                <h3>No events available</h3>
                <p>There are no events listed in this subcategory yet.</p>
            </div>
            <?php else: 
                foreach ($list as $ev) {
                    $url = "event.php?category=" . urlencode($category) . "&sub=" . urlencode($sub) . "&event=" . urlencode($ev['slug']);
            ?>
            <div class="event-card">
                <div class="card-image">
                    <img src="<?php echo htmlspecialchars($ev['image']); ?>" alt="<?php echo htmlspecialchars($ev['name']); ?>">
                </div>
                <div class="card-body">
                    <h4><?php echo htmlspecialchars($ev['name']); ?></h4>
                    <p class="card-description"><?php echo htmlspecialchars($ev['short']); ?></p>
                    <div class="card-footer">
                        <a class="btn" href="<?php echo $url; ?>">View & Register</a>
                    </div>
                </div>
            </div>
            <?php } 
            endif; ?>
        </div>

        <?php endif; ?>
    </div>
</div>

<?php include "footer.php"; ?>