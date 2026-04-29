<?php

$ecology_nature_custom_css = '';


$ecology_nature_is_dark_mode_enabled = get_theme_mod( 'ecology_nature_is_dark_mode_enabled', false );

if ( $ecology_nature_is_dark_mode_enabled ) {

    $ecology_nature_custom_css .= 'body,.fixed-header,tr:nth-child(2n+2) {';
    $ecology_nature_custom_css .= 'background: #000;';
    $ecology_nature_custom_css .= '}';

    $ecology_nature_custom_css .= '.some {';
    $ecology_nature_custom_css .= 'background: #000 !important;';
    $ecology_nature_custom_css .= '}';

	$ecology_nature_custom_css .= '.sticky .post-content{';
    $ecology_nature_custom_css .= 'color: #000';
    $ecology_nature_custom_css .= '}';

	$ecology_nature_custom_css .= 'h5.product-text a,#featured-product p.price,.card-header a,.comment-content.card-block p,.post-box.sticky a,#main-menu ul.sub-menu li a,.pagination .nav-links a, .pagination .nav-links span.current, .ecology-nature-pagination a span, .ecology-nature-pagination span.current{';
    $ecology_nature_custom_css .= 'color: #000 !important';
    $ecology_nature_custom_css .= '}';

    $ecology_nature_custom_css .= '.some{';
    $ecology_nature_custom_css .= 'background: #fff;';
    $ecology_nature_custom_css .= '}';

    $ecology_nature_custom_css .= '.some {';
    $ecology_nature_custom_css .= 'background: #fff !important;';
    $ecology_nature_custom_css .= '}';
	

    $ecology_nature_custom_css .= 'body,h1,h2,h3,h4,h5,p,#main-menu ul li a,.woocommerce .woocommerce-ordering select, .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea,a{';
    $ecology_nature_custom_css .= 'color: #fff;';
    $ecology_nature_custom_css .= '}';

    $ecology_nature_custom_css .= 'a.wc-block-components-product-name, .wc-block-components-product-name,.wc-block-components-totals-footer-item .wc-block-components-totals-item__value,
.wc-block-components-totals-footer-item .wc-block-components-totals-item__label,
.wc-block-components-totals-item__label,.wc-block-components-totals-item__value,
.wc-block-components-product-metadata .wc-block-components-product-metadata__description>p,
.is-medium table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__total .wc-block-components-formatted-money-amount,
.wc-block-components-quantity-selector input.wc-block-components-quantity-selector__input,
.wc-block-components-quantity-selector .wc-block-components-quantity-selector__button,
.wc-block-components-quantity-selector,table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,
.wc-block-components-product-price__value.is-discounted,del.wc-block-components-product-price__regular,.logo a,.logo span,.header-search .open-search-form i,li.menu-item-has-children:after,h2.woocommerce-loop-product__title,a{';
    $ecology_nature_custom_css .= 'color: #fff !important;';
    $ecology_nature_custom_css .= '}';

	$ecology_nature_custom_css .= '.post-box{';
    $ecology_nature_custom_css .= '    border: 1px solid rgb(229 229 229 / 48%)';
    $ecology_nature_custom_css .= '}';
}
	/*---------------------------text-transform-------------------*/

	$ecology_nature_text_transform = get_theme_mod( 'menu_text_transform_ecology_nature','CAPITALISE');

    if($ecology_nature_text_transform == 'CAPITALISE'){

		$ecology_nature_custom_css .='#main-menu ul li a{';

			$ecology_nature_custom_css .='text-transform: capitalize ; font-size: 15px;';

		$ecology_nature_custom_css .='}';

	}else if($ecology_nature_text_transform == 'UPPERCASE'){

		$ecology_nature_custom_css .='#main-menu ul li a{';

			$ecology_nature_custom_css .='text-transform: uppercase ; font-size: 15px;';

		$ecology_nature_custom_css .='}';

	}else if($ecology_nature_text_transform == 'LOWERCASE'){

		$ecology_nature_custom_css .='#main-menu ul li a{';

			$ecology_nature_custom_css .='text-transform: lowercase ; font-size: 15px;';

		$ecology_nature_custom_css .='}';
	}

	/*---------------------------menu-zoom-------------------*/

		$ecology_nature_menu_zoom = get_theme_mod( 'ecology_nature_menu_zoom','None');

    if($ecology_nature_menu_zoom == 'Zoomout'){

		$ecology_nature_custom_css .='#main-menu ul li a{';

			$ecology_nature_custom_css .='';

		$ecology_nature_custom_css .='}';

	}else if($ecology_nature_menu_zoom == 'Zoominn'){

		$ecology_nature_custom_css .='#main-menu ul li a:hover{';

			$ecology_nature_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #59b96d;';

		$ecology_nature_custom_css .='}';
	}


	/*---------------------------Container Width-------------------*/

$ecology_nature_container_width = get_theme_mod('ecology_nature_container_width');

		$ecology_nature_custom_css .='body{';

			$ecology_nature_custom_css .='width: '.esc_attr($ecology_nature_container_width).'%; margin: auto';

		$ecology_nature_custom_css .='}';

		/*---------------------------Slider-content-alignment-------------------*/


		$ecology_nature_slider_content_alignment = get_theme_mod( 'ecology_nature_slider_content_alignment','LEFT-ALIGN');

		 if($ecology_nature_slider_content_alignment == 'LEFT-ALIGN'){

				$ecology_nature_custom_css .='.blog_box{';

					$ecology_nature_custom_css .='text-align:left;';

				$ecology_nature_custom_css .='}';


			}else if($ecology_nature_slider_content_alignment == 'CENTER-ALIGN'){

				$ecology_nature_custom_css .='.blog_box{';

					$ecology_nature_custom_css .='text-align:center;';

				$ecology_nature_custom_css .='}';


			}else if($ecology_nature_slider_content_alignment == 'RIGHT-ALIGN'){

				$ecology_nature_custom_css .='.blog_box{';

					$ecology_nature_custom_css .='text-align:right;';

				$ecology_nature_custom_css .='}';

			}

			/*---------------------------Copyright Text alignment-------------------*/

$ecology_nature_copyright_text_alignment = get_theme_mod( 'ecology_nature_copyright_text_alignment','LEFT-ALIGN');

 if($ecology_nature_copyright_text_alignment == 'LEFT-ALIGN'){

		$ecology_nature_custom_css .='.copy-text p{';

			$ecology_nature_custom_css .='text-align:left;';

		$ecology_nature_custom_css .='}';


	}else if($ecology_nature_copyright_text_alignment == 'CENTER-ALIGN'){

		$ecology_nature_custom_css .='.copy-text p{';

			$ecology_nature_custom_css .='text-align:center;';

		$ecology_nature_custom_css .='}';


	}else if($ecology_nature_copyright_text_alignment == 'RIGHT-ALIGN'){

		$ecology_nature_custom_css .='.copy-text p{';

			$ecology_nature_custom_css .='text-align:right;';

		$ecology_nature_custom_css .='}';

	}

	/*---------------------------related Product Settings-------------------*/

$ecology_nature_related_product_setting = get_theme_mod('ecology_nature_related_product_setting',true);

	if($ecology_nature_related_product_setting == false){

		$ecology_nature_custom_css .='.related.products, .related h2{';

			$ecology_nature_custom_css .='display: none;';

		$ecology_nature_custom_css .='}';
	}

	/*---------------------------Scroll to Top Alignment Settings-------------------*/

	$ecology_nature_scroll_top_position = get_theme_mod( 'ecology_nature_scroll_top_position','Right');

	if($ecology_nature_scroll_top_position == 'Right'){

		$ecology_nature_custom_css .='.scroll-up{';

			$ecology_nature_custom_css .='right: 20px;';

		$ecology_nature_custom_css .='}';

	}else if($ecology_nature_scroll_top_position == 'Left'){

		$ecology_nature_custom_css .='.scroll-up{';

			$ecology_nature_custom_css .='left: 20px;';

		$ecology_nature_custom_css .='}';

	}else if($ecology_nature_scroll_top_position == 'Center'){

		$ecology_nature_custom_css .='.scroll-up{';

			$ecology_nature_custom_css .='right: 50%;left: 50%;';

		$ecology_nature_custom_css .='}';
	}

		/*---------------------------Pagination Settings-------------------*/


$ecology_nature_pagination_setting = get_theme_mod('ecology_nature_pagination_setting',true);

	if($ecology_nature_pagination_setting == false){

		$ecology_nature_custom_css .='.nav-links{';

			$ecology_nature_custom_css .='display: none;';

		$ecology_nature_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$ecology_nature_slider_opacity_color = get_theme_mod( 'ecology_nature_slider_opacity_color','0.7');

	if($ecology_nature_slider_opacity_color == '0'){

		$ecology_nature_custom_css .='.blog_inner_box img{';

			$ecology_nature_custom_css .='opacity:0';

		$ecology_nature_custom_css .='}';

		}else if($ecology_nature_slider_opacity_color == '0.1'){

		$ecology_nature_custom_css .='.blog_inner_box img{';

			$ecology_nature_custom_css .='opacity:0.1';

		$ecology_nature_custom_css .='}';

		}else if($ecology_nature_slider_opacity_color == '0.2'){

		$ecology_nature_custom_css .='.blog_inner_box img{';

			$ecology_nature_custom_css .='opacity:0.2';

		$ecology_nature_custom_css .='}';

		}else if($ecology_nature_slider_opacity_color == '0.3'){

		$ecology_nature_custom_css .='.blog_inner_box img{';

			$ecology_nature_custom_css .='opacity:0.3';

		$ecology_nature_custom_css .='}';

		}else if($ecology_nature_slider_opacity_color == '0.4'){

		$ecology_nature_custom_css .='.blog_inner_box img{';

			$ecology_nature_custom_css .='opacity:0.4';

		$ecology_nature_custom_css .='}';

		}else if($ecology_nature_slider_opacity_color == '0.5'){

		$ecology_nature_custom_css .='.blog_inner_box img{';

			$ecology_nature_custom_css .='opacity:0.5';

		$ecology_nature_custom_css .='}';

		}else if($ecology_nature_slider_opacity_color == '0.6'){

		$ecology_nature_custom_css .='.blog_inner_box img{';

			$ecology_nature_custom_css .='opacity:0.6';

		$ecology_nature_custom_css .='}';

		}else if($ecology_nature_slider_opacity_color == '0.7'){

		$ecology_nature_custom_css .='.blog_inner_box img{';

			$ecology_nature_custom_css .='opacity:0.7';

		$ecology_nature_custom_css .='}';

		}else if($ecology_nature_slider_opacity_color == '0.8'){

		$ecology_nature_custom_css .='.blog_inner_box img{';

			$ecology_nature_custom_css .='opacity:0.8';

		$ecology_nature_custom_css .='}';

		}else if($ecology_nature_slider_opacity_color == '0.9'){

		$ecology_nature_custom_css .='.blog_inner_box img{';

			$ecology_nature_custom_css .='opacity:0.9';

		$ecology_nature_custom_css .='}';

		}else if($ecology_nature_slider_opacity_color == 'unset'){

		$ecology_nature_custom_css .='.blog_inner_box img{';

			$ecology_nature_custom_css .='opacity:unset';

		$ecology_nature_custom_css .='}';

		}
	
		/*---------------------------Woocommerce Pagination Alignment Settings-------------------*/

		$ecology_nature_woocommerce_pagination_position = get_theme_mod( 'ecology_nature_woocommerce_pagination_position','Center');

		if($ecology_nature_woocommerce_pagination_position == 'Left'){

			$ecology_nature_custom_css .='.woocommerce nav.woocommerce-pagination{';

				$ecology_nature_custom_css .='text-align: left;';

			$ecology_nature_custom_css .='}';

		}else if($ecology_nature_woocommerce_pagination_position == 'Center'){

			$ecology_nature_custom_css .='.woocommerce nav.woocommerce-pagination{';

				$ecology_nature_custom_css .='text-align: center;';

			$ecology_nature_custom_css .='}';

		}else if($ecology_nature_woocommerce_pagination_position == 'Right'){

			$ecology_nature_custom_css .='.woocommerce nav.woocommerce-pagination{';

				$ecology_nature_custom_css .='text-align: right;';

			$ecology_nature_custom_css .='}';
		}

