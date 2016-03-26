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



	
<div id="primary" class="content-area">
	<div class="container">
	

		<main id="main" class="site-main" role="main">
			<?php if(isset($_POST['get_items'])){ 			
				get_template_part('partials/searchresultspackily');	
			}
			else {
				wp_redirect( home_url() );
				exit; 
			}
			?>
			
		</main><!-- #main -->
	</div><!-- .container -->
</div><!-- #primary -->
<?php

get_footer();
