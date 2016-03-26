<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package packerly-theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="container">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Sorry, looks like we\'ve got a bit lost!', 'packerly-theme' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<div class="row">
					<div class="col-md-2">
						<img src="<?php bloginfo('template_url'); ?>/img/icons/signs.png"/>
					</div>
					<div class="col-md-8">
						<p><?php esc_html_e( 'Try going back to the homepage and making your way from there.', 'packerly-theme' ); ?></p>
						<p><a href="<?php echo esc_url( home_url( '/' ));?>">Take me back home.</a></p>
					</div>
					</div>
					
					

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
		</div><!-- . container -->
	</div><!-- #primary -->

<?php
get_footer();
