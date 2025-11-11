<?php
$footer_logo = carbon_get_theme_option('footer_logo');
$footer_mobile_logo = carbon_get_theme_option('footer_mobile_logo');
$footer_tagline = carbon_get_theme_option('footer_tagline');
$footer_address = carbon_get_theme_option('footer_address');
$footer_email = carbon_get_theme_option('footer_email');
$footer_copyright = carbon_get_theme_option('footer_copyright');

$expertise = carbon_get_theme_option('footer_expertise'); // complex field
$quick_links = carbon_get_theme_option('footer_quick_links'); // complex field
?>

<footer class="footer">
    <div class="container">
        <div class="footer-container">
            <!-- About / Logo Section -->
            <div class="footer-column footer-about">
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
            <div class="footer-column double-menu-column">
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
            <div class="footer-column">
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
            <div class="footer-column footer-address">
                <h3 class="footer-title">Contact</h3>
                <p><?php echo nl2br(esc_html($footer_address)); ?></p>
                <a href="mailto:<?php echo esc_attr($footer_email); ?>"><?php echo esc_html($footer_email); ?></a>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p><?php echo esc_html($footer_copyright); ?> | Site by Your Name</p>
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