<div class="question" id="q2">
	<h3>Where you're going, what will the temperature be like?</h3>
	
	Temperature range: <b>-30</b> <input id="tempRange" type="text" class="span2" value="" data-slider-min="-30" data-slider-max="50" data-slider-step="1" data-slider-value="[0,30]"/> <b>50</b>
	<div class="form-group">
		
		<label for="mintemp">Min temp</label><input class="form-control" type="number" id="mintemp" name="mintemp"/>
		<label for="maxtemp">Max temp</label><input class="form-control" type="number" id="maxtemp" name="maxtemp"/>
	</div>
	<h3>And are you expecting much...</h3>

	<?php
	//Make this into a range slider, with hidden input fields that the slider writes values to.
	$precips = get_terms('precipitation','hide_empty=0');
	?>
	
	<div class="form-group">
			
			<?php
			foreach ($precips as $precip) {
				echo '<div class="checkbox">';
				echo '<label><input type="checkbox" name="' . $precip->taxonomy . '[]" value="' . $precip->term_id . '" id="' . $precip->slug . '">';
				echo $precip->name . '</label>';
				echo '</div>';
			}
			?>

	</div>
	<button type="button" class="next btn btn-default">Next</button>
</div>