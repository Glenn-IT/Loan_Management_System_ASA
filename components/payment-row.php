<?php
/**
 * Component: Payment Table Row
 * Renders a single <tr> for the payments table.
 *
 * @var array $payment – Payment record from sample-data.php
 * @var int   $index   – Row number (1-based)
 */
$index   = $index   ?? 1;
$payment = $payment ?? [];

$status = $payment['status'] ?? 'Pending';
$status_class = strtolower($status) === 'paid' ? 'badge-paid' : 'badge-pending';
?>
<!-- Payment Row -->
<tr>
    <td><?= $index ?></td>
    <td><?= htmlspecialchars($payment['or_number'] ?? '–') ?></td>
    <td>
        <div class="d-flex align-items-center gap-2">
            <div style="width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#38a169,#276749);
                        display:flex;align-items:center;justify-content:center;color:#fff;font-size:.75rem;font-weight:700;flex-shrink:0;">
                <?= strtoupper(substr($payment['borrower'] ?? 'P', 0, 1)) ?>
            </div>
            <span><?= htmlspecialchars($payment['borrower'] ?? '–') ?></span>
        </div>
    </td>
    <td><strong>₱<?= number_format($payment['amount_paid'] ?? 0, 2) ?></strong></td>
    <td><?= htmlspecialchars($payment['date'] ?? '–') ?></td>
    <td><span class="badge-status <?= $status_class ?>"><?= htmlspecialchars($status) ?></span></td>
    <td>
        <button class="btn-sm-action btn-view"
                onclick="prototypeAlert('View receipt for <?= htmlspecialchars(addslashes($payment['or_number'] ?? '')) ?>')">
            <i class="bi bi-receipt"></i> Receipt
        </button>
    </td>
</tr>
