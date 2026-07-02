<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Log in — StudyBuddy Finder</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-[var(--paper)] min-h-screen grid lg:grid-cols-2">

  <!-- LEFT: form -->
  <div class="flex flex-col justify-center px-8 md:px-20 py-14">
    <a href="index.php" class="flex items-center gap-2 mb-12">
      <span class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:var(--ink)">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--lime)" stroke-width="2.4" stroke-linecap="round"><path d="M4 6h16M4 12h10M4 18h16"/></svg>
      </span>
      <span class="font-display text-lg font-bold">StudyBuddy</span>
    </a>

    <div class="max-w-sm w-full">
      <h1 class="font-display text-3xl font-bold mb-2">Welcome back</h1>
      <p class="text-sm text-[var(--muted)] mb-8">Log in to find your next study session.</p>

      <form action="#" method="POST" class="flex flex-col gap-5">
        <div class="field">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="you@school.edu.ph" required>
        </div>
        <div class="field">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="••••••••" required>
        </div>
        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center gap-2 text-[var(--muted)]">
            <input type="checkbox" class="rounded accent-[var(--lime-deep)]"> Remember me
          </label>
          <a href="#" class="font-semibold text-[var(--ink)] hover:underline">Forgot password?</a>
        </div>
        <button type="submit" class="btn-primary w-full mt-2">Log in</button>
      </form>

      <p class="text-sm text-[var(--muted)] mt-8">
        Don't have an account? <a href="register.php" class="font-semibold text-[var(--ink)] hover:underline">Register</a>
      </p>
    </div>
  </div>

  <!-- RIGHT: notebook visual panel -->
  <div class="hidden lg:flex relative overflow-hidden items-center justify-center notebook-lines" style="background:var(--ink)">
    <div class="absolute inset-0 opacity-[0.06]" style="background-image: repeating-linear-gradient(to bottom, transparent, transparent 27px, #fff 27px, #fff 28px);"></div>
    <div class="relative z-10 max-w-sm px-10">
      <div class="session-card p-6 mb-6 -rotate-2">
        <div class="tab tab-lime"></div>
        <p class="text-xs font-semibold mt-2" style="color:var(--lime-deep)">Statistics</p>
        <h3 class="font-display font-bold text-lg mt-1">Probability Review</h3>
        <div class="flex items-center justify-between mt-4">
          <span class="pill" style="background:#EFFFD1; color:var(--lime-deep)">Open · 3/5</span>
        </div>
      </div>
      <h2 class="font-display text-2xl font-bold text-white leading-snug">"Found my thesis group here in one afternoon."</h2>
      <p class="text-sm mt-3" style="color:#B7B5C2">— Every session starts with someone hitting Join.</p>
    </div>
  </div>

</body>
</html>
