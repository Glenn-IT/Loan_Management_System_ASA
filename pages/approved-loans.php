<?php
/**
 * Page: Approved Loans
 * Shows all approved/active loans with remaining balance details.
 */

$total_loan_amount    = array_sum(array_column($loans, 'amount'));
$total_remaining      = array_sum(array_column($loans, 'remaining_balance'));
$total_monthly        = array_sum(array_column($loans, 'monthly_payment'));
?>

<!-- ── Page Header ────────────────────────────────────────── -->
<div class="page-header">
    <div>
        <h4><i class="bi bi-patch-check-fill me-2"></i>Approved Loans</h4>
        <p>All active and approved loans with payment schedules.</p>
    </div>
    <button class="btn-primary-custom" onclick="comingSoon()">
        <i class="bi bi-printer-fill"></i> Print Schedule
    </button>
</div>

<!-- ── Summary Stats ─────────────────────────────────────── -->
<div class="stats-grid" style="grid-template-columns:repeat(auto-fit,minmax(180px,1fr));margin-bottom:1.25rem;">
    <?php
    $stat_icon='bi-patch-check-fill'; $stat_value=count($loans); $stat_label='Active Loans'; $stat_theme='success';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-currency-exchange'; $stat_value='₱'.number_format($total_loan_amount,2); $stat_label='Total Approved Amount'; $stat_theme='primary';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-wallet-fill'; $stat_value='₱'.number_format($total_remaining,2); $stat_label='Total Remaining Balance'; $stat_theme='warning';
    include __DIR__ . '/../components/stats-card.php';

    $stat_icon='bi-calendar-check'; $stat_value='₱'.number_format($total_monthly,2); $stat_label='Monthly Collections'; $stat_theme='info';
    include __DIR__ . '/../components/stats-card.php';
    ?>
</div>

<!-- ── Approved Loans Table ───────────────────────────────── -->
<div class="panel">
    <div class="panel-header">
        <h6><i class="bi bi-table me-2"></i>Approved Loan List</h6>
        <div class="search-box">
            <i class="bi bi-search"></i>
            <input type="text"
                   id="tableSearch"
                   data-table="approvedTable"
                   class="form-control form-control-sm"
                   placeholder="Search loans…"
                   style="width:220px;">
        </div>
    </div>

    <div class="table-responsive">
        <table class="data-table" id="approvedTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Borrower</th>
                    <th>Loan Amount</th>
                    <th>Monthly Payment</th>
                    <th>Loan Term</th>
                    <th>Remaining Balance</th>
                    <th>Start Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($loans)): ?>
                    <tr>
                        <td colspan="9">
                            <div class="empty-state">
                                <i class="bi bi-patch-question d-block"></i>
                                No approved loans found.
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($loans as $idx => $loan_item): ?>
                    <tr>
                        <td><?= $idx + 1 ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div style="width:32px;height:32px;border-radius:50%;
                                            background:linear-gradient(135deg,#38a169,#276749);
                                            display:flex;align-items:center;justify-content:center;
                                            color:#fff;font-size:.75rem;font-weight:700;flex-shrink:0;">
                                    <?= strtoupper(substr($loan_item['borrower'], 0, 1)) ?>
                                </div>
                                <span><?= htmlspecialchars($loan_item['borrower']) ?></span>
                            </div>
                        </td>
                        <td><strong>₱<?= number_format($loan_item['amount'], 2) ?></strong></td>
                        <td>₱<?= number_format($loan_item['monthly_payment'], 2) ?></td>
                        <td><?= htmlspecialchars($loan_item['term']) ?></td>
                        <td>
                            <!-- Progress bar showing repayment progress -->
                            <?php
                            $paid_pct = round((($loan_item['amount'] - $loan_item['remaining_balance']) / $loan_item['amount']) * 100);
                            ?>
                            <div>
                                <small class="text-danger fw-bold">₱<?= number_format($loan_item['remaining_balance'], 2) ?></small>
                                <div class="progress mt-1" style="height:5px;border-radius:3px;">
                                    <div class="progress-bar bg-success" style="width:<?= $paid_pct ?>%"></div>
                                </div>
                                <small class="text-muted" style="font-size:.68rem;"><?= $paid_pct ?>% paid</small>
                            </div>
                        </td>
                        <td><?= htmlspecialchars($loan_item['start_date']) ?></td>
                        <td>
                            <span class="badge-status badge-active">
                                <?= htmlspecialchars($loan_item['status']) ?>
                            </span>
                        </td>
                        <td>
                            <button class="btn-sm-action btn-view"
                                    onclick="prototypeAlert('Viewing loan details for <?= htmlspecialchars(addslashes($loan_item['borrower'])) ?>')">
                                <i class="bi bi-eye"></i> View
                            </button>
                            <button class="btn-sm-action btn-edit"
                                    onclick="prototypeAlert('Edit loan record. (Prototype)')">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div style="padding:.75rem 1.5rem;background:#f8fafc;border-top:1px solid #e2e8f0;font-size:.78rem;color:#888;">
        Showing <?= count($loans) ?> active loan(s) &nbsp;|&nbsp;
        <span class="text-muted">Prototype – sample data only</span>
    </div>
</div>
