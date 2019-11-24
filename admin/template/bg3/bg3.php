<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
 <link rel="stylesheet" type="text/css" href="<?php echo WCSP_dir_url . 'admin/template/bg3/assets/css/bg3.css'; ?>">
</head>
<body>
<!--=========================================
=            coming-soon-section            =
==========================================-->
	<?php $wcsp_css = get_option( 'wcsp_css', false ); ?>
<style type="text/css"><?php echo $wcsp_css; ?></style>
		<?php
		$wcsp_wcsp_site_heading = get_option( 'wcsp_heading', false );
		$wcsp_wcsp_site_image = get_option( 'wcsp_site_image', false );
		$wcsp_wcsp_site_description = get_option( 'wcsp_site_description', false );
		$wcsp_wcsp_site_enable_timer = get_option( 'wcsp_site_enable_timer', false );
		$wcsp_wcsp_site_enable_image = get_option( 'wcsp_site_image_enable', false );
		$wcsp_wcsp_site_timer = get_option( 'wcsp_site_timer', false );
		?>
<body>
	<div id="wcsp-wrapper">
		<div class="wcsp-section">
		<div class="wcsp_header">
	<?php if ( $wcsp_wcsp_site_enable_image == 'on' ) { ?>
	<img  class="wcsp_picture" src="<?php echo $wcsp_wcsp_site_image; ?>" />
	<?php } ?>
		<h4 class="wcsp_first_heading"><?php echo $wcsp_wcsp_site_heading; ?></h4>
		<p class="wcsp_para"><?php echo do_shortcode( $wcsp_wcsp_site_description ); ?></p>
	<?php
	if ( $wcsp_wcsp_site_enable_timer == 'on' ) {
		?>
		<div id="wcsp-clockdiv">
		  <div>
			<span class="wcsp-days">01</span>
			<div class="wcsp-smalltext">Days</div>
		  </div>
		  <div>
			<span class="wcsp-hours">22</span>
			<div class="wcsp-smalltext">Hours</div>
		  </div>
		  <div>
			<span class="wcsp-minutes">12</span>
			<div class="wcsp-smalltext">Minutes</div>
		  </div>
		  <div>
			<span class="wcsp-seconds">20</span>
			<div class="wcsp-smalltext">Seconds</div>
		  </div>
		</div>  
		<?php } ?>
		<input  id="wcsp_hidden_field"type="hidden" value="<?php echo $wcsp_wcsp_site_timer; ?>"></input>
		  </div>
		  </div>
		   <div class="wcsp_email_section">
		</div>
	</div>
<script src="<?php echo WCSP_dir_url . 'admin/template/bg1/assets/js/timer.js'; ?>" type="text/javascript"></script>
</body>
</html>

