<?php
/**
 * Modal: Add Borrower
 * Form to add a new borrower. Prototype only – no actual data is saved.
 */
?>
<!-- ══════════════ ADD BORROWER MODAL ══════════════ -->
<div class="modal fade" id="addBorrowerModal" tabindex="-1" aria-labelledby="addBorrowerLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="addBorrowerLabel">
                    <i class="bi bi-person-plus-fill me-2"></i>Add New Borrower
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body p-4">
                <p class="text-muted small mb-3">
                    <i class="bi bi-info-circle me-1"></i>
                    This is a prototype form. No data will be saved to a database.
                </p>

                <form id="addBorrowerForm" novalidate>

                    <!-- Personal Info -->
                    <h6 class="fw-bold mb-3" style="color:#1a3c5e;border-bottom:2px solid #e8a020;padding-bottom:.4rem;display:inline-block;">
                        Personal Information
                    </h6>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name"
                                   placeholder="e.g. Juan Dela Cruz" required>
                            <div class="invalid-feedback">Please enter borrower name.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="contact"
                                   placeholder="e.g. 09123456789" required>
                            <div class="invalid-feedback">Please enter contact number.</div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-8">
                            <label class="form-label">Complete Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address"
                                   placeholder="e.g. 123 Rizal St., Quezon City" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Civil Status</label>
                            <select class="form-select" name="civil_status">
                                <option value="">Select</option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Widowed</option>
                                <option>Separated</option>
                            </select>
                        </div>
                    </div>

                    <!-- Loan Info -->
                    <h6 class="fw-bold mb-3 mt-4" style="color:#1a3c5e;border-bottom:2px solid #e8a020;padding-bottom:.4rem;display:inline-block;">
                        Loan Details
                    </h6>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Loan Amount (₱) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="loan_amount"
                                   placeholder="e.g. 50000" min="1000" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Loan Purpose</label>
                            <select class="form-select" name="purpose">
                                <option value="">Select</option>
                                <option>Business Capital</option>
                                <option>Home Improvement</option>
                                <option>Education</option>
                                <option>Medical</option>
                                <option>Livelihood</option>
                                <option>Others</option>
                            </select>
                        </div>
                    </div>

                </form>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg me-1"></i>Cancel
                </button>
                <button type="submit" form="addBorrowerForm" class="btn-primary-custom">
                    <i class="bi bi-person-check-fill"></i>Save Borrower
                </button>
            </div>

        </div>
    </div>
</div>
<!-- ══════════════ END ADD BORROWER MODAL ══════════════ -->
