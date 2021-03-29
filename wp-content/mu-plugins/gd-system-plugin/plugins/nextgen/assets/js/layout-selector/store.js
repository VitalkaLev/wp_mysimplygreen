/**
 * Internal dependencies
 */
import imageCategoriesData from '../../image-categories';

/**
 * WordPress dependencies
 */
import { select, registerStore } from '@wordpress/data';

const DEFAULT_STATE = {
	imageCategories: imageCategoriesData || [],
	imageCategory: select( 'core' ).getEditedEntityRecord( 'root', 'site' ).imageCategory,
};

const actions = {
	updateImageCategories: ( imageCategories ) => ( { type: 'UPDATE_IMAGE_CATEGORIES', imageCategories } ),
	updateImageCategory: ( imageCategory ) => ( { type: 'UPDATE_IMAGE_CATEGORY', imageCategory } ),
};

const store = registerStore( 'nextgen/layout-selector', {
	reducer( state = DEFAULT_STATE, action ) {
		switch ( action.type ) {
			case 'UPDATE_IMAGE_CATEGORIES':
				return {
					...state,
					imageCategories: action.imageCategories,
					imageCategory: action.imageCategory,
				};
		}

		return state;
	},

	actions,

	selectors: {
		getImageCategories: ( state ) => state.imageCategories || [],
		hasImageCategories: ( state ) => !! state.imageCategories.length,
		getSelectedCategory: ( ) => {
			const { image_category: imageCategory } = select( 'core' ).getEditedEntityRecord( 'root', 'site' );
			return imageCategory;
		}
		,
	},
} );

export default store;
