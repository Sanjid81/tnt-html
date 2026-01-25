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


$footer_facebook = carbon_get_theme_option('footer_facebook');
$footer_twitter = carbon_get_theme_option('footer_twitter');
$footer_instagram = carbon_get_theme_option('footer_instagram');
$footer_linkedin = carbon_get_theme_option('footer_linkedin');
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

                <p class="footer-text">
                    <?php echo wp_kses_post($footer_tagline); ?>
                </p>


                <?php if ($footer_facebook || $footer_twitter || $footer_instagram || $footer_linkedin): ?>
                    <div class="footer-social-icons">
                        <?php if ($footer_facebook): ?>
                            <a href="<?php echo esc_url($footer_facebook); ?>" target="_blank" rel="noopener noreferrer">
                                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M23.1598 20.0485L23.6556 16.8155H20.5537V14.7175C20.5537 13.833 20.987 12.9709 22.3764 12.9709H23.7867V10.2185C23.7867 10.2185 22.5068 10 21.2831 10C18.7283 10 17.0586 11.5484 17.0586 14.3515V16.8155H14.2188V20.0485H17.0586V27.8641C17.628 27.9535 18.2116 28 18.8061 28C19.4007 28 19.9843 27.9535 20.5537 27.8641V20.0485H23.1598Z"
                                        fill="white" fill-opacity="0.8" />
                                </svg>

                            </a>
                        <?php endif; ?>
                        <?php if ($footer_twitter): ?>
                            <a href="<?php echo esc_url($footer_twitter); ?>" target="_blank" rel="noopener noreferrer">
                                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_46_86)">
                                        <path
                                            d="M28 20.9445V27.5988H24.1414V21.3923C24.1414 19.8313 23.5847 18.7683 22.1869 18.7683C21.1197 18.7683 20.4878 19.484 20.2074 20.1787C20.107 20.4256 20.0777 20.773 20.0777 21.1203V27.603H16.219C16.219 27.603 16.2692 17.0859 16.219 15.9978H20.0777V17.6425C20.0693 17.6551 20.0609 17.6676 20.0525 17.6802H20.0777V17.6425C20.5924 16.8515 21.5048 15.7258 23.5555 15.7258C26.0958 15.7216 28 17.383 28 20.9445ZM12.1846 10.4023C10.8621 10.4023 10 11.2687 10 12.407C10 13.5202 10.837 14.4116 12.1344 14.4116H12.1595C13.5071 14.4116 14.3441 13.5202 14.3441 12.407C14.3148 11.2687 13.5029 10.4023 12.1846 10.4023ZM10.2302 27.603H14.0888V15.9936H10.2302V27.603Z"
                                            fill="white" fill-opacity="0.8" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_46_86">
                                            <rect width="18" height="18" fill="white" transform="translate(10 10)" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </a>
                        <?php endif; ?>
                        <?php if ($footer_instagram): ?>
                            <a href="<?php echo esc_url($footer_instagram); ?>" target="_blank" rel="noopener noreferrer">
                                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_46_91)">
                                        <mask id="mask0_46_91" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="10"
                                            y="10" width="18" height="18">
                                            <path d="M28 10H10V28H28V10Z" fill="white" />
                                        </mask>
                                        <g mask="url(#mask0_46_91)">
                                            <path
                                                d="M20.7124 17.6179L27.4133 10H25.8254L20.0071 16.6145L15.3599 10H10L17.0274 20.0023L10 27.9908H11.588L17.7324 21.0056L22.6401 27.9908H28L20.7121 17.6179H20.7124ZM18.5375 20.0904L17.8255 19.0944L12.1602 11.1691H14.5992L19.1712 17.5651L19.8832 18.5611L25.8262 26.8748H23.3871L18.5375 20.0908V20.0904Z"
                                                fill="white" fill-opacity="0.8" />
                                        </g>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_46_91">
                                            <rect width="18" height="18" fill="white" transform="translate(10 10)" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </a>
                        <?php endif; ?>
                        <?php if ($footer_linkedin): ?>
                            <a href="<?php echo esc_url($footer_linkedin); ?>" target="_blank" rel="noopener noreferrer">
                                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M27.6239 14.6667C27.417 13.8922 26.8071 13.2824 26.0326 13.0754C24.6287 12.6992 19 12.6992 19 12.6992C19 12.6992 13.3712 12.6992 11.9674 13.0754C11.193 13.2824 10.583 13.8922 10.3761 14.6667C10 16.0705 10 18.9993 10 18.9993C10 18.9993 10 21.9281 10.3761 23.3317C10.583 24.1062 11.193 24.7162 11.9674 24.9232C13.3712 25.2992 19 25.2992 19 25.2992C19 25.2992 24.6287 25.2992 26.0326 24.9232C26.8071 24.7162 27.417 24.1062 27.6239 23.3317C28 21.9281 28 18.9993 28 18.9993C28 18.9993 28 16.0705 27.6239 14.6667ZM17.1999 21.6994V16.2993L21.8763 18.9993L17.1999 21.6994Z"
                                        fill="white" fill-opacity="0.8" />
                                </svg>

                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer-menu-links">
                <!-- Areas of Expertise Section -->
                <div class="footer-column footer-quick-links" data-aos="fade-up">
                    <h3 class="footer-title">Services</h3>
                    <div class="area-of-expertise">

                        <?php
                        // First column
                        wp_nav_menu(array(
                            'theme_location' => 'footer_services',
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



        <div class="footer-bottom">
            <div class="copy-right-text">
                <div>
                    <span>
                        <?php
                        echo '© ' . date('Y') . ' ' . esc_html($footer_copyright);
                        ?>
                    </span>
                </div>


            </div>


        </div>

    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>