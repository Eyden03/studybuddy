<?php
$active = 'create_session';
$pageTitle = 'Create a Session';
$pageSubtitle = 'Fill in the details and invite classmates to join.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Session — StudyBuddy Finder</title>
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
            <input type="text" id="title" name="title" placeholder="e.g. Linked Lists Deep Dive" required>
          </div>
          <div class="field">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="e.g. Data Structures" required>
          </div>
          <div class="field">
            <label for="course_strand">Course / Strand</label>
            <input type="text" id="course_strand" name="course_strand" placeholder="e.g. BS Computer Science" required>
          </div>
          <div class="field md:col-span-2">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="What will you cover? What should participants bring?" required></textarea>
          </div>
        </div>
      </div>

      <div>
        <p class="text-xs font-semibold uppercase tracking-widest text-[var(--muted)] mb-4">When & where</p>
        <div class="grid md:grid-cols-2 gap-5">
          <div class="field md:col-span-2">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" placeholder="e.g. Main Library, Room 204 or Online — Google Meet" required>
          </div>
          <div class="field">
            <label for="session_date">Date</label>
            <input type="date" id="session_date" name="session_date" required>
          </div>
          <div class="field"></div>
          <div class="field">
            <label for="start_time">Start time</label>
            <input type="time" id="start_time" name="start_time" required>
          </div>
          <div class="field">
            <label for="end_time">End time</label>
            <input type="time" id="end_time" name="end_time" required>
          </div>
        </div>
      </div>

      <div>
        <p class="text-xs font-semibold uppercase tracking-widest text-[var(--muted)] mb-4">Capacity & cost</p>
        <div class="grid md:grid-cols-2 gap-5">
          <div class="field">
            <label for="capacity">Maximum participants</label>
            <input type="number" id="capacity" name="capacity" min="2" placeholder="e.g. 5" required>
          </div>
          <div class="field">
            <label for="estimated_expenses">Estimated expenses <span class="text-[var(--muted)] font-normal">(optional)</span></label>
            <input type="number" id="estimated_expenses" name="estimated_expenses" min="0" placeholder="₱0 for free">
          </div>
        </div>
      </div>

      <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="btn-primary">Create Session</button>
        <a href="home.php" class="btn-ghost bg-white">Cancel</a>
      </div>
    </form>
  </main>
</div>
</body>
</html>
