<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package packerly-theme
 */

get_header(); ?>

	<div class="container-fluid lead-banner">
		<div class="banner-text">
			<div class="row">
				<div class="col-md-4"></div>	
				<div class="col-md-4 text-center">
				<h1 class="highlight-light"><?php bloginfo( 'name' ); ?></h1>
				</div>
				<div class="col-md-4"></div>	
			</div>
			<div class="row">
				<div class="col-md-4"></div>	
				<div class="col-md-4 text-center">
				<p class="highlight-light subtitle">
				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<?php echo $description; /* WPCS: xss ok. */ ?>
				<?php
				endif; ?>
				</p>
				</div>
				<div class="col-md-4"></div>
			</div>		
		</div>
	</div>

	
<div id="primary" class="content-area">
	<div class="container">
	

		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			

			
		</main><!-- #main -->
	</div><!-- .container -->
</div><!-- #primary -->
<?php

get_footer();
