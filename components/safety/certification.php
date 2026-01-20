<div class="certifications-section">
    <div class="container">
        <div class="certificate-content">
            <div class="section-header">
                <h2 class="certificate-title button-text">
                    <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="6" height="6" fill="white" fill-opacity="0.8" />
                    </svg>

                    <?php echo esc_html($fields['section_title']); ?>
                </h2>
            </div>

            <?php if (!empty($fields['certificates'])): ?>
                <div class="certificates-grid">
                    <?php foreach ($fields['certificates'] as $cert): ?>
                        <div class="certificate-card">
                            <div class="cert-image">
                                <?php
                                if (!empty($cert['certificate_image'])):
                                    echo wp_get_attachment_image(
                                        $cert['certificate_image'],
                                        'full',
                                        false,
                                        [
                                            'alt' => esc_attr($cert['certificate_alt']),
                                        ]
                                    );
                                endif;
                                ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>