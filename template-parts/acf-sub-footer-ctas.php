<section class="sub-footer-ctas relative mt-36">
  <?php
  $f_img = get_field('background_image_footer');
  if ( $f_img )
  {
    $bg_img = new Resp_Picture_helper($f_img, true);
    $bg_img->c_classes_bg_img();
    echo $bg_img->create_picture();
  }
  $left_column_cta = get_field('left_column_cta');
  $right_column_cta = get_field('right_column_cta');

  $footer_ctas = array($left_column_cta, $right_column_cta);
  ?>
  <div class="flex max-w-screen-lg wd-container gap-6 md:gap-16	p-12 justify-center mx-auto flex-wrap md:flex-nowrap">
    <?php foreach( $footer_ctas as $cta )
    {
      ?>
      <div class="md:flex-1 px-8 pt-10 pb-5  z-10 bg-white bg-opacity-80 relative flex flex-col w-full md:w-auto">
        <div class="separator horizontal-separator absolute"></div>
        <h3 class="text-3xl text-darker-grey font-medium leading-tight flex-1"><?php echo esc_html_e( $cta['column_heading'] ); ?></h3>
        <div class="flex-shrink-0  mt-6"><a class="btn chevron-right  inline-block" href="<?php echo esc_url( $cta['button_url'] ); ?>">
          <span><?php esc_html_e( $cta['button_text'] ); ?></span>
        </a></div>
      </div>
<?php
    }
    ?>
  </div>
</section>
