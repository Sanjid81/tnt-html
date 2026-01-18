<div class="service-details-accordion">
    <div class="container">
        <div class="accordion-wrapper">
            <?php foreach ($faq_items as $index => $item):
                $title = $item['faq_title'] ?? '';
                $desc = $item['faq_description'] ?? '';
                $image = $item['faq_image'] ?? '';
                $number = esc_html(str_pad($index + 1, 2, '0', STR_PAD_LEFT)) . '/';
                ?>
                <div class="accordion-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="accordion-header">
                        <div class="header-left">
                            <span class="section-number body-text"><?php echo $number; ?></span>
                            <h3 class="accordion-title heading-four"><?php echo $title; ?>
                            </h3>

                           
                        </div>
                        <div class="accordion-icon">
                            <span class="plus">+</span>
                            <span class="minus">−</span>
                        </div>
                    </div>

 <div class="accordion-body">
                                <div class="accordion-content">
                                    <?php if (!empty($desc)): ?>
                                        <p class="body-text">
                                            <?php echo esc_html($desc); ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if (!empty($image)): ?>
                                        <div class="accordion-image-wrapper">
                                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>"
                                                class="accordion-image">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>