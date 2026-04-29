<?php if ( get_theme_mod('green_environment_features_section_enable', false) == true ) : ?>
  <div class="features">
    <div class="container">
      <div class="row">
        <?php
          $green_environment_features_image = get_theme_mod('green_environment_features_counter','');
          for ( $i = 1; $i <= $green_environment_features_image; $i++ ){ ?>
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="featuress-content text-center mb-4 mb-md-0 wow zoomIn">
                <div class="featuress-icon">
                  <?php $green_environment_icon = get_theme_mod( 'green_environment_features_icon_setting'.$i); ?>
                  <span class="dashicons dashicons-<?php echo esc_attr( $green_environment_icon ); ?>"></span>
                </div>
                <h5 class="mt-4"><?php echo esc_html(get_theme_mod('green_environment_features_title_text'.$i));?></h5>
                <p><?php echo esc_html(get_theme_mod('green_environment_features_content_text'.$i));?></p>
              </div>
            </div>
        <?php }?>
      </div>
    </div>
  </div>
<?php endif; ?>
