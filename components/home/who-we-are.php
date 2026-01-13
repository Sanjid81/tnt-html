<?php
$fields = get_query_var('fields', []);
$extra_class = !empty($fields['extra_class']) ? esc_attr($fields['extra_class']) : '';
?>

<section class="who-we-are <?php echo $extra_class; ?>">
    <!-- Content -->
    <div class="container">
        <div class="who-we-are-content">
            <!-- Left Small Title -->
            <div class="who-we-are-left">
                <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="6" height="6" fill="white" fill-opacity="0.8" />
                </svg>
                <?php if (!empty($fields['small_title'])): ?>
                    <p class="button-text">
                        <?php echo esc_html($fields['small_title']); ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Right Main Content -->
            <div class="who-we-are-right">
                <?php if (!empty($fields['main_title'])): ?>
                    <?php
                    $title_parts = explode('Leader', $fields['main_title'], 2);
                    ?>
                    <h1 class="main-title heading-two">
                        <span><?php echo esc_html($title_parts[0]); ?></span>
                        <?php echo 'Leader' . esc_html($title_parts[1] ?? ''); ?>
                    </h1>
                <?php endif; ?>
                <?php if (!empty($fields['description'])): ?>
                    <div class="who-we-are-description body-text-two">
                        <?php echo wp_kses_post($fields['description']); ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($fields['button_text'])): ?>
                    <a href="<?php echo esc_url($fields['button_link']); ?>" class="primary-button">
                        <?php echo esc_html($fields['button_text']); ?>
                        <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="6" height="6" fill="white" fill-opacity="0.8" />
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>