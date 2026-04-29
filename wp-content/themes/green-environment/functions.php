<?php

if ( ! defined( 'ECOLOGY_NATURE_BUY_NOW' ) ) {
	define( 'ECOLOGY_NATURE_BUY_NOW', 'https://www.misbahwp.com/products/environmental-wordpress-theme' );
}
if ( ! defined( 'ECOLOGY_NATURE_THEME_NAME' ) ) {
	define( 'ECOLOGY_NATURE_THEME_NAME', esc_html__( 'Upgrade to Green Environment PRO', 'green-environment' ));
}
if (! defined( 'ECOLOGY_NATURE_DOCS_FREE' ) ){
define('ECOLOGY_NATURE_DOCS_FREE',__('https://demo.misbahwp.com/docs/green-environment-free-docs/','green-environment'));
}
if (! defined( 'ECOLOGY_NATURE_DOCS_PRO' ) ){
define('ECOLOGY_NATURE_DOCS_PRO',__('https://demo.misbahwp.com/docs/green-environment-pro-docs','green-environment'));
}
if (! defined( 'ECOLOGY_NATURE_SUPPORT_FREE' ) ){
define('ECOLOGY_NATURE_SUPPORT_FREE',__('https://wordpress.org/support/theme/green-environment','green-environment'));
}
if (! defined( 'ECOLOGY_NATURE_REVIEW_FREE' ) ){
define('ECOLOGY_NATURE_REVIEW_FREE',__('https://wordpress.org/support/theme/green-environment/reviews/#new-post','green-environment'));
}
if (! defined( 'ECOLOGY_NATURE_DEMO_PRO' ) ){
define('ECOLOGY_NATURE_DEMO_PRO',__('https://demo.misbahwp.com/green-environment/','green-environment'));
}
if ( ! defined( 'ECOLOGY_NATURE_DEMO_LINK_URL' ) ) {
    define( 'ECOLOGY_NATURE_DEMO_LINK_URL', 'https://demo.misbahwp.com/green-environment/' );
}

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('green_environment_enqueue_scripts')) {

	function green_environment_enqueue_scripts() {

	    $green_environment_my_theme = wp_get_theme();
	    $green_environment_version = $green_environment_my_theme['Version'];

	    wp_enqueue_style(
			'bootstrap-css',
				get_template_directory_uri() . '/css/bootstrap.css',
				array(),'4.5.0'
			);

	    wp_enqueue_style( 'ecology-nature-style', get_template_directory_uri() . '/style.css' );

	    wp_enqueue_style( 'green-environment-style', get_stylesheet_directory_uri() . '/style.css', array('ecology-nature-woocommerce-css'), $green_environment_version );

	    wp_enqueue_style( 'green-environment-style', get_stylesheet_directory_uri() . '/style.css', array('ecology-nature-style'), $green_environment_version );

	    wp_add_inline_style( 'ecology-nature-style',$green_environment_custom_css );

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	}

	add_action( 'wp_enqueue_scripts', 'green_environment_enqueue_scripts' );

}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('green_environment_after_setup_theme')) {

	function green_environment_after_setup_theme() {

		if ( ! isset( $green_environment_content_width ) ) $green_environment_content_width = 900;

		add_theme_support( 'align-wide' );
		add_theme_support( 'woocommerce' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_theme_support( "responsive-embeds" );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'custom-background', array(
		  'default-color' => 'ffffff'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
		) );

		add_theme_support( 'custom-header', array(
			'width' => 1920,
			'height' => 100,
			'flex-width' => true,
			'flex-height' => true,
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_editor_style( array( '/css/editor-style.css' ) );
	}

	add_action( 'after_setup_theme', 'green_environment_after_setup_theme', 999 );

}

if (!function_exists('green_environment_widgets_init')) {

	function green_environment_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','green-environment'),
			'id'   => 'ecology-nature-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'green-environment'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar','green-environment'),
			'id'   => 'ecology-nature-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'green-environment'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'green_environment_widgets_init' );

}

/*-----------------------------------------------------------------------------------*/
/* Customizer */
/*-----------------------------------------------------------------------------------*/

if ( class_exists("Kirki")){

	// FEATURES SECTION

	Kirki::add_section( 'green_environment_features_section', array(
		'title'          => esc_html__( 'Our Features Settings', 'green-environment' ),
		'description'    => esc_html__( 'You have to select category to show features.', 'green-environment' ),
		'panel'          => 'ecology_nature_panel_id',
		'priority'       => 170,
	) );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'green_environment_enable_heading',
		'section'     => 'green_environment_features_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Features',  'green-environment' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'green_environment_features_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable',  'green-environment' ),
		'section'     => 'green_environment_features_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable',  'green-environment' ),
			'off' => esc_html__( 'Disable',  'green-environment' ),
		],
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'green_environment_features_heading',
		'section'     => 'green_environment_features_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Features Section ',  'green-environment' ) . '</h3>',
		'priority'    => 10,
	] );


	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'number',
	    'settings'    => 'green_environment_features_counter',
	    'label'       => esc_html__( 'Features Counter Section',  'green-environment' ),
	    'section'     => 'green_environment_features_section',
	    'default'     => 0,
	    'choices'     => [
	        'min'  => 0,
	        'max'  => 3,
	        'step' => 1,
	    ],
	] );

  	$green_environment_features_image = get_theme_mod('green_environment_features_counter','');
    for ( $i = 1; $i <= $green_environment_features_image; $i++ ) :

		Kirki::add_field( 'theme_config_id', [
			'type'     => 'dashicons',
			'settings' => 'green_environment_features_icon_setting'.$i,
			'label'    => esc_html__( 'Features Icon ', 'green-environment' ).$i,
			'section'  => 'green_environment_features_section',
			'priority' => 10,
	    ] );

		Kirki::add_field( 'theme_config_id', [
			'type'     => 'text',
			'settings' => 'green_environment_features_title_text'.$i,
			'label'    => esc_html__( 'Features Title Text ', 'green-environment' ).$i,
			'section'  => 'green_environment_features_section',
			'priority' => 10,
    	] );

	    Kirki::add_field( 'theme_config_id', [
			'type'     => 'textarea',
			'settings' => 'green_environment_features_content_text'.$i,
			'label'    => esc_html__( 'Features Content ', 'green-environment' ).$i,
			'section'  => 'green_environment_features_section',
			'priority' => 10,
	    ] );

	endfor;
}

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function green_environment_global_color() {

    $green_environment_theme_color_css = '';
    $ecology_nature_global_color = get_theme_mod('ecology_nature_global_color');
    $ecology_nature_global_color_2 = get_theme_mod('ecology_nature_global_color_2');

	$green_environment_theme_color_css = '
		a.shop-btn, p.slider_btn a, #main-menu ul.children li a:hover, #main-menu ul.sub-menu li a:hover, .pagination .nav-links a:hover, .pagination .nav-links a:focus, .pagination .nav-links span.current, .ecology-nature-pagination span.current, .ecology-nature-pagination span.current:hover, .ecology-nature-pagination span.current:focus, .ecology-nature-pagination a span:hover, .ecology-nature-pagination a span:focus, .comment-respond input#submit, .comment-reply a, .sidebar-widget h4.title, .sidebar-area .tagcloud a, .searchform input[type=submit], .searchform input[type=submit]:hover, .searchform input[type=submit]:focus, .menu-toggle, .dropdown-toggle, button.close-menu, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce a.added_to_cart, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce a.added_to_cart, .scroll-up a,.featuress-icon span,.featuress-icon span, wp-block-button__link, p.wp-block-tag-cloud a,.sidebar-area h4.title, .sidebar-area h1.wp-block-heading, .sidebar-area h2.wp-block-heading, .sidebar-area h3.wp-block-heading, .sidebar-area h4.wp-block-heading, .sidebar-area h5.wp-block-heading, .sidebar-area h6.wp-block-heading, .sidebar-area .wp-block-search__label, .sidebar-area .wp-block-search__button, .wp-block-woocommerce-cart .wc-block-cart__submit-button:hover, .wc-block-components-checkout-place-order-button:hover,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button{
			background: '.esc_attr($ecology_nature_global_color).';
		}

		.wp-block-button__link, p.wp-block-tag-cloud a,.woocommerce nav.woocommerce-pagination ul li span.current{
			background: '.esc_attr($ecology_nature_global_color).' !important;
		}

		@media screen and (min-width: 320px) and (max-width: 767px){
	         .menu-toggle, .dropdown-toggle, button.close-menu {
	        background: '.esc_attr($ecology_nature_global_color).' !important ;
	 		}
		}
		a:focus, .contact-box span, .contact-box h6, .logo a:hover, .logo a:focus, .social-links a:hover, #main-menu a:hover, #main-menu ul li a:hover, #main-menu li:hover > a, #main-menu a:focus, #main-menu ul li a:focus, #main-menu li.focus > a, #main-menu li:focus > a, #main-menu ul li.current-menu-item > a, #main-menu ul li.current_page_item > a, #main-menu ul li.current-menu-parent > a, #main-menu ul li.current_page_ancestor > a, #main-menu ul li.current-menu-ancestor > a, .social-links a:hover, .post-meta i, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .scroll-up a:hover,.bread_crumb span,.bread_crumb a:hover{
			color: '.esc_attr($ecology_nature_global_color).';
		}
		.slider .owl-carousel button.owl-dot,.sh2{
			border-color: '.esc_attr($ecology_nature_global_color).';
		}
		span.onsale, .box-content a.button:hover, .box .box-content, .woocommerce a.button:hover, .scroll-up a:hover, nav.woocommerce-MyAccount-navigation ul li:hover, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .comment-respond input#submit:hover, .comment-reply a:hover, .woocommerce .cart .button:hover, .woocommerce a.button.alt:hover, a.shop-btn:hover, .woocommerce button.button.alt:hover, p.slider_btn a:hover, .woocommerce button.button:hover, .sidebar-area .tagcloud a:hover, footer.footer-panel, .woocommerce a.added_to_cart:hover, .woocommerce #respond input#submit:hover, .searchform input[type=submit]:hover{
			background: '.esc_attr($ecology_nature_global_color_2).';
		}
		h1,h2,h3,h4,h5{
			color: '.esc_attr($ecology_nature_global_color_2).';
		}
		.slider .owl-carousel button.owl-dot.active, .sidebar-area h4.title,.sidebar-area h4.title, .sidebar-area h1.wp-block-heading, .sidebar-area h2.wp-block-heading, .sidebar-area h3.wp-block-heading, .sidebar-area h4.wp-block-heading, .sidebar-area h5.wp-block-heading, .sidebar-area h6.wp-block-heading, .sidebar-area .wp-block-search__label{
			border-color: '.esc_attr($ecology_nature_global_color_2).';
		}
	';
    wp_add_inline_style( 'green-environment-style',$green_environment_theme_color_css );
    wp_add_inline_style( 'green-environment-woocommerce-css',$green_environment_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'green_environment_global_color' );

function green_environment_remove_custom($wp_customize) {
  $wp_customize->remove_setting('ecology_nature_slider_button_2_link');
}
add_action( 'customize_register', 'green_environment_remove_custom', 1000 );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Dark Mode Style */
/*-----------------------------------------------------------------------------------*/
function green_environment_dark_mode() {

$green_environment_custom_css = '';

$ecology_nature_is_dark_mode_enabled = get_theme_mod( 'ecology_nature_is_dark_mode_enabled', false );

if ( $ecology_nature_is_dark_mode_enabled ) {

    $green_environment_custom_css .= 'body,.fixed-header,tr:nth-child(2n+2),.header,.page-template-frontpage .top-header,.page-template-frontpage #site-navigation,.featuress-content,.header-box {';
    $green_environment_custom_css .= 'background: #000;';
    $green_environment_custom_css .= '}';

    $green_environment_custom_css .= 'body,h1,h2,h3,h4,h5,p,#main-menu ul li a,.woocommerce .woocommerce-ordering select, .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea,a,#trending h2{';
    $green_environment_custom_css .= 'color: #fff;';
    $green_environment_custom_css .= '}';

    $green_environment_custom_css .= 'a.wc-block-components-product-name, .wc-block-components-product-name,.wc-block-components-totals-footer-item .wc-block-components-totals-item__value,
.wc-block-components-totals-footer-item .wc-block-components-totals-item__label,
.wc-block-components-totals-item__label,.wc-block-components-totals-item__value,
.wc-block-components-product-metadata .wc-block-components-product-metadata__description>p,
.is-medium table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__total .wc-block-components-formatted-money-amount,
.wc-block-components-quantity-selector input.wc-block-components-quantity-selector__input,
.wc-block-components-quantity-selector .wc-block-components-quantity-selector__button,
.wc-block-components-quantity-selector,table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,
.wc-block-components-product-price__value.is-discounted,del.wc-block-components-product-price__regular,.logo a,.logo span,li.menu-item-has-children:after,h1.woocommerce-products-header__title.page-title,h2.woocommerce-loop-product__title,h1.product_title.entry-title,div#tab-description h2,section.related.products h2,h2.woocommerce-Reviews-title,h2#reply-title,h2.comments-title,.pagination .nav-links a, .pagination .nav-links span.current, .ecology-nature-pagination a span, .ecology-nature-pagination span.current{';
    $green_environment_custom_css .= 'color: #fff !important;';
    $green_environment_custom_css .= '}';

    $green_environment_custom_css .= 'h5.product-text a,#featured-product p.price,.card-header a,.comment-content.card-block p,.blog_box h3 a,.pagination .nav-links a, .pagination .nav-links span.current, .ecology-nature-pagination a span, .ecology-nature-pagination span.current{';
    $green_environment_custom_css .= 'color: #000 !important';
    $green_environment_custom_css .= '}';

	$green_environment_custom_css .= '.post-box{';
    $green_environment_custom_css .= '    border: 1px solid rgb(229 229 229 / 48%)';
    $green_environment_custom_css .= '}';
}

    wp_add_inline_style( 'green-environment-style',$green_environment_custom_css );
    wp_add_inline_style( 'green-environment-woocommerce-css',$green_environment_custom_css );

}
add_action( 'wp_enqueue_scripts', 'green_environment_dark_mode' );