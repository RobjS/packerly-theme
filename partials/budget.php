<div class="question" id="q4">
	<h3>And finally, what kind of a budget are you on?</h3>

	<?php
	$budgets = get_terms('budget','hide_empty=0');
	foreach ($budgets as $budget) {
		echo '<div class="checkbox">';
		echo '<input type="radio" name="' . $budget->taxonomy . '[]" value="' . $budget->term_id . '" id="' . $budget->slug . '">';
		echo '<label for="' . $budget->slug . '">' . $budget->description . '</label>';
		echo '</div>';
	}
	?>
	<input type="submit" name="get_items" value="Pack me" class="btn btn-primary btn-lg next"/>
</div>