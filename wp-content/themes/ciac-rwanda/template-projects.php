<?php
/**
 * Template Name: Projects Page
 */
get_header(); ?>

  <main class="container">
    <!-- Projects Header Section -->
    <section class="projects-header">
      <div class="projects-title">
        <h1 class="title-primary">
          <?php echo wp_kses_post(get_field('hero_title') ?: 'Impact in Every<br /><span class="title-italic-green" style="font-style:italic; color:var(--primary-green);">Province</span>'); ?>
        </h1>
        <p class="subtitle">
          <?php echo esc_html(get_field('hero_subtitle') ?: "A showcase of our community-led ecological stewardship and innovative solutions driving Rwanda's green revolution."); ?>
        </p>
        <div style="display: flex; gap: 2.5rem; align-items: center; margin-top: 2rem;">
          <a href="<?php echo esc_url(get_field('hero_btn_link') ?: '#projects-grid'); ?>" class="btn btn-primary"
            style="padding: 1rem 2rem; font-size: 1.1rem; box-shadow: 0 10px 30px rgba(41, 141, 69, 0.2);">
            <?php echo esc_html(get_field('hero_btn_text') ?: 'Explore Initiatives'); ?>
          </a>
          <div style="display: flex; flex-direction: column; border-left: 3px solid var(--primary-green); padding-left: 1.5rem;">
            <span style="font-family: var(--font-heading); font-size: 2.5rem; font-weight: 700; color: var(--dark-green); line-height: 1.1;"><?php echo esc_html(get_field('hero_stat_num') ?: '4+'); ?></span>
            <span style="font-size: 0.85rem; font-weight: 600; color: var(--gray-text); text-transform: uppercase; letter-spacing: 1px;"><?php echo esc_html(get_field('hero_stat_label') ?: 'Core Domains'); ?></span>
          </div>
        </div>
      </div>
      <div class="projects-featured">
        <img id="heroImg"
          src="<?php echo get_template_directory_uri(); ?>/assets/images/project1agro.jpeg"
          alt="Agroforestry and Farmers Planning in Rutsiro" />
        <div class="featured-overlay">
          <h3 id="heroTitle">Agroforestry &amp; Livelihood</h3>
          <div class="featured-controls">
            <button id="prevBtn" class="control-btn active">&lsaquo;</button>
            <button id="nextBtn" class="control-btn">&rsaquo;</button>
          </div>
        </div>
      </div>
    </section>

    <!-- Projects Grid -->
    <div class="projects-grid" id="projects-grid">
      <?php
      $projects_query = new WP_Query(array(
        'post_type'      => 'project',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
      ));

      if ( $projects_query->have_posts() ) :
        while ( $projects_query->have_posts() ) : $projects_query->the_post();
          $location = function_exists('get_field') ? get_field('location') : '';
          $terms    = get_the_terms(get_the_ID(), 'project_category');
          $cat_name = $terms && !is_wp_error($terms) ? $terms[0]->name : '';
          $badge    = $cat_name;
          $thumb    = get_the_post_thumbnail_url(get_the_ID(), 'full');
          if ( ! $thumb ) {
              $content = get_the_content();
              if ( preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches) ) {
                  $thumb = $matches[1];
              }
          }
      ?>
        <article class="project-card">
          <div class="project-image">
            <?php if ( $badge ) : ?>
              <div class="project-badge"><?php echo esc_html($badge); ?></div>
            <?php endif; ?>
            <?php if ( $thumb ) : ?>
              <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" />
            <?php else : ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" alt="<?php the_title_attribute(); ?>" />
            <?php endif; ?>
          </div>
          <?php if ( $location ) : ?>
          <div class="project-meta">
            <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" /></svg>
            <?php echo esc_html($location); ?>
          </div>
          <?php endif; ?>
          <h3><?php the_title(); ?></h3>
          <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?></p>
          <a href="<?php the_permalink(); ?>" class="link-green">View Project &rarr;</a>
        </article>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
        // Fallback static projects
        $projects = array(
          array(
            'img'      => 'project1agro.jpeg',
            'badge'    => 'Environmental Protection · Ongoing',
            'location' => 'Rutsiro District',
            'title'    => 'Agroforestry &amp; Farmers\' Planning for Livelihood Improvement',
            'desc'     => 'Environment project: Agroforestry and Farmers\' Planning for Livelihood Improvement and Landscape Restoration in Rutsiro.',
            'link'     => '#',
          ),
          array(
            'img'      => 'project2carbon.jpeg',
            'badge'    => 'Environmental Protection · Ongoing',
            'location' => 'Rulindo District',
            'title'    => 'Piloting Carbon Scheme in Rulindo District',
            'desc'     => 'Piloting Carbon Scheme in Rulindo District to foster climate finance and community-based carbon sequestration initiatives.',
            'link'     => '#',
          ),
          array(
            'img'      => 'project3tree.jpeg',
            'badge'    => 'Environmental Protection',
            'location' => 'Muhanga &amp; Karongi',
            'title'    => 'One Tree per Pupil',
            'desc'     => 'One tree per pupil in Muhanga Rongi sector and Karongi District — Dibcoopya gakeri, planting a greener future for every child.',
            'link'     => '#',
          ),
          array(
            'img'      => 'project4tea.png',
            'badge'    => 'Environmental Protection',
            'location' => 'Rwanda',
            'title'    => 'Agroforestry &amp; PES with Tea Company',
            'desc'     => 'Agroforestry &amp; Payment for Ecosystem Services (PES) in partnership with a Tea Company, integrating sustainable land use with economic incentives.',
            'link'     => '#',
          ),
          array(
            'img'      => 'project5edu.jpeg',
            'badge'    => 'Education &amp; Research',
            'location' => 'Muhanga, Rongi Sector',
            'title'    => 'Education &amp; Research: Classroom Renovation',
            'desc'     => 'Education And Research: Renovation of Classroom in Muhanga, Rongi sector — improving learning environments for the next generation.',
            'link'     => '#',
          ),
        );
        foreach ( $projects as $p ) :
      ?>
        <article class="project-card">
          <div class="project-image">
            <div class="project-badge"><?php echo wp_kses_post($p['badge']); ?></div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($p['img']); ?>" alt="<?php echo strip_tags($p['title']); ?>" />
          </div>
          <div class="project-meta">
            <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" /></svg>
            <?php echo wp_kses_post($p['location']); ?>
          </div>
          <h3><?php echo wp_kses_post($p['title']); ?></h3>
          <p><?php echo esc_html($p['desc']); ?></p>
          <a href="<?php echo esc_url($p['link']); ?>" class="link-green">View Project &rarr;</a>
        </article>
      <?php endforeach; endif; ?>
    </div>

    <!-- Stats Banner -->
    <section class="stats-banner">
      <div class="stat-item">
        <span class="stat-label"><?php echo esc_html(get_field('pp_stat_1_label') ?: 'Trees Planted'); ?></span>
        <div class="stat-value"><?php echo esc_html(get_field('pp_stat_1_value') ?: '1.2M'); ?><span><?php echo esc_html(get_field('pp_stat_1_suffix') ?: '+'); ?></span></div>
      </div>
      <div class="stat-item">
        <span class="stat-label"><?php echo esc_html(get_field('pp_stat_2_label') ?: 'Lives Impacted'); ?></span>
        <div class="stat-value"><?php echo esc_html(get_field('pp_stat_2_value') ?: '45k'); ?><span><?php echo esc_html(get_field('pp_stat_2_suffix') ?: '+'); ?></span></div>
      </div>
      <div class="stat-item">
        <span class="stat-label"><?php echo esc_html(get_field('pp_stat_3_label') ?: 'Districts Reached'); ?></span>
        <div class="stat-value"><?php echo esc_html(get_field('pp_stat_3_value') ?: '30'); ?><span><?php echo esc_html(get_field('pp_stat_3_suffix') ?: '+'); ?></span></div>
      </div>
    </section>
  </main>

  <script>
    <?php
      $slides = [];
      for($i = 1; $i <= 5; $i++) {
        $slide = get_field('hero_slide_' . $i);
        if(!empty($slide) && !empty($slide['image']) && !empty($slide['title'])) {
          $slides[] = '{ img: "' . esc_url($slide['image']) . '", title: "' . esc_js($slide['title']) . '" }';
        }
      }
      
      if(empty($slides)) {
        // Fallback default slides
        $slides = [
          '{ img: "' . get_template_directory_uri() . '/assets/images/project1agro.jpeg", title: "Agroforestry & Livelihood" }',
          '{ img: "' . get_template_directory_uri() . '/assets/images/project2carbon.jpeg", title: "Carbon Scheme – Rulindo" }',
          '{ img: "' . get_template_directory_uri() . '/assets/images/project3tree.jpeg", title: "One Tree per Pupil" }',
          '{ img: "' . get_template_directory_uri() . '/assets/images/project4tea.png", title: "Agroforestry & PES – Tea" }',
          '{ img: "' . get_template_directory_uri() . '/assets/images/project5edu.jpeg", title: "Education & Classroom Renovation" }'
        ];
      }
    ?>
    const heroSlides = [
      <?php echo implode(",\n      ", $slides); ?>
    ];
    let currentSlide = 0;

    const heroImg   = document.getElementById("heroImg");
    const heroTitle = document.getElementById("heroTitle");
    const prevBtn   = document.getElementById("prevBtn");
    const nextBtn   = document.getElementById("nextBtn");

    function updateHero() {
      if (!heroImg) return;
      heroImg.style.opacity = 0.5;
      setTimeout(() => {
        heroImg.src         = heroSlides[currentSlide].img;
        heroTitle.innerText = heroSlides[currentSlide].title;
        heroImg.style.opacity = 1;
      }, 150);
    }

    if (prevBtn && nextBtn) {
      prevBtn.addEventListener("click", () => {
        currentSlide = (currentSlide - 1 + heroSlides.length) % heroSlides.length;
        updateHero();
      });
      nextBtn.addEventListener("click", () => {
        currentSlide = (currentSlide + 1) % heroSlides.length;
        updateHero();
      });
    }
  </script>

<?php get_footer(); ?>
