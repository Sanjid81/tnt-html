<div class="service-overview-section">
    <div class="container">
        <div class="content-wrapper">

            <div class="left-section">
                <div class="overview-tag">
                    <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="6" height="6" fill="white" fill-opacity="0.8" />
                    </svg>

                    <?php echo esc_html($fields['overview_tag']); ?>
                </div>


            </div>

            <div class="right-section">
                <div class="specs-grid">
                    <div class="overview-content-heading">
                        <h1 class="heading-two">
                            <?php echo esc_html($fields['title']); ?>
                        </h1>

                        <p class="description body-text-two">
                            <?php echo esc_html($fields['description']); ?>
                        </p>
                    </div>

                    <div class="specs-items-wrapper">
                        <div class="spec-item">

                            <div class="spec-label body-text">Up to</div>

                            <div class="spec-value heading-three"> <?php echo esc_html($fields['pressure_value']); ?>
                                <span class="heading-three">
                                    <?php echo esc_html($fields['pressure_unit']); ?>
                                </span>
                            </div>
                            <div class="spec-label body-text">Pressure</div>
                        </div>

                        <div class="spec-item-two">
                            <div class="spec-value">
                                <div class="heading-three">></div>

                                <span class="heading-three">
                                    <?php echo esc_html($fields['flow_value']); ?>

                                </span>
                                <span class="heading-three">
                                    <?php echo esc_html($fields['flow_unit']); ?>
                                </span>
                            </div>
                            <div class="spec-label body-text">Flow</div>
                        </div>

                    </div>
                </div>

                <?php if (!empty($fields['button_text'])): ?>
                    <a href="<?php echo esc_url($fields['button_link']); ?>" class="primary-button">
                        <?php echo esc_html($fields['button_text']); ?>
                        <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="6" height="6" fill="white" />
                        </svg>

                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
</div>