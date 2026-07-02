<?php
$active = 'my_sessions';
$pageTitle = 'Edit Session';
$pageSubtitle = 'Update the details for your study session.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Session — StudyBuddy Finder</title>
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

    <form action="#" method="POST" class="card p-8 flex flex-col gap-7">

      <div>
        <p class="text-xs font-semibold uppercase tracking-widest text-[var(--muted)] mb-4">Session basics</p>
        <div class="grid md:grid-cols-2 gap-5">
          <div class="field md:col-span-2">
            <label for="title">Session title</label>
            <input type="text" id="title" name="title" value="Linked Lists Deep Dive" required>
          </div>
          <div class="field">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" value="Data Structures" required>
          </div>
          <div class="field">
            <label for="course_strand">Course / Strand</label>
            <input type="text" id="course_strand" name="course_strand" value="BS Computer Science" required>
          </div>
          <div class="field md:col-span-2">
            <label for="description">Description</label>
            <textarea id="description" name="description" required>Going through Chapter 5 — singly, doubly, and circular linked lists — before Monday's lab exam. Bring your laptop with the starter repo cloned.</textarea>
          </div>
        </div>
      </div>

      <div>
        <p class="text-xs font-semibold uppercase tracking-widest text-[var(--muted)] mb-4">When & where</p>
        <div class="grid md:grid-cols-2 gap-5">
          <div class="field md:col-span-2">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="CS Building, Lab 3" required>
          </div>
          <div class="field">
            <label for="session_date">Date</label>
            <input type="date" id="session_date" name="session_date" value="2026-07-02" required>
          </div>
          <div class="field"></div>
          <div class="field">
            <label for="start_time">Start time</label>
            <input type="time" id="start_time" name="start_time" value="17:30" required>
          </div>
          <div class="field">
            <label for="end_time">End time</label>
            <input type="time" id="end_time" name="end_time" value="19:30" required>
          </div>
        </div>
      </div>

      <div>
        <p class="text-xs font-semibold uppercase tracking-widest text-[var(--muted)] mb-4">Capacity & cost</p>
        <div class="grid md:grid-cols-2 gap-5">
          <div class="field">
            <label for="capacity">Maximum participants</label>
            <input type="number" id="capacity" name="capacity" min="2" value="5" required>
          </div>
          <div class="field">
            <label for="estimated_expenses">Estimated expenses <span class="text-[var(--muted)] font-normal">(optional)</span></label>
            <input type="number" id="estimated_expenses" name="estimated_expenses" min="0" value="0">
          </div>
        </div>
      </div>

      <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="btn-primary">Save Changes</button>
        <a href="my_sessions.php" class="btn-ghost bg-white">Cancel</a>
        <button type="button" class="ml-auto text-sm font-semibold" style="color:var(--coral)">Delete session</button>
      </div>
    </form>
  </main>
</div>
</body>
</html>
