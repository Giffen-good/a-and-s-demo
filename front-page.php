<?php get_header();


// Query custom post data first to retrieve and store in an array to be used within the main query.
$insights = new WP_Query( array(
  'posts_per_page' => 4,
  'post_type' => 'insights',
));


$custom_post_feed = array();

if ( $insights->have_posts() ):
  while ( $insights->have_posts() ):
    $insights->the_post();

    $custom_post_feed[] = $post;
  endwhile;
  wp_reset_postdata();
endif;

?>
<main id="primary" class="site-main flex-1 z-10">
  <?php if ( have_posts() ) :
    while ( have_posts() ) :
      the_post();
      get_template_part( 'template-parts/acf', 'hero' );
      ?>
      <div class="text-center">
        <h2 class="c-underline text-dark-blue my-12	text-5xl font-medium inline-block">Inspiration</h2>
      </div>
    <?php
      get_template_part( 'template-parts/post', 'feed', $custom_post_feed );
      get_template_part( 'template-parts/acf', 'large-image-ctas' );
      get_template_part( 'template-parts/acf', 'sub-footer-ctas' );

    endwhile;
  endif; ?>
</main>

<?php get_footer(); ?>