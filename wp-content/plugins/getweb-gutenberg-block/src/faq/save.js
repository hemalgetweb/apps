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
	const { attributes, setAttributes } = props;
  const { faqs } = attributes;
	return (
		<div { ...useBlockProps.save() }>
			<div className="faq-area pt-30">
				<div className="apps-accordion-wrapper-main-114">
					<div className="accordion accordion-flush" id="questionAccordion-213432">
					{faqs.map((item, index) => (
						<div key={index} className="accordion-item">
						<h2 className="accordion-header" id={`213432_heading_${index}`}>
							<button
							className="accordion-button d-flex align-items-start collapsed"
							type="button"
							data-bs-toggle="collapse"
							data-bs-target={`#collapse_213432-${index}`}
							aria-expanded="false"
							>
							<span className="apps-question-q-114">Q</span> 
							{faqs[index].question}
							</button>
						</h2>
						<div
							id={`collapse_213432-${index}`}
							className="accordion-collapse collapse"
							aria-labelledby={`213432_heading_${index}`}
							data-bs-parent="#questionAccordion-213432"
						>
							<div className="accordion-body apps-faq-accordion-body-wrapper">
							<span className="apps-answere-a-114 mt-1">A</span>
							<div className="apps-content">
								<p>
								{faqs[index].answere}
								</p>
							</div>
							</div>
						</div>
						</div>
					))}
					</div>
				</div>
			</div>
		</div>
	);
}
