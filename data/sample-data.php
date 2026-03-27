<?php
/**
 * Sample Data - Loan Management System ASA
 * This file contains all sample data arrays used throughout the prototype.
 * No database connection required - for prototype/demo purposes only.
 */

// ─── Borrowers ───────────────────────────────────────────────────────────────
$borrowers = [
    [
        "id"          => 1,
        "name"        => "Juan Dela Cruz",
        "contact"     => "09123456789",
        "address"     => "Quezon City",
        "loan_amount" => 100000,
        "status"      => "Active",
        "joined"      => "2025-01-15",
    ],
    [
        "id"          => 2,
        "name"        => "Maria Santos",
        "contact"     => "09987654321",
        "address"     => "Manila",
        "loan_amount" => 50000,
        "status"      => "Active",
        "joined"      => "2025-02-20",
    ],
    [
        "id"          => 3,
        "name"        => "Pedro Reyes",
        "contact"     => "09171234567",
        "address"     => "Caloocan City",
        "loan_amount" => 75000,
        "status"      => "Active",
        "joined"      => "2025-03-10",
    ],
    [
        "id"          => 4,
        "name"        => "Ana Gonzales",
        "contact"     => "09281234567",
        "address"     => "Pasig City",
        "loan_amount" => 30000,
        "status"      => "Inactive",
        "joined"      => "2024-11-05",
    ],
    [
        "id"          => 5,
        "name"        => "Roberto Lim",
        "contact"     => "09351234567",
        "address"     => "Makati City",
        "loan_amount" => 200000,
        "status"      => "Active",
        "joined"      => "2025-04-18",
    ],
    [
        "id"          => 6,
        "name"        => "Luz Villanueva",
        "contact"     => "09461234567",
        "address"     => "Taguig City",
        "loan_amount" => 60000,
        "status"      => "Active",
        "joined"      => "2025-05-22",
    ],
];

// ─── Loan Applications ────────────────────────────────────────────────────────
$loan_applications = [
    [
        "id"               => 1,
        "borrower"         => "Juan Dela Cruz",
        "amount"           => 100000,
        "term"             => "36 months",
        "application_date" => "2025-01-20",
        "status"           => "Approved",
        "purpose"          => "Business Capital",
    ],
    [
        "id"               => 2,
        "borrower"         => "Maria Santos",
        "amount"           => 50000,
        "term"             => "24 months",
        "application_date" => "2025-02-25",
        "status"           => "Approved",
        "purpose"          => "Home Improvement",
    ],
    [
        "id"               => 3,
        "borrower"         => "Pedro Reyes",
        "amount"           => 75000,
        "term"             => "36 months",
        "application_date" => "2025-03-15",
        "status"           => "Pending",
        "purpose"          => "Education",
    ],
    [
        "id"               => 4,
        "borrower"         => "Ana Gonzales",
        "amount"           => 30000,
        "term"             => "12 months",
        "application_date" => "2024-11-10",
        "status"           => "Rejected",
        "purpose"          => "Medical",
    ],
    [
        "id"               => 5,
        "borrower"         => "Roberto Lim",
        "amount"           => 200000,
        "term"             => "60 months",
        "application_date" => "2025-04-20",
        "status"           => "Pending",
        "purpose"          => "Business Expansion",
    ],
    [
        "id"               => 6,
        "borrower"         => "Luz Villanueva",
        "amount"           => 60000,
        "term"             => "24 months",
        "application_date" => "2025-05-25",
        "status"           => "Approved",
        "purpose"          => "Livelihood",
    ],
];

// ─── Approved Loans ───────────────────────────────────────────────────────────
$loans = [
    [
        "id"                => 1,
        "borrower"          => "Juan Dela Cruz",
        "amount"            => 100000,
        "monthly_payment"   => 3321.43,
        "term"              => "36 months",
        "remaining_balance" => 76192.00,
        "status"            => "Active",
        "start_date"        => "2025-02-01",
    ],
    [
        "id"                => 2,
        "borrower"          => "Maria Santos",
        "amount"            => 50000,
        "monthly_payment"   => 2395.84,
        "term"              => "24 months",
        "remaining_balance" => 28750.00,
        "status"            => "Active",
        "start_date"        => "2025-03-01",
    ],
    [
        "id"                => 3,
        "borrower"          => "Luz Villanueva",
        "amount"            => 60000,
        "monthly_payment"   => 2875.00,
        "term"              => "24 months",
        "remaining_balance" => 57125.00,
        "status"            => "Active",
        "start_date"        => "2025-06-01",
    ],
];

// ─── Payment Records ──────────────────────────────────────────────────────────
$payments = [
    [
        "id"          => 1,
        "borrower"    => "Juan Dela Cruz",
        "amount_paid" => 3321.43,
        "date"        => "2026-01-01",
        "status"      => "Paid",
        "or_number"   => "OR-20260101-001",
    ],
    [
        "id"          => 2,
        "borrower"    => "Juan Dela Cruz",
        "amount_paid" => 3321.43,
        "date"        => "2026-02-01",
        "status"      => "Paid",
        "or_number"   => "OR-20260201-001",
    ],
    [
        "id"          => 3,
        "borrower"    => "Juan Dela Cruz",
        "amount_paid" => 3321.43,
        "date"        => "2026-03-01",
        "status"      => "Paid",
        "or_number"   => "OR-20260301-001",
    ],
    [
        "id"          => 4,
        "borrower"    => "Maria Santos",
        "amount_paid" => 2395.84,
        "date"        => "2026-03-01",
        "status"      => "Paid",
        "or_number"   => "OR-20260301-002",
    ],
    [
        "id"          => 5,
        "borrower"    => "Maria Santos",
        "amount_paid" => 2395.84,
        "date"        => "2026-03-15",
        "status"      => "Paid",
        "or_number"   => "OR-20260315-001",
    ],
    [
        "id"          => 6,
        "borrower"    => "Luz Villanueva",
        "amount_paid" => 2875.00,
        "date"        => "2026-03-20",
        "status"      => "Pending",
        "or_number"   => "OR-20260320-001",
    ],
];

// ─── Recent Activity ──────────────────────────────────────────────────────────
$recent_activity = [
    ["action" => "New loan application submitted", "by" => "Pedro Reyes",     "time" => "2 hours ago",   "type" => "info"],
    ["action" => "Payment recorded",               "by" => "Juan Dela Cruz",  "time" => "5 hours ago",   "type" => "success"],
    ["action" => "Loan approved",                  "by" => "Luz Villanueva",  "time" => "1 day ago",     "type" => "success"],
    ["action" => "Loan application rejected",      "by" => "Ana Gonzales",    "time" => "3 days ago",    "type" => "danger"],
    ["action" => "New borrower registered",        "by" => "Roberto Lim",     "time" => "4 days ago",    "type" => "primary"],
    ["action" => "Payment recorded",               "by" => "Maria Santos",    "time" => "5 days ago",    "type" => "success"],
];

// ─── Helper: Compute Summary Stats ───────────────────────────────────────────
$total_borrowers       = count($borrowers);
$total_applications    = count($loan_applications);
$total_approved        = count(array_filter($loan_applications, fn($l) => $l['status'] === 'Approved'));
$total_paid            = array_sum(array_column(
    array_filter($payments, fn($p) => $p['status'] === 'Paid'),
    'amount_paid'
));
