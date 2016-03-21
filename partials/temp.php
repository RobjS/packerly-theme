<div class="question" id="q2">
	<div class="progress">
	  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
		<span class="sr-only">50% Complete</span>
	  </div>
	</div>
	<h1>Where you're going, what will the temperature be like?</h1>
	<div class="row">
		<div class="col-md-4">
			<p>Drag to select a temperature range:</p>
			<b>-30&#8451;</b> <input id="tempRange" type="text" class="span2" value="" data-slider-min="-30" data-slider-max="50" data-slider-step="1" data-slider-value="[0,30]"/> <b>50&#8451;</b>
		</div>
		<div class="col-md-6">
			<p>Or enter the min and max temperatures you're expecting:</p>
			<div class="form-group">
				
				<label for="mintemp">Min temp (&#8451;)</label><input class="form-control" type="number" id="mintemp" name="mintemp"/>
				<label for="maxtemp">Max temp (&#8451;)</label><input class="form-control" type="number" id="maxtemp" name="maxtemp"/>
			</div>
		</div>
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

	<button type="button" class="prev btn btn-default btn-lg">Previous</button>
	<button type="button" class="next btn btn-default btn-lg">Next</button>
</div>