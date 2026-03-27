<?php
/**
 * Modal: Add Loan Application
 * Prototype form to submit a new loan application.
 */
?>
<!-- ══════════════ ADD LOAN MODAL ══════════════ -->
<div class="modal fade" id="addLoanModal" tabindex="-1" aria-labelledby="addLoanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="addLoanLabel">
                    <i class="bi bi-file-earmark-plus-fill me-2"></i>New Loan Application
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body p-4">
                <p class="text-muted small mb-3">
                    <i class="bi bi-info-circle me-1"></i>
                    Prototype form. Data is not saved to any database.
                </p>

                <form id="addLoanForm" novalidate>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Borrower Name <span class="text-danger">*</span></label>
                            <select class="form-select" name="borrower" required>
                                <option value="">-- Select Borrower --</option>
                                <option>Juan Dela Cruz</option>
                                <option>Maria Santos</option>
                                <option>Pedro Reyes</option>
                                <option>Ana Gonzales</option>
                                <option>Roberto Lim</option>
                                <option>Luz Villanueva</option>
                            </select>
                            <div class="invalid-feedback">Please select a borrower.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Loan Amount (₱) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="amount"
                                   placeholder="e.g. 100000" min="1000" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Loan Term <span class="text-danger">*</span></label>
                            <select class="form-select" name="term" required>
                                <option value="">-- Select Term --</option>
                                <option>12 months</option>
                                <option>24 months</option>
                                <option>36 months</option>
                                <option>48 months</option>
                                <option>60 months</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Loan Purpose <span class="text-danger">*</span></label>
                            <select class="form-select" name="purpose" required>
                                <option value="">-- Select Purpose --</option>
                                <option>Business Capital</option>
                                <option>Home Improvement</option>
                                <option>Education</option>
                                <option>Medical</option>
                                <option>Livelihood</option>
                                <option>Others</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Application Date</label>
                            <input type="date" class="form-control" name="date"
                                   value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Interest Rate (%)</label>
                            <input type="number" class="form-control" name="interest"
                                   placeholder="e.g. 5" value="5" min="0" max="100">
                        </div>
                    </div>

                </form>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg me-1"></i>Cancel
                </button>
                <button type="submit" form="addLoanForm" class="btn-primary-custom">
                    <i class="bi bi-send-fill"></i>Submit Application
                </button>
            </div>

        </div>
    </div>
</div>
<!-- ══════════════ END ADD LOAN MODAL ══════════════ -->
