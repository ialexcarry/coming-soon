<div id="tab-1" style="margin-left: 20px;" class="wrapper">
		<table class="form-table">
			<form  method="post">
				<tbody>
				<?php
				$mwb_wcsp_site_heading = get_option( 'mwb_wcsp_heading', false );
				$mwb_wcsp_site_image = get_option( 'mwb_wcsp_site_image', false );
				$mwb_wcsp_site_enable_image = get_option( 'mwb_wcsp_site_image_enable', false );
				$mwb_wcsp_site_enable_timer = get_option( 'mwb_wcsp_site_enable_timer', false );
				$mwb_wcsp_enable = get_option( 'mwb_wcsp_enable', false );
				$checked = '';
				if ( $mwb_wcsp_enable == 'on' ) {
					$checked = 'checked';
				}
				$timer = '';
				if ( $mwb_wcsp_site_enable_timer == 'on' ) {
					$timer = 'checked';
				}
				$image = '';
				if ( $mwb_wcsp_site_enable_image == 'on' ) {
					$image = 'checked';
				}
				$mwb_wcsp_site_timer = get_option( 'mwb_wcsp_site_timer', false );
				?>
					<tr class="user-rich-editing-wrap">
						<th scope="row">
								<?php _e( 'Comming Soon', 'wordpress-coming-soon-page' ); ?>
						</th>
						<td>
						   <label  for="rich_editing"><input <?php echo $checked; ?> name="enable_plugin" id="rich_editing" type="checkbox"><?php _e( 'Enable', 'wordpress-coming-soon-page' ); ?></label>
						   <p class="description"><?php _e( 'By clicking enable button working will be enable.', 'wordpress-coming-soon-page' ); ?></p>
						</td>
					</tr>	
				<tr>
					<th scope="row">
					   <label for="blogname"><?php _e( 'Heading', 'wordpress-coming-soon-page' ); ?></label>
					</th>
					<td>
					   <input name="sitetitle" id="blogname" value="<?php echo $mwb_wcsp_site_heading; ?>" class="regular-text" type="text"><p class="description"><?php _e( 'Enter the heading of the site.', 'wordpress-coming-soon-page' ); ?></p>
					</td>
				</tr>
				<tr class="user-rich-editing-wrap">
						<th scope="row">
								<?php _e( 'Enable logo', 'wordpress-coming-soon-page' ); ?>
						</th>
						<td>
						   <label  for="rich_image"><input <?php echo $image; ?> name="enable_image" id="rich_image" type="checkbox"><?php _e( 'Enable', 'wordpress-coming-soon-page' ); ?></label>
						   <p class="description"><?php _e( 'By clicking enable button Image will show on your site.', 'wordpress-coming-soon-page' ); ?></p>
						</td>
					</tr>	
				<tr class="user-description-wrap">
					<th>
					   <label for="description"><?php _e( 'Logo Of the website', 'wordpress-coming-soon-page' ); ?> </label>
					</th>
					<td>
					<input type="text" name="image" id="image" value="<?php echo $mwb_wcsp_site_image; ?>"></input><input type="button" value="<?php _e( 'Browse', 'wordpress-coming-soon-page' ); ?>" id="upload"></input><div id="image_display" class="mwb_picture"></div>
					</td>
				</tr>

				<tr class="user-description-wrap">
					<th>
					   <label for="description"><?php _e( 'Content', 'wordpress-coming-soon-page' ); ?></label>
					</th>
					<td>
						<?php
						 $mwb_wcsp_site_description = get_option( 'mwb_wcsp_site_description', false );
						$content = $mwb_wcsp_site_description;
						$editor_id = 'description';
						$settings = array(
							'textarea_name' => 'description',
							'media_buttons' => false,
						);
						wp_editor( $content, $editor_id, $settings );
						?>
					</td>
				</tr>
				<tr>
				<tr class="user-rich-editing-wrap">
						<th scope="row">
								<?php _e( 'Enable Timer', 'wordpress-coming-soon-page' ); ?>
						</th>
						<td>
						   <label  for="rich_timing"><input <?php echo $timer; ?> name="enable_timer" id="rich_timing" type="checkbox"><?php _e( 'Enable', 'wordpress-coming-soon-page' ); ?></label>
						   <p class="description"><?php _e( 'By clicking enable button Timer will be enable.', 'wordpress-coming-soon-page' ); ?></p>
						</td>
					</tr>	
					<th scope="row">
					   <label for="blogname"><?php _e( 'Timer', 'wordpress-coming-soon-page' ); ?></label>
					</th>
					<td>
					   <input name="timer" id="timer" value="<?php echo $mwb_wcsp_site_timer; ?>" class="regular-text" type="text"><p class="description"><?php _e( 'Select the Timer.', 'wordpress-coming-soon-page' ); ?></p>
					</td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name='nonce' value="<?php echo wp_create_nonce( 'wcsp_form_string' ); ?>"></input>
						<input name="submit" id="submit" class="button button-primary" value="<?php _e( 'Save Settings', 'wordpress-coming-soon-page' ); ?>" type="submit">

					</td>
				</tr>
			</thbody>

		</table>


	 </form>
   </div>
