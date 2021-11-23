<?php
$hero = get_field('hero_image');
$hero_heading = get_field('hero_heading');
if ( $hero )
{
?>
<section class="hero-section">
  <div class="w-full relative hero-container">

    <?php
    $h_pic = new Resp_Picture_helper($hero, true);
    $h_pic->c_classes_bg_img();
    $h_pic->create_default_acf_img_props();
    echo $h_pic->create_picture();
    ?>

    <div class="inset-center w-11/12 text-center absolute text-white ">
      <?php if ( $hero_heading ) { ?>
        <h2 class="text-6xl font-light leading-none	"><?php esc_html_e( $hero_heading ); ?></h2>
      <?php } ?>
      <hgroup class="flex justify-center items-center	pt-7 flex-wrap sm:flex-nowrap">
        <?php
          if ( have_rows('hero_callouts') ) :
            $count = count(get_field('hero_callouts'));
            $i = 1;
            while ( have_rows('hero_callouts') ) :
              the_row();
              ?>
              <h3 class="text-4xl w-full sm:w-auto ">
                <a href="<?php echo esc_url( get_sub_field('callout_url') ); ?>">
                  <?php esc_html_e( get_sub_field('callout_label') ); ?>
                </a>
              </h3>
              <?php
              if ($i < $count)
              {
                  ?>
                  <div class="separator mx-5 w-3px hidden sm:block"></div>
                  <?php
              }
              $i++;
            endwhile;
          endif;

        ?>
      </hgroup>
    </div>
  </div>
</section>
<?php } ?>
