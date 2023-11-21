# AudioButton

AudioButton is a [MediaWiki extension](https://www.mediawiki.org/wiki/Manual:Extensions) that creates a one-button play/pause toggle for an uploaded audio file.

It is based on https://www.mediawiki.org/wiki/Extension:BoilerPlate.

It makes use of the HTML5 Audio element, without any fallbacks.

Running `npm test` and `composer test` will run automated code checks.

If you want to hack on this, whatever you're looking for is probably in `extension.json`, `/resources`, or `/src`.

[Volume is optionally controlled](https://developer.mozilla.org/en-US/docs/Web/API/HTMLMediaElement/volume) with a `vol` parameter: `<ab vol="0.45">foo.mp3</ab>`

[Preload is optionally controlled](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio#preload) with a `preload` parameter: `<ab preload="none">foo.mp3</ab>`

The buttons can be styled by modifying MediaWiki:Common.css or MediaWiki:Universal.css. For example:
```css
@import 'https://use.fontawesome.com/releases/v5.4.1/css/all.css';

/* This applies to all buttons */
a.ext-audiobutton {
    font-family: 'Font Awesome 5 Free';
    font-weight: bold;
    /* font-weight: normal; */
}
/* This applies to "play" buttons */
a.ext-audiobutton[ data-state='play' ]:before {
    color: #000;
    content: '\f04b';
    /* content: '\f144'; */
}
/* This applies to "pause" buttons */
a.ext-audiobutton[ data-state='pause' ]:before {
    color: #8b0000;
    content: '\f04c';
    /* content: '\f28b'; */
}
/* This applies to hovered "play" buttons */
a.ext-audiobutton[ data-state='play' ]:hover:before {
    color: #8b0000;
}
/* This applies to hovered "pause" buttons */
a.ext-audiobutton[ data-state='pause' ]:hover:before {
    color: #8b0000;
}
/* This applies to "error" buttons */
a.ext-audiobutton[ data-state='error' ]:before {
    color: #000;
    content: '\f071';
}
```

For reference, this will override the following default style:
```less
a.ext-audiobutton {
	text-decoration: none;
	&[ data-state='play' ]:before {
		content: '▶️';
	}
	&[ data-state='pause' ]:before {
		content: '⏸️';
	}
	&[ data-state='error' ]:before {
		content: '❓️';
	}
}
```
