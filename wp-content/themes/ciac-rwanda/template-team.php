<?php
/**
 * Template Name: Our Team Page
 */
get_header(); ?>

  <main class="container">
    <!-- Team Header -->
    <section class="team-header">
      <h1 class="title-primary" style="font-size: 4.5rem; line-height: 1.1;">
        <?php echo nl2br(esc_html(get_field('team_hero_title') ?: "Meet the Visionaries\nShaping Rwanda's")); ?> 
        <span class="title-italic-green" style="font-style:italic; color:var(--primary-green);">
          <?php echo esc_html(get_field('team_hero_highlight') ?: 'Green Future'); ?>
        </span>
      </h1>
      <p class="subtitle">
        <?php echo esc_html(get_field('team_hero_desc') ?: 'CIAC Rwanda is powered by a diverse collective of environmentalists, local community leaders, and global innovators dedicated to restoring the ecological integrity of our highlands.'); ?>
      </p>
    </section>

    <!-- Team Grid -->
    <section class="team-grid">

      <?php
      // Try to pull from Team CPT first
      $team_query = new WP_Query(array(
        'post_type'      => 'team',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
      ));

      if ( $team_query->have_posts() ) :
        while ( $team_query->have_posts() ) : $team_query->the_post();
          $role    = function_exists('get_field') ? get_field('position') : '';
          $bio     = function_exists('get_field') ? get_field('bio') : get_the_excerpt();
          
          $photo   = get_the_post_thumbnail_url(get_the_ID(), 'full');
          if ( ! $photo ) {
              $content = get_the_content();
              if ( preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches) ) {
                  $photo = $matches[1];
              }
          }

          $fb      = function_exists('get_field') ? get_field('facebook_url') : '';
          $tw      = function_exists('get_field') ? get_field('twitter_url') : '';
          $li      = function_exists('get_field') ? get_field('linkedin_url') : '';
      ?>
        <article class="team-member">
          <?php if ( $photo ) : ?>
            <img src="<?php echo esc_url($photo); ?>" alt="<?php the_title_attribute(); ?>" class="team-photo">
          <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-og.png" alt="<?php the_title_attribute(); ?>" class="team-photo">
          <?php endif; ?>
          <h3 class="team-name"><?php the_title(); ?></h3>
          <?php if ( $role ) : ?><span class="team-role"><?php echo esc_html($role); ?></span><?php endif; ?>
          <?php if ( $bio ) : ?><p class="team-bio"><?php echo wp_kses_post($bio); ?></p><?php endif; ?>
          <div class="team-socials">
            <?php if ($fb): ?><a href="<?php echo esc_url($fb); ?>"><svg viewBox="0 0 24 24"><path d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2m13 2h-2.5A3.5 3.5 0 0 0 12 8.5V11h-2v3h2v7h3v-7h3v-3h-3V9a1 1 0 0 1 1-1h2V5z" /></svg></a><?php endif; ?>
            <?php if ($tw): ?><a href="<?php echo esc_url($tw); ?>"><svg viewBox="0 0 24 24"><path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" /></svg></a><?php endif; ?>
            <?php if ($li): ?><a href="<?php echo esc_url($li); ?>"><svg viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg></a><?php endif; ?>
          </div>
        </article>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
        // Fallback: static team members from HTML
        $members = array(
          array(
            'img'  => 'Drocella MUSABYIMANA.png',
            'name' => 'Drocella<br>MUSABYIMANA',
            'role' => 'Executive Director',
            'bio'  => 'Leading strategic initiatives with over 15 years of experience in regional environmental policy and sustainable development across East Africa.',
          ),
          array(
            'img'  => 'nshimiyimana phillippe-new.jpeg',
            'name' => 'NSHIMIYIMANA<br>Philippe',
            'role' => 'Field Coordinator',
            'bio'  => 'Coordinating field operations and liaising with local community leaders to implement projects.',
          ),
          array(
            'img'  => 'alia gihozo-new.jpeg',
            'name' => 'Alia<br>IGIHOZO',
            'role' => 'Finance &amp; HR Admin',
            'bio'  => 'Managing finance, HR processes, and ensuring compliance with institutional policies.',
          ),
          array(
            'img'  => 'nyirandayisabye aline-new.jpeg',
            'name' => 'NYIRANDAYISABYE<br>Eline',
            'role' => 'Assistant Project Lead',
            'bio'  => 'Supporting project implementation and monitoring across field sites.',
          ),
          array(
            'img'  => 'Bernadette MUJAWAMARIYA.png',
            'name' => 'Bernadette<br>MUJAWAMARIYA',
            'role' => 'Community Liaison Officer',
            'bio'  => 'Bridging the gap between CIAC\'s programs and grassroots communities across all provinces.',
          ),
          array(
            'img'  => 'Emmy MUTABAZI.png',
            'name' => 'Emmy<br>MUTABAZI',
            'role' => 'Research & M&E Officer',
            'bio'  => 'Driving evidence-based decision making through rigorous monitoring, evaluation, and research.',
          ),
          array(
            'img'  => 'Patrick IRAKOZE.png',
            'name' => 'Patrick<br>IRAKOZE',
            'role' => 'Communications Officer',
            'bio'  => 'Amplifying CIAC\'s impact stories and managing media relations across Rwanda and beyond.',
          ),
        );
        foreach ( $members as $m ) :
      ?>
        <article class="team-member">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($m['img']); ?>" alt="<?php echo strip_tags($m['name']); ?>" class="team-photo">
          <h3 class="team-name"><?php echo wp_kses_post($m['name']); ?></h3>
          <span class="team-role"><?php echo esc_html($m['role']); ?></span>
          <p class="team-bio"><?php echo esc_html($m['bio']); ?></p>
          <div class="team-socials">
            <a href="#"><svg viewBox="0 0 24 24"><path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z" /></svg></a>
            <a href="#"><svg viewBox="0 0 24 24"><path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" /></svg></a>
            <a href="#"><svg viewBox="0 0 24 24"><path d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2m13 2h-2.5A3.5 3.5 0 0 0 12 8.5V11h-2v3h2v7h3v-7h3v-3h-3V9a1 1 0 0 1 1-1h2V5z" /></svg></a>
          </div>
        </article>
      <?php endforeach; endif; ?>

    </section>
  </main>

<?php get_footer(); ?>
