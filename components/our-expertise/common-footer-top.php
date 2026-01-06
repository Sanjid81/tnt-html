

<?php
$show_common_footer = carbon_get_post_meta(get_the_ID(), 'enable_common_footer_top_page');
$show_common_footer = is_array($show_common_footer) && in_array('yes', $show_common_footer);

$lead_text = carbon_get_theme_option('lead_text');
$legal_text = carbon_get_theme_option('legal_text');
$button_text = carbon_get_theme_option('button_text'); // fixed key
$button_link = carbon_get_theme_option('button_link'); // fixed key

if ($show_common_footer): ?>
    <section class="common-footer-top-section">
        <div class="overlay"></div>
        <div class="container">
            <div class="content" data-aos="fade-up">

                <?php if ($lead_text): ?>
                    <h1 class="lead-text-two"><?php echo wp_kses_post($lead_text); ?></h1>
                <?php endif; ?>

                <?php if ($legal_text): ?>
                    <p class="footer-legal-text"><?php echo wp_kses_post($legal_text); ?></p>
                <?php endif; ?>

                <div class="button-wraper">
                    <?php if ($button_text && $button_link): ?>
                        <a href="<?php echo esc_url($button_link); ?>" class="primary-button" data-aos="fade-up">
                            <div class="button-text"><?php echo esc_html($button_text); ?></div>
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                        </a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>