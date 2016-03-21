<h1>Here's what you'll want...</h1>
<?php
	if(isset($_POST['get_items'])){
		$genderValues = ($_POST['gender']);	
		$minTemp = ($_POST['mintemp']);
		$maxTemp = ($_POST['maxtemp']);
		$precipitationValues = ($_POST['precipitation']);
		$activityValue = ($_POST['activitylevel']);
		$budgetValue = ($_POST['budget']);
    

		//Set up the main gender, activity and budget taxonomy values
		$main_tax_args = array(
							array(
								'taxonomy' => 'gender',
								'terms' => $genderValues,
							),					
							array(
								'taxonomy' => 'activitylevel',
								'terms' => $activityValue,
							),
							array(
								'taxonomy' => 'budget',
								'terms' => $budgetValue,
							),
						);
						
		//Create the main tax query which runs regardless of precipitation level
		$tax_query = array(
						'relation' => 'OR',
						array(
							'relation' => 'AND',
							$main_tax_args[0],
							$main_tax_args[1],
							$main_tax_args[2],
							array(
								'taxonomy' => 'precipitation',
								'field'    => 'slug',
								'terms'    => array('rain', 'snow'),
								'operator' => 'NOT IN',
							),
						)
					);
		/*If have precipitation level set, add an extra tax query*/
		if($precipitationValues) {
			$tax_query[] = array(
								'relation' => 'AND',
								$main_tax_args[0],
								$main_tax_args[1],
								$main_tax_args[2],
								array(
									'taxonomy' => 'precipitation',
									'terms' => $precipitationValues,
								),								
						);
		}

		//Build the final query
		$args = array(
			'post_type' => 'clothing',
			'tax_query' => $tax_query,
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'meta_key' => 'maxtemp',
					'type' => 'NUMERIC',
					'value' => array($minTemp, $maxTemp),
					'compare' => 'BETWEEN',
				),
				array(
					'meta_key' => 'mintemp',
					'type' => 'NUMERIC',
					'value' => array($minTemp, $maxTemp),
					'compare' => 'BETWEEN',
				),
			),
		);
?>
<div class="row">
	<div class="col-md-4">
		<img class="center-block" src="<?php bloginfo('template_url'); ?>/img/icons/large-suitcase.png" />
		<h3>Clothing</h3>
		<div class="list-group">
			<?php
			$packerlyQuery = new WP_Query($args);
			while ( $packerlyQuery->have_posts() ) {
				$packerlyQuery->the_post();
				echo '<div class="list-group-item"><h4 class="list-group-item-heading">' . get_the_title( $packerlyQuery->post->ID ) . '</h4>';
				echo '<p class="list-group-item-text">' . get_the_content() . '</p></div>';
			}
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
