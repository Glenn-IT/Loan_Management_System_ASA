<?php
/**
 * Layout: Header
 * Outputs the HTML <head> section with CDN links.
 * Include this at the top of every page.
 *
 * @var string $page_title – Set before including this file.
 */
$page_title = $page_title ?? 'Loan Management System – ASA';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="<?= $root_path ?? '' ?>assets/css/style.css">
</head>
<body>
