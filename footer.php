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

            <div class="footer-menu-links">
                <!-- Areas of Expertise Section -->
                <div class="footer-column footer-quick-links" data-aos="fade-up">
                    <h3 class="footer-title">Services</h3>
                    <div class="area-of-expertise">

                        <?php
                        // First column
                        wp_nav_menu(array(
                            'theme_location' => 'footer_expertise_col1',
                            'container' => false,
                            'menu_class' => 'footer-links',
                        ));
                        ?>

                    </div>
                </div>

                <div class="footer-menu-links-two">
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
                    <!-- footer-legal -->
                    <div class="footer-column footer-quick-links" data-aos="fade-up">
                        <h3 class="footer-title">LEGAL</h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer_legal',
                            'container' => false,
                            'menu_class' => 'footer-links',
                        ));
                        ?>
                    </div>
                </div>
            </div>


        </div>

        <!-- Footer Bottom -->



        <div class="footer-bottom" data-aos="fade-up">
            <div class="copy-right-text">
                <div>
                    <span><?php echo esc_html($footer_copyright); ?>
                    </span>
                </div>

                <div class="nh-site-link">
                    <span> Site by - </span>
                    <?php if ($footer_site_name && $footer_site_url): ?>
                        <a href="<?php echo esc_url($footer_site_url); ?>" target="_blank" rel="noopener noreferrer">
                            <?php echo esc_html($footer_site_name); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>


        </div>

    </div>
</footer>

<?php wp_footer(); ?>
<!-- <script>
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





</script> -->
</body>

</html>