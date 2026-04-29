<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'ecology_nature_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'ecology-nature' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecology_nature_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'ecology-nature' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecology-nature' ),
			'off' => esc_html__( 'Disable', 'ecology-nature' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecology_nature_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'ecology-nature' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecology-nature' ),
			'off' => esc_html__( 'Disable', 'ecology-nature' ),
		],
	] );

	// FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'ecology_nature_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'ecology-nature' ),
	) );

	Kirki::add_section( 'ecology_nature_font_style_section', array(
		'title'      => esc_html__( 'Typography Option',  'ecology-nature' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'ecology-nature' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ECOLOGY_NATURE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'ecology-nature' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'ecology_nature_font_style_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. More Font Family Options </p><p>3. Color Pallete Setup </p><p>4. Section Reordering Facility</p><p>5. For More Options kindly Go For Premium Version.</p>', 'ecology-nature' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_all_headings_typography',
		'section'     => 'ecology_nature_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'ecology_nature_all_headings_typography',
		'label'       => esc_html__( 'Heading Typography',  'ecology-nature' ),
		'description' => esc_html__( 'Select the typography options for your heading.',  'ecology-nature' ),
		'section'     => 'ecology_nature_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_body_content_typography',
		'section'     => 'ecology_nature_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'ecology_nature_body_content_typography',
		'label'       => esc_html__( 'Content Typography',  'ecology-nature' ),
		'description' => esc_html__( 'Select the typography options for your content.',  'ecology-nature' ),
		'section'     => 'ecology_nature_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

		// PANEL
	Kirki::add_panel( 'ecology_nature_panel_id_5', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Animations', 'ecology-nature' ),
	) );

	// ANIMATION SECTION
	Kirki::add_section( 'ecology_nature_section_animation', array(
	    'title'          => esc_html__( 'Animations', 'ecology-nature' ),
	    'panel'          => 'ecology_nature_panel_id_5',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'ecology-nature' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ECOLOGY_NATURE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'ecology-nature' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'ecology_nature_section_animation',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'ecology-nature' ) . '</div>',
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecology_nature_animation_enabled',
		'label'       => esc_html__( 'Turn To Show Animation', 'ecology-nature' ),
		'section'     => 'ecology_nature_section_animation',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecology-nature' ),
			'off' => esc_html__( 'Disable', 'ecology-nature' ),
		],
	] );

	// PANEL
	Kirki::add_panel( 'ecology_nature_panel_id_2', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Dark Mode', 'ecology-nature' ),
	) );

	// DARK MODE SECTION
	Kirki::add_section( 'ecology_nature_section_dark_mode', array(
	    'title'          => esc_html__( 'Dark Mode', 'ecology-nature' ),
	    'panel'          => 'ecology_nature_panel_id_2',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'ecology-nature' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ECOLOGY_NATURE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'ecology-nature' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'ecology_nature_section_dark_mode',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'ecology-nature' ) . '</div>',
	]);

	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'ecology_nature_dark_colors',
	    'section'     => 'ecology_nature_section_dark_mode',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Dark Appearance', 'ecology-nature' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecology_nature_is_dark_mode_enabled',
		'label'       => esc_html__( 'Turn To Dark Mode', 'ecology-nature' ),
		'section'     => 'ecology_nature_section_dark_mode',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecology-nature' ),
			'off' => esc_html__( 'Disable', 'ecology-nature' ),
		],
	] );



	// PANEL

	Kirki::add_panel( 'ecology_nature_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'ecology-nature' ),
	) );

	// Additional Settings

	Kirki::add_section( 'ecology_nature_additional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'ecology-nature' ),
	    'panel'          => 'ecology_nature_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'ecology-nature' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ECOLOGY_NATURE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'ecology-nature' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'ecology_nature_additional_settings',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'ecology-nature' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecology_nature_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'ecology-nature' ),
		'section'     => 'ecology_nature_additional_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	new \Kirki\Field\Radio_Buttonset( [
		'settings'    => 'ecology_nature_scroll_top_position',
		'label'       => esc_html__( 'Alignment for Scroll To Top', 'ecology-nature' ),
		'section'     => 'ecology_nature_additional_settings',
		'default'     => 'Right',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'ecology-nature' ),
			'Center' => esc_html__( 'Center', 'ecology-nature' ),
			'Right'  => esc_html__( 'Right', 'ecology-nature' ),
	],]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'ecology_nature_scroll_top_icon',
		'label'    => esc_html__( 'Select Appropriate Scroll Top Icon', 'ecology-nature' ),
		'section'  => 'ecology_nature_additional_settings',
		'default'  => 'dashicons dashicons-arrow-up-alt',
		'priority' => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_ecology_nature',
		'label'       => esc_html__( 'Menus Text Transform', 'ecology-nature' ),
		'section'     => 'ecology_nature_additional_settings',
		'default'     => 'CAPITALISE',
		'placeholder' => esc_html__( 'Choose an option', 'ecology-nature' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'ecology-nature' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'ecology-nature' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'ecology-nature' ),

		],
	]	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecology_nature_menu_zoom',
		'label'       => esc_html__( 'Menu Transition', 'ecology-nature' ),
		'section'     => 'ecology_nature_additional_settings',
		'default' => 'Zoom Out',
		'placeholder' => esc_html__( 'Choose an option', 'ecology-nature' ),
		'choices'     => [
			'Zoomout' => __('Zoom Out','ecology-nature'),
            'Zoominn' => __('Zoom Inn','ecology-nature'),
            
		],
	] );



	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'ecology_nature_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'ecology-nature' ),
		'section'     => 'ecology_nature_additional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecology_nature_sticky_header',
		'label'       => esc_html__( 'Here you can enable or disable your Sticky Header.', 'ecology-nature' ),
		'section'     => 'ecology_nature_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecology_nature_site_loader',
		'label'       => esc_html__( 'Here you can enable or disable your Site Loader.', 'ecology-nature' ),
		'section'     => 'ecology_nature_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecology_nature_preloader_type',
		'label'       => esc_html__( 'Preloader Type', 'ecology-nature' ),
		'section'     => 'ecology_nature_additional_settings',
		'default' => 'four-way-loader',
		'placeholder' => esc_html__( 'Choose an option', 'ecology-nature' ),
		'choices'     => [
			'four-way-loader' => __('Type 1','ecology-nature'),
            'cube-loader' => __('Type 2','ecology-nature'),
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecology_nature_page_layout',
		'label'       => esc_html__( 'Page Layout Setting', 'ecology-nature' ),
		'section'     => 'ecology_nature_additional_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'ecology-nature' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','ecology-nature'),
            'Right Sidebar' => __('Right Sidebar','ecology-nature'),
            'One Column' => __('One Column','ecology-nature')
		],
	] );

	if ( class_exists("woocommerce")){

	// Woocommerce Settings

	Kirki::add_section( 'ecology_nature_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'ecology-nature' ),
		'panel'          => 'ecology_nature_panel_id',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'ecology-nature' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ECOLOGY_NATURE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'ecology-nature' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'ecology_nature_woocommerce_settings',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'ecology-nature' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecology_nature_shop_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'ecology-nature' ),
		'section'     => 'ecology_nature_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecology_nature_product_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'ecology-nature' ),
		'section'     => 'ecology_nature_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecology_nature_related_product_setting',
		'label'       => esc_html__( 'Here you can enable or disable your related products.', 'ecology-nature' ),
		'section'     => 'ecology_nature_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Number(
	[
		'settings' => 'ecology_nature_per_columns',
		'label'    => esc_html__( 'Product Per Row', 'ecology-nature' ),
		'section'  => 'ecology_nature_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'ecology_nature_product_per_page',
		'label'    => esc_html__( 'Product Per Page', 'ecology-nature' ),
		'section'  => 'ecology_nature_woocommerce_settings',
		'default'  => 9,
		'choices'  => [
			'min'  => 1,
			'max'  => 15,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number_per_row',
		'label'    => esc_html__( 'Related Product Per Column', 'ecology-nature' ),
		'section'  => 'ecology_nature_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number',
		'label'    => esc_html__( 'Related Product Per Page', 'ecology-nature' ),
		'section'  => 'ecology_nature_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecology_nature_shop_page_layout',
		'label'       => esc_html__( 'Shop Page Layout Setting', 'ecology-nature' ),
		'section'     => 'ecology_nature_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'ecology-nature' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','ecology-nature'),
            'Right Sidebar' => __('Right Sidebar','ecology-nature')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecology_nature_product_page_layout',
		'label'       => esc_html__( 'Product Page Layout Setting', 'ecology-nature' ),
		'section'     => 'ecology_nature_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'ecology-nature' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','ecology-nature'),
            'Right Sidebar' => __('Right Sidebar','ecology-nature')
		],
	] );

	new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'ecology_nature_woocommerce_pagination_position',
		'label'       => esc_html__( 'Woocommerce Pagination Alignment', 'ecology-nature' ),
		'section'     => 'ecology_nature_woocommerce_settings',
		'default'     => 'Center',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'ecology-nature' ),
			'Center' => esc_html__( 'Center', 'ecology-nature' ),
			'Right'  => esc_html__( 'Right', 'ecology-nature' ),
		],
	]
	);

}

	// COLOR SECTION

	Kirki::add_section( 'ecology_nature_section_color', array(
	    'title'          => esc_html__( 'Global Color', 'ecology-nature' ),
	    'panel'          => 'ecology_nature_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'ecology-nature' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ECOLOGY_NATURE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'ecology-nature' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'ecology_nature_section_color',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'ecology-nature' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_global_colors',
		'section'     => 'ecology_nature_section_color',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Here you can change your theme color on one click.', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'ecology_nature_global_color',
		'label'       => __( 'choose your Appropriate Color', 'ecology-nature' ),
		'section'     => 'ecology_nature_section_color',
		'default'     => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'ecology_nature_global_color_2',
		'label'       => __( 'Choose Your Second Color', 'ecology-nature' ),
		'section'     => 'ecology_nature_section_color',
		'default'     => '',
	] );

	// POST SECTION

	Kirki::add_section( 'ecology_nature_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'ecology-nature' ),
	    'panel'          => 'ecology_nature_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'ecology-nature' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ECOLOGY_NATURE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'ecology-nature' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'ecology_nature_section_post',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'ecology-nature' ) . '</div>',
	] );

	new \Kirki\Field\Sortable(
	[
		'settings' => 'ecology_nature_archive_element_sortable',
		'label'    => __( 'Archive Post Page element Reordering', 'ecology-nature' ),
		'section'  => 'ecology_nature_section_post',
		'default'  => [ 'option1', 'option2', 'option3' ],
		'choices'  => [
			'option1' => esc_html__( 'Post Meta', 'ecology-nature' ),
			'option2' => esc_html__( 'Post Title', 'ecology-nature' ),
			'option3' => esc_html__( 'Post Content', 'ecology-nature' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'ecology_nature_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'ecology-nature' ),
		'section'     => 'ecology_nature_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecology_nature_pagination_setting',
		'label'       => esc_html__( 'Here you can enable or disable your Pagination.', 'ecology-nature' ),
		'section'     => 'ecology_nature_section_post',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecology_nature_archive_sidebar_layout',
		'label'       => esc_html__( 'Archive Post Sidebar Layout Setting', 'ecology-nature' ),
		'section'     => 'ecology_nature_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'ecology-nature' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','ecology-nature'),
            'Right Sidebar' => __('Right Sidebar','ecology-nature'),
            'Three Column' => __('Three Column','ecology-nature'),
            'Four Column' => __('Four Column','ecology-nature'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','ecology-nature'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','ecology-nature'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','ecology-nature')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecology_nature_single_post_sidebar_layout',
		'label'       => esc_html__( 'Single Post Sidebar Layout Setting', 'ecology-nature' ),
		'section'     => 'ecology_nature_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'ecology-nature' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','ecology-nature'),
            'Right Sidebar' => __('Right Sidebar','ecology-nature'),
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecology_nature_search_sidebar_layout',
		'label'       => esc_html__( 'Search Page Sidebar Layout Setting', 'ecology-nature' ),
		'section'     => 'ecology_nature_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'ecology-nature' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','ecology-nature'),
            'Right Sidebar' => __('Right Sidebar','ecology-nature'),
            'Three Column' => __('Three Column','ecology-nature'),
            'Four Column' => __('Four Column','ecology-nature'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','ecology-nature'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','ecology-nature'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','ecology-nature')
		],
	] );

	Kirki::add_field( 'ecology_nature_config', [
		'type'        => 'select',
		'settings'    => 'ecology_nature_post_column_count',
		'label'       => esc_html__( 'Grid Column for Archive Page', 'ecology-nature' ),
		'section'     => 'ecology_nature_section_post',
		'default'    => '2',
		'choices' => [
				'1' => __( '1 Column', 'ecology-nature' ),
				'2' => __( '2 Column', 'ecology-nature' ),
			],
	] );

	// Breadcrumb
	Kirki::add_section( 'ecology_nature_bradcrumb', array(
	    'title'          => esc_html__( 'Breadcrumb Settings', 'ecology-nature' ),
	    'panel'          => 'ecology_nature_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'ecology-nature' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ECOLOGY_NATURE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'ecology-nature' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'ecology_nature_bradcrumb',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'ecology-nature' ) . '</div>',
	] );


	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_enable_breadcrumb_heading',
		'section'     => 'ecology_nature_bradcrumb',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Single Page Breadcrumb', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecology_nature_breadcrumb_enable',
		'label'       => esc_html__( 'Breadcrumb Enable / Disable', 'ecology-nature' ),
		'section'     => 'ecology_nature_bradcrumb',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecology-nature' ),
			'off' => esc_html__( 'Disable', 'ecology-nature' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'default'     => '/',
        'settings' => 'ecology_nature_breadcrumb_separator' ,
        'label'    => esc_html__( 'Breadcrumb Separator',  'ecology-nature' ),
        'section'  => 'ecology_nature_bradcrumb',
    ] );

	// HEADER SECTION

	Kirki::add_section( 'ecology_nature_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'ecology-nature' ),
	    'panel'          => 'ecology_nature_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'ecology-nature' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ECOLOGY_NATURE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'ecology-nature' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'ecology_nature_section_header',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'ecology-nature' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_phone_number_heading_1',
		'section'     => 'ecology_nature_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Choose Your Icon', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'ecology_nature_dashicons_setting_1',
		'label'    => esc_html__( 'Select Appropriate Icon', 'ecology-nature' ),
		'section'  => 'ecology_nature_section_header',
		'default'  => 'dashicons dashicons-controls-volumeon',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_phone_number_heading',
		'section'     => 'ecology_nature_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Phone Number', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => esc_html__( 'Text', 'ecology-nature' ),
		'settings' => 'ecology_nature_header_phone_number_text',
		'section'  => 'ecology_nature_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'ecology_nature_header_phone_number',
		'section'  => 'ecology_nature_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_phone_number_heading_2',
		'section'     => 'ecology_nature_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Choose Your Icon', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'ecology_nature_dashicons_setting_2',
		'label'    => esc_html__( 'Select Appropriate Icon', 'ecology-nature' ),
		'section'  => 'ecology_nature_section_header',
		'default'  => 'dashicons dashicons-airplane',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_email_address_heading',
		'section'     => 'ecology_nature_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Email Address', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => esc_html__( 'Text', 'ecology-nature' ),
		'settings' => 'ecology_nature_header_email_address_text',
		'section'  => 'ecology_nature_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'ecology_nature_header_email_address',
		'section'  => 'ecology_nature_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_header_button_heading',
		'section'     => 'ecology_nature_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Button', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => esc_html__( 'Button Text', 'ecology-nature' ),
		'settings' => 'ecology_nature_header_button_text',
		'section'  => 'ecology_nature_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'    => esc_html__( 'Button URL', 'ecology-nature' ),
		'settings' => 'ecology_nature_header_button_url',
		'section'  => 'ecology_nature_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_enable_search',
		'section'     => 'ecology_nature_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Search Box', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecology_nature_search_box_enable',
		'label'       => esc_html__( 'Search Enable / Disable Button', 'ecology-nature' ),
		'section'     => 'ecology_nature_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecology-nature' ),
			'off' => esc_html__( 'Disable', 'ecology-nature' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_enable_socail_link',
		'section'     => 'ecology_nature_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'ecology_nature_section_header',
		'priority'    => 10,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'ecology-nature' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'ecology-nature' ),
		'settings'     => 'ecology_nature_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'ecology-nature' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'ecology-nature' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'ecology-nature' ),
				'description' => esc_html__( 'Add the social icon url here.', 'ecology-nature' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );

	// SLIDER SECTION

	Kirki::add_section( 'ecology_nature_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'ecology-nature' ),
        'panel'          => 'ecology_nature_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'ecology-nature' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ECOLOGY_NATURE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'ecology-nature' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'ecology_nature_blog_slide_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'ecology-nature' ) . '</div>',
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_enable_heading',
		'section'     => 'ecology_nature_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecology_nature_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'ecology-nature' ),
		'section'     => 'ecology_nature_blog_slide_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecology-nature' ),
			'off' => esc_html__( 'Disable', 'ecology-nature' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecology_nature_title_enable',
		'label'       => esc_html__( 'Title Enable / Disable', 'ecology-nature' ),
		'section'     => 'ecology_nature_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecology-nature' ),
			'off' => esc_html__( 'Disable', 'ecology-nature' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecology_nature_text_enable',
		'label'       => esc_html__( 'Text Enable / Disable', 'ecology-nature' ),
		'section'     => 'ecology_nature_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecology-nature' ),
			'off' => esc_html__( 'Disable', 'ecology-nature' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_slider_heading',
		'section'     => 'ecology_nature_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'ecology_nature_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'ecology-nature' ),
		'section'     => 'ecology_nature_blog_slide_section',
		'default'     => 0,
		'choices'     => [
			'min'  => 1,
			'max'  => 5,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'ecology_nature_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'ecology-nature' ),
		'section'     => 'ecology_nature_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'ecology-nature' ),
		'priority'    => 10,
		'choices'     => ecology_nature_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_excerpt_slide_number',
		'section'     => 'ecology_nature_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Text', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'ecology_nature_excerpt_number',
		'label'       => esc_html__( 'Slide Content Range', 'ecology-nature' ),
		'section'     => 'ecology_nature_blog_slide_section',
		'default'     => 20,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_slider_button_heading',
		'section'     => 'ecology_nature_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider Button Text', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'ecology_nature_slider_button_text',
		'section'  => 'ecology_nature_blog_slide_section',
		'default'  => '',
		'priority' => 10,
	] );

		Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'    => esc_html__( 'Slider Button 2 Link', 'ecology-nature' ),
		'settings' => 'ecology_nature_slider_button_2_link',
		'section'  => 'ecology_nature_blog_slide_section',
		'default'  => '',
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecology_nature_slider_content_alignment',
		'label'       => esc_html__( 'Slider Content Alignment', 'ecology-nature' ),
		'section'     => 'ecology_nature_blog_slide_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'ecology-nature' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'ecology-nature' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'ecology-nature' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'ecology-nature' ),

		],
	] );

		new \Kirki\Field\Select(
	[
		'settings'    => 'ecology_nature_slider_opacity_color',
		'label'       => esc_html__( 'Slider Opacity Option', 'ecology-nature' ),
		'section'     => 'ecology_nature_blog_slide_section',
		'default'     => '0.7',
		'placeholder' => esc_html__( 'Choose an option', 'ecology-nature' ),
		'choices'     => [
			'0' => esc_html__( '0', 'ecology-nature' ),
			'0.1' => esc_html__( '0.1', 'ecology-nature' ),
			'0.2' => esc_html__( '0.2', 'ecology-nature' ),
			'0.3' => esc_html__( '0.3', 'ecology-nature' ),
			'0.4' => esc_html__( '0.4', 'ecology-nature' ),
			'0.5' => esc_html__( '0.5', 'ecology-nature' ),
			'0.6' => esc_html__( '0.6', 'ecology-nature' ),
			'0.7' => esc_html__( '0.7', 'ecology-nature' ),
			'0.8' => esc_html__( '0.8', 'ecology-nature' ),
			'0.9' => esc_html__( '0.9', 'ecology-nature' ),
			'unset' => esc_html__( 'unset', 'ecology-nature' ),
		],
	] );

	// ABOUT US SECTION

	Kirki::add_section( 'ecology_nature_about_section', array(
        'title'          => esc_html__( 'About Us Settings', 'ecology-nature' ),
        'panel'          => 'ecology_nature_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'ecology-nature' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ECOLOGY_NATURE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'ecology-nature' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'ecology_nature_about_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'ecology-nature' ) . '</div>',
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_about_enable_heading',
		'section'     => 'ecology_nature_about_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable About Us', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecology_nature_about_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'ecology-nature' ),
		'section'     => 'ecology_nature_about_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecology-nature' ),
			'off' => esc_html__( 'Disable', 'ecology-nature' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_about_page_heading',
		'section'     => 'ecology_nature_about_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Page Dropdown', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'dropdown-pages',
		'settings'    => 'ecology_nature_about_us',
		'section'     => 'ecology_nature_about_section',
		'default'     => 42,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_about_button_heading',
		'section'     => 'ecology_nature_about_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Button Text', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'ecology_nature_about_button_text',
		'section'  => 'ecology_nature_about_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_about_excerpt_number_heading',
		'section'     => 'ecology_nature_about_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Text', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'ecology_nature_about_excerpt_number',
		'label'       => esc_html__( 'About Content Range', 'ecology-nature' ),
		'section'     => 'ecology_nature_about_section',
		'default'     => 50,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	// FOOTER SECTION

	Kirki::add_section( 'ecology_nature_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'ecology-nature' ),
        'panel'          => 'ecology_nature_panel_id',
        'priority'       => 180,
    ) );

    Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'ecology-nature' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ECOLOGY_NATURE_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'ecology-nature' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'ecology_nature_footer_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'ecology-nature' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecology_nature_footer_enable_disable',
		'label'       => esc_html__( 'Here you can enable or disable copyright section.', 'ecology-nature' ),
		'section'     => 'ecology_nature_footer_section',
		'default'     => true,
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_footer_text_heading',
		'section'     => 'ecology_nature_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'ecology_nature_footer_text',
		'section'  => 'ecology_nature_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_footer_text_heading_2',
		'section'     => 'ecology_nature_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Alignment', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
		] );

	new \Kirki\Field\Select(
		[
		'settings'    => 'ecology_nature_copyright_text_alignment',
		'label'       => esc_html__( 'Copyright text Alignment', 'ecology-nature' ),
		'section'     => 'ecology_nature_footer_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'ecology-nature' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'ecology-nature' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'ecology-nature' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'ecology-nature' ),

		],
		] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecology_nature_footer_text_heading_1',
		'section'     => 'ecology_nature_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Background Color', 'ecology-nature' ) . '</h3>',
		'priority'    => 10,
		] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'ecology_nature_copyright_bg',
		'label'       => __( 'Choose Your Copyright Background Color', 'ecology-nature' ),
		'section'     => 'ecology_nature_footer_section',
		'default'     => '',
		] );

}

/*
 *  Customizer Notifications
 */

$ecology_nature_config_customizer = array(
    'recommended_plugins' => array( 
        'kirki' => array(
            'recommended' => true,
            'description' => sprintf( 
                /* translators: %s: plugin name */
                esc_html__( 'If you want to show all the sections of the FrontPage, please install and activate %s plugin', 'ecology-nature' ), 
                '<strong>' . esc_html__( 'Kirki Customizer', 'ecology-nature' ) . '</strong>'
            ),
        ),
    ),
    'ecology_nature_recommended_actions'       => array(),
    'ecology_nature_recommended_actions_title' => esc_html__( 'Recommended Actions', 'ecology-nature' ),
    'ecology_nature_recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'ecology-nature' ),
    'ecology_nature_install_button_label'      => esc_html__( 'Install and Activate', 'ecology-nature' ),
    'ecology_nature_activate_button_label'     => esc_html__( 'Activate', 'ecology-nature' ),
    'ecology_nature_deactivate_button_label'   => esc_html__( 'Deactivate', 'ecology-nature' ),
);

Ecology_Nature_Customizer_Notify::init( apply_filters( 'ecology_nature_customizer_notify_array', $ecology_nature_config_customizer ) );