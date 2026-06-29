<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>

  <main class="container">
    <?php
    $default_title = 'Let\'s nurture<br>the <span class="title-italic-green" style="font-style:italic; color:var(--primary-green);">highlands</span><br>together.';
    $hero_title = function_exists('get_field') && get_field('hero_title') ? get_field('hero_title') : $default_title;
    $hero_desc  = function_exists('get_field') && get_field('hero_description') ? get_field('hero_description') : "Whether you're looking to partner on reforestation projects, inquire about our conservation initiatives, or join our innovative grassroots movement, our team is ready to connect.";
    $hero_img   = function_exists('get_field') && get_field('hero_image') ? get_field('hero_image') : 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80';
    ?>
    <!-- Hero Section -->
    <section class="contact-hero">
      <div class="contact-hero-content">
        <h1 class="title-primary">
          <?php echo $hero_title; // HTML allowed for styling ?>
        </h1>
        <p>
          <?php echo esc_html($hero_desc); ?>
        </p>
      </div>
      <div class="contact-hero-image">
        <img src="<?php echo esc_url($hero_img); ?>" alt="Contact Us">
      </div>
    </section>

    <!-- Main Contact Area -->
    <section class="contact-body">
      <!-- Form Side -->
      <div class="contact-form-container">
        <h2>
          <?php echo esc_html(get_field('form_title_black') ?: 'Send an'); ?> 
          <span class="title-italic-green" style="color:var(--primary-green); font-style:italic;">
            <?php echo esc_html(get_field('form_title_green') ?: 'Inquiry'); ?>
          </span>
        </h2>
        <form id="contactForm" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
          <?php wp_nonce_field('ciac_contact_form', 'ciac_contact_nonce'); ?>
          <input type="hidden" name="action" value="ciac_contact_form">
          <div class="form-row">
            <div class="form-group">
              <label>Full Name</label>
              <input type="text" name="name" placeholder="<?php echo esc_attr(get_field('form_placeholder_name') ?: 'Jean-Claude Umutoni'); ?>" required>
            </div>
            <div class="form-group">
              <label>Email Address</label>
              <input type="email" name="email" placeholder="<?php echo esc_attr(get_field('form_placeholder_email') ?: 'hello@example.rw'); ?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Subject of Interest</label>
              <select name="subject" required>
                <option value="Partnership Opportunities">Partnership Opportunities</option>
                <option value="Volunteer">Volunteer</option>
                <option value="Donation">Donation</option>
                <option value="General Inquiry">General Inquiry</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Your Message</label>
              <textarea name="message" placeholder="<?php echo esc_attr(get_field('form_placeholder_message') ?: 'How can we collaborate to preserve our highlands?'); ?>" required></textarea>
            </div>
          </div>
          <button type="submit" id="contactSubmitBtn" class="btn btn-primary"
            style="display:inline-flex; align-items:center; gap:0.5rem; padding:1rem 2rem;">
            <?php echo esc_html(get_field('form_button_text') ?: 'SEND INQUIRY'); ?>
            <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
              <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
            </svg>
          </button>
          <p id="formFeedback" style="margin-top:1rem; font-size:0.9rem; font-weight:600; color:var(--primary-green); display:none;"></p>
        </form>
      </div>

      <!-- Detail Side -->
      <div class="contact-sidebar">
        <?php $front_id = get_option('page_on_front'); ?>
        <!-- Headquarters -->
        <div class="sidebar-card">
          <h3>
            <svg viewBox="0 0 24 24" width="24" height="24" fill="var(--primary-green)">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
            </svg>
            <?php echo esc_html(get_field('sidebar_title_hq') ?: 'Headquarters'); ?>
          </h3>
          <p>
            <?php echo wp_kses_post(get_field('footer_office_address', $front_id) ?: 'KN 3 Rd, Kigali City Tower<br>Level 14, Suite 102<br>Kigali, Rwanda'); ?>
          </p>
          <?php 
            $iframe = get_field('sidebar_map_iframe');
            if ( $iframe ) {
              // Sanitize iframe: only allow safe iframe attributes
              $allowed_iframe_tags = array(
                'iframe' => array(
                  'src'             => true,
                  'width'           => true,
                  'height'          => true,
                  'style'           => true,
                  'frameborder'     => true,
                  'allowfullscreen' => true,
                  'loading'         => true,
                  'referrerpolicy'  => true,
                  'title'           => true,
                ),
              );
              echo wp_kses( $iframe, $allowed_iframe_tags );
            } else {
              echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2819.480207262104!2d30.08675359797305!3d-2.016670799704308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca95983a4eb33%3A0x502a907c03656372!2sCIAC%20RWANDA!5e0!3m2!1sen!2srw!4v1780597309755!5m2!1sen!2srw" width="100%" height="250" style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="CIAC Rwanda Location"></iframe>';
            }
          ?>
        </div>

        <!-- Direct Channels -->
        <div class="sidebar-card sidebar-card-dark">
          <h3><?php echo esc_html(get_field('sidebar_title_dc') ?: 'Direct Channels'); ?></h3>
          <div class="contact-item">
            <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" /></svg>
            <?php echo esc_html(get_field('footer_email_address', $front_id) ?: 'info@ciac.rw'); ?>
          </div>
          <div class="contact-item">
            <svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" /></svg>
            <?php echo esc_html(get_field('footer_phone_number', $front_id) ?: '+250 785 507 355'); ?>
          </div>
          <div class="social-circle-btns">
            <?php $fb = get_field('footer_facebook_url', $front_id); if($fb): ?>
              <a href="<?php echo esc_url($fb); ?>"><svg viewBox="0 0 24 24"><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z" /></svg></a>
            <?php endif; ?>
            <?php $tw = get_field('footer_twitter_url', $front_id); if($tw): ?>
              <a href="<?php echo esc_url($tw); ?>"><svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" /></svg></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script>
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
      contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const btn      = document.getElementById('contactSubmitBtn');
        const feedback = document.getElementById('formFeedback');
        const formData = new URLSearchParams(new FormData(this)).toString();

        btn.innerHTML     = 'SENDING...';
        btn.style.opacity = '0.7';
        feedback.style.display = 'none';

        fetch(this.action, {
          method : 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body   : formData,
        })
        .then(r => r.json())
        .then(data => {
          btn.innerHTML        = 'SENT SUCCESSFULLY';
          btn.style.background = '#298d45';
          this.reset();
          feedback.textContent   = 'Thank you for reaching out! We\'ll get back to you shortly.';
          feedback.style.display = 'block';
          feedback.style.color   = 'var(--primary-green)';
          setTimeout(() => {
            btn.innerHTML     = 'SEND INQUIRY <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>';
            btn.style.opacity = '1';
          }, 4000);
        })
        .catch(() => {
          btn.innerHTML          = 'ERROR. RETRY.';
          feedback.textContent   = 'There was an error. Please email us directly at info@ciac.rw';
          feedback.style.display = 'block';
          feedback.style.color   = 'red';
          setTimeout(() => {
            btn.innerHTML     = 'SEND INQUIRY <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>';
            btn.style.opacity = '1';
          }, 3000);
        });
      });
    }
  </script>

<?php get_footer(); ?>
