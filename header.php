<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package packerly-theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'packerly-theme' ); ?></a>

		<div class="container-fluid">
			<div class="page-header">
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<small class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></small>
				<?php
				endif; ?>
				</h1>
			</div><!-- .page-header -->

			<nav id="site-navigation" class="navbar navbar-default" role="navigation">
				<button type="button" class="navbar-toggle collapsed" aria-controls="primary-menu" aria-expanded="false" data-target="#primary-menu">
				   <span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class'=>'nav navbar-nav', 'container_id'=>'primary-menu', 'container_class' => 'collapse navbar-collapse' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>


	<div id="content" class="site-content container">
