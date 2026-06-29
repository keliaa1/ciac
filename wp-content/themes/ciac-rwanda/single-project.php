<?php
/**
 * The template for displaying all single projects
 */

get_header(); ?>

  <main class="container">

    <!-- Back Link -->
    <a href="<?php echo esc_url(get_post_type_archive_link('project')); ?>" class="back-link">
      <svg viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
      Back to All Projects
    </a>

    <?php 
      while ( have_posts() ) : the_post(); 
      
      $terms = get_the_terms(get_the_ID(), 'project_category');
      $term_names = '';
      if($terms && !is_wp_error($terms)){
          $term_names = join(' · ', wp_list_pluck($terms, 'name'));
      }

      $hero_img = '';
      $content = get_the_content();

      if ( has_post_thumbnail() ) {
          $hero_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
      } else {
          // Extract first image from content
          if ( preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches) ) {
              $hero_img = $matches[1];
              // Remove the first image from the content so it doesn't show twice
              $content = preg_replace('/<figure[^>]*>.*?<img[^>]+>.*?<\/figure>|<img[^>]+>/is', '', $content, 1);
          } else {
              // Fallback if no image at all
              $hero_img = get_template_directory_uri() . '/assets/images/project1agro.jpeg';
          }
      }
      
      // Apply standard WordPress content filters
      $content = apply_filters('the_content', $content);
    ?>

    <!-- Hero Image -->
    <div class="detail-hero">
      <img src="<?php echo esc_url($hero_img); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover;">
      
      <div class="detail-hero-overlay">
        <?php if($term_names): ?>
            <div class="detail-badge"><?php echo esc_html($term_names); ?></div>
        <?php endif; ?>
        
        <h1><?php the_title(); ?></h1>
        <div class="detail-meta-row">
          <div class="detail-meta-item">
            <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            <span><?php echo esc_html(get_field('location') ?: 'Rwanda'); ?></span>
          </div>
          <div class="detail-meta-item">
            <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>
            <span><?php echo esc_html(get_field('duration') ?: 'Ongoing'); ?></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Layout -->
    <div class="detail-layout">

      <!-- Left: Content -->
      <div class="detail-main">
        <section>
          <h2>Project Overview</h2>
          <div class="detail-overview">
            <?php echo $content; ?>
          </div>
        </section>

        <?php 
        $gallery = get_field('gallery');
        if( $gallery ): ?>
        <section>
            <h2>Project Gallery</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-top: 1rem;">
                <?php foreach( $gallery as $image_url ): ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="Gallery Image" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>
      </div>

      <!-- Right: Sidebar -->
      <div class="detail-sidebar">
        <div class="sidebar-card">
          <h4>Project Info</h4>
          <div class="info-row">
            <span class="label">Location</span>
            <span class="value"><?php echo esc_html(get_field('location') ?: 'Rwanda'); ?></span>
          </div>
          <div class="info-row">
            <span class="label">Duration</span>
            <span class="value"><?php echo esc_html(get_field('duration') ?: 'Ongoing'); ?></span>
          </div>
          <div class="info-row">
            <span class="label">Partners</span>
            <span class="value"><?php echo esc_html(get_field('partners') ?: 'N/A'); ?></span>
          </div>
          <?php if($term_names): ?>
          <div class="info-row">
            <span class="label">Category</span>
            <span class="value"><span class="domain-pill"><?php echo esc_html($term_names); ?></span></span>
          </div>
          <?php endif; ?>
        </div>

        <div class="sidebar-card">
          <h4>Get Involved</h4>
          <p style="font-size:0.88rem;color:var(--gray-text);margin-bottom:1.2rem;line-height:1.7;">
            Want to support this initiative or partner with us on similar projects?
          </p>
          <a href="<?php echo esc_url(site_url('/contact')); ?>" class="btn btn-primary" style="width:100%;text-align:center;display:block;">Contact Us</a>
        </div>
      </div>
    </div>

    <?php endwhile; ?>

  </main>

<?php get_footer(); ?>
