<?php
if( function_exists('acf_add_local_field_group') ):

    // Global Settings removed because ACF Free does not support options_page.
    // Instead, footer settings are appended to the Homepage Fields.

    // 2. Homepage Field Group
    acf_add_local_field_group(array(
        'key' => 'group_homepage',
        'title' => 'Homepage Fields',
        'fields' => array(
            // Hero Section
            array('key' => 'field_hp_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'),
            array('key' => 'field_hp_hero_title', 'label' => 'Hero Title', 'name' => 'hero_title', 'type' => 'text'),
            array('key' => 'field_hp_hero_subtitle', 'label' => 'Hero Subtitle', 'name' => 'hero_subtitle', 'type' => 'text'),
            array('key' => 'field_hp_hero_desc', 'label' => 'Hero Description', 'name' => 'hero_description', 'type' => 'textarea'),
            array('key' => 'field_hp_hero_bg', 'label' => 'Hero Background Image', 'name' => 'hero_background_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_hp_hero_leaf_text', 'label' => 'Hero Floating Leaf Text', 'name' => 'hero_leaf_text', 'type' => 'text'),
            
            // Stats Section
            array('key' => 'field_hp_stats_tab', 'label' => 'Stats Section', 'type' => 'tab'),
            // Stat 1
            array(
                'key' => 'field_hp_stat_1', 'label' => 'Stat 1', 'name' => 'stat_1', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_s1_num', 'label' => 'Number', 'name' => 'number', 'type' => 'text'),
                    array('key' => 'field_hp_s1_lbl', 'label' => 'Label', 'name' => 'label', 'type' => 'text'),
                )
            ),
            // Stat 2
            array(
                'key' => 'field_hp_stat_2', 'label' => 'Stat 2', 'name' => 'stat_2', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_s2_num', 'label' => 'Number', 'name' => 'number', 'type' => 'text'),
                    array('key' => 'field_hp_s2_lbl', 'label' => 'Label', 'name' => 'label', 'type' => 'text'),
                )
            ),
            // Stat 3
            array(
                'key' => 'field_hp_stat_3', 'label' => 'Stat 3', 'name' => 'stat_3', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_s3_num', 'label' => 'Number', 'name' => 'number', 'type' => 'text'),
                    array('key' => 'field_hp_s3_lbl', 'label' => 'Label', 'name' => 'label', 'type' => 'text'),
                )
            ),
            // Stat 4
            array(
                'key' => 'field_hp_stat_4', 'label' => 'Stat 4', 'name' => 'stat_4', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_s4_num', 'label' => 'Number', 'name' => 'number', 'type' => 'text'),
                    array('key' => 'field_hp_s4_lbl', 'label' => 'Label', 'name' => 'label', 'type' => 'text'),
                )
            ),

            // About Section
            array('key' => 'field_hp_about_tab', 'label' => 'About Section', 'type' => 'tab'),
            array('key' => 'field_hp_about_quote', 'label' => 'Quote Text', 'name' => 'about_quote', 'type' => 'textarea'),
            array('key' => 'field_hp_about_quote_author', 'label' => 'Quote Author', 'name' => 'about_quote_author', 'type' => 'text'),
            array('key' => 'field_hp_about_image', 'label' => 'About Image', 'name' => 'about_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_hp_about_title', 'label' => 'About Title', 'name' => 'about_title', 'type' => 'text'),
            array('key' => 'field_hp_about_desc', 'label' => 'About Description', 'name' => 'about_description', 'type' => 'textarea'),
            array('key' => 'field_hp_feature_1', 'label' => 'Feature 1', 'name' => 'feature_1', 'type' => 'text'),
            array('key' => 'field_hp_feature_2', 'label' => 'Feature 2', 'name' => 'feature_2', 'type' => 'text'),
            array('key' => 'field_hp_feature_3', 'label' => 'Feature 3', 'name' => 'feature_3', 'type' => 'text'),

            // Domains Section
            array('key' => 'field_hp_domains_tab', 'label' => 'Intervention Domains', 'type' => 'tab'),
            array('key' => 'field_hp_domains_title', 'label' => 'Section Title (HTML allowed)', 'name' => 'domains_title', 'type' => 'text', 'default_value' => "CIAC's intervention <span>domains:</span>"),
            
            // Domain 1
            array(
                'key' => 'field_hp_domain_1', 'label' => 'Domain 1', 'name' => 'domain_1', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_d1_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'),
                    array('key' => 'field_hp_d1_desc', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea'),
                    array('key' => 'field_hp_d1_image', 'label' => 'Background Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_d1_icon', 'label' => 'Icon Image', 'name' => 'icon', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_d1_link', 'label' => 'Link URL', 'name' => 'link', 'type' => 'url', 'default_value' => site_url('/projects')),
                )
            ),
            // Domain 2
            array(
                'key' => 'field_hp_domain_2', 'label' => 'Domain 2', 'name' => 'domain_2', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_d2_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'),
                    array('key' => 'field_hp_d2_desc', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea'),
                    array('key' => 'field_hp_d2_image', 'label' => 'Background Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_d2_icon', 'label' => 'Icon Image', 'name' => 'icon', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_d2_link', 'label' => 'Link URL', 'name' => 'link', 'type' => 'url', 'default_value' => site_url('/projects')),
                )
            ),
            // Domain 3
            array(
                'key' => 'field_hp_domain_3', 'label' => 'Domain 3', 'name' => 'domain_3', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_d3_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'),
                    array('key' => 'field_hp_d3_desc', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea'),
                    array('key' => 'field_hp_d3_image', 'label' => 'Background Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_d3_icon', 'label' => 'Icon Image', 'name' => 'icon', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_d3_link', 'label' => 'Link URL', 'name' => 'link', 'type' => 'url', 'default_value' => site_url('/projects')),
                )
            ),
            // Domain 4
            array(
                'key' => 'field_hp_domain_4', 'label' => 'Domain 4', 'name' => 'domain_4', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_d4_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text'),
                    array('key' => 'field_hp_d4_desc', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea'),
                    array('key' => 'field_hp_d4_image', 'label' => 'Background Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_d4_icon', 'label' => 'Icon Image', 'name' => 'icon', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_d4_link', 'label' => 'Link URL', 'name' => 'link', 'type' => 'url', 'default_value' => site_url('/projects')),
                )
            ),

            // Partners Section
            array('key' => 'field_hp_partners_tab', 'label' => 'Partners Section', 'type' => 'tab'),
            array('key' => 'field_hp_partners_title', 'label' => 'Section Title', 'name' => 'partners_title', 'type' => 'text', 'default_value' => 'OUR <span>PARTNERS</span>'),
            array('key' => 'field_hp_partners_desc', 'label' => 'Section Description', 'name' => 'partners_desc', 'type' => 'textarea', 'default_value' => 'Our partners are valued collaborators who support our mission through resources, expertise, and shared commitment to sustainable community impact.'),
            
            // Partner 1
            array(
                'key' => 'field_hp_partner_1', 'label' => 'Partner 1', 'name' => 'partner_1', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_p1_logo', 'label' => 'Logo', 'name' => 'logo', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_p1_name', 'label' => 'Name (Alt Text)', 'name' => 'name', 'type' => 'text'),
                    array('key' => 'field_hp_p1_link', 'label' => 'Link URL', 'name' => 'link', 'type' => 'url'),
                )
            ),
            // Partner 2
            array(
                'key' => 'field_hp_partner_2', 'label' => 'Partner 2', 'name' => 'partner_2', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_p2_logo', 'label' => 'Logo', 'name' => 'logo', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_p2_name', 'label' => 'Name (Alt Text)', 'name' => 'name', 'type' => 'text'),
                    array('key' => 'field_hp_p2_link', 'label' => 'Link URL', 'name' => 'link', 'type' => 'url'),
                )
            ),
            // Partner 3
            array(
                'key' => 'field_hp_partner_3', 'label' => 'Partner 3', 'name' => 'partner_3', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_p3_logo', 'label' => 'Logo', 'name' => 'logo', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_p3_name', 'label' => 'Name (Alt Text)', 'name' => 'name', 'type' => 'text'),
                    array('key' => 'field_hp_p3_link', 'label' => 'Link URL', 'name' => 'link', 'type' => 'url'),
                )
            ),
            // Partner 4
            array(
                'key' => 'field_hp_partner_4', 'label' => 'Partner 4', 'name' => 'partner_4', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_p4_logo', 'label' => 'Logo', 'name' => 'logo', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_p4_name', 'label' => 'Name (Alt Text)', 'name' => 'name', 'type' => 'text'),
                    array('key' => 'field_hp_p4_link', 'label' => 'Link URL', 'name' => 'link', 'type' => 'url'),
                )
            ),
            // Partner 5
            array(
                'key' => 'field_hp_partner_5', 'label' => 'Partner 5', 'name' => 'partner_5', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_p5_logo', 'label' => 'Logo', 'name' => 'logo', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_p5_name', 'label' => 'Name (Alt Text)', 'name' => 'name', 'type' => 'text'),
                    array('key' => 'field_hp_p5_link', 'label' => 'Link URL', 'name' => 'link', 'type' => 'url'),
                )
            ),
            // Partner 6
            array(
                'key' => 'field_hp_partner_6', 'label' => 'Partner 6', 'name' => 'partner_6', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_hp_p6_logo', 'label' => 'Logo', 'name' => 'logo', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_hp_p6_name', 'label' => 'Name (Alt Text)', 'name' => 'name', 'type' => 'text'),
                    array('key' => 'field_hp_p6_link', 'label' => 'Link URL', 'name' => 'link', 'type' => 'url'),
                )
            ),

            // CTA Section
            array('key' => 'field_hp_cta_tab', 'label' => 'CTA Section', 'type' => 'tab'),
            array('key' => 'field_hp_cta_title', 'label' => 'CTA Title', 'name' => 'cta_title', 'type' => 'text', 'default_value' => 'Ready to make a world-class difference?'),
            array('key' => 'field_hp_cta_desc', 'label' => 'CTA Description', 'name' => 'cta_description', 'type' => 'textarea', 'default_value' => "Every contribution fields a locally-led project that transforms lives. Join us in building Rwanda's resilient future today."),
            array('key' => 'field_hp_cta_btn_txt', 'label' => 'CTA Button Text', 'name' => 'cta_button_text', 'type' => 'text', 'default_value' => 'Become a Partner'),
            array('key' => 'field_hp_cta_btn_link', 'label' => 'CTA Button Link', 'name' => 'cta_button_link', 'type' => 'url', 'default_value' => site_url('/contact')),

            // Footer Settings
            array('key' => 'field_hp_footer_tab', 'label' => 'Footer Settings', 'type' => 'tab'),
            array('key' => 'field_hp_f_phone', 'label' => 'Phone Number', 'name' => 'footer_phone_number', 'type' => 'text'),
            array('key' => 'field_hp_f_email', 'label' => 'Email Address', 'name' => 'footer_email_address', 'type' => 'email'),
            array('key' => 'field_hp_f_address', 'label' => 'Office Address', 'name' => 'footer_office_address', 'type' => 'textarea'),
            array('key' => 'field_hp_f_facebook', 'label' => 'Facebook URL', 'name' => 'footer_facebook_url', 'type' => 'url'),
            array('key' => 'field_hp_f_twitter', 'label' => 'Twitter URL', 'name' => 'footer_twitter_url', 'type' => 'url'),
            array('key' => 'field_hp_f_linkedin', 'label' => 'LinkedIn URL', 'name' => 'footer_linkedin_url', 'type' => 'url'),
            array('key' => 'field_hp_f_copyright', 'label' => 'Footer Copyright Text', 'name' => 'footer_copyright_text', 'type' => 'text'),
            array('key' => 'field_hp_f_logo', 'label' => 'Footer Logo', 'name' => 'footer_logo', 'type' => 'image', 'return_format' => 'url'),
        ),
        'location' => array(
            array(
                array('param' => 'page_type', 'operator' => '==', 'value' => 'front_page'),
            ),
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'front-page.php'),
            ),
        ),
    ));

    // 3. Team Member CPT Fields
    acf_add_local_field_group(array(
        'key' => 'group_team_member',
        'title' => 'Team Member Details',
        'fields' => array(
            array('key' => 'field_team_position', 'label' => 'Position', 'name' => 'position', 'type' => 'text'),
            array('key' => 'field_team_bio', 'label' => 'Short Bio', 'name' => 'bio', 'type' => 'textarea'),
            array('key' => 'field_team_facebook', 'label' => 'Facebook URL', 'name' => 'facebook_url', 'type' => 'url'),
            array('key' => 'field_team_twitter', 'label' => 'Twitter URL', 'name' => 'twitter_url', 'type' => 'url'),
            array('key' => 'field_team_linkedin', 'label' => 'LinkedIn URL', 'name' => 'linkedin_url', 'type' => 'url'),
        ),
        'location' => array(
            array(
                array('param' => 'post_type', 'operator' => '==', 'value' => 'team'),
            ),
        ),
    ));

    // 4. Project CPT Fields
    acf_add_local_field_group(array(
        'key' => 'group_project',
        'title' => 'Project Details',
        'fields' => array(
            array('key' => 'field_project_location', 'label' => 'Location', 'name' => 'location', 'type' => 'text'),
            array('key' => 'field_project_duration', 'label' => 'Duration', 'name' => 'duration', 'type' => 'text'),
            array('key' => 'field_project_partners', 'label' => 'Partners', 'name' => 'partners', 'type' => 'text'),
            array(
                'key' => 'field_project_gallery', 'label' => 'Project Gallery', 'name' => 'gallery', 'type' => 'gallery', 'return_format' => 'url'
            ),
        ),
        'location' => array(
            array(
                array('param' => 'post_type', 'operator' => '==', 'value' => 'project'),
            ),
        ),
    ));

    // 4.5. Projects Page Fields
    acf_add_local_field_group(array(
        'key' => 'group_projects_page',
        'title' => 'Projects Page Content',
        'fields' => array(
            // Hero Info
            array('key' => 'field_pp_hero_tab', 'label' => 'Hero Details', 'type' => 'tab'),
            array('key' => 'field_pp_hero_title', 'label' => 'Hero Title (HTML allowed)', 'name' => 'hero_title', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Impact in Every<br /><span class="title-italic-green" style="font-style:italic; color:var(--primary-green);">Province</span>'),
            array('key' => 'field_pp_hero_subtitle', 'label' => 'Hero Subtitle', 'name' => 'hero_subtitle', 'type' => 'textarea', 'default_value' => "A showcase of our community-led ecological stewardship and innovative solutions driving Rwanda's green revolution."),
            array('key' => 'field_pp_btn_text', 'label' => 'Button Text', 'name' => 'hero_btn_text', 'type' => 'text', 'default_value' => 'Explore Initiatives'),
            array('key' => 'field_pp_btn_link', 'label' => 'Button Link', 'name' => 'hero_btn_link', 'type' => 'url', 'default_value' => '#projects-grid'),
            array('key' => 'field_pp_stat_num', 'label' => 'Stat Number', 'name' => 'hero_stat_num', 'type' => 'text', 'default_value' => '4+'),
            array('key' => 'field_pp_stat_lbl', 'label' => 'Stat Label', 'name' => 'hero_stat_label', 'type' => 'text', 'default_value' => 'Core Domains'),

            // Hero Slides
            array('key' => 'field_pp_slides_tab', 'label' => 'Hero Slideshow', 'type' => 'tab'),
            array(
                'key' => 'field_pp_slide_1', 'label' => 'Slide 1', 'name' => 'hero_slide_1', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_pp_s1_img', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_pp_s1_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Agroforestry & Livelihood'),
                )
            ),
            array(
                'key' => 'field_pp_slide_2', 'label' => 'Slide 2', 'name' => 'hero_slide_2', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_pp_s2_img', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_pp_s2_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Carbon Scheme – Rulindo'),
                )
            ),
            array(
                'key' => 'field_pp_slide_3', 'label' => 'Slide 3', 'name' => 'hero_slide_3', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_pp_s3_img', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_pp_s3_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'One Tree per Pupil'),
                )
            ),
            array(
                'key' => 'field_pp_slide_4', 'label' => 'Slide 4', 'name' => 'hero_slide_4', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_pp_s4_img', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_pp_s4_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Agroforestry & PES – Tea'),
                )
            ),
            array(
                'key' => 'field_pp_slide_5', 'label' => 'Slide 5', 'name' => 'hero_slide_5', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_pp_s5_img', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_pp_s5_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Education & Classroom Renovation'),
                )
            ),

            // Stats Banner
            array('key' => 'field_pp_stats_tab', 'label' => 'Stats Banner', 'type' => 'tab'),
            // Stat 1
            array('key' => 'field_pp_stat1_label', 'label' => 'Stat 1 Label', 'name' => 'pp_stat_1_label', 'type' => 'text', 'default_value' => 'Trees Planted'),
            array('key' => 'field_pp_stat1_value', 'label' => 'Stat 1 Value', 'name' => 'pp_stat_1_value', 'type' => 'text', 'default_value' => '1.2M'),
            array('key' => 'field_pp_stat1_suffix', 'label' => 'Stat 1 Suffix', 'name' => 'pp_stat_1_suffix', 'type' => 'text', 'default_value' => '+'),
            // Stat 2
            array('key' => 'field_pp_stat2_label', 'label' => 'Stat 2 Label', 'name' => 'pp_stat_2_label', 'type' => 'text', 'default_value' => 'Lives Impacted'),
            array('key' => 'field_pp_stat2_value', 'label' => 'Stat 2 Value', 'name' => 'pp_stat_2_value', 'type' => 'text', 'default_value' => '45k'),
            array('key' => 'field_pp_stat2_suffix', 'label' => 'Stat 2 Suffix', 'name' => 'pp_stat_2_suffix', 'type' => 'text', 'default_value' => '+'),
            // Stat 3
            array('key' => 'field_pp_stat3_label', 'label' => 'Stat 3 Label', 'name' => 'pp_stat_3_label', 'type' => 'text', 'default_value' => 'Districts Reached'),
            array('key' => 'field_pp_stat3_value', 'label' => 'Stat 3 Value', 'name' => 'pp_stat_3_value', 'type' => 'text', 'default_value' => '30'),
            array('key' => 'field_pp_stat3_suffix', 'label' => 'Stat 3 Suffix', 'name' => 'pp_stat_3_suffix', 'type' => 'text', 'default_value' => '+'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'template-projects.php'),
            ),
        ),
    ));

    // 4.6. Team Page Fields
    acf_add_local_field_group(array(
        'key' => 'group_team_page',
        'title' => 'Team Page Content',
        'fields' => array(
            array('key' => 'field_team_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'),
            array('key' => 'field_team_hero_title', 'label' => 'Hero Title (Black Text)', 'name' => 'team_hero_title', 'type' => 'textarea', 'rows' => 2, 'default_value' => "Meet the Visionaries\nShaping Rwanda's", 'instructions' => "Use a new line for line breaks."),
            array('key' => 'field_team_hero_highlight', 'label' => 'Hero Highlight (Green Italic Text)', 'name' => 'team_hero_highlight', 'type' => 'text', 'default_value' => 'Green Future', 'instructions' => 'These words will automatically be styled green and italic at the end of the title.'),
            array('key' => 'field_team_hero_desc', 'label' => 'Hero Description', 'name' => 'team_hero_desc', 'type' => 'textarea', 'default_value' => 'CIAC Rwanda is powered by a diverse collective of environmentalists, local community leaders, and global innovators dedicated to restoring the ecological integrity of our highlands.'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'template-team.php'),
            ),
        ),
    ));

    // 4.7. Contact Page Fields
    acf_add_local_field_group(array(
        'key' => 'group_contact_page',
        'title' => 'Contact Page Content',
        'fields' => array(
            array('key' => 'field_contact_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'),
            array('key' => 'field_contact_hero_title', 'label' => 'Hero Title (HTML allowed)', 'name' => 'hero_title', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Let\'s nurture<br>the <span class="title-italic-green" style="font-style:italic; color:var(--primary-green);">highlands</span><br>together.'),
            array('key' => 'field_contact_hero_desc', 'label' => 'Hero Description', 'name' => 'hero_description', 'type' => 'textarea', 'default_value' => "Whether you're looking to partner on reforestation projects, inquire about our conservation initiatives, or join our innovative grassroots movement, our team is ready to connect."),
            array('key' => 'field_contact_hero_img', 'label' => 'Hero Image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'url'),

            // Form Section
            array('key' => 'field_contact_form_tab', 'label' => 'Form Details', 'type' => 'tab'),
            array('key' => 'field_contact_form_t_black', 'label' => 'Form Title (Black Text)', 'name' => 'form_title_black', 'type' => 'text', 'default_value' => 'Send an'),
            array('key' => 'field_contact_form_t_green', 'label' => 'Form Title (Green Italic Text)', 'name' => 'form_title_green', 'type' => 'text', 'default_value' => 'Inquiry'),
            array('key' => 'field_contact_form_p_name', 'label' => 'Name Placeholder', 'name' => 'form_placeholder_name', 'type' => 'text', 'default_value' => 'Jean-Claude Umutoni'),
            array('key' => 'field_contact_form_p_email', 'label' => 'Email Placeholder', 'name' => 'form_placeholder_email', 'type' => 'text', 'default_value' => 'hello@example.rw'),
            array('key' => 'field_contact_form_p_msg', 'label' => 'Message Placeholder', 'name' => 'form_placeholder_message', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'How can we collaborate to preserve our highlands?'),
            array('key' => 'field_contact_form_btn', 'label' => 'Submit Button Text', 'name' => 'form_button_text', 'type' => 'text', 'default_value' => 'SEND INQUIRY'),

            // Sidebar Section
            array('key' => 'field_contact_sidebar_tab', 'label' => 'Sidebar Settings', 'type' => 'tab'),
            array('key' => 'field_contact_side_t_hq', 'label' => 'Headquarters Title', 'name' => 'sidebar_title_hq', 'type' => 'text', 'default_value' => 'Headquarters'),
            array('key' => 'field_contact_side_map', 'label' => 'Google Maps Embed iframe HTML', 'name' => 'sidebar_map_iframe', 'type' => 'textarea', 'rows' => 4, 'instructions' => 'Paste the entire <iframe ...> code from Google Maps.'),
            array('key' => 'field_contact_side_t_dc', 'label' => 'Direct Channels Title', 'name' => 'sidebar_title_dc', 'type' => 'text', 'default_value' => 'Direct Channels'),
            array('key' => 'field_contact_side_note', 'label' => 'Note', 'type' => 'message', 'message' => 'The Email, Phone, and Address shown here are pulled from your Homepage "Footer Settings" so you only have to update them in one place!'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'template-contact.php'),
            ),
        ),
    ));

    // 4.8. Newsletter Page Fields
    acf_add_local_field_group(array(
        'key' => 'group_newsletter_page',
        'title' => 'Newsletter Page Content',
        'fields' => array(
            // Hero Section
            array('key' => 'field_nl_hero_tab', 'label' => 'Hero Details', 'type' => 'tab'),
            array('key' => 'field_nl_hero_t_black', 'label' => 'Hero Title (Black Text)', 'name' => 'hero_title_black', 'type' => 'textarea', 'rows' => 2, 'default_value' => "The Breath of\nthe"),
            array('key' => 'field_nl_hero_t_green', 'label' => 'Hero Title (Green Italic Text)', 'name' => 'hero_title_green', 'type' => 'text', 'default_value' => 'Highlands.'),
            array('key' => 'field_nl_hero_sub', 'label' => 'Hero Subtitle', 'name' => 'hero_subtitle', 'type' => 'textarea', 'default_value' => "Exploring the intersection of modern ecological innovation and ancestral wisdom in Rwanda's reforestation journey."),
            array('key' => 'field_nl_stat_num', 'label' => 'Stat Number', 'name' => 'hero_stat_num', 'type' => 'text', 'default_value' => '84%'),
            array('key' => 'field_nl_stat_desc', 'label' => 'Stat Description', 'name' => 'hero_stat_desc', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Survival rate of our native seedlings across the Nyungwe corridor this season.'),

            // Featured Article Section
            array('key' => 'field_nl_feat_tab', 'label' => 'Featured Article', 'type' => 'tab'),
            array('key' => 'field_nl_feat_img', 'label' => 'Featured Image', 'name' => 'featured_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_nl_feat_badge', 'label' => 'Badge', 'name' => 'featured_badge', 'type' => 'text', 'default_value' => 'REFORESTATION'),
            array('key' => 'field_nl_feat_title', 'label' => 'Title', 'name' => 'featured_title', 'type' => 'textarea', 'rows' => 2, 'default_value' => "Restoring the Canopy: A Multi-<br>Generational Commitment"),
            array('key' => 'field_nl_feat_meta', 'label' => 'Meta Data (HTML allowed)', 'name' => 'featured_meta', 'type' => 'text', 'default_value' => '<span>By Dr. Amélie Umutoni</span> <span>⏱ 12 min read</span>'),
            array('key' => 'field_nl_feat_link', 'label' => 'Article Link', 'name' => 'featured_link', 'type' => 'url', 'default_value' => '#'),
            array('key' => 'field_nl_quote_title', 'label' => 'Side Quote Title', 'name' => 'quote_title', 'type' => 'textarea', 'rows' => 2, 'default_value' => "Climate resilience isn't just about planting; it's about listening to the land's original heartbeat."),
            array('key' => 'field_nl_quote_desc', 'label' => 'Side Quote Description', 'name' => 'quote_desc', 'type' => 'textarea', 'default_value' => 'Our latest research into soil symbiosis reveals how ancient fungi networks are the secret to rapid highland forest recovery.'),
            array('key' => 'field_nl_quote_link', 'label' => 'Side Quote Link', 'name' => 'quote_link', 'type' => 'url', 'default_value' => '#'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'template-newsletter.php'),
            ),
        ),
    ));

    // 5. About Page Fields
    acf_add_local_field_group(array(
        'key' => 'group_about_page',
        'title' => 'About Page Fields',
        'fields' => array(
            // Hero Section
            array('key' => 'field_about_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'),
            array('key' => 'field_about_hero_title', 'label' => 'Hero Title', 'name' => 'hero_title', 'type' => 'text'),
            array('key' => 'field_about_hero_desc', 'label' => 'Hero Description', 'name' => 'hero_description', 'type' => 'textarea'),
            
            // Genesis Section
            array('key' => 'field_about_genesis_tab', 'label' => 'Genesis Section', 'type' => 'tab'),
            array('key' => 'field_about_genesis_title', 'label' => 'Genesis Title', 'name' => 'genesis_title', 'type' => 'text'),
            array('key' => 'field_about_genesis_desc', 'label' => 'Genesis Description', 'name' => 'genesis_description', 'type' => 'wysiwyg'),
            array('key' => 'field_about_genesis_image', 'label' => 'Genesis Image', 'name' => 'genesis_image', 'type' => 'image', 'return_format' => 'url'),

            // Foundation Section
            array('key' => 'field_about_foundation_tab', 'label' => 'Foundation Section', 'type' => 'tab'),
            array('key' => 'field_about_foundation_title', 'label' => 'Section Title', 'name' => 'foundation_title', 'type' => 'text', 'default_value' => 'Our Foundation'),
            
            // Mission
            array(
                'key' => 'field_about_f_mission', 'label' => 'Card 1 (Mission)', 'name' => 'foundation_mission', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_about_fm_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Mission'),
                    array('key' => 'field_about_fm_icon', 'label' => 'Icon Image', 'name' => 'icon', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_about_fm_desc', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'default_value' => 'To implement world-class sustainable frameworks through rigorous research, advocacy, and community-led environmental stewardship across Rwanda.'),
                )
            ),
            // Vision
            array(
                'key' => 'field_about_f_vision', 'label' => 'Card 2 (Vision)', 'name' => 'foundation_vision', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_about_fv_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Vision'),
                    array('key' => 'field_about_fv_icon', 'label' => 'Icon Image', 'name' => 'icon', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_about_fv_desc', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'default_value' => 'To implement world-class sustainable frameworks through rigorous research, advocacy, and community-led environmental stewardship across Rwanda.'),
                )
            ),
            // Core Values
            array(
                'key' => 'field_about_f_values', 'label' => 'Card 3 (Core Values)', 'name' => 'foundation_values', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_about_fc_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Core Values'),
                    array('key' => 'field_about_fc_icon', 'label' => 'Icon Image', 'name' => 'icon', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_about_fc_v1', 'label' => 'Value 1', 'name' => 'value_1', 'type' => 'text', 'default_value' => 'Integrity'),
                    array('key' => 'field_about_fc_v2', 'label' => 'Value 2', 'name' => 'value_2', 'type' => 'text', 'default_value' => 'Sustainability'),
                    array('key' => 'field_about_fc_v3', 'label' => 'Value 3', 'name' => 'value_3', 'type' => 'text', 'default_value' => 'Innovation'),
                    array('key' => 'field_about_fc_v4', 'label' => 'Value 4', 'name' => 'value_4', 'type' => 'text', 'default_value' => 'Collaboration'),
                )
            ),
            // Approach
            array(
                'key' => 'field_about_f_approach', 'label' => 'Card 4 (Our Approach)', 'name' => 'foundation_approach', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_about_fa_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Our Approach'),
                    array('key' => 'field_about_fa_icon', 'label' => 'Icon Image', 'name' => 'icon', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_about_fa_desc', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'default_value' => 'To implement world-class sustainable frameworks through rigorous research, advocacy, and community-led environmental stewardship across Rwanda.'),
                )
            ),
            
            // Founders Section
            array('key' => 'field_about_founders_tab', 'label' => 'Founders Section', 'type' => 'tab'),
            array('key' => 'field_about_founders_title', 'label' => 'Section Title (HTML allowed)', 'name' => 'founders_title', 'type' => 'text', 'default_value' => 'Our <span>Founders</span>'),
            array('key' => 'field_about_founders_desc', 'label' => 'Section Description', 'name' => 'founders_description', 'type' => 'textarea', 'default_value' => 'Our founders are passionate young innovators driven by a shared vision to use technology for social and environmental impact. With backgrounds in problem-solving leadership, and digital creation, they come together to build practical solutions that empower communities, support farmers, and promote sustainable growth.'),

            // Founder 1
            array(
                'key' => 'field_about_founder_1', 'label' => 'Founder 1', 'name' => 'founder_1', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_about_f1_photo', 'label' => 'Photo', 'name' => 'photo', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_about_f1_name', 'label' => 'Name (Use <br> for new lines)', 'name' => 'name', 'type' => 'textarea', 'rows' => 2),
                    array('key' => 'field_about_f1_role', 'label' => 'Role', 'name' => 'role', 'type' => 'text'),
                    array('key' => 'field_about_f1_bio', 'label' => 'Bio', 'name' => 'bio', 'type' => 'textarea'),
                )
            ),
            // Founder 2
            array(
                'key' => 'field_about_founder_2', 'label' => 'Founder 2', 'name' => 'founder_2', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_about_f2_photo', 'label' => 'Photo', 'name' => 'photo', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_about_f2_name', 'label' => 'Name (Use <br> for new lines)', 'name' => 'name', 'type' => 'textarea', 'rows' => 2),
                    array('key' => 'field_about_f2_role', 'label' => 'Role', 'name' => 'role', 'type' => 'text'),
                    array('key' => 'field_about_f2_bio', 'label' => 'Bio', 'name' => 'bio', 'type' => 'textarea'),
                )
            ),
            // Founder 3
            array(
                'key' => 'field_about_founder_3', 'label' => 'Founder 3', 'name' => 'founder_3', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_about_f3_photo', 'label' => 'Photo', 'name' => 'photo', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_about_f3_name', 'label' => 'Name (Use <br> for new lines)', 'name' => 'name', 'type' => 'textarea', 'rows' => 2),
                    array('key' => 'field_about_f3_role', 'label' => 'Role', 'name' => 'role', 'type' => 'text'),
                    array('key' => 'field_about_f3_bio', 'label' => 'Bio', 'name' => 'bio', 'type' => 'textarea'),
                )
            ),
            // Founder 4
            array(
                'key' => 'field_about_founder_4', 'label' => 'Founder 4', 'name' => 'founder_4', 'type' => 'group',
                'sub_fields' => array(
                    array('key' => 'field_about_f4_photo', 'label' => 'Photo', 'name' => 'photo', 'type' => 'image', 'return_format' => 'url'),
                    array('key' => 'field_about_f4_name', 'label' => 'Name (Use <br> for new lines)', 'name' => 'name', 'type' => 'textarea', 'rows' => 2),
                    array('key' => 'field_about_f4_role', 'label' => 'Role', 'name' => 'role', 'type' => 'text'),
                    array('key' => 'field_about_f4_bio', 'label' => 'Bio', 'name' => 'bio', 'type' => 'textarea'),
                )
            ),

            // Impact Section
            array('key' => 'field_about_impact_tab', 'label' => 'Impact Section', 'type' => 'tab'),
            array('key' => 'field_about_impact_subtitle', 'label' => 'Subtitle', 'name' => 'impact_subtitle', 'type' => 'text', 'default_value' => 'Our Reach'),
            array('key' => 'field_about_impact_title', 'label' => 'Title', 'name' => 'impact_title', 'type' => 'text', 'default_value' => 'Rwanda-Wide Impact'),
            array('key' => 'field_about_impact_desc', 'label' => 'Description', 'name' => 'impact_description', 'type' => 'textarea', 'default_value' => 'From the rolling hills of the North to the vibrant plains of the East, our operations span all 30 districts. We deploy localized solutions that respect the unique ecological needs of every province.'),
            array('key' => 'field_about_impact_s1_num', 'label' => 'Stat 1 Number', 'name' => 'impact_stat_1_num', 'type' => 'text', 'default_value' => '30+'),
            array('key' => 'field_about_impact_s1_lbl', 'label' => 'Stat 1 Label', 'name' => 'impact_stat_1_label', 'type' => 'text', 'default_value' => 'Districts Covered'),
            array('key' => 'field_about_impact_s2_num', 'label' => 'Stat 2 Number', 'name' => 'impact_stat_2_num', 'type' => 'text', 'default_value' => '150k'),
            array('key' => 'field_about_impact_s2_lbl', 'label' => 'Stat 2 Label', 'name' => 'impact_stat_2_label', 'type' => 'text', 'default_value' => 'Trees Planted'),
            array('key' => 'field_about_impact_img', 'label' => 'Impact Image/Map', 'name' => 'impact_image', 'type' => 'image', 'return_format' => 'url'),

            // CTA Section
            array('key' => 'field_about_cta_tab', 'label' => 'CTA Section', 'type' => 'tab'),
            array('key' => 'field_about_cta_title', 'label' => 'CTA Title', 'name' => 'cta_title', 'type' => 'text', 'default_value' => 'Join Our Mission for a <span>Greener Rwanda</span>'),
            array('key' => 'field_about_cta_desc', 'label' => 'CTA Description', 'name' => 'cta_description', 'type' => 'textarea', 'default_value' => 'Your support helps us bridge the gap between vision and ecological reality. Together, we can build a sustainable future.'),
            array('key' => 'field_about_cta_btn1_txt', 'label' => 'Button 1 Text', 'name' => 'cta_button_1_text', 'type' => 'text', 'default_value' => 'Partner With Us'),
            array('key' => 'field_about_cta_btn1_lnk', 'label' => 'Button 1 Link', 'name' => 'cta_button_1_link', 'type' => 'url', 'default_value' => site_url('/contact')),
            array('key' => 'field_about_cta_btn2_txt', 'label' => 'Button 2 Text', 'name' => 'cta_button_2_text', 'type' => 'text', 'default_value' => 'Explore More'),
            array('key' => 'field_about_cta_btn2_lnk', 'label' => 'Button 2 Link', 'name' => 'cta_button_2_link', 'type' => 'url', 'default_value' => '#'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'template-about.php'),
            ),
        ),
    ));
    // 6. Newsletter Page Fields
    acf_add_local_field_group(array(
        'key' => 'group_newsletter_page',
        'title' => 'Newsletter Page Content',
        'fields' => array(
            // Hero
            array('key' => 'field_nl_hero_tab', 'label' => 'Hero Section', 'type' => 'tab'),
            array('key' => 'field_nl_hero_title', 'label' => 'Hero Title (HTML allowed)', 'name' => 'hero_title', 'type' => 'textarea'),
            array('key' => 'field_nl_hero_subtitle', 'label' => 'Hero Subtitle', 'name' => 'hero_subtitle', 'type' => 'textarea'),
            array('key' => 'field_nl_hero_stat_num', 'label' => 'Hero Stat Number', 'name' => 'hero_stat_num', 'type' => 'text'),
            array('key' => 'field_nl_hero_stat_desc', 'label' => 'Hero Stat Description', 'name' => 'hero_stat_desc', 'type' => 'text'),
            
            // Featured Article
            array('key' => 'field_nl_feat_tab', 'label' => 'Featured Article', 'type' => 'tab'),
            array('key' => 'field_nl_feat_img', 'label' => 'Featured Image', 'name' => 'featured_image', 'type' => 'image', 'return_format' => 'url'),
            array('key' => 'field_nl_feat_badge', 'label' => 'Featured Badge', 'name' => 'featured_badge', 'type' => 'text'),
            array('key' => 'field_nl_feat_title', 'label' => 'Featured Title', 'name' => 'featured_title', 'type' => 'textarea', 'rows' => 2),
            array('key' => 'field_nl_feat_meta', 'label' => 'Featured Meta (e.g. Author & Read Time)', 'name' => 'featured_meta', 'type' => 'text'),
            array('key' => 'field_nl_feat_link', 'label' => 'Featured Link', 'name' => 'featured_link', 'type' => 'url'),
            
            // Sidebar Quote
            array('key' => 'field_nl_quote_tab', 'label' => 'Sidebar Quote', 'type' => 'tab'),
            array('key' => 'field_nl_quote_title', 'label' => 'Quote Title', 'name' => 'quote_title', 'type' => 'textarea', 'rows' => 3),
            array('key' => 'field_nl_quote_desc', 'label' => 'Quote Description', 'name' => 'quote_desc', 'type' => 'textarea'),
            array('key' => 'field_nl_quote_link', 'label' => 'Quote Link', 'name' => 'quote_link', 'type' => 'url'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'template-newsletter.php'),
            ),
        ),
    ));
    // 7. Contact Page Fields
    acf_add_local_field_group(array(
        'key' => 'group_contact_page',
        'title' => 'Contact Page Content',
        'fields' => array(
            array('key' => 'field_contact_hero_title', 'label' => 'Hero Title (HTML allowed)', 'name' => 'hero_title', 'type' => 'textarea'),
            array('key' => 'field_contact_hero_desc', 'label' => 'Hero Description', 'name' => 'hero_description', 'type' => 'textarea'),
            array('key' => 'field_contact_hero_img', 'label' => 'Hero Image', 'name' => 'hero_image', 'type' => 'image', 'return_format' => 'url'),
        ),
        'location' => array(
            array(
                array('param' => 'page_template', 'operator' => '==', 'value' => 'template-contact.php'),
            ),
        ),
    ));

endif;
