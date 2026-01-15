<?php
get_header();
?>

<div class="single-service">
    

        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <h1 class="">
                        <?php the_title(); ?>
                    </h1>

                    <?php if (has_post_thumbnail()): ?>
                        <div class="featured-image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>

                        <?php
                        $short_desc = carbon_get_post_meta(get_the_ID(), 'tnt_service_short_description');
                        if (!empty(trim($short_desc))): ?>
                            <div class="">
                                <p class="">
                                    <?php echo esc_html($short_desc); ?>
                                </p>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <div class="">
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'service_type');
                        if ($terms && !is_wp_error($terms)): ?>
                            <p class="">
                                <strong>Categories:</strong>
                                <?php
                                $cat_links = [];
                                foreach ($terms as $term) {
                                    $cat_links[] = '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
                                }
                                echo implode(', ', $cat_links);
                                ?>
                            </p>
                        <?php endif; ?>
                    </div>

                </article>

            <?php endwhile; else: ?>
            <!-- <p class="text-center text-xl">Sorry, no service found.</p> -->
        <?php endif; ?>

</div>

<?php get_footer(); ?>