<div class="question" id="q1">
	<h3>Who will you be packing for?</h3>
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
	<button type="button" class="next btn btn-default">Next</button>
	</div>
</div>