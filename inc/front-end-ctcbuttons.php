<div class="inside">
  <h3> This page is for the USTA Coordinator who can open/close declaration period. </h3>
  <hr>
  <form id="" method="post" action="">
    <input type="hidden" value="CH" name="updated_form_submitted"/>
    <label for="ctcleaguename"> Select the league: </label>
    <select class="form-control" name="ctcleaguename" id="ctcleaguename" >
     <?php
                           //displays the existing leagues and let it to change the status from open to close
     global $wpdb;

     $query = "SELECT * FROM " . $wpdb->prefix . "ctcbuttons";

     $teams = $wpdb->get_results($query);

     if ($teams) {
       foreach ($teams as $team) { 


        echo '<option value="Name: '. $team->ctcbuttonsleaguename . ' Id: ' . $team->id . '">' . $team->ctcbuttonsleaguename . '</option>';


      } 
    }

    ?>
    </select>
    <div class="checkbox" style="margin-top: 10px;">
      <label> Open declaration
        <input style="margin-top: -17px;" type="checkbox" name="status" value="true" aria-label="...">
      </label>
      <label> Close declaration
        <input style="margin-top: -17px;" type="checkbox" name="status" value="false" aria-label="...">
      </label>
    </div>	
    <p>
      <input class="btn btn-success" type="submit" name="updatectcbuttonsleague" value="Change" />
    </p>    
  </form>
  <hr>
</div>

<div class="inside">
  <h3> List of available leagues and their current status. </h3>
  <hr>
  <?php
         //displays the existing leagues and their current status
  global $wpdb;

  $query = "SELECT * FROM " . $wpdb->prefix . "ctcbuttons";

  $teams = $wpdb->get_results($query);

  if ($teams) {
   foreach ($teams as $team) { 

    echo '<p> Name: '. $team->ctcbuttonsleaguename . '</p>';
    if ($team->ctcbuttonsstatus == "false") {
     echo '<p> Current status: <span style="color: red;">Closed</span> </p> <hr>';
   } else {
     echo '<p> Current status: <span style="color: red;">Open</span> </p> <hr>';
   }

 } 
}

?>
</div>