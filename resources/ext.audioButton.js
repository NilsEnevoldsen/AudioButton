( function () {
	function updateButtonState( event ) {
		var audio = event.currentTarget,
			button = audio.nextElementSibling;
		if ( audio.paused || audio.ended ) {
			button.dataset.state = 'play';
		} else {
			button.dataset.state = 'pause';
		}
	}

	function playPause( event ) {
		var audio = event.currentTarget.previousElementSibling;
		if ( audio.paused || audio.ended ) {
			audio.volume = audio.dataset.volume;
			audio.play();
		} else {
			audio.pause();
		}
	}

	$( function () {
		document.querySelectorAll( 'a.ext-audiobutton' ).forEach( function ( el ) {
			el.addEventListener( 'click', playPause );
		} );

		document.querySelectorAll( 'audio.ext-audiobutton' ).forEach( function ( el ) {
			el.addEventListener( 'play', updateButtonState );
			el.addEventListener( 'pause', updateButtonState );
			el.addEventListener( 'ended', updateButtonState );
		} );
	}() );
}() );
