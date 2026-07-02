<?php
if (!function_exists('current_user')) {
    require_once __DIR__ . '/auth.php';
}

if (!isset($pageTitle)) { $pageTitle = 'Dashboard'; }
if (!isset($pageSubtitle)) { $pageSubtitle = ''; }

$topbarUser = current_user();
$searchQuery = $_GET['q'] ?? '';
?>
<header class="flex items-center justify-between mb-8 gap-6">
  <div>
    <h1 class="font-display text-[26px] font-bold text-[var(--ink)]"><?= e($pageTitle) ?></h1>
    <?php if ($pageSubtitle): ?>
      <p class="text-sm text-[var(--muted)] mt-0.5"><?= e($pageSubtitle) ?></p>
    <?php endif; ?>
  </div>

  <div class="flex items-center gap-4">
    <form action="home.php" method="GET" class="hidden md:flex items-center gap-2 bg-white border border-[var(--line)] rounded-full pl-4 pr-2 py-2 w-[280px]">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#83808F" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
      <input type="text" name="q" value="<?= e($searchQuery) ?>" placeholder="Search sessions, subjects..." class="bg-transparent text-sm outline-none w-full placeholder:text-[var(--muted)]">
    </form>
    <button class="w-10 h-10 rounded-full bg-white border border-[var(--line)] flex items-center justify-center relative">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#14151A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.7 21a2 2 0 0 1-3.4 0"/></svg>
      <span class="absolute top-2 right-2.5 w-1.5 h-1.5 rounded-full" style="background:var(--coral)"></span>
    </button>
    <?php if ($topbarUser): ?>
    <a href="profile.php" class="flex items-center gap-2.5 pl-1">
      <?= avatar_html($topbarUser, 'w-10 h-10 text-sm') ?>
      <span class="hidden lg:block">
        <span class="block text-sm font-semibold leading-tight"><?= e(full_name($topbarUser)) ?></span>
        <span class="block text-xs text-[var(--muted)] leading-tight"><?= e($topbarUser['course_strand']) ?></span>
      </span>
    </a>
    <?php else: ?>
      <a href="login.php" class="btn-dark text-sm !py-2 !px-4">Log in</a>
    <?php endif; ?>
  </div>
</header>
<?php render_flashes(); ?>
