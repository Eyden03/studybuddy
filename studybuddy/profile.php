<?php
$active = 'profile';
$pageTitle = 'Profile';
$pageSubtitle = 'Your account and academic info.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile — StudyBuddy Finder</title>
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
      <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-5">
          <span class="avatar w-20 h-20 text-2xl" style="background:var(--violet); color:#fff;">JD</span>
          <div>
            <h2 class="font-display text-2xl font-bold">Jamie Diaz</h2>
            <p class="text-sm text-[var(--muted)] mt-0.5">jamie.diaz@school.edu.ph</p>
            <span class="pill mt-2" style="background:#EFFFD1; color:var(--lime-deep)">3rd Year · BS Computer Science</span>
          </div>
        </div>
        <a href="edit_profile.php" class="btn-dark text-sm">Edit Profile</a>
      </div>

      <div class="grid sm:grid-cols-2 gap-5 mb-8">
        <div class="rounded-2xl p-4" style="background:var(--paper)">
          <p class="text-xs text-[var(--muted)]">School</p>
          <p class="text-sm font-semibold mt-1">University of the Philippines</p>
        </div>
        <div class="rounded-2xl p-4" style="background:var(--paper)">
          <p class="text-xs text-[var(--muted)]">Course / Strand</p>
          <p class="text-sm font-semibold mt-1">BS Computer Science</p>
        </div>
        <div class="rounded-2xl p-4" style="background:var(--paper)">
          <p class="text-xs text-[var(--muted)]">Year level</p>
          <p class="text-sm font-semibold mt-1">3rd Year</p>
        </div>
        <div class="rounded-2xl p-4" style="background:var(--paper)">
          <p class="text-xs text-[var(--muted)]">Member since</p>
          <p class="text-sm font-semibold mt-1">January 2026</p>
        </div>
      </div>

      <div class="pt-6 border-t border-[var(--line)]">
        <p class="text-xs font-semibold uppercase tracking-widest text-[var(--muted)] mb-3">Bio</p>
        <p class="text-sm text-[var(--ink)] leading-relaxed">
          CS junior focused on algorithms and backend dev. Usually cramming in the library between 5–8 PM.
          Always down for a whiteboard session before an exam.
        </p>
      </div>

      <div class="grid grid-cols-3 gap-4 mt-8 pt-6 border-t border-[var(--line)]">
        <div>
          <p class="font-display text-2xl font-bold">12</p>
          <p class="text-xs text-[var(--muted)] mt-1">Sessions hosted</p>
        </div>
        <div>
          <p class="font-display text-2xl font-bold">28</p>
          <p class="text-xs text-[var(--muted)] mt-1">Sessions joined</p>
        </div>
        <div>
          <p class="font-display text-2xl font-bold">4.9</p>
          <p class="text-xs text-[var(--muted)] mt-1">Buddy rating</p>
        </div>
      </div>
    </div>
  </main>
</div>
</body>
</html>
