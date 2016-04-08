<h2><?php _e( 'Here you can set the status of declare intent buttons', 'wp_admin_style' ); ?></h2>

<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h1><?php esc_attr_e( 'Leagues', 'wp_admin_style' ); ?></h1>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h2><span><?php esc_attr_e( 'Change the status of a league below', 'wp_admin_style' ); ?></span></h2>

						<div class="inside">
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
     							  <div class="checkbox">
	                                    <label> Open declaration
	                                    <input type="checkbox" name="status" value="true" aria-label="...">
	                                    </label>
	                                    <label> Close declaration
	                                    <input type="checkbox" name="status" value="false" aria-label="...">
	                                    </label>
	                              </div>	
                                  <p>
                                       <input class="button-primary" type="submit" name="updatectcbuttonsleague" value="Change" />
                                  </p>    
                                  </form>
                                  <hr>
						</div>
						<!-- .inside -->
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
     										echo '<p> Current status: <span class="redcolor">Closed</span> </p> <hr>';
     									} else {
     										echo '<p> Current status: <span class="redcolor">Open</span> </p> <hr>';
     									}

     								} 
     							}

     						?>
					    </div>		

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">

						<h2><span><?php esc_attr_e(
									'Just for an Admin', 'wp_admin_style'
								); ?></span></h2>

						<div class="inside">
						
							<p>Add a new league </p>
							<form id="Addleague" method="post" action="">
                           	<input type="text" value="" name="ctcbuttons_leaguename" id="ctcbuttons_leaguename" /><br>
                            <input type="hidden" value="false" name="status"/><br>
                            <input type="hidden" value="Y" name="Addleague_form_submitted"/><br>
                            <p> Please do not submit same league twice </p>
                           <p>	
                               <input class="button-primary" type="submit" name="Addleague_submit" value="Submit" />
                           </p>    
                           </form>		
	
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->