<div class="our-values-section">
    <div class="container">
        <div class="values-grid">
            <?php if (!empty($values)): ?>
                <?php foreach ($values as $value):
                    $title = $value['value_title'] ?? '';
                    $desc = $value['value_description'] ?? '';
                    ?>
                    <div class="value-card" data-aos="fade-up">
                        <?php if (!empty($title)): ?>
                            <h3><?php echo esc_html($title); ?></h3>
                        <?php endif; ?>

                        <?php if (!empty($desc)): ?>
                            <p><?php echo esc_html($desc); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No values added yet.</p>
            <?php endif; ?>
        </div>
    </div>
</div>