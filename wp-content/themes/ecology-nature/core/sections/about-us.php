<?php if ( get_theme_mod('ecology_nature_about_section_enable',false) ) : ?>

  <section id="about-us" class="pt-3 py-md-4 py-lg-0">
    <div class="container">
      <?php $ecology_nature_about_pages = array();
        $ecology_nature_mod = intval( get_theme_mod( 'ecology_nature_about_us' ));
        if ( 'page-none-selected' != $ecology_nature_mod ) {
          $ecology_nature_about_pages[] = $ecology_nature_mod;
        }
        if( !empty($ecology_nature_about_pages) ) :
          $ecology_nature_args = array(
            'post_type' => 'page',
            'post__in' => $ecology_nature_about_pages,
            'orderby' => 'post__in'
          );
          $ecology_nature_query = new WP_Query( $ecology_nature_args );
          if ( $ecology_nature_query->have_posts() ) :
            $i = 1;
      ?>
      <div class="inner-box">
        <?php while ( $ecology_nature_query->have_posts() ) : $ecology_nature_query->the_post(); ?>
          <div class="row">
            <div class="col-lg-6 col-md-6 align-self-center wow zoomIn">
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
            </div>
            <div class="col-lg-6 col-md-6 align-self-center wow fadeInRight">
              <h4 class="mt-3"><?php the_title(); ?></h4>
              <p><?php echo wp_trim_words( get_the_content(), get_theme_mod('ecology_nature_about_excerpt_number',50) ); ?></p>
              <?php if ( get_theme_mod('ecology_nature_about_button_text', false) == true ) : ?>
              <p class="slider_btn my-5">
                  <a href="<?php the_permalink(); ?>" class="py-3 px-4"><?php echo esc_html( get_theme_mod('ecology_nature_about_button_text' ) ); ?></a>
              </p>
              <?php endif; ?>
            </div>
          </div>
        <?php $i++; endwhile;
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
      endif;?>
      <div class="clearfix"></div>
    </div>
  </section>

<?php endif; ?>
