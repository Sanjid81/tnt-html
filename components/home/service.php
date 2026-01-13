<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Query arguments
$args = array(
    'post_type' => 'service',     
    'posts_per_page' => 4,             
    'paged' => $paged,       
    'orderby' => 'date',       
    'order' => 'DESC',        
    'post_status' => 'publish',
);

$service_query = new WP_Query($args);

if ($service_query->have_posts()):
    ?>
        <section class="our-services-section">
            <h2 class="section-title">Our Services</h2>
        
            <div class="services-grid"> 

                <?php while ($service_query->have_posts()):
                    $service_query->the_post(); ?>

                        <div class="service-card">
                            <?php if (has_post_thumbnail()): ?>
                                    <div class="service-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover rounded']); ?>
                                        </a>
                                    </div>
                            <?php endif; ?>

                            <h3 class="service-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <?php if (has_excerpt()): ?>
                                    <p class="service-excerpt">
                                        <?php the_excerpt(); ?>
                                    </p>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>" class="read-more-btn">View Details →</a>
                        </div>

                <?php endwhile; ?>

            </div>

           

        </section>
        <?php

        wp_reset_postdata();  

else:
    ?>
        <p>not found</p>
    <?php
endif;
?>