<?php
defined('ABSPATH') || exit;

$fields = $args['fields'] ?? [];
$title = $fields['hero_title'] ?? '';
$subtitle = $fields['hero_subtitle'] ?? '';
$bg = $fields['hero_background'] ?? '';
?>

<section >
    <h1><?php echo esc_html($title); ?></h1>
    <p><?php echo esc_html($subtitle); ?></p>
<?php if ($bg): ?>
    <img src="<?php echo esc_url($bg); ?>" alt="Hero Image">
<?php endif; ?></section>
