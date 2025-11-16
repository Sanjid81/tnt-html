<?php
$counters = $counters_fields['counters'] ?? [];

if ($counters):
    ?>
    <section class="about-counters-section">
        <div class="container">
           <div class="counters-wraper">
             <?php foreach ($counters as $counter): ?>
                <div class="counter-card">
                    <h2 class="counter" data-target="<?php echo esc_attr($counter['number']); ?>"
                        data-suffix="<?php echo esc_attr($counter['suffix'] ?? ''); ?>">
                        0<?php echo esc_html($counter['suffix'] ?? ''); ?></h2>
                    <p class="heading-four "><?php echo esc_html($counter['title']); ?></p>
                </div>
            <?php endforeach; ?>
           </div>
        </div>
    </section>
<?php endif; ?>