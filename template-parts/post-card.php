<?php // Post card accepts post obj as an argument
  $id = $args->ID;
  $cat = __( 'Insight', 'as_demo' );
  $featured_image = get_featured_image( $id );
  $permalink = get_permalink( $id );
  $title = get_the_title( $id );
  $excerpt = get_the_excerpt( $id );
?>

<a href='<?php echo esc_url( $permalink ); ?>' class="post-card group relative cursor-pointer">
  <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1  overflow-hidden  lg:aspect-none">
    <img class="object-cover" alt="<?php esc_attr_e( $featured_image["image_alt"] ); ?>" src="<?php esc_attr_e( $featured_image["image_src"][0] ); ?>" />
  </div>
  <hgroup class="mt-2 pl-6 relative">
    <h3 class="text-sm text-dark-grey uppercase mb-1 font-bold" ><?php echo $cat; ?></h3>
    <h4 class="text-2xl text-dark-blue leading-snug py-1 font-medium	"><?php printf( esc_html__( '%s', 'as_demo' ), $title); ?></h4>
    <h5 class="line-clamp-3 text-dark-grey"><?php printf( esc_html__( '%s', 'as_demo' ), $excerpt ); ?></h5>
    <div class="line-flare short-flare vertical-flare absolute "></div>
  </hgroup>
</a>
