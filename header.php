<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sunreef_Yachts
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'sunreef-yachts'); ?></a>

		<header id="masthead" class="site-header">
			<div class="site-branding text-center">
				<?php
				the_custom_logo();
				if (is_front_page() && is_home()) :
				?>
					<h1 class="site-title "><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php
				else :
				?>
					<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
				<?php
				endif;
				$sunreef_yachts_description = get_bloginfo('description', 'display');
				if ($sunreef_yachts_description || is_customize_preview()) :
				?>
					<p class="site-description"><?php echo $sunreef_yachts_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
												?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<button class="menu-toggle"></button>
			<nav>
				<!-- <div class="menu-toggle-wrapper"> -->
				<!-- <button class="menu-toggle" aria-controls="header-menu" aria-expanded="false"><i class="fas fa-bars"></i></button> -->
				<!-- </div> -->
				<!-- <div class="menu-content"> -->
				<?php
				wp_nav_menu(array(
					'theme_location' => 'header-menu',
					'menu_id' => 'header-menu',
					'container' => false,
					'depth' => 0,
					'fallback_cb' => false,
					'menu_class' => 'menu',
				));
				?>
				<!-- </div> -->
			</nav>



		</header><!-- #masthead -->