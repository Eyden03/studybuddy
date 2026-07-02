<?php
$active = 'home';
$pageTitle = 'Study Sessions';
$pageSubtitle = 'Browse what\'s open on campus right now.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home — StudyBuddy Finder</title>
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

    <!-- Filter bar -->
    <div class="flex flex-wrap items-center gap-2 mb-7">
      <span class="pill text-white" style="background:var(--ink)">All</span>
      <span class="pill bg-white border border-[var(--line)] text-[var(--ink)]">Open now</span>
      <span class="pill bg-white border border-[var(--line)] text-[var(--ink)]">Free</span>
      <span class="pill bg-white border border-[var(--line)] text-[var(--ink)]">Near me</span>
      <span class="pill bg-white border border-[var(--line)] text-[var(--ink)]">This week</span>
      <div class="ml-auto flex items-center gap-2 text-sm text-[var(--muted)]">
        Sort by <span class="font-semibold text-[var(--ink)]">Soonest</span>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#83808F" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
      </div>
    </div>

    <!-- Session grid -->
    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-5">
      <?php
      $sessions = [
        ['tab'=>'lime','subject'=>'Data Structures','title'=>'Linked Lists Deep Dive','host'=>'Marco Reyes','course'=>'BS CS','loc'=>'CS Building, Lab 3','date'=>'Today','time'=>'5:30 PM','slots'=>'2/5','fee'=>'Free','status'=>'open'],
        ['tab'=>'violet','subject'=>'Calculus II','title'=>'Finals Cram — Chapter 7','host'=>'Angela Ruiz','course'=>'BS ECE','loc'=>'Main Library, Rm 204','date'=>'Fri, Jul 3','time'=>'3:00 PM','slots'=>'4/6','fee'=>'Free','status'=>'open'],
        ['tab'=>'coral','subject'=>'Organic Chemistry','title'=>'Reaction Mechanisms','host'=>'Kyla Pascual','course'=>'BS Chem','loc'=>'Science Hall 1B','date'=>'Sat, Jul 4','time'=>'10:00 AM','slots'=>'6/6','fee'=>'₱50','status'=>'full'],
        ['tab'=>'sky','subject'=>'Thesis Writing','title'=>'Methodology Peer Review','host'=>'Diego Santos','course'=>'BS IT','loc'=>'Online — Google Meet','date'=>'Sun, Jul 5','time'=>'1:00 PM','slots'=>'3/8','fee'=>'Free','status'=>'open'],
        ['tab'=>'lime','subject'=>'Statistics','title'=>'Probability Review','host'=>'Nina Cruz','course'=>'BS Psych','loc'=>'Library Study Pod 2','date'=>'Mon, Jul 6','time'=>'2:00 PM','slots'=>'3/5','fee'=>'Free','status'=>'open'],
        ['tab'=>'violet','subject'=>'Financial Accounting','title'=>'Trial Balance Workshop','host'=>'Paolo Tan','course'=>'BSBA','loc'=>'Business Bldg, Rm 110','date'=>'Tue, Jul 7','time'=>'4:30 PM','slots'=>'1/4','fee'=>'₱30','status'=>'open'],
      ];
      foreach ($sessions as $s):
      ?>
      <div class="session-card p-5">
        <div class="tab tab-<?= $s['tab'] ?>"></div>
        <div class="flex items-start justify-between mt-2">
          <p class="text-xs font-semibold" style="color:var(--<?= $s['tab']=='lime'?'lime-deep':$s['tab'] ?>)"><?= $s['subject'] ?></p>
          <?php if ($s['status']==='full'): ?>
            <span class="pill" style="background:#FFEAE6; color:var(--coral)">Full</span>
          <?php else: ?>
            <span class="pill" style="background:#EFFFD1; color:var(--lime-deep)">Open</span>
          <?php endif; ?>
        </div>
        <h3 class="font-display font-bold text-[17px] mt-1 leading-snug"><?= $s['title'] ?></h3>
        <p class="text-xs text-[var(--muted)] mt-1">Hosted by <?= $s['host'] ?> · <?= $s['course'] ?></p>

        <div class="mt-4 flex flex-col gap-1.5 text-xs text-[var(--muted)]">
          <span class="flex items-center gap-1.5">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#83808F" stroke-width="2"><path d="M21 10c0 7-9 12-9 12s-9-5-9-12a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <?= $s['loc'] ?>
          </span>
          <span class="flex items-center gap-1.5">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#83808F" stroke-width="2"><rect x="3" y="4" width="18" height="17" rx="2"/><path d="M3 9h18M8 3v3M16 3v3"/></svg>
            <?= $s['date'] ?> · <?= $s['time'] ?>
          </span>
        </div>

        <div class="flex items-center justify-between mt-5 pt-4 border-t border-[var(--line)]">
          <span class="font-mono-data text-xs text-[var(--muted)]"><?= $s['slots'] ?> joined · <?= $s['fee'] ?></span>
          <a href="session_details.php" class="btn-dark text-xs !py-2 !px-4">View Details</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </main>
</div>
</body>
</html>
