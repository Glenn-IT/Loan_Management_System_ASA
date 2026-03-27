<?php
/**
 * Page: Borrowers Management
 * Lists all borrowers from sample data with search and add functionality.
 */
?>

<!-- ── Page Header ────────────────────────────────────────── -->
<div class="page-header">
    <div>
        <h4><i class="bi bi-people-fill me-2"></i>Borrowers</h4>
        <p>Manage all registered borrowers in the system.</p>
    </div>
    <button class="btn-primary-custom"
            data-bs-toggle="modal"
            data-bs-target="#addBorrowerModal">
        <i class="bi bi-person-plus-fill"></i> Add Borrower
    </button>
</div>

<!-- ── Summary Row ───────────────────────────────────────── -->
<div class="stats-grid" style="grid-template-columns:repeat(auto-fit,minmax(160px,1fr));margin-bottom:1.25rem;">
    <?php
    $active_count   = count(array_filter($borrowers, fn($b) => $b['status'] === 'Active'));
    $inactive_count = count(array_filter($borrowers, fn($b) => $b['status'] === 'Inactive'));
    $total_loan_val = array_sum(array_column($borrowers, 'loan_amount'));

    $stat_icon='bi-people-fill';  $stat_value=$total_borrowers; $stat_label='Total Borrowers';   $stat_theme='primary';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-person-check-fill'; $stat_value=$active_count;   $stat_label='Active';       $stat_theme='success';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-person-dash-fill';  $stat_value=$inactive_count; $stat_label='Inactive';     $stat_theme='warning';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-wallet2'; $stat_value='₱'.number_format($total_loan_val,0); $stat_label='Total Loan Value'; $stat_theme='info';
    include __DIR__ . '/../components/stats-card.php';
    ?>
</div>

<!-- ── Borrowers Table Panel ─────────────────────────────── -->
<div class="panel">
    <div class="panel-header">
        <h6><i class="bi bi-table me-2"></i>Borrower List</h6>
        <!-- Search Box -->
        <div class="search-box">
            <i class="bi bi-search"></i>
            <input type="text"
                   id="tableSearch"
                   data-table="borrowersTable"
                   class="form-control form-control-sm"
                   placeholder="Search borrowers…"
                   style="width:220px;">
        </div>
    </div>

    <div class="table-responsive">
        <table class="data-table" id="borrowersTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Borrower Name</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Loan Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($borrowers)): ?>
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">
                                <i class="bi bi-people d-block"></i>
                                No borrowers found.
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($borrowers as $idx => $borrower): ?>
                        <?php $index = $idx + 1; include __DIR__ . '/../components/borrower-row.php'; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Table Footer -->
    <div style="padding:.75rem 1.5rem;background:#f8fafc;border-top:1px solid #e2e8f0;font-size:.78rem;color:#888;">
        Showing <?= count($borrowers) ?> borrower(s) &nbsp;|&nbsp;
        <span class="text-muted">Prototype – sample data only</span>
    </div>
</div>

<!-- Include Add Borrower Modal -->
<?php include __DIR__ . '/../modals/add-borrower-modal.php'; ?>
