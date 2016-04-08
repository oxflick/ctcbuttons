
(These buttons will turn green while the Declaration period is open.)
<div class="intent">

	<?php
//checks which league is set to open or close ( true or false ) and displays the correct button
	global $wpdb;

	$query = "SELECT * FROM " . $wpdb->prefix . "ctcbuttons";

	$teams = $wpdb->get_results($query);

	if ($teams) {
		foreach ($teams as $team) { 

        //echo '<p>' . $team->ctcbuttonsleaguename . '</p>';
       // echo '<p>' . $team->ctcbuttonsstatus . '</p>';

			if ($team->ctcbuttonsleaguename == "Mix 55 and Combo" && $team->ctcbuttonsstatus == "false") {
				echo '<div class="col-md-4">
				<p class="btn btn-warning ustadeclare" data-container="body" data-toggle="popover" data-placement="top" data-content="Button will be available when declaration opens">Mixed 55 &amp; Combo</p>
				</div>';
			} elseif ($team->ctcbuttonsleaguename == "Mix 55 and Combo" && $team->ctcbuttonsstatus == "true") {
				echo '<div class="col-md-4">
				<a class="btn btn-success withtopadj" href="http://ctc.cupertinotennisclub.org/mixed55combo/">Mixed 55 &amp; Combo</a></div>';
			} elseif($team->ctcbuttonsleaguename == "Adult 65 league" && $team->ctcbuttonsstatus == "false") {
				echo '<div class="col-md-4">
				<p class="btn btn-warning ustadeclare" data-container="body" data-toggle="popover" data-placement="top" data-content="Button will be available when declaration opens">Adult 65 league</p>
				</div>';
			} elseif ($team->ctcbuttonsleaguename == "Adult 65 league" && $team->ctcbuttonsstatus == "true") {
				echo '<div class="col-md-4">
				<a class="btn btn-success withtopadj" href="http://ctc.cupertinotennisclub.org/adult65/">Adult 65 league</a></div>';
			} elseif ($team->ctcbuttonsleaguename == "Adult 70 league" && $team->ctcbuttonsstatus == "false") {
				echo '<div class="col-md-4">
				<p class="btn btn-warning ustadeclare" data-container="body" data-toggle="popover" data-placement="top" data-content="Button will be available when declaration opens">Adult 70 league</p>
				</div>';
			} elseif ($team->ctcbuttonsleaguename == "Adult 70 league" && $team->ctcbuttonsstatus == "true") {
				echo '<div class="col-md-4">
				<a class="btn btn-success withtopadj" href="http://ctc.cupertinotennisclub.org/adult70/">Adult 70 league</a></div>';
			} elseif ($team->ctcbuttonsleaguename == "Adult 55 and Mixed 18" && $team->ctcbuttonsstatus == "false") {
				echo '<div class="col-md-4">
				<p class="btn btn-warning ustadeclare" data-container="body" data-toggle="popover" data-placement="top" data-content="Button will be available when declaration opens">Mixed 18 &amp; Adult 55</p>
				</div>';
			} elseif ($team->ctcbuttonsleaguename == "Adult 55 and Mixed 18" && $team->ctcbuttonsstatus == "true") {
				echo '<div class="col-md-4">
				<a class="btn btn-success withtopadj" href="http://ctc.cupertinotennisclub.org/mixed18adult55/">Mixed 18 &amp; Adult 55</a></div>';
			} elseif ($team->ctcbuttonsleaguename == "Adult 40 and Mixed 40" && $team->ctcbuttonsstatus == "false") {
				echo '<div class="col-md-4">
				<p class="btn btn-warning ustadeclare" data-container="body" data-toggle="popover" data-placement="top" data-content="Button will be available when declaration opens">Adult 40 &amp; Mixed 40</p>
				</div>';
			} elseif ($team->ctcbuttonsleaguename == "Adult 40 and Mixed 40" && $team->ctcbuttonsstatus == "true") {
				echo '<div class="col-md-4">
				<a class="btn btn-success withtopadj" href="http://ctc.cupertinotennisclub.org/adult40mixed40/">Adult 40 &amp; Mixed 40</a></div>';
			} elseif ($team->ctcbuttonsleaguename == "Adult 18+ league" && $team->ctcbuttonsstatus == "false") {
				echo '<div class="col-md-4">
				<p class="btn btn-warning ustadeclare" data-container="body" data-toggle="popover" data-placement="top" data-content="Button will be available when declaration opens">Adult  18+ league</p>
				</div>';
			} elseif ($team->ctcbuttonsleaguename == "Adult 18+ league" && $team->ctcbuttonsstatus == "true") {
				echo '<div class="col-md-4">
				<a class="btn btn-success withtopadj" href="http://ctc.cupertinotennisclub.org/adult18/">Adult  18+ league</a>
				</div>';
			}



		} 
	}

	?>

</div>


