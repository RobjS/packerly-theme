<div class="question current" id="q1">
	<div class="progress">
	  <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
		<span class="sr-only">25% Complete</span>
	  </div>
	</div>
	<div class="alert alert-danger" role="alert">
	<p></p>
	</div>
	<h1>First of all, who will you be packing for?</h1>
	<div class="form-group">
	<?php
	$genders = get_terms('gender');
	foreach ($genders as $gender) {
		echo '<div class="checkbox">';
		echo '<label><input type="checkbox" name="' . $gender->taxonomy . '[]" value="' . $gender->term_id . '" id="' . $gender->slug . '">';
		echo $gender->name . '</label>';
		echo '</div>';
	}
	?>
	
	<button type="button" class="next btn btn-default btn-lg">Next</button>
	</div>
</div>