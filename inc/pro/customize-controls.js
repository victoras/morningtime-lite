( function( api ) {

	// Extends our custom "morningtime-pro" section.
	api.sectionConstructor['morningtime-pro'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
