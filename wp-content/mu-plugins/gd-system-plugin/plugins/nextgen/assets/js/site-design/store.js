/**
 * WordPress dependencies
 */
import { registerStore, use, plugins } from '@wordpress/data';

const DEFAULT_STATE = {
	fontsPanelOpen: true,
	colorsPanelOpen: true,
};

const actions = {
	toggleFontsPanel: () => ( { type: 'TOGGLE_FONTS_PANEL' } ),
	toggleColorsPanel: () => ( { type: 'TOGGLE_COLORS_PANEL' } ),
};

const store = registerStore( 'nextgen/site-design', {
	reducer( state = DEFAULT_STATE, action ) {
		switch ( action.type ) {
			case 'TOGGLE_FONTS_PANEL':
				return {
					...state,
					fontsPanelOpen: ! state.fontsPanelOpen,
				};
			case 'TOGGLE_COLORS_PANEL':
				return {
					...state,
					colorsPanelOpen: ! state.colorsPanelOpen,
				};
		}

		use( plugins.persistence, state );

		return state;
	},

	actions,

	selectors: {
		isColorsPanelOpen: ( state ) => state.colorsPanelOpen,
		isFontsPanelOpen: ( state ) => state.fontsPanelOpen,
	},
	persist: [ 'fontsPanelOpen', 'colorsPanelOpen' ],
} );

export default store;
