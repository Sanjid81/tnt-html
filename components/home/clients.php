<?php
if (!empty($companies)):

    $accolades_title = $fields['accolades_title'] ?? 'Our Trusted Companies';
    $acolades_button_text = $fields['acolades_button_text'] ?? 'Load more';
    $acolades_button_link = $fields['acolades_button_link'] ?? '#';

    // Duplicate companies for perfect seamless loop (recommended for 5–15 logos)
    $companies = array_merge($companies, $companies);

    ?>

    <section class="company-section">

        <div class="container">
            <div class="client-heading" data-aos="fade-up"> 
                <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="6" height="6" fill="white" fill-opacity="0.8" />
                </svg>
                <h2 class="button-text" >
                    <?php echo esc_html($accolades_title); ?>
                </h2>
            </div>

            <div class="initail-slider" data-aos="fade-up">
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
                                                    'alt' => get_post_meta($logo_id, '_wp_attachment_image_alt', true) ?: 'Company Logo'
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

        </div>
    </section>
<?php endif; ?>