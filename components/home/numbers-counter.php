<div class="hero-number-section">
   <div class="container">
     <div class="numbers-container">
        <?php foreach ($counters as $counter): ?>
            <div class="stat-card" data-aos="fade-up">
    
                <div class="stat-number heading-three" data-target="<?php echo esc_attr($counter['stat_number']); ?>"
                    data-suffix="<?php echo esc_attr($counter['suffix']); ?>">
                    0
                    <?php echo esc_html($counter['suffix']); ?>
                </div>
    
                <div class="stat-label body-text">
                    <?php echo esc_html($counter['description']); ?>
                </div>
    
            </div>
        <?php endforeach; ?>
    </div>
   </div>
</div>