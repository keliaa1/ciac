<?php
/**
 * The template for displaying Team Archive
 */

get_header(); ?>

  <main class="container">
    <!-- Team Header -->
    <section class="team-header">
      <h1 class="title-primary" style="font-size: 4.5rem; line-height: 1.1;">
        Meet the Visionaries<br>
        Shaping Rwanda's <span class="title-italic-green">Green Future</span>
      </h1>
      <p class="subtitle">
        CIAC Rwanda is powered by a diverse collective of environmentalists, local community leaders, and global
        innovators dedicated to restoring the ecological integrity of our highlands.
      </p>
    </section>

    <!-- Team Grid -->
    <section class="team-grid">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <article class="team-member">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('full', array('class' => 'team-photo')); ?>
            <?php else : ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" alt="<?php the_title_attribute(); ?>" class="team-photo">
            <?php endif; ?>
            
            <h3 class="team-name"><?php the_title(); ?></h3>
            <span class="team-role"><?php echo esc_html(get_field('position')); ?></span>
            <p class="team-bio"><?php echo wp_kses_post(get_field('bio')); ?></p>
            
            <div class="team-socials">
              <?php if (get_field('facebook_url')) : ?>
                <a href="<?php echo esc_url(get_field('facebook_url')); ?>" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2m13 2h-2.5A3.5 3.5 0 0 0 12 8.5V11h-2v3h2v7h3v-7h3v-3h-3V9a1 1 0 0 1 1-1h2V5z" /></svg></a>
              <?php endif; ?>
              <?php if (get_field('twitter_url')) : ?>
                <a href="<?php echo esc_url(get_field('twitter_url')); ?>" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" /></svg></a>
              <?php endif; ?>
              <?php if (get_field('linkedin_url')) : ?>
                <a href="<?php echo esc_url(get_field('linkedin_url')); ?>" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.16-3.66c-1.16 0-1.69.71-1.96 1.19v-1h-2.3v8.8h2.3v-4.9c0-1.2.33-2.1 1.7-2.1 1.3 0 1.3 1.1 1.3 2.2v4.8h2.3M6.5 8.7c.8 0 1.5-.7 1.5-1.5S7.3 5.7 6.5 5.7 5 6.4 5 7.2 5.7 8.7 6.5 8.7M5.3 18.5h2.4v-8.8H5.3v8.8z" /></svg></a>
              <?php endif; ?>
            </div>
          </article>
        <?php endwhile; ?>
      <?php else : ?>
        <p>No team members found.</p>
      <?php endif; ?>
    </section>

  </main>

<?php get_footer(); ?>
