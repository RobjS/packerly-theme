<div class="question" id="q3">
	<h3>How active are you planning on being?</h3>

	<?php
	$activities = get_terms('activitylevel','hide_empty=0');
	foreach ($activities as $activity) {
		echo '<div class="checkbox">';
		echo '<input type="radio" name="' . $activity->taxonomy . '" value="' . $activity->term_id . '" id="' . $activity->slug . '">';
		echo '<label for="' . $activity->slug . '">' . $activity->description . '</label>';
		echo '</div>';
	}
	?>
	<button type="button" class="next btn btn-default">Next</button>
</div>