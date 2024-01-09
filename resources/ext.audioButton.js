( function () {
	function deactivate( button ) {
		var audio = button.previousElementSibling;
		button.dataset.state = 'error';
		button.title = mw.message( 'audiobutton-error-not-supported' ).text();
		button.href = audio.firstElementChild.src;
		audio.remove();
	}

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
			audio.play();
		} else {
			audio.pause();
		}
	}

	$( function () {
		Array.prototype.forEach.call( document.querySelectorAll( 'a.ext-audiobutton' ), function ( button ) {
			var audio = button.previousElementSibling;
			button.innerHTML = '';
			if ( button.dataset.state === 'error' ) {
				return;
			} else if ( audio.canPlayType( audio.firstElementChild.type ) ) {
				button.addEventListener( 'click', playPause );
			} else {
				deactivate( button );
			}
		} );

		Array.prototype.forEach.call( document.querySelectorAll( 'audio.ext-audiobutton' ), function ( audio ) {
			audio.volume = audio.dataset.volume;
			audio.addEventListener( 'play', updateButtonState );
			audio.addEventListener( 'pause', updateButtonState );
			audio.addEventListener( 'ended', updateButtonState );
		} );
	}() );
}() );
