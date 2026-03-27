<?php
/**
 * index.php – Main Application Router
 *
 * Serves as the single entry point for the dashboard and all pages.
 * Page is determined via the ?page= query parameter.
 * Uses simple session-like simulation (no real auth).
 */

session_start();

// ── Redirect to login if not "logged in" ─────────────────────────────────────
// Simulate session: if 'logged_in' flag is not set, send to login.php
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// ── Load Sample Data ──────────────────────────────────────────────────────────
require_once __DIR__ . '/data/sample-data.php';

// ── Determine Active Page ─────────────────────────────────────────────────────
$allowed_pages = [
    'dashboard',
    'borrowers',
    'loan-applications',
    'approved-loans',
    'payments',
    'reports',
];

$page = isset($_GET['page']) ? trim($_GET['page']) : 'dashboard';

// Fallback to dashboard if invalid page
if (!in_array($page, $allowed_pages)) {
    $page = 'dashboard';
}

// ── Page Metadata Map ─────────────────────────────────────────────────────────
$page_meta = [
    'dashboard'         => ['heading' => 'Dashboard',           'sub' => 'System Overview & Summary'],
    'borrowers'         => ['heading' => 'Borrowers',           'sub' => 'Manage borrower records'],
    'loan-applications' => ['heading' => 'Loan Applications',   'sub' => 'Review and process applications'],
    'approved-loans'    => ['heading' => 'Approved Loans',      'sub' => 'Active loan records'],
    'payments'          => ['heading' => 'Payments',            'sub' => 'Monitor payment transactions'],
    'reports'           => ['heading' => 'Reports',             'sub' => 'Loan and payment analytics'],
];

$page_heading    = $page_meta[$page]['heading'] ?? 'Dashboard';
$page_subheading = $page_meta[$page]['sub']     ?? 'Loan Management System – ASA';
$page_title      = $page_heading . ' | ASA Loan Management';
$active_page     = $page;
$root_path       = '';   // root-relative path for assets

// ── Render HTML ───────────────────────────────────────────────────────────────
include __DIR__ . '/layouts/header.php';
?>

<div class="app-wrapper">

    <!-- Sidebar -->
    <?php include __DIR__ . '/layouts/sidebar.php'; ?>

    <!-- Main Content Area -->
    <main class="main-content">

        <!-- Top Navigation Bar -->
        <?php include __DIR__ . '/layouts/navbar.php'; ?>

        <!-- Page Content -->
        <div class="page-content">
            <?php
            // Include the correct page file
            $page_file = __DIR__ . '/pages/' . $page . '.php';
            if (file_exists($page_file)) {
                include $page_file;
            } else {
                echo '<div class="empty-state"><i class="bi bi-emoji-frown d-block" style="font-size:3rem;"></i><p>Page not found.</p></div>';
            }
            ?>
        </div>

        <!-- App Footer -->
        <footer class="app-footer">
            &copy; <?= date('Y') ?> ASA Loan Management System &nbsp;|&nbsp;
            <span class="text-warning">Prototype Version</span> &nbsp;|&nbsp;
            All data is sample data only.
        </footer>

    </main>

</div>

<!-- Logout Confirmation Modal (global) -->
<?php include __DIR__ . '/modals/logout-modal.php'; ?>

<?php include __DIR__ . '/layouts/footer.php'; ?>
