<?php
/**
 * The template for displaying all single standard posts (Dispatches / News)
 */

get_header(); ?>

  <main class="container">

    <!-- Back Link -->
    <a href="<?php echo esc_url(site_url('/newsletter')); ?>" class="back-link">
      <svg viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
      Back to Dispatches
    </a>

    <?php 
      while ( have_posts() ) : the_post(); 
      
      $cats = get_the_category();
      $cat_name = $cats && !is_wp_error($cats) ? $cats[0]->name : '';

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
        <?php if($cat_name): ?>
            <div class="detail-badge"><?php echo esc_html($cat_name); ?></div>
        <?php endif; ?>
        
        <h1><?php the_title(); ?></h1>
        <div class="detail-meta-row">
          <div class="detail-meta-item">
            <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            <span><?php echo esc_html(get_the_author()); ?></span>
          </div>
          <div class="detail-meta-item">
            <svg viewBox="0 0 24 24"><path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/></svg>
            <span><?php echo get_the_date('M d, Y'); ?></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Layout -->
    <div class="detail-layout">

      <!-- Left: Content -->
      <div class="detail-main">
        <section>
          <h2>Dispatch Overview</h2>
          <div class="detail-overview">
            <?php echo $content; ?>
          </div>
        </section>
      </div>

      <!-- Right: Sidebar -->
      <div class="detail-sidebar">
        <div class="sidebar-card">
          <h4>Article Info</h4>
          <div class="info-row">
            <span class="label">Author</span>
            <span class="value"><?php echo esc_html(get_the_author()); ?></span>
          </div>
          <div class="info-row">
            <span class="label">Published</span>
            <span class="value"><?php echo get_the_date('M d, Y'); ?></span>
          </div>
          <?php if($cat_name): ?>
          <div class="info-row">
            <span class="label">Category</span>
            <span class="value"><span class="domain-pill"><?php echo esc_html($cat_name); ?></span></span>
          </div>
          <?php endif; ?>
        </div>

        <div class="sidebar-card">
          <h4>Stay Updated</h4>
          <p style="font-size:0.88rem;color:var(--gray-text);margin-bottom:1.2rem;line-height:1.7;">
            Subscribe to our newsletter for more insights on highland conservation and ecological innovation.
          </p>
          <a href="<?php echo esc_url(site_url('/newsletter')); ?>" class="btn btn-primary" style="width:100%;text-align:center;display:block;">Subscribe Now</a>
        </div>
      </div>
    </div>

    <?php endwhile; ?>

  </main>

<?php get_footer(); ?>
