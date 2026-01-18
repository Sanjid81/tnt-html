<?php
$fields = get_query_var('fields', []);
$bg = !empty($fields['hero_bg']) ? esc_url($fields['hero_bg']) : '';
$heading = $fields['hero_heading'] ?? '';
$button_text = !empty($fields['hero_button_text']) ? esc_html($fields['hero_button_text']) : '';
$button_link = !empty($fields['hero_button_link']) ? esc_url($fields['hero_button_link']) : '';
$extra_class = !empty($fields['extra_class']) ? esc_attr($fields['extra_class']) : '';

?>

<section class="footer-top-section <?php echo $extra_class; ?>">
    <div class=" footer-top-background-img">
        <?php if ($bg): ?>
            <img src="<?php echo $bg; ?>" alt="Hero Background" class="">
        <?php endif; ?>
    </div>

    <!-- Content -->
    <div class="footer-top-container">
        <!-- Heading -->
        <?php if ($heading): ?>
            <h1 class="heading-one" data-aos="fade-up">
                <?php echo wp_kses_post($heading); ?>
            </h1>
        <?php endif; ?>

        <!-- CTA Button -->
        <?php if ($button_text && $button_link): ?>
            <a href="<?php echo $button_link; ?>" class="primary-button" data-aos="fade-up">
                <?php echo $button_text; ?>
                <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="6" height="6" fill="white" />
                </svg>

            </a>
        <?php endif; ?>
    </div>
</section>