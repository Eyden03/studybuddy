<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/helpers.php';

function session_select_sql(): string
{
    return "
        SELECT
            s.*,
            u.first_name AS host_first_name,
            u.last_name AS host_last_name,
            u.school AS host_school,
            u.course_strand AS host_course,
            u.email AS host_email,
            u.avatar_path AS host_avatar_path,
            (
                SELECT COUNT(*)
                FROM session_participants sp
                WHERE sp.session_id = s.id
            ) AS participant_count
        FROM study_sessions s
        INNER JOIN users u ON u.id = s.host_id
    ";
}

function fetch_sessions(string $filter = 'all', string $query = '', ?array $user = null): array
{
    $where = [];
    $params = [];

    if ($query !== '') {
        $where[] = "(s.title LIKE ? OR s.subject LIKE ? OR s.description LIKE ? OR s.location LIKE ? OR s.course_strand LIKE ? OR u.first_name LIKE ? OR u.last_name LIKE ?)";
        $term = '%' . $query . '%';
        array_push($params, $term, $term, $term, $term, $term, $term, $term);
    }

    if ($filter === 'open') {
        $where[] = "(SELECT COUNT(*) FROM session_participants sp WHERE sp.session_id = s.id) < s.capacity";
        $where[] = "TIMESTAMP(s.session_date, s.end_time) >= NOW()";
    } elseif ($filter === 'free') {
        $where[] = "s.estimated_expenses = 0";
    } elseif ($filter === 'week') {
        $where[] = "s.session_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)";
    } elseif ($filter === 'near' && $user) {
        $where[] = "u.school = ?";
        $params[] = $user['school'];
    }

    $sql = session_select_sql();
    if ($where) {
        $sql .= ' WHERE ' . implode(' AND ', $where);
    }
    $sql .= ' ORDER BY s.session_date ASC, s.start_time ASC';

    $stmt = db()->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function fetch_session(int $id): ?array
{
    $stmt = db()->prepare(session_select_sql() . ' WHERE s.id = ? LIMIT 1');
    $stmt->execute([$id]);
    $session = $stmt->fetch();
    return $session ?: null;
}

function fetch_hosted_sessions(int $userId): array
{
    $stmt = db()->prepare(session_select_sql() . ' WHERE s.host_id = ? ORDER BY s.session_date ASC, s.start_time ASC');
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
}

function fetch_joined_sessions(int $userId): array
{
    $stmt = db()->prepare(
        session_select_sql() . '
        INNER JOIN session_participants me ON me.session_id = s.id AND me.user_id = ?
        WHERE s.host_id <> ?
        ORDER BY s.session_date ASC, s.start_time ASC'
    );
    $stmt->execute([$userId, $userId]);
    return $stmt->fetchAll();
}

function fetch_participants(int $sessionId): array
{
    $stmt = db()->prepare('
        SELECT u.*
        FROM session_participants sp
        INNER JOIN users u ON u.id = sp.user_id
        WHERE sp.session_id = ?
        ORDER BY sp.joined_at ASC
    ');
    $stmt->execute([$sessionId]);
    return $stmt->fetchAll();
}

function user_joined_session(int $sessionId, int $userId): bool
{
    $stmt = db()->prepare('SELECT 1 FROM session_participants WHERE session_id = ? AND user_id = ? LIMIT 1');
    $stmt->execute([$sessionId, $userId]);
    return (bool) $stmt->fetchColumn();
}

function join_study_session(int $sessionId, int $userId): bool
{
    $pdo = db();
    $pdo->beginTransaction();

    try {
        $session = fetch_session($sessionId);
        if (!$session || is_session_past($session) || is_session_full($session)) {
            $pdo->rollBack();
            return false;
        }

        $stmt = $pdo->prepare('INSERT IGNORE INTO session_participants (session_id, user_id) VALUES (?, ?)');
        $stmt->execute([$sessionId, $userId]);
        $pdo->commit();
        return true;
    } catch (Throwable $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function leave_study_session(int $sessionId, int $userId): bool
{
    $session = fetch_session($sessionId);

    if (!$session || (int) $session['host_id'] === $userId) {
        return false;
    }

    $stmt = db()->prepare('DELETE FROM session_participants WHERE session_id = ? AND user_id = ?');
    $stmt->execute([$sessionId, $userId]);
    return $stmt->rowCount() > 0;
}

function delete_study_session(int $sessionId, int $hostId): bool
{
    $stmt = db()->prepare('DELETE FROM study_sessions WHERE id = ? AND host_id = ?');
    $stmt->execute([$sessionId, $hostId]);
    return $stmt->rowCount() > 0;
}
