<?php
/**
 * Page: Payments Monitoring
 * Lists all payment records and allows recording new payments.
 */

$paid_payments    = array_filter($payments, fn($p) => $p['status'] === 'Paid');
$pending_payments = array_filter($payments, fn($p) => $p['status'] === 'Pending');
$total_collected  = array_sum(array_column($paid_payments, 'amount_paid'));
?>

<!-- ── Page Header ────────────────────────────────────────── -->
<div class="page-header">
    <div>
        <h4><i class="bi bi-cash-coin me-2"></i>Payments Monitoring</h4>
        <p>Track and record borrower payment transactions.</p>
    </div>
    <button class="btn-accent"
            data-bs-toggle="modal"
            data-bs-target="#paymentModal">
        <i class="bi bi-plus-circle-fill"></i> Record Payment
    </button>
</div>

<!-- ── Summary Stats ─────────────────────────────────────── -->
<div class="stats-grid" style="grid-template-columns:repeat(auto-fit,minmax(170px,1fr));margin-bottom:1.25rem;">
    <?php
    $stat_icon='bi-receipt'; $stat_value=count($payments); $stat_label='Total Transactions'; $stat_theme='primary';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-check-circle-fill'; $stat_value=count($paid_payments); $stat_label='Paid'; $stat_theme='success';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-hourglass-split'; $stat_value=count($pending_payments); $stat_label='Pending'; $stat_theme='warning';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-cash-stack'; $stat_value='₱'.number_format($total_collected,2); $stat_label='Total Collected'; $stat_theme='info';
    include __DIR__ . '/../components/stats-card.php';
    ?>
</div>

<!-- ── Payments Table ─────────────────────────────────────── -->
<div class="panel">
    <div class="panel-header">
        <h6><i class="bi bi-table me-2"></i>Payment Records</h6>
        <div class="search-box">
            <i class="bi bi-search"></i>
            <input type="text"
                   id="tableSearch"
                   data-table="paymentsTable"
                   class="form-control form-control-sm"
                   placeholder="Search payments…"
                   style="width:220px;">
        </div>
    </div>

    <div class="table-responsive">
        <table class="data-table" id="paymentsTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>OR Number</th>
                    <th>Borrower</th>
                    <th>Amount Paid</th>
                    <th>Payment Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($payments)): ?>
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">
                                <i class="bi bi-cash-stack d-block"></i>
                                No payment records found.
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($payments as $idx => $payment): ?>
                        <?php $index = $idx + 1; include __DIR__ . '/../components/payment-row.php'; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div style="padding:.75rem 1.5rem;background:#f8fafc;border-top:1px solid #e2e8f0;font-size:.78rem;color:#888;">
        Showing <?= count($payments) ?> record(s) &nbsp;|&nbsp;
        <span class="text-muted">Prototype – sample data only</span>
    </div>
</div>

<!-- Include Payment Modal -->
<?php include __DIR__ . '/../modals/payment-modal.php'; ?>
