/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';
const { useSelect, useDispatch } = window.wp.data
const { 
	BaseControl,
	Button, 
	Spinner
} = window.wp.components
const { MediaUpload, MediaUploadCheck } = window.wp.blockEditor
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import './editor.scss';
import { TextControl, TextareaControl, PanelBody } from '@wordpress/components';

export default function Edit(props) {
	const {title, description, btn_text, btn_link, block_image} = props.attributes;
	const { attributes, setAttributes } = props;
	const { imageId, image } = useSelect( select => {
		const id = select( 'core/editor' ).getEditedPostAttribute( 'meta' )[ props.metaKey ];
		return {
			image: select( 'core' ).getMedia( id ),
		};
		// upload meta data
	});
	const { editPost } = useDispatch( 'core/editor', [ imageId ] );

	const updateTitle = function(title) {
		setAttributes({ title: title });
	}
	const updateDescription = function(description) {
		setAttributes({ description: description });
	}
	const updateBtn = function(updateBtn) {
		setAttributes({ btn_text: updateBtn });
	}
	const updateBtnLink = function(btn_link) {
		setAttributes({ btn_link: btn_link });
	}
	return (
		<div  { ...useBlockProps() }>
			<InspectorControls key="setting">
				<div id="gutenpride-controls">
					<PanelBody>
						<fieldset>
							<legend className="blocks-base-control__label">
								{ __( 'Service Controls', 'getweb-gutenberg-block' ) }<br/>
								<p>Title</p>
								<TextControl
									value={title}
									onChange={title => updateTitle(title)}
								/>
								<p>Description</p>
								<TextareaControl
									value={ description }
									onChange={description => updateDescription(description)}
								/>
								<p>Button Text</p>
								<TextControl
									value={btn_text}
									onChange={btn_text => updateBtn(btn_text)}
								/>
								<p>Button Link</p>
								<TextControl
									value={btn_link}
									onChange={btn_link => updateBtnLink(btn_link)}
								/>
								<p>Upload image</p>
							</legend>
						</fieldset>
					</PanelBody>
				</div>
				</InspectorControls>
			<div>
				<a className='text-decoration-none' href={btn_link && btn_link}>
					<div className="dynamic-service-box-114">
						<div className="dynamic-service-box-img-114">
						<BaseControl label={ props.label }>
							<MediaUploadCheck>
								<MediaUpload
									onSelect={ ( media ) => {
										setAttributes({
											block_image: media.url
										});
									} }
									allowedTypes={ [ 'image' ] }
									render={ ( { open } ) => {
										return(
											<div>
												{ ! block_image && <Button variant="secondary" onClick={ open }>Upload image</Button> }
												{ !! imageId && ! image && <Spinner /> }
												{ !! block_image &&
													<Button variant="link" onClick={ open }>
														<img width="195" height="175" src={block_image} class="attachment-full size-full" alt="" decoding="async" />
													</Button>
												}
											</div>
										)
									} }
								/>
							</MediaUploadCheck>
							{ !! imageId &&
								<Button onClick={ () => editPost( { meta: { [props.metaKey]: 0 } } ) } isLink isDestructive>
									Remove image
								</Button>
							}
						</BaseControl>
							</div>
							<div className="dynamic-service-box-content-114">
							{title && <h5 className="title">
							<TextControl
								value={title}
								onChange={title => updateTitle(title)}
							/></h5>}
							{description && <p>
								<TextareaControl
									value={ description }
									onChange={description => updateDescription(description)}
								/></p>}
							{btn_text && <span className="dynamic-service-read-more-btn-114">
							<TextControl
								value={btn_text}
								onChange={btn_text => updateBtn(btn_text)}
							/>
								<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z" fill="#00C7C7"></path>
								</svg>
							</span>}
						</div>
					</div>
				</a>
			</div>
		</div>
	);
}
