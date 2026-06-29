<?php
/**
 * The template for displaying Project Archive
 */

get_header(); ?>

  <main class="container">
    <!-- Projects Header Section -->
    <section class="projects-header">
      <div class="projects-title">
        <h1 class="title-primary">
          Impact in Every<br /><span class="title-italic-green">Province</span>
        </h1>
        <p class="subtitle">
          A showcase of our community-led ecological stewardship and innovative
          solutions driving Rwanda's green revolution.
        </p>

        <div style="display: flex; gap: 2.5rem; align-items: center; margin-top: 2rem;">
          <a href="#projects-grid" class="btn btn-primary"
            style="padding: 1rem 2rem; font-size: 1.1rem; box-shadow: 0 10px 30px rgba(41, 141, 69, 0.2);">
            Explore Initiatives
          </a>
          <div
            style="display: flex; flex-direction: column; border-left: 3px solid var(--primary-green); padding-left: 1.5rem;">
            <span
              style="font-family: var(--font-heading); font-size: 2.5rem; font-weight: 700; color: var(--dark-green); line-height: 1.1;">4+</span>
            <span
              style="font-size: 0.85rem; font-weight: 600; color: var(--gray-text); text-transform: uppercase; letter-spacing: 1px;">Core
              Domains</span>
          </div>
        </div>
      </div>
      <div class="projects-featured">
        <?php 
        // Get the latest project for the hero
        $featured_args = array('post_type' => 'project', 'posts_per_page' => 1);
        $featured_query = new WP_Query($featured_args);
        $featured_img = get_template_directory_uri() . '/assets/images/project1agro.jpeg';
        $featured_title = 'Latest Initiative';
        if ($featured_query->have_posts()) {
            $featured_query->the_post();
            if (has_post_thumbnail()) {
                $featured_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
            }
            $featured_title = get_the_title();
            wp_reset_postdata();
        }
        ?>
        <img id="heroImg" src="<?php echo esc_url($featured_img); ?>" alt="Featured Project" />
        <div class="featured-overlay">
          <h3 id="heroTitle"><?php echo esc_html($featured_title); ?></h3>
          <div class="featured-controls" style="display:none;">
            <!-- JS slider can be re-enabled if data is passed via JSON -->
            <button id="prevBtn" class="control-btn active">&lsaquo;</button>
            <button id="nextBtn" class="control-btn">&rsaquo;</button>
          </div>
        </div>
      </div>
    </section>

    <!-- Projects Grid -->
    <div class="projects-grid" id="projects-grid">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); 
          $terms = get_the_terms(get_the_ID(), 'project_category');
          $term_names = '';
          if($terms && !is_wp_error($terms)){
              $term_names = join(' · ', wp_list_pluck($terms, 'name'));
          }
        ?>
          <article class="project-card">
            <div class="project-image">
              <?php if($term_names): ?>
                <div class="project-badge"><?php echo esc_html($term_names); ?></div>
              <?php endif; ?>
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('full'); ?>
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" alt="<?php the_title_attribute(); ?>">
              <?php endif; ?>
            </div>
            <div class="project-meta">
              <svg viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
              </svg>
              <?php echo esc_html(get_field('location') ?: 'Rwanda'); ?>
            </div>
            <h3><?php the_title(); ?></h3>
            <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?></p>
            <a href="<?php the_permalink(); ?>" class="link-green">View Project &rarr;</a>
          </article>
        <?php endwhile; ?>
      <?php else : ?>
        <p>No projects found.</p>
      <?php endif; ?>
    </div>

    <!-- Stats Banner -->
    <section class="stats-banner">
      <div class="stat-item">
        <span class="stat-label">Trees Planted</span>
        <div class="stat-value">1.2M<span>+</span></div>
      </div>
      <div class="stat-item">
        <span class="stat-label">Lives Impacted</span>
        <div class="stat-value">45k<span>+</span></div>
      </div>
      <div class="stat-item">
        <span class="stat-label">District Reached</span>
        <div class="stat-value">30<span>+</span></div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
