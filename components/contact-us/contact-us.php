<?php
$heading = trim($fields['heading'] ?? '');
$description = trim($fields['description'] ?? '');
$email_label = trim($fields['email_label'] ?? '');
$email_content = trim($fields['email_content'] ?? '');
$phones = $fields['phones'] ?? [];
$shortcode = trim($fields['form_shortcode'] ?? '');
$address_text = $fields['address_text'] ?? '';
$address_link = $fields['address_link'] ?? '';

if (empty($heading) && empty($description) && empty($address_content) && empty($email_content) && empty($phones) && empty($shortcode)) {
    return ''; // nothing to show
}
?>
<div class="contact-us-form-section <?php echo esc_attr($attributes['className'] ?? ''); ?>">
    <div class="container">
        <div class="contact-content">
            <div class="contact-info">
                <div class="contact-heading">
                    <?php if ($heading): ?>
                        <h2 class="heading-two">
                            <?php echo esc_html($heading); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($description): ?>
                        <div class="description body-text-two">
                            <?php echo wp_kses_post($description); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="info-grid">
                    <?php if ($address_label || $address_text || $address_link): ?>
                        <div class="info-card">


                            <div class="body-text-two">
                                <div class="body-text-two">
                                    <?php if ($address_link): ?>
                                        <a href="<?php echo esc_url($address_link); ?>" target="_blank">
                                            <?php echo wp_kses_post(nl2br($address_text ?: $address_link)); ?>
                                        </a>
                                    <?php else: ?>
                                        <?php echo wp_kses_post(nl2br($address_text)); ?>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($phones)): ?>
                        <div class="info-card">

                            <?php foreach ($phones as $p): ?>
                                <?php if (!empty($p['phone_number'])): ?>
                                    <div class="heading-five">
                                        <a href="tel:<?php echo esc_attr($p['phone_number']); ?>">
                                            <?php echo esc_html($p['phone_number']); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>


                    <?php if ($email_label || $email_content): ?>
                        <div class="info-card">
                            <?php if ($email_content): ?>
                                <div class="heading-five">
                                    <a href="mailto:<?php echo esc_attr($email_content); ?>">
                                        <?php echo esc_html($email_content); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
            <?php if ($shortcode): ?>
                <div class="contact-form-wrapper">
                    <?php echo do_shortcode($shortcode); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>