<?php
/**
 * Layout: Footer
 * Outputs Bootstrap JS and custom JS, plus the closing HTML tags.
 * Include this at the bottom of every page.
 */
?>
    <!-- Bootstrap 5 Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Script -->
    <script src="<?= $root_path ?? '' ?>assets/js/script.js"></script>
</body>
</html>
