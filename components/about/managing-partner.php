<?php
$partner = $partner_fields ?? [];

$image_id   = $partner['partner_image'] ?? '';
$heading    = $partner['partner_heading'] ?? '';
$message    = $partner['partner_message'] ?? '';
$signature  = $partner['partner_signature'] ?? '';
?>

<section class="managing-partner-section">
    <div class="container">
        <div class="partner-content">

            <?php if ($image_id): ?>
            <div class="partner-image">
                <?php 
                    // attachment ID diye img generate
                    echo wp_get_attachment_image(
                        $image_id,
                        'full',
                        false,
                        ['alt' => esc_attr($heading)]
                    ); 
                ?>
            </div>
            <?php endif; ?>

            <div class="partner-text">
                <?php if ($heading): ?>
                    <h2 class="heading-two"><?php echo esc_html($heading); ?></h2>
                <?php endif; ?>

                <?php if ($message): ?>
                    <p class="heading-four"><?php echo wp_kses_post($message); ?></p>
                <?php endif; ?>

                <?php if ($signature): ?>
                    <span class="body-text-two"><?php echo esc_html($signature); ?></span>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
