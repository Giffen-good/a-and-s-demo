<?php //ACF 2 column call to action => picture + text callout ?>
<section class="large-image-cta-container pt-10 md-lg:pt-1">
  <?php
  if ( have_rows('large_image_ctas') ) :
    $i = 0;
    while ( have_rows('large_image_ctas') ) :
      the_row();

      $image = get_sub_field('image');
      $heading = get_sub_field('heading');
      $btn_text = get_sub_field('button_text');
      $cta_url = get_sub_field('callout_url');
      $img_obj = new Resp_Picture_helper($image, true);
      ?>
      <section class="large-image-cta grid grid-cols-16 pt-20 wd-container max-w-screen-xl  md-lg:flex md-lg:flex-wrap">
        <div class="relative row-span-full  col-span-10 self-center md-lg:w-full <?php echo $i % 2 == 0 ? 'col-start-1' : 'col-end-17'; ?>">
          <?php
          $img_obj->custom_classes = 'object-cover';
          echo $img_obj->create_picture();
          ?>
        </div>
        <div class="row-span-full col-span-7 self-center z-10   md-lg:w-full md-lg:text-left md-lg:mt-2 <?php echo $i % 2 == 0 ? 'col-end-17 text-right' : 'col-start-1 text-left'; ?>   ">
          <div class="separator horizontal-separator"></div>
          <div class="w-full bg-white  md-lg:pr-0   md-lg:pl-0 <?php echo $i % 2 == 0 ? 'pl-6' : 'pr-6'; ?>">
            <h3 class="text-4xl font-light leading-tight mb-6 text-darker-grey"><?php esc_html_e($heading); ?></h3>
          </div>
          <a class="btn mb-8" href="<?php echo esc_url($cta_url); ?>"><?php esc_html_e($btn_text); ?></a>
        </div>
      </section>
      <?php
      $i++;
    endwhile;
  endif;
  ?>
</section>
