<?php
$mv = $mission_vision_fields ?? [];

$mission_title = $mv['mission_title'] ?? '';
$mission_content = $mv['mission_content'] ?? '';
$vision_title = $mv['vision_title'] ?? '';
$vision_content = $mv['vision_content'] ?? '';
$section_heading = $mv['section_heading'] ?? '';
$image_id = $mv['about_middle_image'] ?? '';
?>

<section class="mission-vission-section">
    <div class="container">

        <div class="mission-vission-wraper">
            <h2 class="heading-two">
                <?php echo esc_html($section_heading); ?>
            </h2>

            <div class="mission-vission-content">

                <div class="mission-content">
                    <h3 class="heading-five"><?php echo esc_html($mission_title); ?></h3>
                    <p class="body-text"><?php echo wp_kses_post($mission_content); ?></p>
                </div>

                <div class="vission-content">
                    <h3 class="heading-five"><?php echo esc_html($vision_title); ?></h3>
                    <p class="body-text"><?php echo wp_kses_post($vision_content); ?></p>
                </div>

            </div>
        </div>

        <?php if ($image_id): ?>
            <div class="about-middle-wraper">
                <?php echo wp_get_attachment_image($image_id, 'full', false, ['class' => 'middle-image']); ?>
            </div>
        <?php endif; ?>

    </div>
</section>