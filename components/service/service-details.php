<section class="services-section">
    <h2>Our Services</h2>
    <div class="services-grid">

        <?php
        $args = array(
            'post_type' => 'service',
            'posts_per_page' => 4,
            'orderby' => 'date',
            'order' => 'DESC',
        );
        $services = new WP_Query($args);

        if ($services->have_posts()):
            while ($services->have_posts()):
                $services->the_post(); ?>

                <div class="service-item">
                    <?php if (has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    <?php endif; ?>

                    <h3><a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a></h3>

                    <?php if (has_excerpt()): ?>
                        <p>
                            <?php echo get_the_excerpt(); ?>
                        </p>
                    <?php endif; ?>

                    <a href="<?php the_permalink(); ?>" class="view-details">View Details →</a>
                </div>

            <?php endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>

    <a href="<?php echo get_post_type_archive_link('service'); ?>" class="explore-all">Explore All Services →</a>
</section>