<?php
$active = 'profile';
$pageTitle = 'Edit Profile';
$pageSubtitle = 'Keep your info up to date.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Profile — StudyBuddy Finder</title>
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

      <div class="flex items-center gap-5">
        <span class="avatar w-20 h-20 text-2xl" style="background:var(--violet); color:#fff;">JD</span>
        <div>
          <button type="button" class="btn-ghost bg-white text-sm">Change photo</button>
          <p class="text-xs text-[var(--muted)] mt-2">PNG or JPG, up to 2MB.</p>
        </div>
      </div>

      <div class="grid md:grid-cols-2 gap-5">
        <div class="field">
          <label for="first_name">First name</label>
          <input type="text" id="first_name" name="first_name" value="Jamie" required>
        </div>
        <div class="field">
          <label for="last_name">Last name</label>
          <input type="text" id="last_name" name="last_name" value="Diaz" required>
        </div>
        <div class="field">
          <label for="school">School</label>
          <input type="text" id="school" name="school" value="University of the Philippines" required>
        </div>
        <div class="field">
          <label for="course_strand">Course / Strand</label>
          <input type="text" id="course_strand" name="course_strand" value="BS Computer Science" required>
        </div>
        <div class="field">
          <label for="year_level">Year / Grade level</label>
          <select id="year_level" name="year_level" required>
            <option>1st Year</option>
            <option>2nd Year</option>
            <option selected>3rd Year</option>
            <option>4th Year</option>
            <option>5th Year</option>
          </select>
        </div>
        <div class="field md:col-span-2">
          <label for="bio">Bio</label>
          <textarea id="bio" name="bio">CS junior focused on algorithms and backend dev. Usually cramming in the library between 5–8 PM.</textarea>
        </div>
      </div>

      <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="btn-primary">Save Changes</button>
        <a href="profile.php" class="btn-ghost bg-white">Cancel</a>
      </div>
    </form>
  </main>
</div>
</body>
</html>
