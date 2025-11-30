<?php
$fields = get_query_var('fields');

$section_title = $fields['faq_section_title'];
$section_description = $fields['faq_section_description'];

$faq_items = $fields['faq_items'] ?? [];
?>

<section class="tailored-solution-section">
    <div class="tailored-container">
        <div class="tailored-solution-wraper">
            <div class="tailored-content-wraper">
                <div class="tailored-content">
                    <h1 class="tailored-heading"><?php echo esc_html($section_title); ?></h1>
                    <p class="tailored-paragraph"><?php echo esc_html($section_description); ?></p>
                </div>
            </div>

            <div class="faq-container">
                <div class="faq-content-wraper">
                    <?php if ($faq_items): ?>
                        <?php foreach ($faq_items as $index => $item): ?>
                            <?php $is_open = $index === 0 ? 'open' : ''; ?>
                            <div class="faq-item <?php echo esc_attr($is_open); ?>">
                                <button class="faq-header">
                                    <span class="faq-qus"><?php echo esc_html($item['faq_title']); ?></span>
                                    <span class="faq-icon"><?php echo $is_open ? '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22 11.5H2V13.5H22V11.5Z" fill="#BC001A"/>
</svg>
' : '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M13.0001 10.9997L22.0002 10.9995V12.9995L13.0001 12.9997V21.9996H11.0001V12.9997L2.00004 12.9999L2 10.9999L11.0001 10.9997L11 2.00001L13 2L13.0001 10.9997Z" fill="black"/>
</svg>
'; ?></span>
                                </button>

                                <div class="faq-content">
                                    <div class="faq-grid">
                                        <?php if (!empty($item['faq_links'])): ?>
                                            <?php foreach ($item['faq_links'] as $link): ?>
                                                <a class="faq-linked-answer" href="<?php echo esc_url($link['link_url']); ?>">
                                                    <span> <?php echo esc_html($link['link_text']); ?></span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_1197_932)">
                                                            <path
                                                                d="M13.1722 11.9997L8.22217 7.04974L9.63617 5.63574L16.0002 11.9997L9.63617 18.3637L8.22217 16.9497L13.1722 11.9997Z"
                                                                fill="black" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_1197_932">
                                                                <rect width="24" height="24" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>

                                                </a>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>Coming soon...</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>