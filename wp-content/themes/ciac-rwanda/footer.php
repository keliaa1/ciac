  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-grid">
        <div class="footer-col" style="flex: 2;">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" style="margin-bottom: 2rem; display: flex; align-items: center; gap: 0.5rem;">
            <?php $front_id = get_option('page_on_front'); ?>
            <?php if(get_field('footer_logo', $front_id)): ?>
                <img src="<?php echo esc_url(get_field('footer_logo', $front_id)); ?>" alt="<?php bloginfo( 'name' ); ?> Logo" style="height: 40px; width: auto;" />
            <?php endif; ?>
            <span
              style="font-family: var(--font-heading); font-size: 1.5rem; font-weight: 700; color: var(--primary-green);">CIAC
              Rwanda</span>
          </a>
          <p style="max-width: 300px;">
            Empowering communities for sustainable environmental management and climate resilience across Rwanda.
          </p>
        </div>
        <div class="footer-col">
          <h4>Explore</h4>
          <?php
          wp_nav_menu(array(
              'theme_location' => 'footer-menu-explore',
              'container'      => false,
              'menu_class'     => '',
              'fallback_cb'    => false,
          ));
          ?>
        </div>
        <div class="footer-col">
          <h4>Key Patterns</h4>
          <?php
          wp_nav_menu(array(
              'theme_location' => 'footer-menu-patterns',
              'container'      => false,
              'menu_class'     => '',
              'fallback_cb'    => false,
          ));
          ?>
        </div>
        <div class="footer-col">
          <h4>Office</h4>
          <p>
            <?php echo wp_kses_post(get_field('footer_office_address', $front_id) ?: 'Kigali-Kicukiro'); ?><br>
            <?php echo esc_html(get_field('footer_email_address', $front_id) ?: 'info@ciac.rw'); ?><br>
            <?php echo esc_html(get_field('footer_phone_number', $front_id) ?: '+250785507355'); ?>
          </p>
          <div class="social-links">
            <?php if(get_field('footer_facebook_url', $front_id)): ?>
                <a href="<?php echo esc_url(get_field('footer_facebook_url', $front_id)); ?>" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" /></svg></a>
            <?php endif; ?>
            <?php if(get_field('footer_twitter_url', $front_id)): ?>
                <a href="<?php echo esc_url(get_field('footer_twitter_url', $front_id)); ?>" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" /></svg></a>
            <?php endif; ?>
            <?php if(get_field('footer_linkedin_url', $front_id)): ?>
                <a href="<?php echo esc_url(get_field('footer_linkedin_url', $front_id)); ?>" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z" /></svg></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <?php echo esc_html(get_field('footer_copyright_text', $front_id) ?: '&copy; ' . date('Y') . ' CIAC RWANDA. All rights reserved.'); ?>
      </div>
    </div>
  </footer>

  <script>
    // Header scroll animation
    window.addEventListener('scroll', () => {
      const header = document.querySelector('header');
      if (window.scrollY > 50) {
        header.classList.add('header-scrolled');
      } else {
        header.classList.remove('header-scrolled');
      }
    });

    // Mobile Menu Toggle
    const mobileMenu = document.getElementById('mobile-menu');
    const navWrapper = document.querySelector('.nav-wrapper');

    if (mobileMenu && navWrapper) {
      mobileMenu.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
        navWrapper.classList.toggle('active');
      });
    }

    // Reveal on scroll
    const observerOptions = {
      threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = "1";
          entry.target.style.transform = "translateY(0)";
        }
      });
    }, observerOptions);

    document.querySelectorAll('section').forEach(section => {
      section.style.opacity = "0";
      section.style.transform = "translateY(30px)";
      section.style.transition = "all 0.8s ease-out";
      observer.observe(section);
    });

    // Dropdown logic
    function toggleDropdown(event, id) {
      event.preventDefault();
      event.stopPropagation();
      const dropdown = document.getElementById(id);
      const allDropdowns = document.querySelectorAll('.dropdown-content');

      allDropdowns.forEach(d => {
        if (d.id !== id) {
          d.classList.remove('show');
          // Wait for transition to finish before hiding display
          setTimeout(() => { if (!d.classList.contains('show')) d.style.display = 'none'; }, 300);
        }
      });

      if (dropdown.classList.contains('show')) {
        dropdown.classList.remove('show');
        setTimeout(() => { if (!dropdown.classList.contains('show')) dropdown.style.display = 'none'; }, 300);
      } else {
        dropdown.style.display = 'block';
        // Small delay to allow display: block to apply before changing opacity
        setTimeout(() => { dropdown.classList.add('show'); }, 10);
      }
    }

    function closeDropdown(id) {
      const dropdown = document.getElementById(id);
      if(dropdown) {
        dropdown.classList.remove('show');
        setTimeout(() => { if (!dropdown.classList.contains('show')) dropdown.style.display = 'none'; }, 300);
      }
    }

    // Close dropdowns when clicking outside
    window.onclick = function (event) {
      if (!event.target.closest('.dropdown')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
            (function (d) {
              setTimeout(() => { if (!d.classList.contains('show')) d.style.display = 'none'; }, 300);
            })(openDropdown);
          }
        }
      }
    }
  </script>
  <?php wp_footer(); ?>
</body>
</html>
