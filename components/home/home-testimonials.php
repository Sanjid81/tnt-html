<?php
$testimonials = get_query_var('testimonials', []);
if (!empty($testimonials)): ?>

<section class="testimonials-section">
    <div class="overlay"></div>
    <div class="container">
        <div class="header-row">
            <h2>Testimonials</h2>
            <div class="testimonials-slider-buttons">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>

        <div class="testimonials-slider" data-aos="fade-up">
            <div class="swiper">
                <div class="testimonials-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($testimonials as $testimonial):
                            $text = $testimonial['text'] ?? '';
                            $author = $testimonial['author'] ?? '';
                        ?>
                            <div class="swiper-slide">
                                <div class="testimonial-card">
                                    <div class="quote">❝</div>
                                    <p class="text"><?php echo esc_html($text); ?></p>
                                    <p class="author"><?php echo esc_html($author); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
