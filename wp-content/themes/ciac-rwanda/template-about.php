<?php
/**
 * Template Name: About Page
 */
get_header(); ?>

  <main class="container">
    <!-- About Hero -->
    <section class="about-hero">
      <h1><?php echo wp_kses_post(get_field('hero_title') ?: 'Pioneering Sustainable Growth in the <span>Heart of Africa</span>'); ?></h1>
      <p><?php echo esc_html(get_field('hero_description') ?: 'CIAC Rwanda is dedicated to environmental stewardship and institutional credibility, fostering a greener future for our nation.'); ?></p>
    </section>

    <!-- Genesis Section -->
    <section class="genesis">
      <div class="genesis-image-container">
        <?php 
        $genesis_img = get_field('genesis_image');
        $genesis_img_url = $genesis_img ? esc_url($genesis_img) : get_template_directory_uri() . '/assets/images/Kigali Cityscape.png';
        ?>
        <img src="<?php echo $genesis_img_url; ?>" alt="Genesis Image" class="genesis-image">
        <div class="est-card">
          <h4>Est. June 2022</h4>
          <p>KIGALI, RWANDA</p>
        </div>
      </div>
      <div class="genesis-content">
        <h2><?php echo wp_kses_post(get_field('genesis_title') ?: 'The Genesis of <span>Our Mission</span>'); ?></h2>
        <?php if(get_field('genesis_description')): ?>
            <?php echo wp_kses_post(get_field('genesis_description')); ?>
        <?php else: ?>
            <p>We recognized an urgent need for a
              professional institutional bridge between global environmental standards and local sustainable practices.</p>
            <p>Our journey began with a small team of passionate environmentalists and policy experts committed to
              transforming Rwanda's ecological landscape. Today, we stand as a beacon of institutional credibility, working
              hand-in-hand with communities and stakeholders.</p>
            <p>We believe that true stewardship is not just about conservation; it's about building the frameworks that
              allow nature and humanity to thrive in harmony for generations to come.</p>
        <?php endif; ?>
      </div>
    </section>

    <!-- Foundation Section -->
    <section class="foundation">
      <h2><?php echo esc_html(get_field('foundation_title') ?: 'Our Foundation'); ?></h2>
      <div style="width: 80px; height: 3px; background: var(--primary-green); margin: 0 auto 4rem; opacity: 0.2;"></div>

      <div class="foundation-grid">
        <?php 
          $mission = get_field('foundation_mission');
          $mission_icon = !empty($mission['icon']) ? esc_url($mission['icon']) : get_template_directory_uri() . '/assets/images/found1.png';
          $mission_title = !empty($mission['title']) ? $mission['title'] : 'Mission';
          $mission_desc = !empty($mission['description']) ? $mission['description'] : 'To implement world-class sustainable frameworks through rigorous research, advocacy, and community-led environmental stewardship across Rwanda.';
        ?>
        <!-- Mission Card -->
        <div class="foundation-card">
          <div class="foundation-icon">
            <img src="<?php echo $mission_icon; ?>" alt="<?php echo esc_attr($mission_title); ?>" style="width: 100%; height: 100%; object-fit: contain;">
          </div>
          <h3><?php echo esc_html($mission_title); ?></h3>
          <p><?php echo esc_html($mission_desc); ?></p>
        </div>

        <?php 
          $vision = get_field('foundation_vision');
          $vision_icon = !empty($vision['icon']) ? esc_url($vision['icon']) : get_template_directory_uri() . '/assets/images/found2.png';
          $vision_title = !empty($vision['title']) ? $vision['title'] : 'Vision';
          $vision_desc = !empty($vision['description']) ? $vision['description'] : 'To implement world-class sustainable frameworks through rigorous research, advocacy, and community-led environmental stewardship across Rwanda.';
        ?>
        <!-- Vision Card -->
        <div class="foundation-card dark">
          <div class="foundation-icon">
            <img src="<?php echo $vision_icon; ?>" alt="<?php echo esc_attr($vision_title); ?>" style="width: 100%; height: 100%; object-fit: contain;">
          </div>
          <h3><?php echo esc_html($vision_title); ?></h3>
          <p><?php echo esc_html($vision_desc); ?></p>
        </div>

        <?php 
          $values = get_field('foundation_values');
          $values_icon = !empty($values['icon']) ? esc_url($values['icon']) : get_template_directory_uri() . '/assets/images/found3.png';
          $values_title = !empty($values['title']) ? $values['title'] : 'Core Values';
          $v1 = !empty($values['value_1']) ? $values['value_1'] : 'Integrity';
          $v2 = !empty($values['value_2']) ? $values['value_2'] : 'Sustainability';
          $v3 = !empty($values['value_3']) ? $values['value_3'] : 'Innovation';
          $v4 = !empty($values['value_4']) ? $values['value_4'] : 'Collaboration';
          $vals = array_filter([$v1, $v2, $v3, $v4]);
        ?>
        <!-- Core Values Card -->
        <div class="foundation-card">
          <div class="foundation-icon">
            <img src="<?php echo $values_icon; ?>" alt="<?php echo esc_attr($values_title); ?>" style="width: 100%; height: 100%; object-fit: contain;">
          </div>
          <h3><?php echo esc_html($values_title); ?></h3>
          <div class="values-list">
            <?php foreach($vals as $v): ?>
            <div class="value-item">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <?php echo esc_html($v); ?>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <?php 
          $approach = get_field('foundation_approach');
          $approach_icon = !empty($approach['icon']) ? esc_url($approach['icon']) : get_template_directory_uri() . '/assets/images/found4.png';
          $approach_title = !empty($approach['title']) ? $approach['title'] : 'Our Approach';
          $approach_desc = !empty($approach['description']) ? $approach['description'] : 'To implement world-class sustainable frameworks through rigorous research, advocacy, and community-led environmental stewardship across Rwanda.';
        ?>
        <!-- Approach Card -->
        <div class="foundation-card dark">
          <div class="foundation-icon">
            <img src="<?php echo $approach_icon; ?>" alt="<?php echo esc_attr($approach_title); ?>" style="width: 100%; height: 100%; object-fit: contain;">
          </div>
          <h3><?php echo esc_html($approach_title); ?></h3>
          <p><?php echo esc_html($approach_desc); ?></p>
        </div>
      </div>
    </section>
    <!-- Founders Section -->
    <section class="founders">
      <h2><?php echo wp_kses_post(get_field('founders_title') ?: 'Our <span>Founders</span>'); ?></h2>
      <p><?php echo esc_html(get_field('founders_description') ?: 'Our founders are passionate young innovators driven by a shared vision to use technology for social and environmental impact. With backgrounds in problem-solving leadership, and digital creation, they come together to build practical solutions that empower communities, support farmers, and promote sustainable growth.'); ?></p>

      <div class="team-grid">
        <?php
          $has_founders = false;
          for ( $i = 1; $i <= 4; $i++ ) {
            $founder = get_field('founder_' . $i);
            if ( !empty($founder) && !empty($founder['name']) ) {
              $has_founders = true;
              break;
            }
          }
        ?>

        <?php if ( $has_founders ) : ?>
          <?php
            for ( $i = 1; $i <= 4; $i++ ) {
              $founder = get_field('founder_' . $i);
              if ( empty($founder) || empty($founder['name']) ) continue;

              $f_photo = !empty($founder['photo']) ? $founder['photo'] : '';
              $f_name = $founder['name'];
              $f_role = !empty($founder['role']) ? $founder['role'] : '';
              $f_bio = !empty($founder['bio']) ? $founder['bio'] : '';
          ?>
            <article class="team-member">
              <?php if ( $f_photo ) : ?>
                <img src="<?php echo esc_url($f_photo); ?>" alt="<?php echo esc_attr(strip_tags($f_name)); ?>" class="team-photo">
              <?php endif; ?>
              <h3 class="team-name"><?php echo wp_kses_post($f_name); ?></h3>
              <?php if ( $f_role ) : ?>
                <span class="team-role"><?php echo esc_html($f_role); ?></span>
              <?php endif; ?>
              <?php if ( $f_bio ) : ?>
                <p class="team-bio"><?php echo esc_html($f_bio); ?></p>
              <?php endif; ?>
            </article>
          <?php } ?>
        <?php else : ?>
          <!-- Founder 1 -->
          <article class="team-member">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Drocella MUSABYIMANA.png" alt="Drocella MUSABYIMANA" class="team-photo">
            <h3 class="team-name">Drocella<br>MUSABYIMANA</h3>
            <span class="team-role">Executive Director</span>
            <p class="team-bio">Leading strategic initiatives with experience in regional environmental policy and sustainable development across East Africa.</p>
          </article>

          <!-- Founder 2 -->
          <article class="team-member">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nshimiyimana phillippe-new.jpeg" alt="NSHIMIYIMANA Philippe" class="team-photo">
            <h3 class="team-name">NSHIMIYIMANA<br>Philippe</h3>
            <span class="team-role">Field Coordinator</span>
            <p class="team-bio">Coordinating field operations and liaising with local community leaders to implement projects.</p>
          </article>

          <!-- Founder 3 -->
          <article class="team-member">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/alia gihozo-new.jpeg" alt="Alia IGIHOZO" class="team-photo">
            <h3 class="team-name">Alia<br>IGIHOZO</h3>
            <span class="team-role">Finance & HR Admin</span>
            <p class="team-bio">Managing finance, HR processes, and ensuring compliance with institutional policies.</p>
          </article>

          <!-- Founder 4 -->
          <article class="team-member">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nyirandayisabye aline-new.jpeg" alt="NYIRANDAYISABYE Eline" class="team-photo">
            <h3 class="team-name">NYIRANDAYISABYE<br>Eline</h3>
            <span class="team-role">Assistant Project Lead</span>
            <p class="team-bio">Supporting project implementation and monitoring across field sites.</p>
          </article>
        <?php endif; ?>
      </div>
    </section>

    <!-- Impact Section -->
    <section class="impact">
      <div class="impact-content">
        <span class="impact-reach"><?php echo esc_html(get_field('impact_subtitle') ?: 'Our Reach'); ?></span>
        <h2><?php echo wp_kses_post(get_field('impact_title') ?: 'Rwanda-Wide Impact'); ?></h2>
        <p><?php echo esc_html(get_field('impact_description') ?: 'From the rolling hills of the North to the vibrant plains of the East, our operations span all 30 districts. We deploy localized solutions that respect the unique ecological needs of every province.'); ?></p>

        <div class="impact-stats">
          <div class="impact-stat-card">
            <h4><?php echo esc_html(get_field('impact_stat_1_num') ?: '30+'); ?></h4>
            <span><?php echo esc_html(get_field('impact_stat_1_label') ?: 'Districts Covered'); ?></span>
          </div>
          <div class="impact-stat-card">
            <h4><?php echo esc_html(get_field('impact_stat_2_num') ?: '150k'); ?></h4>
            <span><?php echo esc_html(get_field('impact_stat_2_label') ?: 'Trees Planted'); ?></span>
          </div>
        </div>
      </div>
      <div class="impact-visual">
        <?php
          $impact_img = get_field('impact_image');
          $impact_img_url = !empty($impact_img) ? esc_url($impact_img) : get_template_directory_uri() . '/assets/images/rwanda.png';
        ?>
        <img src="<?php echo $impact_img_url; ?>" alt="Impact Map" class="impact-map">
      </div>
    </section>

    <!-- About CTA Banner -->
    <section class="about-cta">
      <div class="container">
        <h2><?php echo wp_kses_post(get_field('cta_title') ?: 'Join Our Mission for a <span>Greener Rwanda</span>'); ?></h2>
        <p><?php echo esc_html(get_field('cta_description') ?: 'Your support helps us bridge the gap between vision and ecological reality. Together, we can build a sustainable future.'); ?></p>
        <div class="about-cta-btns">
          <a href="<?php echo esc_url(get_field('cta_button_1_link') ?: site_url('/contact')); ?>" class="btn btn-white"><?php echo esc_html(get_field('cta_button_1_text') ?: 'Partner With Us'); ?></a>
          <a href="<?php echo esc_url(get_field('cta_button_2_link') ?: '#'); ?>" class="btn btn-outline-white"><?php echo esc_html(get_field('cta_button_2_text') ?: 'Explore More'); ?></a>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
