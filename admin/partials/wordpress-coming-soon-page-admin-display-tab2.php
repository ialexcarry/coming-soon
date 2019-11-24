<div id="tab-2" class="wcsp_vm_wrapper">

	<?php
	$count = 1;
	foreach ( $mwb_wcsp_images as $key => $val ) {
		?>
		<?php
		$activate = get_option( 'wcsp_enable_imgurl', false );
		?>
  <div class="wcsp_vm_gallery wcsp_vm_first">

	<div class="wcsp_vm_content-wrap ">
	  <figure class="wcsp_image-content">
		<div   class="wcsp_vm-image-wrap 
		<?php
		if ( $activate == $val ) {
			echo 'wcsp_border';}
		?>
		">
		  <img src="<?php echo WCSP_dir_url . 'admin/template/' . $val; ?>.jpeg" alt="" class="wcsp_vm_gallery-img">
		  <div class="wcsp_vm_overlay">
		  <h1 style="padding-left:120px;padding-top:10px;color:white;" ><?php _e( 'Template', 'wordpress-coming-soon-page' ); ?>
																				  <?php
																					echo $count;
																					$count++;
																					?>
			</h1>
			<button type="button" name="image"  id="image<?php echo $val; ?>" data="<?php echo $val; ?>" class="btn wcsp_vm_btn"><?php
														if ( $activate == $val ) {
															echo _e( 'Activated', 'wordpress-coming-soon-page' );
														} else {
															echo _e( 'Activate', 'wordpress-coming-soon-page' );
														}
														?></button>
			<!-- <input  name="image"  id="image<?php echo $val; ?>" data="<?php echo $val; ?>" class="btn wcsp_vm_btn" value="
													  
				  " type="button"> -->
		  </div>
		</div>
	  </figure>
	</div>
  </div>
		<?php
	}
	?>
</div>
