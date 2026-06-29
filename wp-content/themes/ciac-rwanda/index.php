<?php
/**
 * The main template file
 * Required by WordPress to prevent blank pages on fallback.
 */
get_header(); ?>

<main class="container" style="padding: 150px 20px 80px;">
    <h1 class="title-primary" style="margin-bottom: 2rem;"><?php the_title(); ?></h1>
    <div class="content" style="max-width: 800px; line-height: 1.8;">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
        else :
            echo '<p>No content found.</p>';
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
