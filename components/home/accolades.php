<?php
if (!empty($companies)): ?>


    <section class="company-section">
        <div class="banner-overlay"></div>
        <div class="company-container">
            <h2 class="heading-two">
                <?php echo esc_html($fields['accolades_title'] ?? 'Our Trusted Companies');
                ?>
            </h2>

            <div class="initail-slider">
                <div class="swiper">
                    <div class="company-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($companies as $company):
                                $logo_id = $company['logo'] ?? '';
                                ?>
                                <div class="swiper-slide">
                                    <div class="company-content">
                                        <?php if ($logo_id): ?>
                                            <?php
                                            echo wp_get_attachment_image(
                                                $logo_id,
                                                'medium',
                                                false,
                                                array(
                                                    'alt' => get_post_meta($logo_id, '_wp_attachment_image_alt', true)
                                                )
                                            );
                                            ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="initail-slider-two">
                <div class="swiper">
                    <div class="company-swiper-two">
                        <div class="swiper-wrapper">
                            <?php foreach ($companies as $company):
                                $logo_id = $company['logo'] ?? '';
                                $alt = $company['alt'] ?? '';
                                $logo_url = wp_get_attachment_url($logo_id);
                                ?>
                                <div class="swiper-slide">
                                    <div class="company-content">
                                        <?php if ($logo_url): ?>
                                            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($alt); ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="button-wrap">
                <div class="primary-button">
                    <a href="<?php echo esc_url($acolades_button_link); ?>"
                        class="button-text"><?php echo esc_html($acolades_button_text); ?></a>
                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="44" height="44" rx="22" fill="#BC001A" />
                        <g clip-path="url(#clip0_642_270)">
                            <path d="M16.166 17H26.9993V27.8333" stroke="white" stroke-width="2" stroke-miterlimit="10" />
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
        </div>
    </section>
<?php endif; ?>