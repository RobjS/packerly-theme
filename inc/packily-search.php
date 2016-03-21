<?php
/*
*
* Functions to generate core packily searches and results
*
*/

class Packily_Search_Constructor {
	
	public $genderValues;
	public $minTemp;
	public $maxTemp;
	public $precipitationValues;
	public $activityValue;
	public $budgetvalue;
	public $postType;
	public $queryArgs;
	
	public function __construct($postType) {
		if (!empty($postType)) {
			$this->postType = $postType;
			$this->packilyQuery();
		}
	}
	
	private function packilyQuery() {
		$this->getQueryValues();
		$this->constructQueryArgs();
		
	}
	
	private function getQueryValues() {
		if(isset($_POST['get_items'])){
			$this->genderValues = ($_POST['gender']);	
			$this->minTemp = ($_POST['mintemp']);
			$this->maxTemp = ($_POST['maxtemp']);
			$this->precipitationValues = ($_POST['precipitation']);
			$this->activityValue = ($_POST['activitylevel']);
			$this->budgetValue = ($_POST['budget']);
		}
	}
	
	private function constructQueryArgs() {
		//Set up the main gender, activity and budget taxonomy values
		$main_tax_args = array(
							array(
								'taxonomy' => 'gender',
								'terms' => $this->genderValues,
							),					
							array(
								'taxonomy' => 'activitylevel',
								'terms' => $this->activityValue,
							),
							array(
								'taxonomy' => 'budget',
								'terms' => $this->budgetValue,
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
		if($this->precipitationValues) {
			$tax_query[] = array(
								'relation' => 'AND',
								$main_tax_args[0],
								$main_tax_args[1],
								$main_tax_args[2],
								array(
									'taxonomy' => 'precipitation',
									'terms' => $this->precipitationValues,
								),								
						);
		}
		//Build the final query
		$this->queryArgs = array(
			'post_type' => $this->postType,
			'tax_query' => $tax_query,
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'meta_key' => 'maxtemp',
					'type' => 'NUMERIC',
					'value' => array($this->minTemp, $this->maxTemp),
					'compare' => 'BETWEEN',
				),
				array(
					'meta_key' => 'mintemp',
					'type' => 'NUMERIC',
					'value' => array($this->minTemp, $this->maxTemp),
					'compare' => 'BETWEEN',
				),
			),
		);
		
	}
	
}

?>