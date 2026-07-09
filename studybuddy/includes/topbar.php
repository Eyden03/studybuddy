<?php
if (!function_exists('current_user')) {
    require_once __DIR__ . '/auth.php';
}

if (!isset($pageTitle)) { $pageTitle = 'Dashboard'; }
if (!isset($pageSubtitle)) { $pageSubtitle = ''; }

$topbarUser = current_user();
$searchQuery = $_GET['q'] ?? '';

$notifications = [];

if ($topbarUser) {
    $stmt = db()->prepare("
        SELECT DISTINCT
            s.id,
            s.title,
            s.session_date
        FROM study_sessions s
        LEFT JOIN session_participants sp
            ON s.id = sp.session_id
        WHERE
            (s.host_id = ? OR sp.user_id = ?)
            AND s.session_date = DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        ORDER BY s.session_date ASC, s.title ASC
    ");

    $stmt->execute([
        $topbarUser['id'],
        $topbarUser['id']
    ]);

    $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<header class="flex items-center justify-between mb-8 gap-6">
    <div>
        <h1 class="font-display text-[26px] font-bold text-[var(--ink)]">
            <?= e($pageTitle) ?>
        </h1>

        <?php if ($pageSubtitle): ?>
            <p class="text-sm text-[var(--muted)] mt-0.5">
                <?= e($pageSubtitle) ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="flex items-center gap-4">

        <form action="home.php" method="GET" class="hidden md:flex items-center gap-2 bg-white border border-[var(--line)] rounded-full pl-4 pr-2 py-2 w-[280px]">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#83808F" stroke-width="2" stroke-linecap="round">
                <circle cx="11" cy="11" r="7"/>
                <path d="M21 21l-4.3-4.3"/>
            </svg>

            <input
                type="text"
                name="q"
                value="<?= e($searchQuery) ?>"
                placeholder="Search sessions, subjects..."
                class="bg-transparent text-sm outline-none w-full placeholder:text-[var(--muted)]"
            >
        </form>

        <!-- Notification -->
        <div class="relative">

            <button
                id="notificationBtn"
                type="button"
                class="w-10 h-10 rounded-full bg-white border border-[var(--line)] flex items-center justify-center relative"
            >
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#14151A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/>
                    <path d="M13.7 21a2 2 0 0 1-3.4 0"/>
                </svg>

                <?php if (!empty($notifications)): ?>
                    <span
                        class="absolute top-2 right-2.5 w-1.5 h-1.5 rounded-full"
                        style="background:var(--coral)"
                    ></span>
                <?php endif; ?>
            </button>

            <!-- Dropdown -->
            <div
                id="notificationMenu"
                class="hidden absolute right-0 mt-3 w-80 bg-white border border-[var(--line)] rounded-2xl shadow-lg z-50 overflow-hidden"
            >

                <div class="px-4 py-3 border-b border-[var(--line)]">
                    <h3 class="font-semibold text-sm">Notifications</h3>
                </div>

                <?php if (empty($notifications)): ?>

                    <div class="px-4 py-4 text-sm text-[var(--muted)]">
                        No study sessions tomorrow.
                    </div>

                <?php else: ?>

                    <?php foreach ($notifications as $notification): ?>

                        <a
                            href="session_details.php?id=<?= (int)$notification['id'] ?>"
                            class="block px-4 py-3 border-b border-[var(--line)] hover:bg-[var(--paper)] last:border-b-0"
                        >
                            <p class="font-medium">
                                <?= e($notification['title']) ?>
                            </p>

                            <p class="text-xs text-[var(--muted)] mt-1">
                                Your study session is happening <strong>TOMORROW</strong>.
                            </p>

                            <span class="text-xs font-medium text-[var(--lime-deep)] mt-2 inline-block">
                                View details →
                            </span>
                        </a>

                    <?php endforeach; ?>

                <?php endif; ?>

            </div>

        </div>

        <?php if ($topbarUser): ?>

            <a href="profile.php" class="flex items-center gap-2.5 pl-1">
                <?= avatar_html($topbarUser, 'w-10 h-10 text-sm') ?>

                <span class="hidden lg:block">
                    <span class="block text-sm font-semibold leading-tight">
                        <?= e(full_name($topbarUser)) ?>
                    </span>

                    <span class="block text-xs text-[var(--muted)] leading-tight">
                        <?= e($topbarUser['course_strand']) ?>
                    </span>
                </span>
            </a>

        <?php else: ?>

            <a href="login.php" class="btn-dark text-sm !py-2 !px-4">
                Log in
            </a>

        <?php endif; ?>

    </div>
</header>

<script>
const notificationBtn = document.getElementById('notificationBtn');
const notificationMenu = document.getElementById('notificationMenu');

notificationBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    notificationMenu.classList.toggle('hidden');
});

document.addEventListener('click', function() {
    notificationMenu.classList.add('hidden');
});

notificationMenu.addEventListener('click', function(e) {
    e.stopPropagation();
});
</script>

<?php render_flashes(); ?>