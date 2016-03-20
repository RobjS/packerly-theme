<?php
/**
 * The font page template file.
 *
 * This template will get used if for a static page you set as your homepage in the admin panel.
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
				<h1 class="highlight-light logo-font"><?php bloginfo( 'name' ); ?></h1>
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
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				

				<div class="entry-content">
					<div class="row frontpage-intro">
						<div class="col-md-4">
						<img class="center-block" src="<?php bloginfo('template_url'); ?>/img/icons/large-suitcase.png" />
						<header class="entry-header">
						<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
						</header><!-- .entry-header -->
						<?php
							the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'packerly-theme' ),
								'after'  => '</div>',
							) );
						?>
						
							
							
						</div>	

						
						<div class="col-md-4">
							<img class="center-block" src="<?php bloginfo('template_url'); ?>/img/icons/passport.png" />
							<?php
							$field_name="how_does_it_work";
							
							$field = get_field_object($field_name);
							
							echo "<h2>" . $field['label'] . "</h2>";
							
							echo $field['value'];
							?>

							
						</div>

					

						
						<div class="col-md-4">
							
							<img class="center-block" src="<?php bloginfo('template_url'); ?>/img/icons/take-off.png" />
							
							<?php
							$field_name="ready";
							
							$field = get_field_object($field_name);
							
							echo "<h2>" . $field['label'] . "</h2>";
							
							echo $field['value'];
							?>
							<p><a class="btn btn-primary btn-lg center-block" role="button" href="packerly-search">Get started</a></p>

							
						</div>
					</div><!-- .row -->
				
			<?php
			endwhile; // End of the loop.
			?>
			</div><!-- .entry-content -->
			</article>

			
		</main><!-- #main -->
	</div><!-- .container -->
</div><!-- #primary -->
<?php

get_footer();
