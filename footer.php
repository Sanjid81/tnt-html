<?php
$footer_logo = carbon_get_theme_option('footer_logo');
$footer_mobile_logo = carbon_get_theme_option('footer_mobile_logo');
$footer_tagline = carbon_get_theme_option('footer_tagline');
$footer_address = carbon_get_theme_option('footer_address');
$footer_email = carbon_get_theme_option('footer_email');
$footer_copyright = carbon_get_theme_option('footer_copyright');
$footer_site_name = carbon_get_theme_option('footer_site_name');
$footer_site_url = carbon_get_theme_option('footer_site_url');
$privacy_policy = carbon_get_theme_option('footer_privacy_policy');
$terms_conditions = carbon_get_theme_option('footer_terms_conditions');
?>


<footer class="footer">
    <div class="container">
        <div class="footer-container">
            <!-- About / Logo Section -->
            <div class="footer-column footer-about" data-aos="fade-up">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                    <?php if ($footer_logo): ?>
                        <?php echo wp_get_attachment_image($footer_logo, 'full', false, ['alt' => get_bloginfo('name')]); ?>
                    <?php endif; ?>
                </a>

                <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-logo">
                    <?php if ($footer_mobile_logo): ?>
                        <?php echo wp_get_attachment_image($footer_mobile_logo, 'full', false, ['alt' => get_bloginfo('name')]); ?>
                    <?php endif; ?>
                </a>

                <p class="footer-text"><?php echo esc_html($footer_tagline); ?></p>
            </div>

            <!-- Areas of Expertise Section -->
            <div class="footer-column double-menu-column" data-aos="fade-up">
                <h3 class="footer-title">Areas of Expertise</h3>
                <div class="area-of-expertise">

                    <?php
                    // First column
                    wp_nav_menu(array(
                        'theme_location' => 'footer_expertise_col1',
                        'container' => false,
                        'menu_class' => 'footer-links',
                    ));

                    // Second column
                    wp_nav_menu(array(
                        'theme_location' => 'footer_expertise_col2',
                        'container' => false,
                        'menu_class' => 'footer-links',
                    ));
                    ?>

                </div>
            </div>

            <!-- Quick Links Section -->
            <div class="footer-column footer-quick-links" data-aos="fade-up">
                <h3 class="footer-title">Quick Links</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer_quicklinks',
                    'container' => false,
                    'menu_class' => 'footer-links',
                ));
                ?>
            </div>

            <!-- Contact Section -->
            <div class="footer-column footer-address" data-aos="fade-up">
                <h3 class="footer-title">Contact</h3>
                <p><?php echo nl2br(esc_html($footer_address)); ?></p>
                <div class="footer-email">
                    <!-- <span>< ?php echo esc_html($footer_email); ?></span> -->

                    <?php if ($footer_email = carbon_get_theme_option('footer_email')): ?>
                        <a href="mailto:<?php echo esc_attr($footer_email); ?>" class="footer-email-link">
                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="37" height="37" rx="18.5" stroke="white"
                                    stroke-opacity="0.3" />
                                <path
                                    d="M25 12.25H13C11.35 12.25 10 13.6 10 15.25V22.75C10 24.4 11.35 25.75 13 25.75H25C26.65 25.75 28 24.4 28 22.75V15.25C28 13.6 26.65 12.25 25 12.25ZM26.2 16.6L20.275 20.575C19.9 20.8 19.45 20.95 19 20.95C18.55 20.95 18.1 20.8 17.725 20.575L11.8 16.6C11.5 16.375 11.425 15.925 11.65 15.55C11.875 15.25 12.325 15.175 12.7 15.4L18.625 19.375C18.85 19.525 19.225 19.525 19.45 19.375L25.375 15.4C25.75 15.175 26.2 15.25 26.425 15.625C26.575 15.925 26.5 16.375 26.2 16.6Z"
                                    fill="white" />
                            </svg>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <!-- Footer Bottom -->



        <div class="footer-bottom" data-aos="fade-up">
            <div class="copy-right-text">
                <span><?php echo esc_html($footer_copyright); ?></span> | <span> Site by:</span>
                <?php if ($footer_site_name && $footer_site_url): ?>
                    <a href="<?php echo esc_url($footer_site_url); ?>" target="_blank" rel="noopener noreferrer">
                        <?php echo esc_html($footer_site_name); ?>
                    </a>
                <?php endif; ?>
            </div>

            <div class="footer-policy-terms">
                <?php if ($privacy_policy): ?>
                    <div class="privacy-policy">
                        <a href="<?php echo esc_url($privacy_policy); ?>">Privacy Policy</a>
                    </div>
                <?php endif; ?>

                <?php if ($terms_conditions): ?>
                    <div class="terms-conditions">
                        <a href="<?php echo esc_url($terms_conditions); ?>">Terms & Conditions</a>
                    </div>
                <?php endif; ?>
            </div>

        </div>

    </div>
</footer>

<?php wp_footer(); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // -------- Desktop Swiper --------
        const autoSwiper = new Swiper('.company-swiper', {
            loop: true,
            slidesPerView: 'auto',
            allowTouchMove: true,
            grabCursor: true,
            simulateTouch: true,
            speed: 10000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false, // autoplay off hobe na click/swipe korleo
                reverseDirection: true, // left e scroll hobe
            },
            freeMode: true,
            freeModeMomentum: false,
            spaceBetween: 20,

            breakpoints: {
                0: {
                    spaceBetween: 10,
                },
                801: {
                    spaceBetween: 20,
                }
            }
        });

        // Slide click listener (desktop)
        autoSwiper.slides.forEach(slide => {
            slide.addEventListener('click', () => {
                autoSwiper.slideNext();
            });
        });

        autoSwiper.on('slidesLengthChange', () => {
            autoSwiper.slides.forEach(slide => {
                slide.addEventListener('click', () => {
                    autoSwiper.slideNext();
                });
            });
        });


    });


    document.addEventListener('DOMContentLoaded', function () {
        // -------- Desktop Swiper --------
        const autoSwiper_two = new Swiper('.company-swiper-two', {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 'auto',
            allowTouchMove: true,
            grabCursor: true,
            simulateTouch: true,
            speed: 10000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false, // autoplay off hobe na click/swipe korleo
                reverseDirection: false, // left e scroll hobe
            },
            freeMode: true,
            freeModeMomentum: false,
        });

        // Slide click listener (desktop)
        autoSwiper_two.slides.forEach(slide => {
            slide.addEventListener('click', () => {
                autoSwiper_two.slideNext();
            });
        });

        autoSwiper_two.on('slidesLengthChange', () => {
            autoSwiper_two.slides.forEach(slide => {
                slide.addEventListener('click', () => {
                    autoSwiper_two.slideNext();
                });
            });
        });


    });



</script>
</body>

</html>