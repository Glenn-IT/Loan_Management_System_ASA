<?php
/**
 * Page: Dashboard
 * Shows summary stats, recent activity, and quick overview charts.
 * Populated with sample data from data/sample-data.php.
 */

// Summary stats are already computed in sample-data.php via $total_* variables
?>

<!-- ── Stats Cards ────────────────────────────────────────── -->
<div class="stats-grid">
    <?php
    // Total Borrowers card
    $stat_icon = 'bi-people-fill'; $stat_value = $total_borrowers;
    $stat_label = 'Total Borrowers'; $stat_theme = 'primary';
    include __DIR__ . '/../components/stats-card.php';

    // Total Applications card
    $stat_icon = 'bi-file-earmark-text-fill'; $stat_value = $total_applications;
    $stat_label = 'Loan Applications'; $stat_theme = 'info';
    include __DIR__ . '/../components/stats-card.php';

    // Approved Loans card
    $stat_icon = 'bi-patch-check-fill'; $stat_value = $total_approved;
    $stat_label = 'Approved Loans'; $stat_theme = 'success';
    include __DIR__ . '/../components/stats-card.php';

    // Total Payments card
    $stat_icon = 'bi-cash-coin'; $stat_value = '₱' . number_format($total_paid, 2);
    $stat_label = 'Total Payments Collected'; $stat_theme = 'warning';
    include __DIR__ . '/../components/stats-card.php';
    ?>
</div>

<!-- ── Two-column row ─────────────────────────────────────── -->
<div class="row g-4">

    <!-- Recent Activity -->
    <div class="col-lg-5">
        <div class="panel h-100">
            <div class="panel-header">
                <h6><i class="bi bi-activity me-2 text-primary"></i>Recent Activity</h6>
                <span class="badge bg-primary-subtle text-primary" style="font-size:.7rem;">Live Feed</span>
            </div>
            <div class="panel-body p-0">
                <ul class="activity-list" style="padding:1rem 1.5rem;">
                    <?php foreach ($recent_activity as $act): ?>
                        <li class="activity-item">
                            <div class="activity-dot <?= htmlspecialchars($act['type']) ?>"></div>
                            <div class="activity-text">
                                <p><?= htmlspecialchars($act['action']) ?></p>
                                <small>
                                    <i class="bi bi-person me-1"></i><?= htmlspecialchars($act['by']) ?>
                                    &nbsp;·&nbsp;
                                    <i class="bi bi-clock me-1"></i><?= htmlspecialchars($act['time']) ?>
                                </small>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Recent Loan Applications Table -->
    <div class="col-lg-7">
        <div class="panel h-100">
            <div class="panel-header">
                <h6><i class="bi bi-file-earmark-text me-2 text-warning"></i>Recent Loan Applications</h6>
                <a href="index.php?page=loan-applications" class="btn btn-sm btn-outline-secondary" style="font-size:.75rem;">
                    View All <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Borrower</th>
                            <th>Amount</th>
                            <th>Term</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_slice($loan_applications, 0, 5) as $la): ?>
                            <?php
                            $status = $la['status'];
                            $smap   = ['Approved'=>'badge-approved','Pending'=>'badge-pending','Rejected'=>'badge-rejected'];
                            $sc     = $smap[$status] ?? 'badge-pending';
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($la['borrower']) ?></td>
                                <td><strong>₱<?= number_format($la['amount'], 2) ?></strong></td>
                                <td><?= htmlspecialchars($la['term']) ?></td>
                                <td><span class="badge-status <?= $sc ?>"><?= htmlspecialchars($status) ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div><!-- /row -->

<!-- ── Quick Stats Row ───────────────────────────────────── -->
<div class="row g-4 mt-1">
    <div class="col-md-4">
        <div class="panel text-center">
            <div class="panel-body">
                <div style="font-size:2.2rem;font-weight:800;color:#1a3c5e;">
                    <?= count(array_filter($borrowers, fn($b) => $b['status'] === 'Active')) ?>
                </div>
                <p class="text-muted mb-0" style="font-size:.82rem;">Active Borrowers</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel text-center">
            <div class="panel-body">
                <div style="font-size:2.2rem;font-weight:800;color:#e8a020;">
                    <?= count(array_filter($loan_applications, fn($l) => $l['status'] === 'Pending')) ?>
                </div>
                <p class="text-muted mb-0" style="font-size:.82rem;">Pending Applications</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel text-center">
            <div class="panel-body">
                <div style="font-size:2.2rem;font-weight:800;color:#38a169;">
                    ₱<?= number_format(array_sum(array_column($loans, 'remaining_balance')), 0) ?>
                </div>
                <p class="text-muted mb-0" style="font-size:.82rem;">Total Remaining Balance</p>
            </div>
        </div>
    </div>
</div>
