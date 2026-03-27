<?php
/**
 * Page: Loan Applications
 * Lists all loan applications with approve/reject actions.
 */

$pending_count  = count(array_filter($loan_applications, fn($l) => $l['status'] === 'Pending'));
$approved_count = count(array_filter($loan_applications, fn($l) => $l['status'] === 'Approved'));
$rejected_count = count(array_filter($loan_applications, fn($l) => $l['status'] === 'Rejected'));
?>

<!-- ── Page Header ────────────────────────────────────────── -->
<div class="page-header">
    <div>
        <h4><i class="bi bi-file-earmark-text-fill me-2"></i>Loan Applications</h4>
        <p>Review and process incoming loan applications.</p>
    </div>
    <button class="btn-primary-custom"
            data-bs-toggle="modal"
            data-bs-target="#addLoanModal">
        <i class="bi bi-file-earmark-plus-fill"></i> New Application
    </button>
</div>

<!-- ── Summary Stats ─────────────────────────────────────── -->
<div class="stats-grid" style="grid-template-columns:repeat(auto-fit,minmax(160px,1fr));margin-bottom:1.25rem;">
    <?php
    $stat_icon='bi-file-earmark-text-fill'; $stat_value=count($loan_applications); $stat_label='Total Applications'; $stat_theme='primary';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-hourglass-split'; $stat_value=$pending_count;  $stat_label='Pending';  $stat_theme='warning';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-patch-check-fill'; $stat_value=$approved_count; $stat_label='Approved'; $stat_theme='success';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-x-circle-fill'; $stat_value=$rejected_count; $stat_label='Rejected'; $stat_theme='info';
    include __DIR__ . '/../components/stats-card.php';
    ?>
</div>

<!-- ── Applications Table ─────────────────────────────────── -->
<div class="panel">
    <div class="panel-header">
        <h6><i class="bi bi-table me-2"></i>All Loan Applications</h6>
        <div class="search-box">
            <i class="bi bi-search"></i>
            <input type="text"
                   id="tableSearch"
                   data-table="loansTable"
                   class="form-control form-control-sm"
                   placeholder="Search applications…"
                   style="width:220px;">
        </div>
    </div>

    <div class="table-responsive">
        <table class="data-table" id="loansTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Borrower Name</th>
                    <th>Loan Amount</th>
                    <th>Loan Term</th>
                    <th>Application Date</th>
                    <th>Purpose</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($loan_applications)): ?>
                    <tr>
                        <td colspan="8">
                            <div class="empty-state">
                                <i class="bi bi-file-earmark-x d-block"></i>
                                No loan applications found.
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($loan_applications as $idx => $loan): ?>
                        <?php $index = $idx + 1; include __DIR__ . '/../components/loan-row.php'; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div style="padding:.75rem 1.5rem;background:#f8fafc;border-top:1px solid #e2e8f0;font-size:.78rem;color:#888;">
        Showing <?= count($loan_applications) ?> application(s) &nbsp;|&nbsp;
        <span class="text-muted">Prototype – sample data only</span>
    </div>
</div>

<!-- Include Add Loan Modal -->
<?php include __DIR__ . '/../modals/add-loan-modal.php'; ?>
