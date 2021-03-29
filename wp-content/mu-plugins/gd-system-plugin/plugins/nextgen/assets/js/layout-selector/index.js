/**
 * Internal dependencies
 */
import './store';
import ImageCategorySelector from './image-categories';

/**
 * WordPress dependencies
 */
import { addFilter } from '@wordpress/hooks';

addFilter( 'coblocks-layout-selector-controls', 'coblocks-image-category-selector', ( controls ) => {
	controls.push( ImageCategorySelector );
	return controls;
} );
