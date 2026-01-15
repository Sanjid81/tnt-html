<section class="service-hero-section">
    <div class="service-image-wrapper">
        <?php if (!empty($fields['hero_image'])): ?>

            <img src="<?php echo esc_url(wp_get_attachment_image_url($fields['hero_image'], 'large')); ?>"
                alt="<?php echo esc_attr($fields['hero_title']); ?>" class="foreground-image" />

        <?php endif; ?>
        <div class="overlay"></div>
        <div class="container">
            <div class="service-hero-content">
                <?php if (!empty($fields['hero_title'])): ?>
                    <h1 class="hero-title heading-one">
                        <?php echo esc_html($fields['hero_title']); ?>
                    </h1>
                <?php endif; ?>

                <?php if (!empty($fields['hero_subtitle'])): ?>
                    <p class="hero-subtitle body-text">
                        <?php echo nl2br(esc_html($fields['hero_subtitle'])); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>