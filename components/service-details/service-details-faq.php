<div class="service-details-faq">
    <div class="container">
        <div class="faq-section">
            <div class="section-numbers">
                <?php foreach ($faq_items as $index => $item): ?>
                    <span class="section-number">
                        <?php echo esc_html(str_pad($index + 1, 2, '0', STR_PAD_LEFT)); ?>
                    </span>
                <?php endforeach; ?>
            </div>

            <div class="faq-content">
                <?php foreach ($faq_items as $index => $item):
                    $title = $item['faq_title'] ?? '';
                    $desc = $item['faq_description'] ?? '';
                    $image = $item['faq_image'] ?? '';
                    ?>
                    <div class="faq-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <div class="faq-header">
                            <h3 class="faq-title">
                                <?php echo esc_html($title); ?>
                            </h3>
                            <div class="faq-icon">
                                <span class="plus">+</span>
                                <span class="minus">−</span>
                            </div>
                        </div>

                        <div class="faq-body">
                            <div class="faq-text">
                                <?php if (!empty($desc)): ?>
                                    <p><?php echo esc_html($desc); ?></p>
                                <?php endif; ?>

                                <?php if (!empty($image)): ?>
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>"
                                        class="faq-image">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>