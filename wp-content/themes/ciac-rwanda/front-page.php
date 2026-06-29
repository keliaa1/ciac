<?php
/**
 * The front page template file
 */

get_header(); ?>

  <main>
    <!-- Hero Section -->
    <section class="hero container">
      <div class="hero-content">
        <div class="hero-subtitle"><?php echo esc_html(get_field('hero_subtitle') ?: "Centre d'intervention et d'Action Communautaire"); ?></div>
        <h1><?php echo wp_kses_post(get_field('hero_title') ?: 'Building a Sustainable <br><span class="italic">Future</span>'); ?></h1>
        <p><?php echo esc_html(get_field('hero_description') ?: 'Leading the charge in sustainable development and community resilience across the Land of a Thousand Hills through world-class stewardship.'); ?></p>
        <div class="hero-btns">
          <div class="dropdown">
            <button class="btn btn-primary" onclick="toggleDropdown(event, 'mission-dropdown')">Our Mission</button>
            <div id="mission-dropdown" class="dropdown-content">
              <button class="dropdown-close" onclick="closeDropdown('mission-dropdown')">&times;</button>
              <p>The mission of CIAC is to promote sustainable and inclusive community development in Rwanda</p>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn btn-vision" onclick="toggleDropdown(event, 'vision-dropdown')">Our Vision</button>
            <div id="vision-dropdown" class="dropdown-content">
              <button class="dropdown-close" onclick="closeDropdown('vision-dropdown')">&times;</button>
              <p>The vision of CIAC is to build resilient and sustainable communities where families enjoy improved
                livelihoods, harmony, gender equality, and environmental conservation</p>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-image-container">
        <?php 
        $hero_bg = get_field('hero_background_image');
        $hero_bg_url = $hero_bg ? esc_url($hero_bg) : get_template_directory_uri() . '/assets/images/homephoto.png';
        ?>
        <img src="<?php echo $hero_bg_url; ?>" alt="Sustainability in Rwanda" class="hero-image">
        <div class="floating-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heroleaf.png" alt="Leaf Icon">
          <p><?php echo esc_html(get_field('hero_leaf_text') ?: '50,000+ Trees planted in the Akagera region this quarter.'); ?></p>
        </div>
      </div>
    </section>

    <section class="stats">
      <?php
        $has_stats = false;
        for ( $i = 1; $i <= 4; $i++ ) {
          $stat = get_field('stat_' . $i);
          if ( !empty($stat) && !empty($stat['number']) ) {
            $has_stats = true;
            break;
          }
        }
      ?>

      <?php if( $has_stats ): ?>
        <?php 
          for ( $i = 1; $i <= 4; $i++ ) {
            $stat = get_field('stat_' . $i);
            if ( empty($stat) || empty($stat['number']) ) continue;
        ?>
          <div class="stat-card">
            <h2><?php echo esc_html($stat['number']); ?></h2>
            <p><?php echo esc_html($stat['label']); ?></p>
          </div>
        <?php } ?>
      <?php else : ?>
        <div class="stat-card">
          <h2>4000+</h2>
          <p>Family supported</p>
        </div>
        <div class="stat-card">
          <h2>1502+</h2>
          <p>Women impowered</p>
        </div>
        <div class="stat-card">
          <h2>1000+</h2>
          <p>Hectares stored</p>
        </div>
        <div class="stat-card">
          <h2>98%</h2>
          <p>Efficiency Rating</p>
        </div>
      <?php endif; ?>
    </section>

    <!-- Content Section -->
    <section class="content-section container">
      <div class="image-quote-container">
        <?php 
        $about_img = get_field('about_image');
        $about_img_url = $about_img ? esc_url($about_img) : get_template_directory_uri() . '/assets/images/woman2.png';
        ?>
        <img src="<?php echo $about_img_url; ?>" alt="Impact Story" class="content-image">
        <div class="quote-box">
          <div class="quote-icon">“</div>
          <blockquote>"<?php echo esc_html(get_field('about_quote') ?: "Sustainable growth isn't just about the environment; it's about the dignity of the people who live within it."); ?>"</blockquote>
          <cite>— <?php echo esc_html(get_field('about_quote_author') ?: 'Dr. Uwase Marie, Director'); ?></cite>
        </div>
      </div>
      <div class="content-text">
        <h2><?php echo esc_html(get_field('about_title') ?: 'A Decade of Dedicated Service to the Rwandan People.'); ?></h2>
        <p><?php echo wp_kses_post(get_field('about_description') ?: 'Founded on the principles of integrity and innovation, CIAC Rwanda has grown from a local initiative into a national pillar of progress. We bridge the gap between global expertise and local wisdom.'); ?></p>

        <div class="features-list">
          <?php
            $has_features = false;
            for ( $i = 1; $i <= 3; $i++ ) {
              if ( get_field('feature_' . $i) ) {
                $has_features = true;
                break;
              }
            }
          ?>

          <?php if( $has_features ): ?>
            <?php 
              for ( $i = 1; $i <= 3; $i++ ) {
                $feature = get_field('feature_' . $i);
                if ( !$feature ) continue;
            ?>
              <div class="feature-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/checkmark.png" alt="Check" style="width: 20px; height: 20px; margin-right: 0.5rem;">
                <?php echo esc_html($feature); ?>
              </div>
            <?php } ?>
          <?php else : ?>
            <div class="feature-item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/checkmark.png" alt="Check" style="width: 20px; height: 20px; margin-right: 0.5rem;">
              Transparent and Accountable Financials
            </div>
            <div class="feature-item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/checkmark.png" alt="Check" style="width: 20px; height: 20px; margin-right: 0.5rem;">
              Community-Led Decision Making
            </div>
            <div class="feature-item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/checkmark.png" alt="Check" style="width: 20px; height: 20px; margin-right: 0.5rem;">
              Science-Based Environmental Strategies
            </div>
          <?php endif; ?>
        </div>

        <a href="<?php echo esc_url(site_url('/about')); ?>" class="btn btn-primary">Read Our Story</a>
      </div>
    </section>

    <!-- Domains Section -->
    <section class="domains container">
      <?php
        $domains_title = get_field('domains_title');
        if ( $domains_title ) {
          echo '<h2>' . wp_kses_post( $domains_title ) . '</h2>';
        } else {
      ?>
      <h2>CIAC's intervention <span>domains:</span></h2>
      <?php } ?>
      <div class="domains-grid">

        <?php
          $has_domains = false;
          for ( $i = 1; $i <= 4; $i++ ) {
            $domain = get_field('domain_' . $i);
            if ( !empty($domain) && !empty($domain['title']) ) {
              $has_domains = true;
              break;
            }
          }
        ?>

        <?php if ( $has_domains ) : ?>
          <?php 
            for ( $i = 1; $i <= 4; $i++ ) {
              $domain = get_field('domain_' . $i);
              if ( empty($domain) || empty($domain['title']) ) continue;

              $d_title = $domain['title'];
              $d_desc  = $domain['description'];
              $d_img   = $domain['image'];
              $d_icon  = $domain['icon'];
              $d_link  = $domain['link'] ?: site_url('/projects');
          ?>
          <a href="<?php echo esc_url($d_link); ?>" class="domain-card-link">
            <div class="domain-card">
              <div class="domain-image">
                <?php if ( $d_img ) : ?>
                  <img src="<?php echo esc_url($d_img); ?>" alt="<?php echo esc_attr($d_title); ?>">
                <?php endif; ?>
              </div>
              <div class="domain-icon-wrapper">
                <div class="domain-icon-circle">
                  <?php if ( $d_icon ) : ?>
                    <img src="<?php echo esc_url($d_icon); ?>" alt="<?php echo esc_attr($d_title); ?> icon">
                  <?php endif; ?>
                </div>
              </div>
              <div class="domain-content">
                <h3><?php echo esc_html($d_title); ?></h3>
                <p><?php echo esc_html($d_desc); ?></p>
              </div>
            </div>
          </a>
          <?php } ?>

        <?php else : ?>

          <!-- Domain 1: Environmental Protection (Fallback) -->
          <a href="<?php echo esc_url(site_url('/projects')); ?>" class="domain-card-link">
            <div class="domain-card">
              <div class="domain-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project1agro.jpeg" alt="Environmental Protection and Biodiversity Conservation">
              </div>
              <div class="domain-icon-wrapper">
                <div class="domain-icon-circle">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dom1.png" alt="Icon">
                </div>
              </div>
              <div class="domain-content">
                <h3>Environmental Protection &amp; Biodiversity Conservation</h3>
                <p>Promoting agroforestry, landscape restoration, tree planting, and sustainable agriculture to protect ecosystems and water resources.</p>
              </div>
            </div>
          </a>

          <!-- Domain 2: Women and Youth Empowerment (Fallback) -->
          <a href="<?php echo esc_url(site_url('/projects')); ?>" class="domain-card-link">
            <div class="domain-card">
              <div class="domain-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project2carbon.jpeg" alt="Women and Youth Empowerment">
              </div>
              <div class="domain-icon-wrapper">
                <div class="domain-icon-circle">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dom2.png" alt="Icon">
                </div>
              </div>
              <div class="domain-content">
                <h3>Women &amp; Youth Empowerment</h3>
                <p>Supporting women and teenage mothers through entrepreneurship, vocational training, and access to income-generating opportunities.</p>
              </div>
            </div>
          </a>

          <!-- Domain 3: Conflict Management (Fallback) -->
          <a href="<?php echo esc_url(site_url('/projects')); ?>" class="domain-card-link">
            <div class="domain-card">
              <div class="domain-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/conflict-leader.jpg" alt="Conflict Management">
              </div>
              <div class="domain-icon-wrapper">
                <div class="domain-icon-circle">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dom3.png" alt="Icon">
                </div>
              </div>
              <div class="domain-content">
                <h3>Conflict Management</h3>
                <p>Promoting peaceful conflict resolution, community dialogues, mediation, and peacebuilding at family and community levels.</p>
              </div>
            </div>
          </a>

          <!-- Domain 4: Education and Research (Fallback) -->
          <a href="<?php echo esc_url(site_url('/projects')); ?>" class="domain-card-link">
            <div class="domain-card">
              <div class="domain-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project5edu.jpeg" alt="Education and Research">
              </div>
              <div class="domain-icon-wrapper">
                <div class="domain-icon-circle">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dom4.png" alt="Icon">
                </div>
              </div>
              <div class="domain-content">
                <h3>Education &amp; Research</h3>
                <p>Conducting community-based research, organizing trainings and workshops, and supporting educational initiatives for vulnerable youth.</p>
              </div>
            </div>
          </a>

        <?php endif; ?>
      </div>
    </section>

    <!-- Partners Section -->
    <section class="partners container">
      <?php
        $partners_title = get_field('partners_title') ?: 'OUR <span>PARTNERS</span>';
        $partners_desc  = get_field('partners_desc') ?: 'Our partners are valued collaborators who support our mission through resources, expertise, and shared commitment to sustainable community impact.';
      ?>
      <h2><?php echo wp_kses_post($partners_title); ?></h2>
      <p><?php echo wp_kses_post($partners_desc); ?></p>
      <div class="partners-grid">
        <?php
          $has_partners = false;
          for ( $i = 1; $i <= 6; $i++ ) {
            $partner = get_field('partner_' . $i);
            if ( !empty($partner) && !empty($partner['logo']) ) {
              $has_partners = true;
              break;
            }
          }
        ?>

        <?php if ( $has_partners ) : ?>
          <?php
            for ( $i = 1; $i <= 6; $i++ ) {
              $partner = get_field('partner_' . $i);
              if ( empty($partner) || empty($partner['logo']) ) continue;

              $p_logo = $partner['logo'];
              $p_name = $partner['name'] ?: 'Partner Logo';
              $p_link = $partner['link'] ?: '#';
          ?>
            <a href="<?php echo esc_url($p_link); ?>" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo esc_url($p_logo); ?>" alt="<?php echo esc_attr($p_name); ?>" class="partner-logo">
            </a>
          <?php } ?>
        <?php else : ?>
          <a href="https://www.wur.nl/en" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-wageningen-part1.png" alt="Wageningen ndiza Foundation" class="partner-logo"></a>
          <a href="https://www.warrenswcd.com/education-connection/agriculture-food-for-life" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner2.jpg" alt="Partner Logo" class="partner-logo"></a>
          <a href="https://agroplastrwanda.org/" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/agroplast-logo-part3.jpg" alt="AgroPlast Ltd" class="partner-logo"></a>
          <a href="https://www.iffsreproduction.org/" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/iffs-logo-part4.png" alt="IFFS International" class="partner-logo"></a>
          <a href="https://via-foundation.org/" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/viafoundationlogo.png" alt="Via Foundation" class="partner-logo"></a>
          <a href="https://sorwatheltd.rw/shop/" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/sorwathelogo.png" alt="Sorwathe" class="partner-logo"></a>
        <?php endif; ?>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-banner">
      <div class="container">
        <?php
          $cta_title = get_field('cta_title') ?: 'Ready to make a world-class difference?';
          $cta_desc  = get_field('cta_description') ?: "Every contribution fields a locally-led project that transforms lives. Join us in building Rwanda's resilient future today.";
          $cta_btn   = get_field('cta_button_text') ?: 'Become a Partner';
          $cta_link  = get_field('cta_button_link') ?: site_url('/contact');
        ?>
        <h2><?php echo esc_html($cta_title); ?></h2>
        <p><?php echo esc_html($cta_desc); ?></p>
        <a href="<?php echo esc_url($cta_link); ?>" class="btn btn-white"><?php echo esc_html($cta_btn); ?></a>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
