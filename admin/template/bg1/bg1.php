 <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
 <!--    font-awesome -->
  <link rel="stylesheet" type="text/css" href="<?php echo WCSP_dir_url . 'admin/template/bg1/assets/css/bg1.css'; ?>">
</head>
<body>
<?php $wcsp_css = get_option( 'wcsp_css', false ); ?>
<style type="text/css"><?php echo $wcsp_css; ?></style>

<!--=========================================
=            coming-soon-section            =
==========================================-->

	   <div class="wcsp_flashlight__wrapper">
		<!-- flashlight -->
		  <div class="wcsp_flashlight">
			  <div class="wcsp_wire"></div>
			  <div class="wcsp_outer_cover"></div>
			  <div class="wcsp_inner-cover">
				   <div class="wcsp_bulb"></div>
			  </div>
			  <div class="wcsp_flash"></div>
			  </div>
		</div>
		<!-- END Flashlight -->
	   <!--=========================================
	   =            Coming Soon comment            =
	   ==========================================-->
	   
		<?php
		$wcsp_wcsp_site_heading = get_option( 'wcsp_heading', false );
		$wcsp_wcsp_site_image = get_option( 'wcsp_site_image', false );
		$wcsp_wcsp_site_description = get_option( 'wcsp_site_description', false );
		$wcsp_wcsp_site_enable_timer = get_option( 'wcsp_site_enable_timer', false );
		$wcsp_wcsp_site_enable_image = get_option( 'wcsp_site_image_enable', false );
		$wcsp_wcsp_site_timer = get_option( 'wcsp_site_timer', false );
		?>
	   <div id="wcsp-wrapper">
		<div class="wcsp-section">
		<div class="wcsp_header">
		<?php if ( $wcsp_wcsp_site_enable_image == 'on' ) { ?>
		<img  class="wcsp_picture" src="<?php echo $wcsp_wcsp_site_image; ?>" class="wcsp_picture"/>
		<?php } ?>
		<input  id="wcsp_hidden_field"type="hidden" value="<?php echo $wcsp_wcsp_site_timer; ?>"></input>
			  <h2 class="wcsp_heading_first"><?php echo $wcsp_wcsp_site_heading; ?></h2>
			  </div>
			   <div class="wcsp_content_wrapper">
				   <div class="wcsp_content_section">
					   <p class="wcsp_first_para"><?php echo do_shortcode( $wcsp_wcsp_site_description ); ?></p>
					<?php
					if ( $wcsp_wcsp_site_enable_timer == 'on' ) {
						?>
					<div id="wcsp-clockdiv">
						  <div>
							<span id='wcsp-days'class="wcsp-days">1</span>
							<div class="wcsp-smalltext">Days</div>
						  </div>
						  <div>
							<span id="wcsp-hours" class="wcsp-hours">2</span>
							<div class="wcsp-smalltext">Hours</div>
						  </div>
						  <div>
							<span id="wcsp-minutes" class="wcsp-minutes">3</span>
							<div class="wcsp-smalltext">Minutes</div>
						  </div>
						  <div>
							<span  id="wcsp-seconds" class="wcsp-seconds">6</span>
							<div class="wcsp-smalltext">Seconds</div>
						  </div>
					</div> 
					<?php } ?>
				   </div>
			   </div>
		</div>
	</div>
	   <!--====  End of Coming Soon Section comment  ====-->
<script src="<?php echo WCSP_dir_url . 'admin/template/bg1/assets/js/timer.js'; ?>" type="text/javascript"></script>
</body>
</html>
