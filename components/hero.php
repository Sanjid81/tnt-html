<div class="hero-section">
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php
            $slides = carbon_get_theme_option('hero_slides');
            if ($slides):
                foreach ($slides as $slide):
                    $image_url = wp_get_attachment_image_url($slide['image'], 'full');
                    ?>
                    <div class="swiper-slide">
                        <div class="content-wraper">
                            <div class="slide-content">
                                <h1 class="slide-title">
                                    <?php echo esc_html($slide['title']); ?>
                                    <?php if (!empty($slide['highlight_text'])): ?>
                                        <span><?php echo esc_html($slide['highlight_text']); ?></span>
                                    <?php endif; ?>
                                </h1>

                                <p class="slide-description"><?php echo esc_html($slide['description']); ?></p>

                                <div class="primary-button">
                                    <a href="<?php echo esc_url($slide['button_link']); ?>" class="button-text">
                                        <?php echo esc_html($slide['button_text']); ?>
                                    </a>
                                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="44" height="44" rx="22" fill="#BC001A" />
                                        <g clip-path="url(#clip0_642_270)">
                                            <path d="M16.166 17H26.9993V27.8333" stroke="white" stroke-width="2"
                                                stroke-miterlimit="10" />
                                            <path d="M16 28L27 17" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_642_270">
                                                <rect width="20" height="20" fill="white" transform="translate(12 12)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>

                            <div class="slide-image">
                                <?php if ($image_url): ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($slide['title']); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>