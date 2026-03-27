/**
 * Loan Management System – ASA | Main JavaScript
 * Handles: modal interactions, UI helpers, alerts, navigation
 * Prototype only – no real backend calls
 */

/* ── DOM Ready ───────────────────────────────────────────── */
document.addEventListener('DOMContentLoaded', function () {

    // Highlight active nav link based on current URL
    highlightActiveNav();

    // Initialize tooltips (Bootstrap 5)
    const tooltipEls = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipEls.forEach(el => new bootstrap.Tooltip(el));

    // Search filter (if search box is present)
    initTableSearch();

    // Mobile sidebar toggle
    initMobileSidebar();
});

/* ── Active Navigation ───────────────────────────────────── */
function highlightActiveNav() {
    const current = window.location.href;
    document.querySelectorAll('.sidebar-nav .nav-link').forEach(link => {
        if (link.href && current.includes(link.getAttribute('href'))) {
            link.classList.add('active');
        }
    });
}

/* ── Prototype Alert ─────────────────────────────────────── */
function comingSoon() {
    showToast('This feature is coming soon. (Prototype Only)', 'warning');
}

function prototypeAlert(msg) {
    const text = msg || 'This action is for prototype demonstration only.';
    showToast(text, 'info');
}

/* ── Toast Notification ──────────────────────────────────── */
function showToast(message, type) {
    type = type || 'info';
    const colors = {
        success: '#38a169',
        warning: '#e8a020',
        danger:  '#e53e3e',
        info:    '#3182ce',
    };
    const icons = {
        success: 'bi-check-circle-fill',
        warning: 'bi-exclamation-triangle-fill',
        danger:  'bi-x-circle-fill',
        info:    'bi-info-circle-fill',
    };

    // Create toast container if not present
    let container = document.getElementById('toast-container');
    if (!container) {
        container = document.createElement('div');
        container.id = 'toast-container';
        container.style.cssText = 'position:fixed;top:80px;right:20px;z-index:9999;display:flex;flex-direction:column;gap:8px;';
        document.body.appendChild(container);
    }

    const toast = document.createElement('div');
    toast.style.cssText = `
        background:#fff;
        border-left:4px solid ${colors[type]};
        border-radius:10px;
        box-shadow:0 4px 20px rgba(0,0,0,.15);
        padding:12px 16px;
        display:flex;
        align-items:center;
        gap:10px;
        min-width:280px;
        max-width:360px;
        animation:slideIn .3s ease;
        font-size:.85rem;
        color:#333;
    `;
    toast.innerHTML = `
        <i class="bi ${icons[type]}" style="color:${colors[type]};font-size:1.1rem;flex-shrink:0;"></i>
        <span style="flex:1;">${message}</span>
        <button onclick="this.parentElement.remove()" style="background:none;border:none;cursor:pointer;color:#aaa;font-size:1rem;padding:0;">&times;</button>
    `;
    container.appendChild(toast);

    // Auto-dismiss after 4 seconds
    setTimeout(() => { if (toast.parentElement) toast.remove(); }, 4000);
}

// CSS animation for toast slide-in
(function () {
    const style = document.createElement('style');
    style.textContent = '@keyframes slideIn{from{opacity:0;transform:translateX(40px)}to{opacity:1;transform:translateX(0)}}';
    document.head.appendChild(style);
})();

/* ── Confirm Action ──────────────────────────────────────── */
function confirmAction(message, callback) {
    if (confirm(message || 'Are you sure?')) {
        if (typeof callback === 'function') callback();
    }
}

/* ── Approve Loan (Prototype) ────────────────────────────── */
function approveLoan(id) {
    confirmAction('Approve this loan application? (Prototype)', function () {
        showToast('Loan application #' + id + ' approved! (Prototype Only)', 'success');
        // Update status badge in table (visual only)
        const row = document.querySelector('[data-loan-id="' + id + '"]');
        if (row) {
            const badge = row.querySelector('.badge-status');
            if (badge) {
                badge.className = 'badge-status badge-approved';
                badge.innerHTML = '<span></span> Approved';
            }
        }
    });
}

/* ── Reject Loan (Prototype) ─────────────────────────────── */
function rejectLoan(id) {
    confirmAction('Reject this loan application? (Prototype)', function () {
        showToast('Loan application #' + id + ' rejected. (Prototype Only)', 'danger');
        const row = document.querySelector('[data-loan-id="' + id + '"]');
        if (row) {
            const badge = row.querySelector('.badge-status');
            if (badge) {
                badge.className = 'badge-status badge-rejected';
                badge.innerHTML = '<span></span> Rejected';
            }
        }
    });
}

/* ── Delete Record (Prototype) ───────────────────────────── */
function deleteRecord(label) {
    confirmAction('Delete this ' + (label || 'record') + '? (Prototype)', function () {
        showToast('Record deleted. (Prototype Only)', 'danger');
    });
}

/* ── Download Report (Prototype) ─────────────────────────── */
function downloadReport(type) {
    showToast('Download "' + (type || 'Report') + '" – Prototype Only. No file generated.', 'warning');
}

/* ── Table Search Filter ─────────────────────────────────── */
function initTableSearch() {
    const searchInput = document.getElementById('tableSearch');
    if (!searchInput) return;

    searchInput.addEventListener('input', function () {
        const query   = this.value.toLowerCase().trim();
        const tableId = this.getAttribute('data-table') || 'mainTable';
        const table   = document.getElementById(tableId);
        if (!table) return;

        const rows = table.querySelectorAll('tbody tr');
        rows.forEach(function (row) {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(query) ? '' : 'none';
        });
    });
}

/* ── Mobile Sidebar Toggle ───────────────────────────────── */
function initMobileSidebar() {
    const toggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.sidebar');
    if (!toggle || !sidebar) return;

    toggle.addEventListener('click', function () {
        sidebar.classList.toggle('open');
    });

    // Close when clicking outside
    document.addEventListener('click', function (e) {
        if (!sidebar.contains(e.target) && e.target !== toggle) {
            sidebar.classList.remove('open');
        }
    });
}

/* ── Modal Helpers ───────────────────────────────────────── */
function openModal(id) {
    const el = document.getElementById(id);
    if (el) {
        const modal = new bootstrap.Modal(el);
        modal.show();
    }
}

function closeModal(id) {
    const el = document.getElementById(id);
    if (el) {
        const modal = bootstrap.Modal.getInstance(el);
        if (modal) modal.hide();
    }
}

/* ── Form Submit (Prototype) ─────────────────────────────── */
function handleFormSubmit(formId, successMsg, modalId) {
    const form = document.getElementById(formId);
    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Basic validation check
        const inputs = form.querySelectorAll('[required]');
        let valid = true;
        inputs.forEach(function (input) {
            if (!input.value.trim()) {
                input.classList.add('is-invalid');
                valid = false;
            } else {
                input.classList.remove('is-invalid');
            }
        });

        if (!valid) {
            showToast('Please fill in all required fields.', 'warning');
            return;
        }

        // Simulate success
        if (modalId) closeModal(modalId);
        form.reset();
        showToast(successMsg || 'Record saved successfully! (Prototype Only)', 'success');
    });
}

/* ── Initialize Forms when page loads ───────────────────── */
document.addEventListener('DOMContentLoaded', function () {
    handleFormSubmit('addBorrowerForm',  'Borrower added successfully! (Prototype)', 'addBorrowerModal');
    handleFormSubmit('addLoanForm',      'Loan application submitted! (Prototype)',  'addLoanModal');
    handleFormSubmit('paymentForm',      'Payment recorded successfully! (Prototype)', 'paymentModal');
});
