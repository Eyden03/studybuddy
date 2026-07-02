<?php
$active = 'home';
$pageTitle = 'Session Details';
$pageSubtitle = 'Everything you need before you join.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Linked Lists Deep Dive — StudyBuddy Finder</title>
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

    <a href="home.php" class="inline-flex items-center gap-1.5 text-sm font-medium text-[var(--muted)] hover:text-[var(--ink)] mb-6">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M15 18l-6-6 6-6"/></svg>
      Back to sessions
    </a>

    <div class="grid lg:grid-cols-3 gap-6">

      <!-- Main info -->
      <div class="lg:col-span-2 card p-8 relative overflow-hidden">
        <div class="tab tab-lime"></div>
        <p class="text-xs font-semibold mt-2" style="color:var(--lime-deep)">Data Structures</p>
        <h1 class="font-display text-[28px] font-bold mt-1">Linked Lists Deep Dive</h1>
        <p class="text-sm text-[var(--muted)] mt-1">Hosted by <span class="font-semibold text-[var(--ink)]">Marco Reyes</span> · BS Computer Science</p>

        <div class="grid sm:grid-cols-3 gap-4 mt-7">
          <div class="rounded-2xl p-4" style="background:var(--paper)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="2"><rect x="3" y="4" width="18" height="17" rx="2"/><path d="M3 9h18M8 3v3M16 3v3"/></svg>
            <p class="text-xs text-[var(--muted)] mt-2">Date</p>
            <p class="text-sm font-semibold mt-0.5">Today, Jul 2</p>
          </div>
          <div class="rounded-2xl p-4" style="background:var(--paper)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
            <p class="text-xs text-[var(--muted)] mt-2">Time</p>
            <p class="text-sm font-semibold mt-0.5">5:30 PM – 7:30 PM</p>
          </div>
          <div class="rounded-2xl p-4" style="background:var(--paper)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="2"><path d="M21 10c0 7-9 12-9 12s-9-5-9-12a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <p class="text-xs text-[var(--muted)] mt-2">Location</p>
            <p class="text-sm font-semibold mt-0.5">CS Building, Lab 3</p>
          </div>
        </div>

        <div class="mt-7">
          <p class="text-xs font-semibold uppercase tracking-widest text-[var(--muted)] mb-3">Description</p>
          <p class="text-sm text-[var(--ink)] leading-relaxed">
            Going through Chapter 5 — singly, doubly, and circular linked lists — before Monday's lab exam.
            Bring your laptop with the starter repo cloned. We'll trade off explaining node insertion, deletion,
            and reversal on the whiteboard. All CS1 sections welcome.
          </p>
        </div>

        <div class="mt-7">
          <p class="text-xs font-semibold uppercase tracking-widest text-[var(--muted)] mb-3">Participants (2/5)</p>
          <div class="flex items-center gap-3">
            <span class="avatar w-10 h-10 text-sm" style="background:var(--lime)">MR</span>
            <span class="avatar w-10 h-10 text-sm" style="background:var(--violet); color:#fff">JL</span>
            <span class="w-10 h-10 rounded-full border-2 border-dashed border-[var(--line)] flex items-center justify-center text-[var(--muted)]">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
            </span>
          </div>
        </div>
      </div>

      <!-- Join panel -->
      <div class="card p-7 h-fit sticky top-8">
        <div class="progress-track h-2 mb-2">
          <div class="progress-fill h-2 w-[40%]"></div>
        </div>
        <p class="text-xs font-mono-data text-[var(--muted)] mb-6">2 of 5 spots filled</p>

        <div class="flex items-center justify-between text-sm mb-3">
          <span class="text-[var(--muted)]">Estimated expenses</span>
          <span class="font-semibold">Free</span>
        </div>
        <div class="flex items-center justify-between text-sm mb-6 pb-6 border-b border-[var(--line)]">
          <span class="text-[var(--muted)]">Course focus</span>
          <span class="font-semibold">BS Computer Science</span>
        </div>

        <button class="btn-primary w-full">Join Session</button>
        <p class="text-xs text-center text-[var(--muted)] mt-3">You'll get a confirmation once you join.</p>

        <!-- Alternate states, shown for reference -->
        <div class="mt-6 pt-6 border-t border-[var(--line)] flex flex-col gap-3">
          <div class="pill w-full justify-center" style="background:#EFFFD1; color:var(--lime-deep)">✓ You have already joined this session</div>
          <div class="pill w-full justify-center" style="background:#FFEAE6; color:var(--coral)">Session Full</div>
        </div>
      </div>
    </div>
  </main>
</div>
</body>
</html>
