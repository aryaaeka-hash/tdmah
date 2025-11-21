<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include "header.php";
?>

<div class="content">
    <div class="topbar">
        <h2>Dashboard</h2>
        <div class="user-welcome">
            Welcome back, <?= htmlspecialchars($_SESSION['name']) ?>!
        </div>
    </div>

    <div class="dashboard-grid">
        <!-- Profile Summary Card -->
        <div class="dashboard-card profile-summary">
            <div class="card-header">
                <h3>Profile Summary</h3>
                <div class="card-icon">👤</div>
            </div>
            <div class="card-content">
                <div class="info-item">
                    <span class="info-label">Name</span>
                    <span class="info-value"><?= htmlspecialchars($_SESSION['name']) ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">MHID</span>
                    <span class="info-value mhid"><?= htmlspecialchars($_SESSION['mhid']) ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Status</span>
                    <span class="status-badge active">Active</span>
                </div>
            </div>
            <div class="card-footer">
                <a href="profile.php" class="card-link">Edit Profile →</a>
            </div>
        </div>

        <!-- Quick Actions Card -->
        <div class="dashboard-card quick-actions">
            <div class="card-header">
                <h3>Quick Actions</h3>
                <div class="card-icon">⚡</div>
            </div>
            <div class="card-content">
                <a href="events.php" class="action-link">
                    <div class="action-icon">🎪</div>
                    <div class="action-text">
                        <span class="action-title">Browse Events</span>
                        <span class="action-desc">Explore all available events</span>
                    </div>
                    <div class="action-arrow">→</div>
                </a>
                
                <a href="my_events.php" class="action-link">
                    <div class="action-icon">📋</div>
                    <div class="action-text">
                        <span class="action-title">Your Registered Events</span>
                        <span class="action-desc">View your event registrations</span>
                    </div>
                    <div class="action-arrow">→</div>
                </a>
                
                <a href="profile.php" class="action-link">
                    <div class="action-icon">🔧</div>
                    <div class="action-text">
                        <span class="action-title">Profile Settings</span>
                        <span class="action-desc">Update your information</span>
                    </div>
                    <div class="action-arrow">→</div>
                </a>
                
                <a href="change_password.php" class="action-link">
                    <div class="action-icon">🔒</div>
                    <div class="action-text">
                        <span class="action-title">Change Password</span>
                        <span class="action-desc">Update your security settings</span>
                    </div>
                    <div class="action-arrow">→</div>
                </a>
            </div>
        </div>

        <!-- Stats Overview Card -->
        <div class="dashboard-card stats-overview">
            <div class="card-header">
                <h3>Event Overview</h3>
                <div class="card-icon">📊</div>
            </div>
            <div class="card-content">
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Events Registered</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Upcoming Events</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Completed Events</div>
                </div>
            </div>
        </div>

        <!-- Quick Events Card -->
        <div class="dashboard-card recent-events">
            <div class="card-header">
                <h3>Quick Access</h3>
                <div class="card-icon">🎯</div>
            </div>
            <div class="card-content">
                <p class="card-description">Get started with event registration or manage your current participations.</p>
                <div class="action-buttons">
                    <a href="events.php" class="btn primary-btn">
                        <span>Browse All Events</span>
                        <span>→</span>
                    </a>
                    <a href="my_events.php" class="btn secondary-btn">
                        <span>My Events</span>
                        <span>→</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>