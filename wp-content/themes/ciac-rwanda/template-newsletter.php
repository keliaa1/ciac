<?php
/**
 * Template Name: Newsletter Page
 */
get_header(); ?>

  <main class="container">
    <?php
    // Fetch ACF Fields with Fallbacks
    $hero_t_black   = function_exists('get_field') && get_field('hero_title_black') ? get_field('hero_title_black') : "The Breath of\nthe";
    $hero_t_green   = function_exists('get_field') && get_field('hero_title_green') ? get_field('hero_title_green') : "Highlands.";
    $hero_title     = nl2br(esc_html($hero_t_black)) . ' <span class="title-italic-green" style="font-style:italic; color:var(--primary-green);">' . esc_html($hero_t_green) . '</span>';
    
    $hero_subtitle  = function_exists('get_field') && get_field('hero_subtitle') ? get_field('hero_subtitle') : "Exploring the intersection of modern ecological innovation and ancestral wisdom in Rwanda's reforestation journey.";
    $hero_stat_num  = function_exists('get_field') && get_field('hero_stat_num') ? get_field('hero_stat_num') : "84%";
    $hero_stat_desc = function_exists('get_field') && get_field('hero_stat_desc') ? get_field('hero_stat_desc') : "Survival rate of our native seedlings across the Nyungwe corridor this season.";

    $feat_img       = function_exists('get_field') && get_field('featured_image') ? get_field('featured_image') : get_template_directory_uri() . '/assets/images/project4tea.png';
    $feat_badge     = function_exists('get_field') && get_field('featured_badge') ? get_field('featured_badge') : "REFORESTATION";
    $feat_title     = function_exists('get_field') && get_field('featured_title') ? get_field('featured_title') : "Restoring the Canopy: A Multi-<br>Generational Commitment";
    $feat_meta      = function_exists('get_field') && get_field('featured_meta') ? get_field('featured_meta') : "<span>By Dr. Amélie Umutoni</span> <span>⏱ 12 min read</span>";
    $feat_link      = function_exists('get_field') && get_field('featured_link') ? get_field('featured_link') : "#";

    $quote_title    = function_exists('get_field') && get_field('quote_title') ? get_field('quote_title') : "Climate resilience isn't just about planting; it's about listening to the land's original heartbeat.";
    $quote_desc     = function_exists('get_field') && get_field('quote_desc') ? get_field('quote_desc') : "Our latest research into soil symbiosis reveals how ancient fungi networks are the secret to rapid highland forest recovery.";
    $quote_link     = function_exists('get_field') && get_field('quote_link') ? get_field('quote_link') : "#";
    ?>

    <!-- Hero Section -->
    <section class="newsletter-hero">
      <div class="newsletter-hero-content">
        <h1 class="title-primary">
          <?php echo $hero_title; // allowed HTML ?>
        </h1>
        <p>
          <?php echo esc_html($hero_subtitle); ?>
        </p>
      </div>
      <div class="newsletter-hero-stats">
        <div class="stat-box">
          <div class="stat-box-title">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
            </svg>
            <?php echo esc_html($hero_stat_num); ?>
          </div>
          <p><?php echo esc_html($hero_stat_desc); ?></p>
        </div>
      </div>
    </section>

    <!-- Featured Article -->
    <section class="featured-article-section">
      <a href="<?php echo esc_url($feat_link); ?>" class="featured-article" style="display:block;text-decoration:none;color:inherit;">
        <img src="<?php echo esc_url($feat_img); ?>" alt="Featured Article">
        <div class="featured-overlay">
          <span class="badge"><?php echo esc_html($feat_badge); ?></span>
          <h2><?php echo nl2br(esc_html($feat_title)); ?></h2>
          <div class="featured-meta">
            <?php echo $feat_meta; // allowed HTML ?>
          </div>
        </div>
      </a>
      <div class="article-sidebar">
        <div class="sidebar-quote">
          <h3><?php echo esc_html($quote_title); ?></h3>
          <p><?php echo esc_html($quote_desc); ?></p>
          <a href="<?php echo esc_url($quote_link); ?>" class="link-green">Read the full story &rarr;</a>
        </div>
      </div>
    </section>

    <!-- Latest Dispatches -->
    <section class="dispatches-section">
      <div class="dispatches-header">
        <h2 style="font-family:var(--font-heading); font-size:2rem;">Latest Dispatches</h2>
        <div class="dispatches-filters" style="display: flex; flex-wrap: wrap;">
          <button class="filter-btn active" data-filter="all">All Stories</button>
          <?php 
          $categories = get_categories(array('exclude' => 1)); // Exclude Uncategorized
          if(!empty($categories)) {
              foreach($categories as $cat) {
                  echo '<button class="filter-btn" data-filter="'.esc_attr(sanitize_title($cat->name)).'">'.esc_html($cat->name).'</button>';
              }
          } else {
              // Fallback buttons
          ?>
          <button class="filter-btn" data-filter="environment-management">Environment management.</button>
          <button class="filter-btn" data-filter="climate-change-adaptation">Climate change adaptation</button>
          <button class="filter-btn" data-filter="conflict-management">Conflict management</button>
          <button class="filter-btn" data-filter="good-governance">Good governance</button>
          <?php } ?>
        </div>
      </div>

      <div class="dispatches-grid">
        <?php
        // Query standard WordPress Posts for Dispatches
        $dispatches = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 8, 'category__not_in' => array(1))); // exclude uncategorized if needed
        
        if($dispatches->have_posts()):
            while($dispatches->have_posts()): $dispatches->the_post();
                $cats = get_the_category();
                $cat_slug = $cats ? sanitize_title($cats[0]->name) : 'general';
                $cat_name = $cats ? $cats[0]->name : 'General';
                $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                
                // Content image fallback
                if ( ! $thumb ) {
                    $content = get_the_content();
                    if ( preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches) ) {
                        $thumb = $matches[1];
                    } else {
                        $thumb = get_template_directory_uri() . '/assets/images/project1agro.jpeg';
                    }
                }
        ?>
        <article class="dispatch-card" data-category="<?php echo esc_attr($cat_slug); ?>">
          <div class="img-container">
            <span class="badge" style="font-size:0.55rem;"><?php echo esc_html($cat_name); ?></span>
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>">
          </div>
          <div class="dispatch-date"><?php echo get_the_date('M d, Y'); ?></div>
          <h4><?php the_title(); ?></h4>
          <p><?php echo wp_trim_words(get_the_excerpt(), 12, '...'); ?></p>
          <a href="<?php the_permalink(); ?>" class="link-green">Read Article</a>
        </article>
        <?php 
            endwhile; 
            wp_reset_postdata(); 
        else: 
        ?>
        <!-- Fallback Dispatches if no posts are created yet -->
        <!-- Dispatch 1 -->
        <article class="dispatch-card" data-category="environment-management">
          <div class="img-container">
            <span class="badge" style="font-size:0.55rem;">Environment management.</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project1agro.jpeg" alt="Environment">
          </div>
          <div class="dispatch-date">OCT 24, 2026</div>
          <h4>Protecting Indigenous Woodlands</h4>
          <p>How we're reaching the most inaccessible slopes using adaptive technology.</p>
          <a href="#" class="link-green">Explore Tech</a>
        </article>

        <!-- Dispatch 2 -->
        <article class="dispatch-card" data-category="climate-change-adaptation">
          <div class="img-container">
            <span class="badge" style="font-size:0.55rem;">Climate change adaptation</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project2carbon.jpeg" alt="Seedlings">
          </div>
          <div class="dispatch-date">OCT 18, 2026</div>
          <h4>Drought Preparedness</h4>
          <p>Analyzing modern techniques for crop survival during extreme weather phenomena.</p>
          <a href="#" class="link-green">Read Report</a>
        </article>

        <!-- Dispatch 3 -->
        <article class="dispatch-card" data-category="conflict-management">
          <div class="img-container">
            <span class="badge" style="font-size:0.55rem;">Conflict management</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project3tree.jpeg" alt="Farmer smiling">
          </div>
          <div class="dispatch-date">OCT 12, 2026</div>
          <h4>The Guardians of the Green</h4>
          <p>Meet the local cooperatives successfully resolving land resource disputes.</p>
          <a href="#" class="link-green">Meet the Team</a>
        </article>

        <!-- Dispatch 4 -->
        <article class="dispatch-card" data-category="good-governance">
          <div class="img-container">
            <span class="badge" style="font-size:0.55rem;">Good governance</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project5edu.jpeg" alt="Governance">
          </div>
          <div class="dispatch-date">OCT 05, 2026</div>
          <h4>Rwanda's Green Blueprint</h4>
          <p>Analyzing the new governmental framework for carbon credits and private conservation.</p>
          <a href="#" class="link-green">Read Report</a>
        </article>
        <?php endif; ?>
      </div>
    </section>

    <!-- Subscribe Banner -->
    <section class="subscribe-banner">
      <div class="subscribe-content">
        <h2>Join the <span class="title-italic-green" style="color:var(--primary-green); font-style:italic;">Conversation.</span></h2>
        <p>Receive our monthly dossier on highland conservation, innovation breakthroughs, and impact reports directly
          in your inbox.</p>
      </div>
      <div class="subscribe-form">
        <form id="newsletterForm" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
          <?php wp_nonce_field('ciac_newsletter_subscribe', 'ciac_nonce'); ?>
          <input type="hidden" name="action" value="ciac_newsletter_subscribe">
          <input type="email" name="email" placeholder="Your Email Address" required>
          <button type="submit">Subscribe to Insights</button>
        </form>
        <span class="subscribe-note">SECURE &amp; PRIVATE DATA MANAGEMENT</span>
      </div>
    </section>
  </main>

  <script>
    // Filter logic
    const filterBtns = document.querySelectorAll('.filter-btn');
    const cards      = document.querySelectorAll('.dispatch-card');

    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.getAttribute('data-filter');
        cards.forEach(card => {
          if (filter === 'all' || card.getAttribute('data-category') === filter) {
            card.style.display   = '';
            card.style.animation = 'fadeIn 0.4s ease';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });

    // Newsletter form
    const nForm = document.getElementById('newsletterForm');
    if (nForm) {
      nForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const email = this.elements.email.value;
        const btn   = this.querySelector('button[type="submit"]');
        btn.textContent = 'SUBSCRIBING...';
        btn.style.opacity = '0.7';

        fetch(this.action, {
          method : 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body   : new URLSearchParams(new FormData(this)).toString(),
        })
        .then(r => r.json())
        .then(data => {
          btn.textContent = 'THANK YOU!';
          btn.style.background = '#298d45';
          btn.style.color      = 'white';
          this.elements.email.value = '';
          setTimeout(() => {
            btn.textContent      = 'SUBSCRIBE TO INSIGHTS';
            btn.style.background = 'white';
            btn.style.color      = 'var(--dark-green)';
            btn.style.opacity    = '1';
          }, 3000);
        })
        .catch(() => {
          btn.textContent = 'ERROR. TRY AGAIN.';
          setTimeout(() => {
            btn.textContent   = 'SUBSCRIBE TO INSIGHTS';
            btn.style.opacity = '1';
          }, 2000);
        });
      });
    }
  </script>

<?php get_footer(); ?>
