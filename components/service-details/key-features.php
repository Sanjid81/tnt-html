<div class="service-details-key-features">
     <div class="container">
                <div class="content-wrapper">
                    <div class="section-header">
                    <div class="section-tag">
                        <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="6" height="6" fill="white" fill-opacity="0.8"/>
</svg>

                        <?php echo esc_html( $fields['section_tag'] ); ?>
                    </div>
                </div>

                <div class="features-grid">
                    <?php if ( ! empty( $fields['features'] ) ) : ?>
                        <?php foreach ( $fields['features'] as $feature ) : ?>
                            <div class="feature-card">
                                <h3 class="feature-title">
                                    <?php echo esc_html( $feature['title'] ); ?>
                                </h3>

                                <p class="feature-description">
                                    <?php echo esc_html( $feature['description'] ); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                </div>
            </div>
</div>