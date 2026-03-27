<?php
/**
 * Layout: Sidebar
 * The main navigation sidebar shared across all authenticated pages.
 *
 * @var string $active_page – The current page identifier (e.g. 'dashboard').
 */
$active_page = $active_page ?? '';
$root        = $root_path  ?? '';
?>
<!-- ══════════════ SIDEBAR ══════════════ -->
<aside class="sidebar" id="appSidebar">

    <!-- Brand -->
    <div class="sidebar-brand">
        <div class="brand-icon">
            <i class="bi bi-bank2"></i>
        </div>
        <div class="brand-text">
            <h6>ASA Loans</h6>
            <small>Loan Management</small>
        </div>
    </div>

    <!-- Navigation Links -->
    <nav class="sidebar-nav">

        <!-- MAIN MENU -->
        <div class="nav-section-label">Main Menu</div>

        <a href="<?= $root ?>index.php"
           class="nav-link <?= $active_page === 'dashboard' ? 'active' : '' ?>">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>

        <!-- MANAGEMENT -->
        <div class="nav-section-label">Management</div>

        <a href="<?= $root ?>index.php?page=borrowers"
           class="nav-link <?= $active_page === 'borrowers' ? 'active' : '' ?>">
            <i class="bi bi-people-fill"></i>
            Borrowers
        </a>

        <a href="<?= $root ?>index.php?page=loan-applications"
           class="nav-link <?= $active_page === 'loan-applications' ? 'active' : '' ?>">
            <i class="bi bi-file-earmark-text-fill"></i>
            Loan Applications
        </a>

        <a href="<?= $root ?>index.php?page=approved-loans"
           class="nav-link <?= $active_page === 'approved-loans' ? 'active' : '' ?>">
            <i class="bi bi-patch-check-fill"></i>
            Approved Loans
        </a>

        <a href="<?= $root ?>index.php?page=payments"
           class="nav-link <?= $active_page === 'payments' ? 'active' : '' ?>">
            <i class="bi bi-cash-coin"></i>
            Payments
        </a>

        <!-- REPORTS -->
        <div class="nav-section-label">Analytics</div>

        <a href="<?= $root ?>index.php?page=reports"
           class="nav-link <?= $active_page === 'reports' ? 'active' : '' ?>">
            <i class="bi bi-bar-chart-fill"></i>
            Reports
        </a>

    </nav>

    <!-- User Info & Logout -->
    <div class="sidebar-footer">
        <div class="sidebar-user">
            <img src="<?= $root ?>assets/images/profile-default.png" alt="Admin">
            <div class="user-info">
                <h6>Admin User</h6>
                <small>Administrator</small>
            </div>
        </div>
        <!-- Triggers the logout confirmation modal -->
        <button class="btn-logout-sidebar"
                data-bs-toggle="modal"
                data-bs-target="#logoutModal">
            <i class="bi bi-box-arrow-left"></i>
            Logout
        </button>
    </div>

</aside>
<!-- ══════════════ END SIDEBAR ══════════════ -->
