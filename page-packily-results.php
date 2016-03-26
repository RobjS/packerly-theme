<?php
/**
 * Main page template for packily results
 *
 * Redirects to the search query page if no parameters provided
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package packerly-theme
 */
 
 			if(!isset($_POST['get_items'])){ 			

				wp_redirect( site_url('packily-search') );
				exit; 
			}

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
