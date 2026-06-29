<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header();
?>

  <main class="container">
    <!-- 404 Error Section -->
    <section class="error-section">
      <div class="error-illustration" style="display: flex; justify-content: center; margin-bottom: 2rem;">
        <svg width="180" height="180" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="100" cy="100" r="96" fill="#f8faf8" stroke="#298d45" stroke-width="2" stroke-dasharray="8 8" />
          <text x="50%" y="55%" dominant-baseline="middle" text-anchor="middle" font-family="Poppins, sans-serif"
            font-size="72" font-weight="700" fill="#298d45">404</text>
        </svg>
      </div>

      <h1>Oops! Page Not<br>Found</h1>

      <p>The path you were following seems to have vanished into the mist. Like a forest in flux, our digital ecosystem
        is constantly evolving. Let us guide you back to stable ground.</p>

      <div class="error-actions">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
          <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor" style="vertical-align: middle; margin-right: 0.5rem;">
            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
          </svg>
          Return Home
        </a>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
