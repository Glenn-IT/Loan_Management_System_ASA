<?php
/**
 * Page: Reports
 * Loan summary and monthly payment reports. Prototype only.
 */

// Compute report data from sample arrays
$report_data = [];
foreach ($borrowers as $b) {
    // Find approved loan for this borrower
    $borrower_loan = null;
    foreach ($loans as $l) {
        if ($l['borrower'] === $b['name']) { $borrower_loan = $l; break; }
    }

    // Sum payments for this borrower
    $borrower_payments = array_filter($payments, fn($p) => $p['borrower'] === $b['name'] && $p['status'] === 'Paid');
    $total_paid_b = array_sum(array_column($borrower_payments, 'amount_paid'));

    $report_data[] = [
        'name'      => $b['name'],
        'loan_amt'  => $borrower_loan ? $borrower_loan['amount']            : $b['loan_amount'],
        'total_paid'=> $total_paid_b,
        'remaining' => $borrower_loan ? $borrower_loan['remaining_balance'] : ($b['loan_amount'] - $total_paid_b),
        'monthly'   => $borrower_loan ? $borrower_loan['monthly_payment']   : 0,
        'status'    => $borrower_loan ? $borrower_loan['status']            : 'Pending',
    ];
}

// Monthly summary: group payments by month
$monthly_summary = [];
foreach ($payments as $p) {
    if ($p['status'] !== 'Paid') continue;
    $month = date('F Y', strtotime($p['date']));
    if (!isset($monthly_summary[$month])) {
        $monthly_summary[$month] = ['count' => 0, 'total' => 0];
    }
    $monthly_summary[$month]['count']++;
    $monthly_summary[$month]['total'] += $p['amount_paid'];
}
?>

<!-- ── Page Header ────────────────────────────────────────── -->
<div class="page-header">
    <div>
        <h4><i class="bi bi-bar-chart-fill me-2"></i>Reports</h4>
        <p>System-generated reports for loan and payment summaries.</p>
    </div>
    <button class="btn-accent" onclick="downloadReport('Full System Report')">
        <i class="bi bi-download"></i> Download Report
    </button>
</div>

<!-- ── Highlight Stats ────────────────────────────────────── -->
<div class="stats-grid" style="grid-template-columns:repeat(auto-fit,minmax(180px,1fr));margin-bottom:1.75rem;">
    <?php
    $grand_loan_total = array_sum(array_column($report_data, 'loan_amt'));
    $grand_paid_total = array_sum(array_column($report_data, 'total_paid'));
    $grand_remaining  = array_sum(array_column($report_data, 'remaining'));

    $stat_icon='bi-currency-dollar'; $stat_value='₱'.number_format($grand_loan_total,2); $stat_label='Total Loans Issued'; $stat_theme='primary';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-check-circle-fill'; $stat_value='₱'.number_format($grand_paid_total,2); $stat_label='Total Amount Paid'; $stat_theme='success';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-wallet-fill'; $stat_value='₱'.number_format($grand_remaining,2); $stat_label='Total Remaining'; $stat_theme='warning';
    include __DIR__ . '/../components/stats-card.php';

    $collection_rate = $grand_loan_total > 0 ? round(($grand_paid_total / $grand_loan_total) * 100, 1) : 0;
    $stat_icon='bi-graph-up-arrow'; $stat_value=$collection_rate.'%'; $stat_label='Collection Rate'; $stat_theme='info';
    include __DIR__ . '/../components/stats-card.php';
    ?>
</div>

<!-- ── Report Section 1: Loan Summary ────────────────────── -->
<div class="panel report-section">
    <div class="panel-header">
        <h6><i class="bi bi-file-earmark-bar-graph me-2 text-primary"></i>Loan Summary Report</h6>
        <button class="btn btn-sm btn-outline-secondary" onclick="downloadReport('Loan Summary')">
            <i class="bi bi-file-excel"></i> Export
        </button>
    </div>
    <div class="table-responsive">
        <table class="data-table" id="loanSummaryTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Borrower</th>
                    <th>Loan Amount</th>
                    <th>Total Paid</th>
                    <th>Remaining Balance</th>
                    <th>Monthly Payment</th>
                    <th>Collection %</th>
                    <th>Loan Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($report_data as $idx => $rd): ?>
                    <?php
                    $coll_pct = $rd['loan_amt'] > 0 ? round(($rd['total_paid'] / $rd['loan_amt']) * 100, 1) : 0;
                    $status   = $rd['status'];
                    $sc       = ['Active' => 'badge-active', 'Pending' => 'badge-pending', 'Approved' => 'badge-approved'][$status] ?? 'badge-pending';
                    ?>
                    <tr>
                        <td><?= $idx + 1 ?></td>
                        <td><?= htmlspecialchars($rd['name']) ?></td>
                        <td>₱<?= number_format($rd['loan_amt'], 2) ?></td>
                        <td class="text-success fw-semibold">₱<?= number_format($rd['total_paid'], 2) ?></td>
                        <td class="text-danger fw-semibold">₱<?= number_format($rd['remaining'], 2) ?></td>
                        <td><?= $rd['monthly'] > 0 ? '₱'.number_format($rd['monthly'], 2) : '–' ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="progress flex-grow-1" style="height:6px;">
                                    <div class="progress-bar bg-success" style="width:<?= $coll_pct ?>%"></div>
                                </div>
                                <small><?= $coll_pct ?>%</small>
                            </div>
                        </td>
                        <td><span class="badge-status <?= $sc ?>"><?= htmlspecialchars($status) ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <!-- Totals row -->
            <tfoot>
                <tr style="background:#f0f4f8;font-weight:700;">
                    <td colspan="2" style="padding:.75rem 1rem;">TOTAL</td>
                    <td>₱<?= number_format($grand_loan_total, 2) ?></td>
                    <td class="text-success">₱<?= number_format($grand_paid_total, 2) ?></td>
                    <td class="text-danger">₱<?= number_format($grand_remaining, 2) ?></td>
                    <td>–</td>
                    <td><?= $collection_rate ?>%</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- ── Report Section 2: Monthly Payments ─────────────────── -->
<div class="panel report-section">
    <div class="panel-header">
        <h6><i class="bi bi-calendar3 me-2 text-success"></i>Monthly Payment Report</h6>
        <button class="btn btn-sm btn-outline-secondary" onclick="downloadReport('Monthly Payment')">
            <i class="bi bi-file-excel"></i> Export
        </button>
    </div>

    <?php if (empty($monthly_summary)): ?>
        <div class="panel-body">
            <div class="empty-state">
                <i class="bi bi-calendar-x d-block"></i>
                No payment data available.
            </div>
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Month / Period</th>
                        <th>Number of Payments</th>
                        <th>Total Amount Collected</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $mi = 1; foreach ($monthly_summary as $month => $ms): ?>
                        <tr>
                            <td><?= $mi++ ?></td>
                            <td><i class="bi bi-calendar3 me-1 text-muted"></i><?= htmlspecialchars($month) ?></td>
                            <td><?= $ms['count'] ?> transaction(s)</td>
                            <td class="text-success fw-semibold">₱<?= number_format($ms['total'], 2) ?></td>
                            <td><span class="badge-status badge-paid">Collected</span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr style="background:#f0f4f8;font-weight:700;">
                        <td colspan="2" style="padding:.75rem 1rem;">TOTAL</td>
                        <td><?= count($payments) ?> transactions</td>
                        <td class="text-success">₱<?= number_format($grand_paid_total, 2) ?></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php endif; ?>
</div>

<!-- ── Prototype Note ─────────────────────────────────────── -->
<div class="alert alert-warning d-flex align-items-center gap-2" style="border-radius:10px;font-size:.83rem;">
    <i class="bi bi-exclamation-triangle-fill fs-5"></i>
    <div>
        <strong>Prototype Notice:</strong> All data shown here is sample data for demonstration purposes only.
        Download functionality is not active in this prototype version.
    </div>
</div>
