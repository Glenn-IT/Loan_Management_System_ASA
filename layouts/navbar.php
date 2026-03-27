<?php
/**
 * Layout: Navbar / Top Bar
 * Displays the top bar with page title, search, and quick actions.
 *
 * @var string $page_heading    – Main title shown in the topbar.
 * @var string $page_subheading – Subtitle / breadcrumb shown under title.
 */
$page_heading    = $page_heading    ?? 'Dashboard';
$page_subheading = $page_subheading ?? 'Loan Management System – ASA';
$root            = $root_path       ?? '';
?>
<!-- ══════════════ TOP BAR ══════════════ -->
<header class="topbar">

    <div class="d-flex align-items-center gap-3">
        <!-- Mobile sidebar toggle button -->
        <button id="sidebarToggle"
                class="d-md-none btn btn-sm btn-light border"
                aria-label="Toggle sidebar">
            <i class="bi bi-list fs-5"></i>
        </button>

        <!-- Page Title -->
        <div class="topbar-title">
            <h5><?= htmlspecialchars($page_heading) ?></h5>
            <p><?= htmlspecialchars($page_subheading) ?></p>
        </div>
    </div>

    <!-- Right-side Actions -->
    <div class="topbar-actions">

        <!-- Notification Bell -->
        <button class="topbar-badge"
                onclick="showToast('You have no new notifications. (Prototype)', 'info')"
                data-bs-toggle="tooltip"
                title="Notifications">
            <i class="bi bi-bell"></i>
            <span class="badge-dot"></span>
        </button>

        <!-- Help Button -->
        <button class="topbar-badge"
                onclick="comingSoon()"
                data-bs-toggle="tooltip"
                title="Help">
            <i class="bi bi-question-circle"></i>
        </button>

        <!-- Current Date Badge -->
        <span class="badge bg-light text-secondary border d-none d-sm-inline-flex align-items-center gap-1"
              style="font-size:.75rem;padding:.4rem .75rem;border-radius:8px;">
            <i class="bi bi-calendar3"></i>
            <?= date('M d, Y') ?>
        </span>

        <!-- Avatar (dropdown placeholder) -->
        <div class="topbar-avatar"
             data-bs-toggle="tooltip"
             title="Admin User">
            <img src="<?= $root ?>assets/images/profile-default.png" alt="Admin">
        </div>

    </div>

</header>
<!-- ══════════════ END TOP BAR ══════════════ -->
