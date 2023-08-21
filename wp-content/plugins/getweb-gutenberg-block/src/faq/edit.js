import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';
import './editor.scss';

export default function Edit(props) {
  const { attributes, setAttributes } = props;
  const { faqs } = attributes;
  const updateQuestion = (index, newContent) => {
    const updatedFaqs = [...faqs];
    updatedFaqs[index].question = newContent;
    setAttributes({ faqs: updatedFaqs });
    setIndexNumber(index);
  };
  const updateAnswere = (index, newContent) => {
    const updatedFaqs = [...faqs];
    updatedFaqs[index].answere = newContent;
    setAttributes({ faqs: updatedFaqs });
    setIndexNumber(index);
  };
  const AddRow = () => {
    const updatedFaqs = [...faqs];
    const newItem = {
      question: 'Add Question',
      answere: 'Add answer',
    };
    updatedFaqs.push(newItem);
    setAttributes({ faqs: updatedFaqs });
  };
  const RemoveRow = () => {
    const updatedFaqs = [...faqs];
    updatedFaqs.pop();
    setAttributes({ faqs: updatedFaqs });
  };
  return (
    <div {...useBlockProps()}>
      <div className="faq-area faq-area pt-30">
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
                      <TextControl
                        value={faqs[index].question}
                        onChange={newContent => updateQuestion(index, newContent)}
                      />
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
                          <TextControl
                            value={faqs[index].answere}
                            onChange={newContent => updateAnswere(index, newContent)}
                          />
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              ))}
            </div>

            <button className='btn btn-primary me-2' onClick={AddRow}>Add Question</button>
            <button className='btn btn-danger' onClick={RemoveRow}>Remove Question</button>
          </div>
      </div>
    </div>
  );
}