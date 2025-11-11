<?php
$companies = get_query_var('companies', []);
if (!empty($companies)): ?>
    <section class="company-section">
        <div class="banner-overlay"></div>
        <div class="company-container">
            <h2 class="desktop-h2" data-aos="fade-up" data-aos-delay="30" data-aos-duration="1000">Our Trusted Companies
            </h2>

            <div class="swiper" data-aos="fade-up" data-aos-delay="30" data-aos-duration="1000">
                <div class="company-swiper">
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
    </section>
<?php endif; ?>