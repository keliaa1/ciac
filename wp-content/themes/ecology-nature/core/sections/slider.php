<?php if ( get_theme_mod('ecology_nature_blog_box_enable',false) ) : ?>

<?php $ecology_nature_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('ecology_nature_blog_slide_category'),
  'posts_per_page' => get_theme_mod('ecology_nature_blog_slide_number'),
); ?>

<div class="slider">
  <div class="owl-carousel">
    <?php $ecology_nature_arr_posts = new WP_Query( $ecology_nature_args );
    if ( $ecology_nature_arr_posts->have_posts() ) :
      while ( $ecology_nature_arr_posts->have_posts() ) :
        $ecology_nature_arr_posts->the_post();
        ?>
        <div class="blog_inner_box">
          <?php
            if ( has_post_thumbnail() ) :
              the_post_thumbnail();
            else:
              ?>
              <div class="slider-alternate">
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/banner.png'; ?>">
              </div>
              <?php
            endif;
          ?>
          <div class="blog_box pt-3 pt-md-0 wow zoomIn">
            <?php if ( get_theme_mod('ecology_nature_title_enable', true) == true ) : ?>
              <h3 class="my-3"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php the_title(); ?></a></h3>
            <?php endif; ?>
            <?php if ( get_theme_mod('ecology_nature_text_enable', true) == true ) : ?>
              <p><?php echo wp_trim_words( get_the_content(), get_theme_mod('ecology_nature_excerpt_number',20) ); ?></p>
            <?php endif; ?>
            <?php if ( get_theme_mod('ecology_nature_slider_button_text', false) == true ) : ?>
              <p class="slider_btn my-5">
                <a href="<?php the_permalink(); ?>" class="py-3 px-4"><?php echo esc_html( get_theme_mod('ecology_nature_slider_button_text' ) ); ?></a>
                 <?php if( get_theme_mod( 'ecology_nature_slider_button_2_link' ) != '') { ?>
                <a class="slide-btn-2" target="_blank" href="<?php echo esc_url( get_theme_mod( 'ecology_nature_slider_button_2_link','' ) ); ?>"><?php esc_html_e('Get Involved','ecology-nature'); ?></a>
                <?php } ?>
              </p>
            <?php endif; ?>
          </div>
        </div>
      <?php
    endwhile;
    wp_reset_postdata();
    endif; ?>
  </div>
</div>

<?php endif; ?>
