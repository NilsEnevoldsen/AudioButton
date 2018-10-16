# AudioButton

AudioButton is a [MediaWiki extension](https://www.mediawiki.org/wiki/Manual:Extensions) that creates a one-button play/pause toggle for an uploaded audio file.

It is based on https://www.mediawiki.org/wiki/Extension:BoilerPlate.

It makes use of the HTML5 Audio element, without any fallbacks.

Running `npm test` and `composer test` will run automated code checks.

If you want to hack on this, whatever you're looking for is probably in `extension.json`, `/resources`, or `/src`.

The buttons can be styled by modifying MediaWiki:Common.css. For example:
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
}
```
