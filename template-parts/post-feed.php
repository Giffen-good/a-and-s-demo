<?php // Post feed accepts an array of posts as an argument ?>
<section class="post-feed  mt-6 grid grid-cols-1 gap-y-10 gap-x-4 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-6 max-w-screen-xl wd-container">
  <?php
  foreach ( $args as $c_post )
  {
    get_template_part( 'template-parts/post', 'card', $c_post );
  }
  ?>

</section>
