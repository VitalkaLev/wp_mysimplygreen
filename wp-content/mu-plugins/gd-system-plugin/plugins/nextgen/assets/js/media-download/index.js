/* global nextgenNuxPatterns */

/**
 * External dependencies
 */
import { pick, difference } from 'lodash';

/**
 * WordPress dependencies
 */
import { Component } from '@wordpress/element';
import { registerPlugin } from '@wordpress/plugins';
import { compose } from '@wordpress/compose';
import { withSelect, withDispatch } from '@wordpress/data';

/**
 * Is the url for the image hosted externally on our WPNUX API. An externally hosted image has no
 * id and is not a blob url.
 *
 * @param {number=} id  The id of the image.
 * @param {string=} url The url of the image.
 *
 * @return {boolean} Is the url an externally hosted url?
 */
const isExternalImage = ( id, url ) => url && ! id && url.includes( nextgenNuxPatterns.nuxApiEndpoint );

class MediaDownload extends Component {
	#currentClientIds = [];

	componentDidUpdate() {
		const clientIds = difference( this.props.clientIds, this.#currentClientIds );

		this.detectImageBlocks( clientIds )
			.filter( ( block ) => !! block )
			.forEach(
				( block ) => {
					const [ clientId, attributes ] = Object.entries( block )[ 0 ];
					this.uploadExternalImages( clientId, attributes );
				}
			);

		this.#currentClientIds = this.props.clientIds;
	}

	detectImageBlocks = ( clientIds ) => {
		const { getBlockAttributes } = this.props;

		return clientIds.map( ( clientId ) => {
			const blockAttributes = getBlockAttributes( clientId );

			switch ( true ) {
				// For core/image
				case !! blockAttributes?.url : {
					return { [ clientId ]: pick( blockAttributes, [ 'id', 'url' ] ) };
				}
				// For coblocks/gallery-*
				case !! blockAttributes?.images : {
					return { [ clientId ]: pick( blockAttributes, [ 'ids', 'images' ] ) };
				}
				// For coblocks/service
				case !! blockAttributes?.imageUrl : {
					return { [ clientId ]: pick( blockAttributes, [ 'imageUrl' ] ) };
				}
				// For core/media-text
				case !! blockAttributes?.mediaUrl && blockAttributes?.mediaType === 'image' : {
					return { [ clientId ]: pick( blockAttributes, [ 'mediaId', 'mediaUrl' ] ) };
				}
				default: {
					return null;
				}
			}
		} );
	}

	getUrlsFromBlockAttributes( blockAttributes ) {
		switch ( true ) {
			case isExternalImage( 0, blockAttributes?.imageUrl ): {
				return [ blockAttributes.imageUrl ];
			}
			case isExternalImage( blockAttributes?.id, blockAttributes?.url ): {
				return [ blockAttributes.url ];
			}
			case isExternalImage( blockAttributes?.mediaId, blockAttributes?.mediaUrl ): {
				return [ blockAttributes.mediaUrl ];
			}
			case !! blockAttributes?.images : {
				return blockAttributes.images.filter( ( image ) =>
					isExternalImage( image?.id, image?.url )
				).map( ( image ) => image.url );
			}
		}
	}

	uploadExternalImages = ( clientId, blockAttributes ) => {
		const {
			createWarningNotice,
			getBlockAttributes,
			mediaUpload,
			updateBlockAttributes,
		} = this.props;

		let urls = this.getUrlsFromBlockAttributes( blockAttributes );

		urls = urls?.filter( ( url ) => typeof url !== 'undefined' );
		if ( ! urls?.length ) {
			return;
		}

		urls.forEach( ( imageUrl, index ) => {
			window.fetch( imageUrl )
				.then( ( response ) => response.blob() )
				.then( ( blob ) => {
					mediaUpload( {
						filesList: [ blob ],
						allowedTypes: [ 'image' ],
						onFileChange( [ media ] ) {
							switch ( true ) {
								case !! blockAttributes?.imageUrl: {
									updateBlockAttributes( clientId, {
										imageUrl: media.url,
									} );

									break;
								}
								case !! blockAttributes?.url : {
									updateBlockAttributes( clientId, {
										id: media.id,
										url: media.url,
									} );

									break;
								}
								case !! blockAttributes?.mediaUrl : {
									updateBlockAttributes( clientId, {
										mediaId: media.id,
										mediaUrl: media.url,
									} );

									break;
								}
								case !! blockAttributes?.images : {
									const currentAttributes = getBlockAttributes( clientId );

									const newImages = currentAttributes.images.map( ( oldImage, oldIndex ) => {
										return oldIndex === index
											? { ...oldImage, id: media.id, url: media.url }
											: oldImage;
									} );

									updateBlockAttributes( clientId, {
										ids: newImages.map( ( image ) => image.id || null ),
										images: newImages,
									} );
								}
							}
						},
						onError: ( message ) => createWarningNotice( message ),
					} );
				} )
				.catch( ( error ) => createWarningNotice( error ) );
		} );
	}

	render() {
		return null;
	}
}

registerPlugin( 'nextgen-media-download', {
	render: compose( [
		withSelect( ( select ) => {
			const {
				getBlockAttributes,
				getBlockName,
				getClientIdsWithDescendants,
				getSettings,
			} = select( 'core/block-editor' );

			return {
				mediaUpload: getSettings().mediaUpload,
				clientIds: getClientIdsWithDescendants(),
				getBlockAttributes,
				getBlockName,
			};
		} ),
		withDispatch( ( dispatch ) => {
			const { updateBlockAttributes } = dispatch( 'core/block-editor' );

			return {
				updateBlockAttributes,
			};
		} ),
	] )( MediaDownload ),
} );
