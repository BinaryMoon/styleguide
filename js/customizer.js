/**
 * customizer.js v1
 * Created by Ben Gillbanks <http://www.binarymoon.co.uk/>
 * Available under GPL2 license
 */
/* global wp, console */

;( function( $ ) {

	var api = wp.customize;
	var default_text = 'Default';

	// font picker
	$( document ).ready( function() {

		$( '.styleguide-font-picker' ).each( function() {

			var $this = $( this );
			var $select = $this.find( 'select' );
			var $options = $select.find( 'option' );
			var new_selector = $( '<ul class="styleguide-font-selector"></ul>' );

			$options.each( function() {

				var $this = $( this );
				var family = $this.data( 'font-family' );
				var li = $( '<li>' + $this.html() + '</li>' ).css(
					'font-family',
					family
				);

				if ( $this.is( ':selected' ) ) {

					li.addClass( 'selected' );

				}

				li.on( 'click', function() {

					var $this = $( this );
					$this.parent().find( 'li' ).removeClass( 'selected' );
					$this.addClass( 'selected' );

					var value = $this.text();

					if ( default_text === value ) {
						value = '';
					}

					var parent = $( this ).parent().closest( 'li' ).find( 'select' );
					api.instance( parent.prop( 'id' ) ).set( value );

				});

				new_selector.append( li );

			} );

			$this.append( new_selector );

			// scroll so that selected font is at the top of the div

		} );

	} );

})( jQuery );
