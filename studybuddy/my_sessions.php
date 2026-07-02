<?php
$active = 'my_sessions';
$pageTitle = 'My Sessions';
$pageSubtitle = 'Sessions you\'re hosting and sessions you\'ve joined.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Sessions — StudyBuddy Finder</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-[var(--paper)]">
<div class="flex">
  <?php include 'includes/sidebar.php'; ?>

  <main class="flex-1 px-8 py-8 max-w-[1200px]">
    <?php include 'includes/topbar.php'; ?>

    <!-- Hosting -->
    <section class="mb-10">
      <div class="flex items-center justify-between mb-4">
        <h2 class="font-display text-lg font-bold flex items-center gap-2">
          <span class="w-2 h-2 rounded-full" style="background:var(--lime-deep)"></span>
          Sessions I'm Hosting
        </h2>
        <a href="create_session.php" class="text-sm font-semibold text-[var(--ink)] hover:underline">+ New session</a>
      </div>
      <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-5">
        <div class="session-card p-5">
          <div class="tab tab-lime"></div>
          <p class="text-xs font-semibold mt-2" style="color:var(--lime-deep)">Data Structures</p>
          <h3 class="font-display font-bold text-[17px] mt-1">Linked Lists Deep Dive</h3>
          <p class="text-xs text-[var(--muted)] mt-2">Today · 5:30 PM</p>
          <div class="flex items-center justify-between mt-4">
            <span class="font-mono-data text-xs text-[var(--muted)]">2/5 participants</span>
          </div>
          <div class="flex items-center gap-2 mt-4 pt-4 border-t border-[var(--line)]">
            <a href="edit_session.php" class="btn-ghost bg-white text-xs !py-2 !px-3 flex-1 text-center">Edit</a>
            <a href="session_details.php" class="btn-dark text-xs !py-2 !px-3 flex-1 text-center">View</a>
          </div>
        </div>
        <div class="session-card p-5">
          <div class="tab tab-violet"></div>
          <p class="text-xs font-semibold mt-2" style="color:var(--violet)">Thesis Writing</p>
          <h3 class="font-display font-bold text-[17px] mt-1">Methodology Peer Review</h3>
          <p class="text-xs text-[var(--muted)] mt-2">Sun, Jul 5 · 1:00 PM</p>
          <div class="flex items-center justify-between mt-4">
            <span class="font-mono-data text-xs text-[var(--muted)]">3/8 participants</span>
          </div>
          <div class="flex items-center gap-2 mt-4 pt-4 border-t border-[var(--line)]">
            <a href="edit_session.php" class="btn-ghost bg-white text-xs !py-2 !px-3 flex-1 text-center">Edit</a>
            <a href="session_details.php" class="btn-dark text-xs !py-2 !px-3 flex-1 text-center">View</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Joined -->
    <section>
      <h2 class="font-display text-lg font-bold flex items-center gap-2 mb-4">
        <span class="w-2 h-2 rounded-full" style="background:var(--violet)"></span>
        Sessions I've Joined
      </h2>
      <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-5">
        <div class="session-card p-5">
          <div class="tab tab-coral"></div>
          <p class="text-xs font-semibold mt-2" style="color:var(--coral)">Organic Chemistry</p>
          <h3 class="font-display font-bold text-[17px] mt-1">Reaction Mechanisms</h3>
          <p class="text-xs text-[var(--muted)] mt-2">Hosted by Kyla Pascual · Sat, Jul 4</p>
          <div class="flex items-center gap-2 mt-4 pt-4 border-t border-[var(--line)]">
            <a href="session_details.php" class="btn-dark text-xs !py-2 !px-3 flex-1 text-center">View Details</a>
            <button class="btn-ghost bg-white text-xs !py-2 !px-3" style="color:var(--coral); border-color:#FFDAD3">Leave</button>
          </div>
        </div>
        <div class="session-card p-5">
          <div class="tab tab-sky"></div>
          <p class="text-xs font-semibold mt-2" style="color:var(--sky)">Statistics</p>
          <h3 class="font-display font-bold text-[17px] mt-1">Probability Review</h3>
          <p class="text-xs text-[var(--muted)] mt-2">Hosted by Nina Cruz · Mon, Jul 6</p>
          <div class="flex items-center gap-2 mt-4 pt-4 border-t border-[var(--line)]">
            <a href="session_details.php" class="btn-dark text-xs !py-2 !px-3 flex-1 text-center">View Details</a>
            <button class="btn-ghost bg-white text-xs !py-2 !px-3" style="color:var(--coral); border-color:#FFDAD3">Leave</button>
          </div>
        </div>
      </div>
    </section>
  </main>
</div>
</body>
</html>
