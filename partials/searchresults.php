<?php
	if(isset($_POST['get_items'])){
		$genderValues = ($_POST['gender']);	
		$minTemp = ($_POST['mintemp']);
		$maxTemp = ($_POST['maxtemp']);
		$precipitationValues = ($_POST['precipitation']);
		$activityValue = ($_POST['activitylevel']);
		$budgetValue = ($_POST['budget']);
    

		
		if($precipitationValues) {
			$args = array(
				'post_type' => 'clothing',
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'gender',
						'terms' => $genderValues
					),
					array(
						'taxonomy' => 'precipitation',
						'terms' => $precipitationValues
					),
					array(
						'taxonomy' => 'activitylevel',
						'terms' => $activityValue
					),
					array(
						'taxonomy' => 'budget',
						'terms' => $budgetValue
					),
				),
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
		}
		else {
			$args = array(
				'post_type' => 'clothing',
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'gender',
						'terms' => $genderValues
					),
					array(
						'taxonomy' => 'activitylevel',
						'terms' => $activityValue
					),
					array(
						'taxonomy' => 'budget',
						'terms' => $budgetValue
					),
				),
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
		}
		echo '<h3>Clothing</h3>';
		echo '<div class="list-group">';
		$packerlyQuery = new WP_Query($args);
		while ( $packerlyQuery->have_posts() ) {
			$packerlyQuery->the_post();
			echo '<div class="list-group-item"><h4 class="list-group-item-heading">' . get_the_title( $packerlyQuery->post->ID ) . '</h4>';
			echo '<p class="list-group-item-text">' . get_the_content() . '</p></div>';
		}
		echo '</div>';
	
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