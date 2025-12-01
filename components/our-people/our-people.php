<?php
// $fields variable comes from set_render_callback
$title = $fields['team_section_title'] ?? '';
$description = $fields['team_section_description'] ?? '';
$search_placeholder = $fields['team_search_placeholder'] ?? '';
$select_placeholder = $fields['team_select_placeholder'] ?? '';
$button_text = $fields['team_button_text'] ?? '';
$button_link = $fields['team_button_link'] ?? '';
$team_members = $fields['team_members'] ?? [];
$category_name = 'Banking & Finance';
?>


<section class="team-section">
    <img class="bg-img" src="https://i.postimg.cc/hGk6QtbV/hero-background-img.webp" alt="Hero Background">

    <div class="people-container">

        <div class="left-side-container">
            <div class="left-side-content">
                <!-- Header -->
                <div class="team-header">
                    <h1><?php echo esc_html($title); ?></h1>
                    <p class="body-text"><?php echo esc_html($description); ?></p>
                </div>

                <!-- Search & Filter -->
                <div class="team-filters">
                    <div class="form-wrapper">

                        <!-- Search -->
                        <div class="input-group search-field">
                            <input type="text" placeholder="<?php echo esc_attr($search_placeholder); ?>">
                            <span class="icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_927_12810)">
                                        <path
                                            d="M10.875 18.75C15.2242 18.75 18.75 15.2242 18.75 10.875C18.75 6.52576 15.2242 3 10.875 3C6.52576 3 3 6.52576 3 10.875C3 15.2242 6.52576 18.75 10.875 18.75Z"
                                            stroke="white" stroke-opacity="0.8" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.4453 16.4434L21.0016 20.9996" stroke="white" stroke-opacity="0.8"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_927_12810">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </span>
                        </div>

                        <!-- Select -->
                        <div class="input-group select-field">
                            <select>
                                <option value="" disabled selected><?php echo esc_attr($select_placeholder); ?></option>
                                <?php
                                // Generate unique categories dynamically
                                $categories = [];
                                if ($team_members) {
                                    foreach ($team_members as $member) {
                                        if (!in_array($member['category'], $categories)) {
                                            $categories[] = $member['category'];
                                        }
                                    }
                                }
                                foreach ($categories as $cat) {
                                    echo '<option value="' . esc_attr($cat) . '">' . esc_html($cat) . '</option>';
                                }
                                ?>
                            </select>
                            <span class="icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_927_12817)">
                                        <path d="M19.5 9L12 16.5L4.5 9" stroke="white" stroke-opacity="0.8"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_927_12817">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </span>
                        </div>

                        <!-- Button -->

                        <div class="button-wraper">
                            <?php if ($button_text && $button_link): ?>
                                <a href="<?php echo esc_url($button_link); ?>" class="primary-button" data-aos="fade-up">
                                    <div class="button-text"><?php echo esc_html($button_text); ?></div>
                                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="44" height="44" rx="22" fill="#BC001A" />
                                        <g clip-path="url(#clip0_642_270)">
                                            <path d="M16.166 17H26.9993V27.8333" stroke="white" stroke-width="2"
                                                stroke-miterlimit="10" />
                                            <path d="M16 28L27 17" stroke="white" stroke-width="2" stroke-miterlimit="10" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_642_270">
                                                <rect width="20" height="20" fill="white" transform="translate(12 12)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="right-side-container">
            <div class="right-side-content">

                <div class="category-tag">
                    <span class="category-tag-content"><?php echo esc_html($category_name); ?></span>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.402 10.4735C11.5253 10.5968 11.5946 10.764 11.5946 10.9383C11.5946 11.1127 11.5253 11.2799 11.402 11.4032C11.2787 11.5265 11.1115 11.5957 10.9372 11.5957C10.7628 11.5957 10.5956 11.5265 10.4723 11.4032L7.00022 7.92997L3.52702 11.4021C3.40373 11.5254 3.23652 11.5946 3.06217 11.5946C2.88782 11.5946 2.72061 11.5254 2.59733 11.4021C2.47405 11.2788 2.40479 11.1116 2.40479 10.9372C2.40479 10.7629 2.47405 10.5957 2.59733 10.4724L6.07053 7.00028L2.59842 3.52708C2.47514 3.40379 2.40588 3.23658 2.40588 3.06223C2.40588 2.88788 2.47514 2.72067 2.59842 2.59739C2.72171 2.4741 2.88892 2.40484 3.06327 2.40484C3.23762 2.40484 3.40483 2.4741 3.52811 2.59739L7.00022 6.07059L10.4734 2.59684C10.5967 2.47356 10.7639 2.4043 10.9383 2.4043C11.1126 2.4043 11.2798 2.47356 11.4031 2.59684C11.5264 2.72013 11.5957 2.88733 11.5957 3.06169C11.5957 3.23604 11.5264 3.40324 11.4031 3.52653L7.92991 7.00028L11.402 10.4735Z"
                            fill="#BC001A" />
                    </svg>
                </div>
                <!-- Team Members -->
                <div class="team-members">
                    <?php if ($team_members): ?>
                        <?php foreach ($team_members as $member): ?>
                            <div class="team-member" data-category="<?php echo esc_attr($member['category']); ?>">
                                <?php if ($member['photo']): ?>
                                    <img src="<?php echo wp_get_attachment_url($member['photo']); ?>"
                                        alt="<?php echo esc_attr($member['name']); ?>">
                                <?php endif; ?>
                                <div class="team-info">
                                    <h4><?php echo esc_html($member['name']); ?></h4>
                                    <span><?php echo esc_html($member['designation']); ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</section>