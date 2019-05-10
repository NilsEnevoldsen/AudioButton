<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * @file
 */

namespace MediaWiki\Extension\AudioButton;

/**
 * Hooks for AudioButton extension
 */
class Hooks {

	/**
	 * Hook: ParserFirstCallInit
	 *
	 * @param Parser &$parser A parser
	 * @return bool
	 */
	public static function onParserFirstCallInit( &$parser ) {
		$parser->setHook( 'ab', 'MediaWiki\Extension\AudioButton\Hooks::renderAudioButton' );
		$parser->setHook( 'sm2', 'MediaWiki\Extension\AudioButton\Hooks::renderAudioButton' );
		return true;
	}

	/**
	 * Render <ab>
	 *
	 * @param string $input Some input
	 * @param array $args Some args
	 * @param Parser $parser A parser
	 * @param PPFrame $frame A PPFrame
	 * @return string
	 */
	public static function renderAudioButton( $input, array $args, $parser, $frame ) {
		$parser->getOutput()->addModules( 'ext.audioButton' );
		$input = $parser->recursiveTagParse( $input, $frame );

		if ( !$input ) {
			return '';
		}

		$file = wfFindFile( $input );

		if ( $file ) {
			$url = $file->getFullURL();
			$mimetype = $file->getMimeType();

			$vol = $args['vol'] ?? '1.0';

			$output = '<audio';
			$output .= ' hidden';
			$output .= ' class="ext-audiobutton"';
			$output .= ' data-volume="' . $vol . '">';
			$output .= '<source src="' . $url . '" type="' . $mimetype . '">';
			$output .= '<a href="' . $url . '">Link</a>';
			$output .= '</audio>';
			$output .= '<a';
			$output .= ' class="ext-audiobutton"';
			$output .= ' data-state="play"';
			$output .= ' title="Play/Pause">▶️</a>';
		} else {
			$output = '<a class="ext-audiobutton" data-state="error" title="File not found"></a>';
		}

		return $output;
	}
}
