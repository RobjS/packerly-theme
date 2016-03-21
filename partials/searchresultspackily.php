<h1>Here's what you'll want...</h1>
	
<div class="row">
	<div class="col-md-4">
		<img class="center-block" src="<?php bloginfo('template_url'); ?>/img/icons/large-suitcase.png" />
		<h3>Clothing</h3>
		<div class="list-group">
			<?php
			$packilyClothingSearch = new Packily_Search_Constructor('clothing');
			//print_r($packilyClothingArgs);
			$packilyClothingQuery = new WP_Query($packilyClothingSearch->queryArgs);
			while ( $packilyClothingQuery->have_posts() ) {
				$packilyClothingQuery->the_post();
				echo '<div class="list-group-item"><h4 class="list-group-item-heading">' . get_the_title( $packilyClothingQuery->post->ID ) . '</h4>';
				echo '<p class="list-group-item-text">' . get_the_content() . '</p></div>';
			}
			//echo $GLOBALS['wp_query']->request; 
			?>
		</div><!-- .list-group -->
	</div><!-- col-md-4 -->
	<div class="col-md-4">
		<img class="center-block" src="<?php bloginfo('template_url'); ?>/img/icons/toiletries.png" />
		<h3>Toiletries</h3>
	</div><!-- col-md-4 -->
	<div class="col-md-4">
		<img class="center-block" src="<?php bloginfo('template_url'); ?>/img/icons/phone.png" />
		<h3>Electrical</h3>
	</div><!-- col-md-4 -->
</div><!-- .row -->
<?php
	if(isset($_POST['get_items'])){
		$genderValues = ($_POST['gender']);	
		$minTemp = ($_POST['mintemp']);
		$maxTemp = ($_POST['maxtemp']);
		$precipitationValues = ($_POST['precipitation']);
		$activityValue = ($_POST['activitylevel']);
		$budgetValue = ($_POST['budget']);
		//echo out values for test
		if($genderValues) {
			foreach ($genderValues as $value) {
				echo '<p>Gender:' . $value . '</p>';
			}
		}
		//if($minTemp) {
			echo '<p>Min temp:' . $minTemp . '</p>';
		//}
		if($maxTemp) {
			echo '<p>Max temp:' . $maxTemp . '</p>';
		}
		if($precipitationValues) {
			foreach ($precipitationValues as $value) {
				echo '<p>Climate:' . $value . '</p>';
			}
		}
		if($activityValue) {
			echo '<p>Activity:' . $value . '</p>';
		}
		if($budgetValue) {
			echo '<p>Budget:' . $value . '</p>';
		}
	}
?>
