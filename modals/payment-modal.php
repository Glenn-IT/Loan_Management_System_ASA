<?php
/**
 * Modal: Record Payment
 * Prototype form to record a borrower payment.
 */
?>
<!-- ══════════════ PAYMENT MODAL ══════════════ -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="paymentModalLabel">
                    <i class="bi bi-cash-coin me-2"></i>Record Payment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body p-4">
                <p class="text-muted small mb-3">
                    <i class="bi bi-info-circle me-1"></i>
                    Prototype form. No data will be saved.
                </p>

                <form id="paymentForm" novalidate>

                    <div class="mb-3">
                        <label class="form-label">Borrower <span class="text-danger">*</span></label>
                        <select class="form-select" name="borrower" required>
                            <option value="">-- Select Borrower --</option>
                            <option>Juan Dela Cruz</option>
                            <option>Maria Santos</option>
                            <option>Luz Villanueva</option>
                        </select>
                        <div class="invalid-feedback">Please select a borrower.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Amount Paid (₱) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="amount"
                               placeholder="e.g. 3321.43" min="1" step="0.01" required>
                        <div class="invalid-feedback">Please enter the payment amount.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Payment Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="date"
                               value="<?= date('Y-m-d') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Payment Method</label>
                        <select class="form-select" name="method">
                            <option>Cash</option>
                            <option>Bank Transfer</option>
                            <option>GCash</option>
                            <option>Check</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">OR Number</label>
                        <input type="text" class="form-control" name="or_number"
                               placeholder="e.g. OR-20260327-001">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Remarks</label>
                        <textarea class="form-control" name="remarks" rows="2"
                                  placeholder="Optional notes..."></textarea>
                    </div>

                </form>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg me-1"></i>Cancel
                </button>
                <button type="submit" form="paymentForm" class="btn-accent">
                    <i class="bi bi-check-circle-fill"></i>Record Payment
                </button>
            </div>

        </div>
    </div>
</div>
<!-- ══════════════ END PAYMENT MODAL ══════════════ -->
