/**
 * Kaya Global Colors Customizer control.
 *
 * Enhances the .kaya-global-colors container into an add / edit / remove list
 * and keeps the Customizer setting in sync. Uses only the wp.customize API and
 * native DOM. No jQuery.
 */
( function ( wp ) {
	'use strict';

	if ( ! wp || ! wp.customize ) {
		return;
	}

	/**
	 * Convert a label into a slug.
	 *
	 * @param {string} text Source text.
	 * @return {string} Slug.
	 */
	function slugify( text ) {
		return String( text )
			.toLowerCase()
			.trim()
			.replace( /[^a-z0-9]+/g, '-' )
			.replace( /^-+|-+$/g, '' );
	}

	/**
	 * Initialise a single control container.
	 *
	 * @param {HTMLElement} container The .kaya-global-colors element.
	 */
	function initControl( container ) {
		var settingId = container.getAttribute( 'data-setting' );
		var setting = wp.customize( settingId );
		var list = container.querySelector( '.kaya-global-colors__list' );
		var addButton = container.querySelector( '.kaya-global-colors__add' );
		var colors = [];

		if ( ! setting || ! list || ! addButton ) {
			return;
		}

		try {
			colors = JSON.parse( container.getAttribute( 'data-value' ) ) || [];
		} catch ( error ) {
			colors = [];
		}

		/**
		 * Push a fresh clone of the array into the setting so the Customizer
		 * detects the change and marks itself dirty.
		 */
		function sync() {
			setting.set(
				colors.map( function ( color ) {
					return {
						name: color.name,
						slug: slugify( color.slug || color.name ),
						color: color.color,
					};
				} )
			);
		}

		/**
		 * Rebuild the list markup from the current colors array.
		 */
		function render() {
			list.textContent = '';

			colors.forEach( function ( color, index ) {
				var position = index + 1;
				var displayName = color.name || 'color ' + position;

				var item = document.createElement( 'li' );
				item.className = 'kaya-global-colors__item';

				var swatch = document.createElement( 'input' );
				swatch.type = 'color';
				swatch.className = 'kaya-global-colors__swatch';
				swatch.value = color.color || '#000000';
				swatch.setAttribute( 'aria-label', 'Colour value for ' + displayName );
				swatch.addEventListener( 'input', function () {
					colors[ index ].color = swatch.value;
					sync();
				} );

				var name = document.createElement( 'input' );
				name.type = 'text';
				name.className = 'kaya-global-colors__name';
				name.value = color.name || '';
				name.setAttribute( 'aria-label', 'Name for color ' + position );
				name.addEventListener( 'input', function () {
					colors[ index ].name = name.value;
					colors[ index ].slug = slugify( name.value );
					sync();
				} );

				var remove = document.createElement( 'button' );
				remove.type = 'button';
				remove.className = 'button-link kaya-global-colors__remove';
				remove.setAttribute( 'aria-label', 'Remove ' + displayName );
				remove.textContent = '\u00D7';
				remove.addEventListener( 'click', function () {
					colors.splice( index, 1 );
					render();
					sync();
				} );

				item.appendChild( swatch );
				item.appendChild( name );
				item.appendChild( remove );
				list.appendChild( item );
			} );
		}

		addButton.addEventListener( 'click', function () {
			colors.push( { name: 'New Color', slug: 'new-color', color: '#000000' } );
			render();
			sync();
		} );

		render();
	}

	wp.customize.bind( 'ready', function () {
		var containers = document.querySelectorAll( '.kaya-global-colors' );
		Array.prototype.forEach.call( containers, initControl );
	} );
} )( window.wp );
