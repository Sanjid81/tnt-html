<?php
get_header();
?>

<div class="container">
    <h1><?php the_title(); ?></h1>

    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
                <div class="service-content">
                    <?php the_content(); ?>
                </div>

                <?php if (has_post_thumbnail()): ?>
                        <div class="service-image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                <?php endif; ?>
        <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>