<?php
$fields = get_query_var('our_story_fields', []);

$our_story_title = $fields['our_story_title'] ?? 'Our Story';
$our_story_content = $fields['our_story_content'] ?? '';
?>

<section class="our-story-section">
    <div class="container">
        <div class="our-story-wraper">
            <h2 class="heading-two"><?php echo esc_html($our_story_title); ?></h2>

            <?php if (!empty($our_story_content)): ?>
                <div class="our-story-content">
                    <?php echo wp_kses_post(wpautop($our_story_content)); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>