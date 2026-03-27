# Loan Management System – ASA
## Prototype Version

A structured PHP prototype for a Loan Management System built for demonstration and UI/UX workflow purposes.

---

## Technology Stack

| Layer        | Technology                    |
|--------------|-------------------------------|
| Backend      | PHP (modular, MVC-like)       |
| CSS Framework| Bootstrap 5 (CDN)             |
| Icons        | Bootstrap Icons (CDN)         |
| JavaScript   | Vanilla JS                    |
| Data         | PHP sample arrays (no DB)     |

---

## Project Structure

```
Loan_Management_System_ASA/
│
├── index.php               ← Main router / entry point
├── login.php               ← Login page (prototype auth)
├── logout.php              ← Session destroyer
│
├── data/
│   └── sample-data.php     ← All sample PHP arrays
│
├── layouts/
│   ├── header.php          ← HTML <head> + CDN links
│   ├── footer.php          ← Closing scripts + </body>
│   ├── navbar.php          ← Top navigation bar
│   └── sidebar.php         ← Left sidebar navigation
│
├── pages/
│   ├── dashboard.php       ← Overview stats & activity
│   ├── borrowers.php       ← Borrower management table
│   ├── loan-applications.php ← Application review
│   ├── approved-loans.php  ← Active loans with balances
│   ├── payments.php        ← Payment transaction log
│   └── reports.php         ← Loan & payment reports
│
├── components/
│   ├── stats-card.php      ← Reusable stat summary card
│   ├── borrower-row.php    ← Borrower table row
│   ├── loan-row.php        ← Loan application table row
│   └── payment-row.php     ← Payment table row
│
├── modals/
│   ├── add-borrower-modal.php  ← Add borrower form modal
│   ├── add-loan-modal.php      ← New loan application modal
│   ├── payment-modal.php       ← Record payment modal
│   └── logout-modal.php        ← Logout confirmation modal
│
├── assets/
│   ├── css/
│   │   └── style.css       ← Custom stylesheet
│   ├── js/
│   │   └── script.js       ← Vanilla JS interactions
│   └── images/
│       └── profile-default.png
│
└── README.md
```

---

## How to Run

### Requirements
- **XAMPP** (or any PHP 8.x server)
- PHP 8.0+
- A modern web browser

### Steps

1. Place the project folder inside:
   ```
   C:\xampp\htdocs\Loan_Management_System_ASA\
   ```

2. Start **Apache** from XAMPP Control Panel.

3. Open your browser and navigate to:
   ```
   http://localhost/Loan_Management_System_ASA/Loan_Management_System_ASA/
   ```

4. You will be redirected to the **login page**.

5. Enter **any username and password** (e.g., `admin` / `admin123`).

6. You will be taken to the **Dashboard**.

---

## System Pages

| Page               | URL                              | Description                          |
|--------------------|----------------------------------|--------------------------------------|
| Login              | `login.php`                      | Prototype login form                 |
| Dashboard          | `index.php`                      | Summary stats & recent activity      |
| Borrowers          | `index.php?page=borrowers`       | Borrower list with Add/Edit/Delete   |
| Loan Applications  | `index.php?page=loan-applications` | Review, Approve, Reject applications |
| Approved Loans     | `index.php?page=approved-loans`  | Active loans with balance tracker    |
| Payments           | `index.php?page=payments`        | Payment records & Record Payment     |
| Reports            | `index.php?page=reports`         | Loan & monthly payment reports       |

---

## Sample Data

The file `data/sample-data.php` contains:

- **6 borrowers** (various cities)
- **6 loan applications** (Approved / Pending / Rejected)
- **3 active loans** (with remaining balances)
- **6 payment records** (Paid / Pending)
- **6 recent activity** events

---

## Key Features (Prototype)

- ✅ Login / Logout with session simulation
- ✅ Responsive sidebar navigation
- ✅ Stats cards on every page
- ✅ Searchable data tables
- ✅ Add Borrower modal form
- ✅ New Loan Application modal
- ✅ Record Payment modal
- ✅ Approve / Reject loan actions (UI only)
- ✅ Loan balance progress bar
- ✅ Collection rate percentage
- ✅ Monthly payment report grouping
- ✅ Toast notifications
- ✅ Logout confirmation modal
- ✅ Mobile responsive layout

---

## Important Notes

> **This is a PROTOTYPE system.**
> - No database is connected.
> - No real authentication is performed.
> - All data modifications are visual only (client-side).
> - Forms are validated but do not persist data.
> - Download/export buttons trigger alerts only.

---

## Developer Notes

To extend this prototype into a full system:

1. Replace `data/sample-data.php` arrays with MySQL PDO queries.
2. Add real authentication in `login.php` with password hashing.
3. Convert modal forms to use `fetch()` / AJAX with PHP backend endpoints.
4. Add CRUD operations for each module.
5. Implement pagination for large datasets.

---

*Developed as a prototype for ASA Loan Management System – 2026*
