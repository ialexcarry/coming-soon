var time = document.getElementById( 'wcsp_hidden_field' ).value;
console.log( "this is time" + time );
var countDownDate = new Date( time ).getTime();

// Update the count down every 1 second
var x = setInterval(
	function() {

		// Get todays date and time
		var now = new Date().getTime();

		// Find the distance between now an the count down date
		var distance = countDownDate - now;

		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor( distance / (1000 * 60 * 60 * 24) );
		var hours = Math.floor( (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60) );
		var minutes = Math.floor( (distance % (1000 * 60 * 60)) / (1000 * 60) );
		var seconds = Math.floor( (distance % (1000 * 60)) / 1000 );

		// Display the result in an element with id="demo"
		document.getElementById( "wcsp-clockdiv" ).innerHTML = '<div id="wcsp-clockdiv"><div class="wcsp_coming_soon_circle"><div class="wcsp_timing_content"><span id="wcsp-days" class="wcsp-days">' + days + '</span><div class="wcsp-smalltext">Days</div></div></div><div class="wcsp_coming_soon_circle"><div  class="wcsp_timing_content"><span  id="wcsp-hours" class="wcsp-hours">' + hours + '</span><div class="wcsp-smalltext">Hours</div></div></div><div class="wcsp_coming_soon_circle"><div class="wcsp_timing_content"><span id="wcsp-minutes" class="wcsp-minutes">' + minutes + '</span><div class="wcsp-smalltext">Minutes</div></div></div><div class="wcsp_coming_soon_circle"><div class="wcsp_timing_content"><span id="wcsp-seconds" class="wcsp-seconds">' + seconds + '</span><div class="wcsp-smalltext">Seconds</div></div></div>';

		// If the count down is finished, write some text
		if (distance < 0) {
			clearInterval( x );

			document.getElementById( "wcsp-days" ).innerHTML = '0';
			document.getElementById( "wcsp-hours" ).innerHTML = '0';
			document.getElementById( "wcsp-minutes" ).innerHTML = '0';
			document.getElementById( "wcsp-seconds" ).innerHTML = '0';

		}
	},
	0
);
