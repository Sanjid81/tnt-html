<?php
// Get fields from block
$fields = get_query_var('fields', []);

// Fallbacks
$bg_image = $fields['bg_image'] ?? 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=1920&q=80';
$heading = $fields['heading'] ?? 'Delivering Industrial Cleaning with Experience, Quality, and Expertise.';
$company_info = $fields['company_info'] ?? 'TnT High Pressure Waterworks Ltd. delivers industry-leading high-pressure cleaning, chemical cleaning, vacuum services and more.';
$btn_one_text = $fields['btn_one_text'] ?? 'REQUEST A QUOTE';
$btn_one_link = $fields['btn_one_link'] ?? '#';
$btn_two_text = $fields['btn_two_text'] ?? 'EXPLORE SERVICES';
$btn_two_link = $fields['btn_two_link'] ?? '#';
?>

<section class="hero-section">

    <!-- Background -->
    <div class="hero-bg">
        <img src="<?php echo esc_url($bg_image); ?>" alt="Hero Background">
        <div class="hero-overlay"></div>
    </div>

    <!-- Content -->
    <div class="hero-content">
        <div class="hero-contant-wrapper">

            <div class="hero-left-info">
                <!-- Main Heading -->
                <h1 class="hero-heading heading-one">
                    <?php echo wp_kses_post(nl2br($heading)); ?>
                </h1>

                <!-- CTA Buttons -->
                <div class="hero-buttons">
                    <a href="<?php echo esc_url($btn_one_link); ?>" class="primary-button">
                        <div class="button-text">
                            <?php echo esc_html($btn_one_text); ?>
                        </div>

                    </a>

                    <a href="<?php echo esc_url($btn_two_link); ?>" class="secondary-button ">
                        <div class="button-text">
                            <?php echo esc_html($btn_one_text); ?>
</div>
                    </a>
                </div>
            </div>

            <!-- Company Info -->
            <div class="hero-right-info">
                <p class="right-info-content body-text">
                    <?php echo esc_html($company_info); ?>
                </p>
            </div>

        </div>
    </div>

</section>