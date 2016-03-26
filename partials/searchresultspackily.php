<header class="page-header">
	<h1 class="page-title">Here's your list...</h1>
</header>

<div class="alert alert-info">
	<p>You can add or remove as many items as you like.</p>
	<p>Once you're done, you can email the list to yourself, or print it off.</p>
</div>

<div class="row">
	<div class="col-md-4">
		<img class="center-block" src="<?php bloginfo('template_url'); ?>/img/icons/large-suitcase.png" />
		<h3>Clothing</h3>
				
		<div id="clothing" class="btn-group" role="group" aria-label="Clothing edit functions">
			<button type="button" class="btn btn-info add-button" aria-label="Add a clothing item">
			  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</button>
		</div>

		<ul id="clothing-items" class="list-group clothing packily-list-group">
			<?php
			$packilyClothingSearch = new Packily_Search_Constructor('clothing');
			//print_r($packilyClothingArgs);
			$packilyClothingQuery = new WP_Query($packilyClothingSearch->queryArgs);
			while ( $packilyClothingQuery->have_posts() ) {
				$packilyClothingQuery->the_post();
				echo '<li class="list-group-item packilyItem">' . get_the_title( $packilyClothingQuery->post->ID );
				echo '<button type="button" class="btn btn-default remove-item">';
				echo '<span class="glyphicon glyphicon-remove"></span>';
				echo '</button></li>';
			}
			?>
		</ul><!-- .list-group -->
	</div><!-- col-md-4 -->
	<div class="col-md-4">
		<img class="center-block" src="<?php bloginfo('template_url'); ?>/img/icons/toiletries.png" />

		<h3>Toiletries</h3>

		<div id="toiletry" class="btn-group" role="group" aria-label="Toiletries edit functions">
			<button type="button" class="btn btn-info" aria-label="Add an item">
			  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</button>
		</div>
		
		<ul id="toiletry-items" class="list-group toiletry packily-list-group">
			<?php
			$packilyToiletrySearch = new Packily_Search_Constructor('toiletry');
			//print_r($packilyClothingArgs);
			$packilyToiletryQuery = new WP_Query($packilyToiletrySearch->queryArgs);
			while ( $packilyToiletryQuery->have_posts() ) {
				$packilyToiletryQuery->the_post();
				echo '<li class="list-group-item packilyItem">' . get_the_title( $packilyToiletryQuery->post->ID );
				echo '<button type="button" class="btn btn-default remove-item">';
				echo '<span class="glyphicon glyphicon-remove"></span>';
				echo '</button></li>';
			}
			?>
		</ul><!-- .list-group -->
	</div><!-- col-md-4 -->
	
	<div class="col-md-4">
		<img class="center-block" src="<?php bloginfo('template_url'); ?>/img/icons/phone.png" />
		<h3>Electrical</h3>
		
		<div id="electrical" class="btn-group" role="group" aria-label="Electricals edit functions">
			<button type="button" class="btn btn-info" aria-label="Add an item">
			  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</button>
		</div>
		
		<ul id="electrical-items" class="list-group electrical packily-list-group">
			<?php
			$packilyElectricalSearch = new Packily_Search_Constructor('electrical');
			$packilyElectricalQuery = new WP_Query($packilyElectricalSearch->queryArgs);
			while ( $packilyElectricalQuery->have_posts() ) {
				$packilyElectricalQuery->the_post();
				echo '<li class="list-group-item packilyItem">' . get_the_title( $packilyElectricalQuery->post->ID );
				echo '<button type="button" class="btn btn-default remove-item">';
				echo '<span class="glyphicon glyphicon-remove"></span>';
				echo '</button></li>';
			}
			?>
		</ul><!-- .list-group -->
	</div><!-- col-md-4 -->
</div><!-- .row -->

<div class="row">
	<div class="col-md-4">
		<img class="center-block" src="<?php bloginfo('template_url'); ?>/img/icons/map.png" />
		<h3>Accessories</h3>
		<div id="accessory" class="btn-group" role="group" aria-label="Accessories edit functions">
			<button type="button" class="btn btn-info" aria-label="Add an item">
			  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</button>
		</div>
		
		<ul id="accessory-items" class="list-group accessory packily-list-group">
			<?php
			$packilyAccessorySearch = new Packily_Search_Constructor('accessory');
			$packilyAccessoryQuery = new WP_Query($packilyAccessorySearch->queryArgs);
			while ( $packilyAccessoryQuery->have_posts() ) {
				$packilyAccessoryQuery->the_post();
				echo '<li class="list-group-item packilyItem">' . get_the_title( $packilyAccessoryQuery->post->ID );
				echo '<button type="button" class="btn btn-default remove-item">';
				echo '<span class="glyphicon glyphicon-remove"></span>';
				echo '</button></li>';
			}
			?>
		</ul><!-- .list-group -->	
	</div><!-- .col-md-4-->
	
	<div class="col-md-4">
		<img class="center-block" src="<?php bloginfo('template_url'); ?>/img/icons/tickets.png" />
		<h3>Papers</h3>
		
		<div id="paper" class="btn-group" role="group" aria-label="Papers edit functions">
			<button type="button" class="btn btn-info" aria-label="Add an item">
			  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</button>
		</div>
		
		<ul id="paper-items" class="list-group paper packily-list-group">
			<?php
			$packilyPaperSearch = new Packily_Search_Constructor('paper');
			$packilyPaperQuery = new WP_Query($packilyPaperSearch->queryArgs);
			while ( $packilyPaperQuery->have_posts() ) {
				$packilyPaperQuery->the_post();
				echo '<li class="list-group-item packilyItem">' . get_the_title( $packilyPaperQuery->post->ID );
				echo '<button type="button" class="btn btn-default remove-item">';
				echo '<span class="glyphicon glyphicon-remove"></span>';
				echo '</button></li>';
			}
			?>
		</ul><!-- .list-group -->	
		
	</div><!-- .col-md-4-->
</div><!-- .row -->

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Email me my list
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Email this list to me</h4>
			</div>
			<form id="packilyEmailForm" action=<?php echo site_url('packily-email'); ?> method="post">
				<div class="modal-body">	
					<div class="alert alert-danger"></div>
					<input type="hidden" name="clothing-items"/>
					<input type="hidden" name="toiletry-items"/>
					<input type="hidden" name="electrical-items"/>
					<input type="hidden" name="accessory-items"/>
					<input type="hidden" name="paper-items"/>	
					<input type="hidden" name="empty-validation"/>
					<div class="form-group">
						<label for="emailAddress1">Email address</label>
						<input type="email" class="form-control" id="emailAddress1" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="emailAddress1">Confirm email address</label>
						<input type="email" class="form-control" id="emailAddress2" placeholder="Confirm Email">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="sendPackilyEmail" type="button" class="btn btn-primary">Send email</button>
				</div>
			</form>
		</div>
	</div>
</div>



<a href="#" class="convertAllToArrays">Convert all lists to arrays</a>
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
