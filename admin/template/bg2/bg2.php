<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo WCSP_dir_url . 'admin/template/bg2/assets/css/bg2.css'; ?>">
</head>
<body>
	   <!--=========================================
	   =            Coming Soon comment            =
	   ==========================================-->
		<?php $wcsp_css = get_option( 'wcsp_css', false ); ?>
	   <style type="text/css"><?php echo $wcsp_css; ?></style>
		<?php
		$wcsp_wcsp_site_heading = get_option( 'wcsp_heading', false );
		$wcsp_wcsp_site_image        = get_option( 'wcsp_site_image', false );
		$wcsp_wcsp_site_description  = get_option( 'wcsp_site_description', false );
		$wcsp_wcsp_site_enable_timer = get_option( 'wcsp_site_enable_timer', false );
		$wcsp_wcsp_site_enable_image = get_option( 'wcsp_site_image_enable', false );
		$wcsp_wcsp_site_timer        = get_option( 'wcsp_site_timer', false );
		?>
	   <div id="wcsp-wrapper">
		   <div class="wcsp-section">
			   <div class="wcsp_content_section">
				<?php if ( $wcsp_wcsp_site_enable_image == 'on' ) { ?>
				   <img  class="wcsp_picture" src="<?php echo $wcsp_wcsp_site_image; ?>" />
				<?php } ?>
				   <h1 class="wcsp_heading1"><?php echo $wcsp_wcsp_site_heading; ?></h1>
				   <h3 class="wcsp_heading2"><?php _e( 'Stay tuned', 'wordpress-coming-soon-page' ); ?> for<span><?php _e( 'something amazing', 'wordpress-coming-soon-page' ); ?> </span></h3>
				<?php
				if ( $wcsp_wcsp_site_enable_timer == 'on' ) {
					?>
				   <div id="wcsp-clockdiv">
					   <div class="wcsp_coming_soon_circle">
						   <div class="wcsp_timing_content">
							   <span id="wcsp-days" class="wcsp-days">329</span>
							   <div class="wcsp-smalltext">Days</div>
						   </div>
					   </div>
					   <div class="wcsp_coming_soon_circle">
						   <div  class="wcsp_timing_content">
							   <span  id="wcsp-hours" class="wcsp-hours">2</span>
							   <div class="wcsp-smalltext">Hours</div>
						   </div>
					   </div>
					   <div class="wcsp_coming_soon_circle">
						   <div class="wcsp_timing_content">
							   <span id="wcsp-minutes" class="wcsp-minutes">12</span>
							   <div class="wcsp-smalltext">Minutes</div>
						   </div>
					   </div>
					   <div class="wcsp_coming_soon_circle">
						   <div class="wcsp_timing_content">
							   <span id="wcsp-seconds" class="wcsp-seconds">20</span>
							   <div class="wcsp-smalltext">Seconds</div>
						   </div>
					   </div>
				   </div> 
				<?php } ?>
				   <h3 class="wcsp_heading3"><?php echo do_shortcode( $wcsp_wcsp_site_description ); ?></h3>
	</div> 
	<input  id="wcsp_hidden_field"type="hidden" value="<?php echo $wcsp_wcsp_site_timer; ?>"></input>
</div>
</div>
<script src="<?php echo WCSP_dir_url . 'admin/template/bg2/assets/js/timer.js'; ?>" type="text/javascript"></script>
<!-- custom js link -->
</body>
</html>


