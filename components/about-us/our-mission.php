<section class="about-mission-section">

    <div class="container">
        <div class="our-mission-content">
            <?php if (!empty($fields['hero_title'])): ?>
                <h1 class="mission-title button-text">
                    <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="6" height="6" fill="white" fill-opacity="0.8" />
                    </svg>

                    <?php echo esc_html($fields['hero_title']); ?>
                </h1>
            <?php endif; ?>

            <?php if (!empty($fields['hero_subtitle'])): ?>
                <p class="heading-two ">
                    <?php echo nl2br(esc_html($fields['hero_subtitle'])); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

</section>