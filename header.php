<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package as_demo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="description" content="Welcome to the Art & Science demo site by Christopher Rock">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="profile" href="https://gmpg.org/xfn/11">


	<style>
		@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
	</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class('min-h-full font-sans'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site min-h-screen flex flex-col">
	<a class="dark-blue text-white btn chevron-right skip-link screen-reader-text" href="#primary"><span><?php esc_html_e( 'Skip to content', 'as_demo' ); ?></span></a>
	<header id="masthead" class="site-header wd-container pb-1.5  bg-white ">
		<nav id="topbar" class="flex justify-end text-xs pt-1.5 items-center hidden md:flex text-dark-grey">
			<a href="#"  class="flex items-center search-icon	">
				<span>
					<?php echo file_get_contents(get_template_directory_uri() . '/assets/icon-search.svg'); ?>
				</span>
				<span class='pl-0.5'>
					<?php echo __('Search'); ?>
				</span>
			</a>
			<div class="separator"></div>
			<a href="#" class="pl-2.5"><?php echo __('Login'); ?></a>
			<div class="separator"></div>
			<a href="#" class="pl-2.5 "><?php echo __('Covid-19 Info'); ?></a>
		</nav>
		<div id="main-nav" class="flex justify-between items-baseline mt-1">
			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php  echo file_get_contents( get_stylesheet_directory_uri() . '/assets/logo-norr.svg'); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php  echo file_get_contents( get_stylesheet_directory_uri() . '/assets/logo-norr.svg'); ?></a></p>
					<?php
				endif;
			?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation text-sm hidden md:block text-dark-blue">
				<?php
				wp_nav_menu(
					array(
						'container' => 'ul',
					  'menu_class' => 'flex',
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
