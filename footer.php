<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package as_demo
 */

?>

	<footer id="colophon" class="site-footer flex-shrink-0 bg-dark-blue border-t-4 border-gold text-white pt-8 md:pt-14 pb-6">
		<div class="relative">
			<nav id="footer-nav" class="flex md:justify-between  wd-container justify-center md:flex-nowrap flex-wrap ">
				<div class="site-branding hidden md:block text-center ">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php  echo file_get_contents( get_stylesheet_directory_uri() . '/assets/logo-norr.svg'); ?></a>
				</div>
				<div class="right-footer-nav flex justify-center md:justify-end flex-wrap md:w-auto w-full">
					<ul class="sm-nav w-full  justify-center md:justify-end  flex z-10">
						<?php 
							$f_icon_paths = array(
								'facebook',
								'instagram',
								'twitter',
								'youtube',
								'linkedin',
							);
							foreach ( $f_icon_paths as $social )
							{
								?>
								<li class="h-7	w-7 ml-2.5"><a href="<?php echo '#' . $social; ?>"><?php echo file_get_contents( get_template_directory_uri() . '/assets/icon-' . $social . '.svg' ); ?></a></li>
							<?php
							}
						?>
					</ul>
					<ul class="flex pt-4 pb-4 md:pb-8 z-10  ">
						<?php $footer_nav_items = array(
							'Contact',
							'In the News',
							'Terms of Use',
							'Accessibility',
							'Privacy'
						);
						$i = 1;
						foreach ( $footer_nav_items as $n_item )
						{
							$url = str_replace(' ', '-', $n_item);
							?>
							<li class="text-sm ">
								<a class="" href="<?php echo $url; ?>">
								<?php echo $n_item; ?>
								</a>
								<?php
								if ($i < count($footer_nav_items)) 
								{
									?>			
									<span class="sep mx-2.5 text-blue-grey"> | </span>
									<?php
								}
								?>
							</li>
							<?php
						
							$i++;
						}
						?>
					</ul>
				</div>
				
			</nav>
			<div class="absolute giant-logo w-full bottom-0 site-branding">
				<?php  echo file_get_contents( get_stylesheet_directory_uri() . '/assets/logo-norr.svg'); ?>
			</div>
		</div>
		<div class="site-info text-center md:text-right text-xxs mt-3 md:mt-5 wd-container ">
				<span> &#169; NORR 2021<span class="sep mx-2.5 text-blue-grey"> | </span>Website by <a href="https://artscience.ca/" target="_blank" rel="noopener noreferrer">Art & Science</span>
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
