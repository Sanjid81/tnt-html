<?php
get_header();
?>

<div class="container py-12 single-service">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <h1 class="text-4xl font-bold mb-6"><?php the_title(); ?></h1>

            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image mb-10">
                    <?php the_post_thumbnail('large', ['class' => 'rounded-xl w-full h-auto object-cover']); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content prose prose-lg max-w-none">
                <?php the_content(); ?>
            </div>

            <div class="mt-12 pt-8 border-t">
                <?php
                $terms = get_the_terms(get_the_ID(), 'service_type');
                if ($terms && !is_wp_error($terms)) : ?>
                    <p class="text-gray-600">
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

    <?php endwhile; else : ?>
        <p class="text-center text-xl">Sorry, no service found.</p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>