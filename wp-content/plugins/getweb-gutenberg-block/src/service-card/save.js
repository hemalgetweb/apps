/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save(props) {
	const {title, description, btn_text, btn_link, block_image} = props.attributes;
	return (
		<div { ...useBlockProps.save() }>
				<a className='text-decoration-none' href={btn_link && btn_link}>
					<div className="dynamic-service-box-114">
						<div className="dynamic-service-box-img-114">
							<img width="195" height="175" src={block_image} class="attachment-full size-full" alt="" decoding="async" />
						</div>
						<div className="dynamic-service-box-content-114">
							{title && <h5 className="title"> {title} </h5>}
							{description && <p> {description}</p>}
							{btn_text && <span className="dynamic-service-read-more-btn-114">
							{btn_text}
								<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z" fill="#00C7C7"></path>
								</svg>
							</span>}
						</div>
					</div>
				</a>
		</div>
	);
}
