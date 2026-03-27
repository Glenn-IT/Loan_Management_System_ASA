<?php
/**
 * Component: Loan Application Table Row
 * Renders a single <tr> for the loan applications table.
 *
 * @var array $loan  – Loan application data array from sample-data.php
 * @var int   $index – Row number (1-based)
 */
$index = $index ?? 1;
$loan  = $loan  ?? [];

$status = $loan['status'] ?? 'Pending';
$status_class_map = [
    'Approved' => 'badge-approved',
    'Pending'  => 'badge-pending',
    'Rejected' => 'badge-rejected',
];
$status_class = $status_class_map[$status] ?? 'badge-pending';
?>
<!-- Loan Row: <?= htmlspecialchars($loan['borrower'] ?? '') ?> -->
<tr data-loan-id="<?= $loan['id'] ?? $index ?>">
    <td><?= $index ?></td>
    <td>
        <div class="d-flex align-items-center gap-2">
            <div style="width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#e8a020,#b45309);
                        display:flex;align-items:center;justify-content:center;color:#fff;font-size:.75rem;font-weight:700;flex-shrink:0;">
                <?= strtoupper(substr($loan['borrower'] ?? 'L', 0, 1)) ?>
            </div>
            <span><?= htmlspecialchars($loan['borrower'] ?? '–') ?></span>
        </div>
    </td>
    <td><strong>₱<?= number_format($loan['amount'] ?? 0, 2) ?></strong></td>
    <td><?= htmlspecialchars($loan['term'] ?? '–') ?></td>
    <td><?= htmlspecialchars($loan['application_date'] ?? '–') ?></td>
    <td><?= htmlspecialchars($loan['purpose'] ?? '–') ?></td>
    <td><span class="badge-status <?= $status_class ?>"><?= htmlspecialchars($status) ?></span></td>
    <td>
        <?php if ($status === 'Pending'): ?>
            <button class="btn-sm-action btn-approve"
                    onclick="approveLoan(<?= $loan['id'] ?? $index ?>)">
                <i class="bi bi-check-lg"></i> Approve
            </button>
            <button class="btn-sm-action btn-reject"
                    onclick="rejectLoan(<?= $loan['id'] ?? $index ?>)">
                <i class="bi bi-x-lg"></i> Reject
            </button>
        <?php else: ?>
            <button class="btn-sm-action btn-view"
                    onclick="prototypeAlert('Loan #<?= $loan['id'] ?? $index ?> is <?= $status ?>.')">
                <i class="bi bi-eye"></i> View
            </button>
        <?php endif; ?>
    </td>
</tr>
