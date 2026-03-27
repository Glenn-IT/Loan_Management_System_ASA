<?php
/**
 * Modal: Logout Confirmation
 * Asks the user to confirm before logging out.
 */
?>
<!-- ══════════════ LOGOUT MODAL ══════════════ -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:380px;">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="logoutModalLabel">
                    <i class="bi bi-box-arrow-left me-2"></i>Confirm Logout
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body p-4 text-center">
                <div style="width:70px;height:70px;border-radius:50%;background:#fed7d7;
                            display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                    <i class="bi bi-power" style="font-size:2rem;color:#e53e3e;"></i>
                </div>
                <h6 class="fw-bold mb-2">Are you sure you want to logout?</h6>
                <p class="text-muted small">You will be redirected to the login page.</p>
            </div>

            <!-- Footer -->
            <div class="modal-footer justify-content-center gap-2">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg me-1"></i>No, Stay
                </button>
                <a href="<?= ($root_path ?? '') ?>logout.php" class="btn btn-danger px-4">
                    <i class="bi bi-box-arrow-left me-1"></i>Yes, Logout
                </a>
            </div>

        </div>
    </div>
</div>
<!-- ══════════════ END LOGOUT MODAL ══════════════ -->
