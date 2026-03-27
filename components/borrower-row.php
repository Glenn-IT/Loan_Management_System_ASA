<?php
/**
 * Component: Borrower Table Row
 * Renders a single <tr> for the borrowers table.
 *
 * @var array  $borrower – Borrower data array from sample-data.php
 * @var int    $index    – Row number (1-based)
 */
$index    = $index    ?? 1;
$borrower = $borrower ?? [];

$status       = $borrower['status'] ?? 'Active';
$status_class = strtolower($status) === 'active' ? 'badge-active' : 'badge-inactive';
?>
<!-- Borrower Row: <?= htmlspecialchars($borrower['name'] ?? '') ?> -->
<tr>
    <td><?= $index ?></td>
    <td>
        <div class="d-flex align-items-center gap-2">
            <div style="width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#1a3c5e,#2a5298);
                        display:flex;align-items:center;justify-content:center;color:#fff;font-size:.75rem;font-weight:700;flex-shrink:0;">
                <?= strtoupper(substr($borrower['name'] ?? 'B', 0, 1)) ?>
            </div>
            <span><?= htmlspecialchars($borrower['name'] ?? '–') ?></span>
        </div>
    </td>
    <td><?= htmlspecialchars($borrower['contact'] ?? '–') ?></td>
    <td><?= htmlspecialchars($borrower['address'] ?? '–') ?></td>
    <td><strong>₱<?= number_format($borrower['loan_amount'] ?? 0, 2) ?></strong></td>
    <td><span class="badge-status <?= $status_class ?>"><?= htmlspecialchars($status) ?></span></td>
    <td>
        <button class="btn-sm-action btn-view"
                onclick="prototypeAlert('View details for <?= htmlspecialchars(addslashes($borrower['name'] ?? '')) ?>')"
                title="View">
            <i class="bi bi-eye"></i> View
        </button>
        <button class="btn-sm-action btn-edit"
                onclick="prototypeAlert('Edit borrower record. (Prototype)')"
                title="Edit">
            <i class="bi bi-pencil"></i> Edit
        </button>
        <button class="btn-sm-action btn-delete"
                onclick="deleteRecord('borrower')"
                title="Delete">
            <i class="bi bi-trash"></i>
        </button>
    </td>
</tr>
