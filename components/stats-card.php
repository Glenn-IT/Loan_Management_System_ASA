<?php
/**
 * Component: Stats Card
 * Renders a single summary statistic card.
 *
 * Expected variables (set before including):
 * @var string $stat_icon    – Bootstrap icon class (e.g. 'bi-people-fill')
 * @var string $stat_value   – The numeric or formatted value to display
 * @var string $stat_label   – The description label below the value
 * @var string $stat_theme   – Color theme: 'primary' | 'success' | 'warning' | 'info'
 */
$stat_icon  = $stat_icon  ?? 'bi-bar-chart';
$stat_value = $stat_value ?? '0';
$stat_label = $stat_label ?? 'Statistic';
$stat_theme = $stat_theme ?? 'primary';
?>
<!-- Stats Card: <?= htmlspecialchars($stat_label) ?> -->
<div class="stat-card <?= htmlspecialchars($stat_theme) ?>">
    <div class="stat-icon">
        <i class="bi <?= htmlspecialchars($stat_icon) ?>"></i>
    </div>
    <div class="stat-info">
        <h3><?= htmlspecialchars($stat_value) ?></h3>
        <p><?= htmlspecialchars($stat_label) ?></p>
    </div>
</div>
