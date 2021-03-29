/**
 * External dependencies
 */
import classnames from 'classnames';

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { compose } from '@wordpress/compose';
import { chevronDown } from '@wordpress/icons';
import { useState, useEffect } from '@wordpress/element';
import { Button, Icon, MenuGroup, MenuItem, Dropdown } from '@wordpress/components';
import { withSelect, withDispatch } from '@wordpress/data';

const ImageCategorySelector = (
	{ imageCategories,
		imageCategoriesEnabled,
		imageCategory,
		saveEntityRecord,
	}
) => {
	const [ selectedImageCategory, setSelectedImageCategory ] = useState( imageCategory );
	const slugMatch = imageCategories?.filter( ( { slug } ) => slug === selectedImageCategory ),
		buttonSlug = slugMatch?.[ 0 ]?.name || selectedImageCategory;

	useEffect( () => {
		if ( !! slugMatch.length ) {
			saveEntityRecord( 'root', 'site', {
				image_category: selectedImageCategory,
			} );
		}
	}, [ selectedImageCategory ] );

	return ! imageCategoriesEnabled ? null : (
		<>
			<span className="coblocks-layout-selector__about">{ __( 'My site is about:', 'nextgen' ) }</span>
			<Dropdown
				className="coblocks-layout-selector__dropdown"
				renderToggle={ ( { isOpen, onToggle } ) =>
					<Button
						isLink
						className={	classnames(
							'coblocks-layout-selector__dropdown-button', {
								'is-open': isOpen,
							}
						) }
						onClick={ () => onToggle() }
					>
						{ buttonSlug }
						<Icon
							icon={ chevronDown }
							className="chevron"
						/>
					</Button>
				}
				contentClassName="coblocks-layout-selector__pop"
				renderContent={ ( { onClose } ) => (
					<MenuGroup>
						{ imageCategories.map( ( { name, slug } ) => {
							return (
								<MenuItem
									key={ `image-category-${ slug }` }
									onClick={ () => {
										setSelectedImageCategory( slug );
										onClose();
									} }
								>
									{ name }
								</MenuItem>
							);
						} ) }
					</MenuGroup>
				) }
			/>
		</>
	);
};

export default compose( [
	withSelect( ( select ) => {
		const {
			hasImageCategories,
			getImageCategories,
			getSelectedCategory,
		} = select( 'nextgen/layout-selector' );

		return {
			imageCategoriesEnabled: hasImageCategories(),
			imageCategories: getImageCategories(),
			imageCategory: getSelectedCategory(),
		};
	} ),
	withDispatch( ( dispatch ) => {
		const { saveEntityRecord } = dispatch( 'core' );
		return { saveEntityRecord };
	} ),

] )( ImageCategorySelector );
