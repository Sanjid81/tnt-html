<?php
$lead_text = get_query_var('lead_text', '');
?>
<section class="legal-solutions">
    <div class="overlay"></div>
    <div class="content">
        <?php if ($lead_text): ?>
            <h1 class="lead-text-two"><?php echo wp_kses_post($lead_text); ?></h1>
        <?php endif; ?>
    </div>
</section>
