<?php
require_once __DIR__ . '/includes/auth.php';

$viewer = require_login(); // Logged-in user

// Determine whose profile to display
if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
    $userId = (int) $_GET['id'];

    $stmt = db()->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("User not found.");
    }
} else {
    // Default to the logged-in user's profile
    $user = $viewer;
}

$isOwnProfile = ((int)$viewer['id'] === (int)$user['id']);

$active = 'profile';
$pageTitle = $isOwnProfile ? 'My Profile' : full_name($user);
$pageSubtitle = $isOwnProfile
    ? 'Your account and academic info.'
    : 'Student profile';

// Count hosted sessions
$stmt = db()->prepare("
    SELECT COUNT(*)
    FROM study_sessions
    WHERE host_id = ?
");
$stmt->execute([(int)$user['id']]);
$hostedCount = (int)$stmt->fetchColumn();

// Count joined sessions (excluding hosted ones)
$stmt = db()->prepare("
    SELECT COUNT(*)
    FROM session_participants sp
    INNER JOIN study_sessions s
        ON s.id = sp.session_id
    WHERE sp.user_id = ?
      AND s.host_id <> ?
");
$stmt->execute([(int)$user['id'], (int)$user['id']]);
$joinedCount = (int)$stmt->fetchColumn();

$memberSince = (new DateTimeImmutable($user['created_at']))->format('F Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle) ?> - StudyBuddy Finder</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-[var(--paper)]">
<div class="flex">
    <?php include 'includes/sidebar.php'; ?>
    <main class="flex-1 px-8 py-8 max-w-[900px]">
        <?php include 'includes/topbar.php'; ?>
        <div class="card p-8">
            <div class="flex items-center justify-between mb-8 gap-5">
                <div class="flex items-center gap-5">
                    <?= avatar_html($user, 'w-20 h-20 text-2xl') ?>
                    <div>
                        <h2 class="font-display text-2xl font-bold">
                            <?= e(full_name($user)) ?>
                        </h2>
                        <p class="text-sm text-[var(--muted)] mt-0.5">
                            <?= e($user['email']) ?>
                        </p>
                        <span class="pill mt-2" style="background:#EFFFD1; color:var(--lime-deep)">
                            <?= e($user['year_level']) ?> - <?= e($user['course_strand']) ?>
                        </span>
                    </div>
                </div>
                <?php if ($isOwnProfile): ?>
                    <a href="edit_profile.php" class="btn-dark text-sm">
                        Edit Profile
                    </a>
                <?php endif; ?>
            </div>
            <div class="grid sm:grid-cols-2 gap-5 mb-8">
                <div class="rounded-2xl p-4" style="background:var(--paper)">
                    <p class="text-xs text-[var(--muted)]">School</p>
                    <p class="text-sm font-semibold mt-1">
                        <?= e($user['school']) ?>
                    </p>
                </div>
                <div class="rounded-2xl p-4" style="background:var(--paper)">
                    <p class="text-xs text-[var(--muted)]">Course / Strand</p>
                    <p class="text-sm font-semibold mt-1">
                        <?= e($user['course_strand']) ?>
                    </p>
                </div>
                <div class="rounded-2xl p-4" style="background:var(--paper)">
                    <p class="text-xs text-[var(--muted)]">Year Level</p>
                    <p class="text-sm font-semibold mt-1">
                        <?= e($user['year_level']) ?>
                    </p>
                </div>
                <div class="rounded-2xl p-4" style="background:var(--paper)">
                    <p class="text-xs text-[var(--muted)]">Member Since</p>
                    <p class="text-sm font-semibold mt-1">
                        <?= e($memberSince) ?>
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-[var(--line)]">
                <p class="text-xs font-semibold uppercase tracking-widest text-[var(--muted)] mb-3">
                    Bio
                </p>
                <p class="text-sm text-[var(--ink)] leading-relaxed">
                    <?= nl2br(e($user['bio'] ?: 'No bio yet.')) ?>
                </p>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-8 pt-6 border-t border-[var(--line)]">
                <div>
                    <p class="font-display text-2xl font-bold">
                        <?= $hostedCount ?>
                    </p>
                    <p class="text-xs text-[var(--muted)] mt-1">
                        Sessions Hosted
                    </p>
                </div>
                <div>
                    <p class="font-display text-2xl font-bold">
                        <?= $joinedCount ?>
                    </p>
                    <p class="text-xs text-[var(--muted)] mt-1">
                        Sessions Joined
                    </p>
                </div>
                <div>
                    <p class="font-display text-2xl font-bold">
                        <?= ($hostedCount + $joinedCount) > 0 ? 'Active' : 'New' ?>
                    </p>
                    <p class="text-xs text-[var(--muted)] mt-1">
                        Buddy Status
                    </p>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>