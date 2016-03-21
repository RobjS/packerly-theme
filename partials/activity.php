<div class="question" id="q3">
	<div class="progress">
	  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
		<span class="sr-only">75% Complete</span>
	  </div>
	</div>
	<div class="alert alert-danger" role="alert">
	<p></p>
	</div>
	<h1>How active are you planning on being?</h1>

	<?php
	$activities = get_terms('activitylevel','hide_empty=0');
	foreach ($activities as $activity) {
		echo '<div class="checkbox">';
		echo '<input type="radio" name="' . $activity->taxonomy . '" value="' . $activity->term_id . '" id="' . $activity->slug . '">';
		echo '<label for="' . $activity->slug . '">' . $activity->description . '</label>';
		echo '</div>';
	}
	?>
	<button type="button" class="prev btn btn-default btn-lg">Previous</button>
	<button type="button" class="next btn btn-default btn-lg">Next</button>
</div>