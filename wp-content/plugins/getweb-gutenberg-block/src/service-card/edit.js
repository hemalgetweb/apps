/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit() {
	return (
		<p { ...useBlockProps() }>
			<div class="dynamic-service-box-114"
				style="min-height: 544px; border: 0; box-shadow: 0px 20px 40px 0px rgba(0, 57, 89, 0.10);">
				<div class="dynamic-service-box-img-114">
				<img width="195" height="175" src="https://wadialbadaitsolutions.ae/wp-content/uploads/2023/07/social-media-marketing.svg" class="attachment-full size-full" alt="" decoding="async" />
				</div>
				<div class="dynamic-service-box-content-114">
				<h5 class="title">Social Media Marketing</h5>
				<p>We help you dominate the ever-changing social media landscape with profile optimization, content creation,
					regular post management, audience engagement &amp; paid ads</p>
				<span class="dynamic-service-read-more-btn-114">Read more
					<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5 10L4.115 9.115L7.60417 5.625H0V4.375H7.60417L4.115 0.885L5 0L10 5L5 10Z" fill="#00C7C7"></path>
					</svg>
				</span>
				</div>
			</div>
		</p>
	);
}
