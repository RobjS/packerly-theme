<div class="question" id="q4">
	<div class="progress">
	  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
		<span class="sr-only">100% Complete</span>
	  </div>
	</div>
	<div class="alert alert-danger" role="alert">
		<p></p>
	</div>
	<h1>And finally, what kind of a budget are you on?</h1>

	<?php
	$budgets = get_terms('budget','hide_empty=0');
	foreach ($budgets as $budget) {
		echo '<div class="checkbox">';
		echo '<input type="radio" name="' . $budget->taxonomy . '[]" value="' . $budget->term_id . '" id="' . $budget->slug . '">';
		echo '<label for="' . $budget->slug . '">' . $budget->description . '</label>';
		echo '</div>';
	}
	?>
	<button type="button" class="prev btn btn-default btn-lg">Previous</button>
	<input type="submit" name="get_items" value="Pack me" class="btn btn-primary btn-lg next"/>
</div>