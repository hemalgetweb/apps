<?php
// Template Name: Job Application
?>
<?php get_header(); ?>


<!-- job-application-form -->
<section class="job-application-form section-padding">
  <div class="container">
    <div class="form-wrapper">
      <div class="form-header text-center mb-5">
        <h2 class="text-clr-dark1 fs-48 mb-3">
          Job application form
        </h2>
        <p class="text-clr-dark2">
          Working with our clients’ point of contact to build low and high-fidelity website wireframes that utilize the
          most effective strategies and remain within the goals of our client.
        </p>
      </div>
      <form action="#" method="post" class="application-form">
        <div class="row">
          <div class="col-12">
            <label for="jobTitle" class="form-label">Job Title *</label>
            <select class="form-select fs-14 text-clr-dark2 form-field mb-4" id="jobTitle">
              <option selected>Backend Developer</option>
              <option value="1">Front End Developer</option>
              <option value="2">Full Stack Developer</option>
              <option value="3">iOS Developer</option>
              <option value="3">Junior SEO specialist</option>
              <option value="3">Shopify Developer</option>
              <option value="3">UI Designer</option>
              <option value="3">UX Designer</option>
            </select>
          </div>
          <div class="col-md-6">
            <div class="mb-4">
              <label for="fName" class="form-label">First Name *</label>
              <input type="text" class="form-control form-field" id="fName" placeholder="Enter your first name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-4 pb-2">
              <label for="lName" class="form-label">Last Name</label>
              <input type="text" class="form-control form-field" id="lName" placeholder="Enter your last name">
            </div>
          </div>
          <div class="col-12">
            <div class="country-code mb-4">
              <label for="pNumber" class="form-label">
                Contact Number
              </label>
              <div class="phone-wrap border d-flex align-items-center overflow-hidden bg-white">
                <select class="form-select text-clr-dark2 fs-14 border-0 py-0 px-2 bg-transparent">
                  <option selected>BD(+88)</option>
                  <option value="1">DZ (+213)</option>
                  <option value="2">AD (+376)</option>
                  <option value="3">AG (+1268)</option>
                  <option value="3">AM (+374)</option>
                  <option value="3">AW (+297)</option>
                  <option value="3">EG (+20)</option>
                  <option value="3">SV (+503)</option>
                </select>
                <input type="text" class="form-control border-0 rounded-0 border-start px-3 fs-14 text-clr-dark2"
                  id="pNumber" placeholder="Enter your number">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-4">
              <label for="Email" class="form-label">Email</label>
              <input type="email" class="form-control form-field" id="Email" placeholder="Enter your email">
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-4">
              <label for="Country" class="form-label">Country</label>
              <select class="form-select fs-14 text-clr-dark2 form-field mb-4 select2-init" id="Country">
                <option selected>Bangladesh</option>
                <option value=" 1">Pakistan</option>
                <option value="2">India</option>
                <option value="3">USA</option>
                <option value="3">UK</option>
                <option value="3">Dubai</option>
              </select>
            </div>
          </div>
          <div class="col-12">
            <div class="file-uploads">
              <label for="upload-file" class="form-label d-block">
                CV upload
                <input type="file" id="upload-file" class="d-none">
                <span class="attach-file d-block p-3 bg-white rounded-4 mt-2 text-center">
                  <span class="attach-text fw-normal">
                    <span class="text-clr-dark1">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_4003_25084)">
<path d="M6.14963 2.521L6.16305 11.0837H7.91305L7.89963 2.5315L9.51197 4.14208L10.7492 2.90425L8.46313 0.619915C8.27355 0.430306 8.04846 0.2799 7.80074 0.177283C7.55302 0.0746668 7.28752 0.0218506 7.01938 0.0218506C6.75125 0.0218506 6.48574 0.0746668 6.23802 0.177283C5.9903 0.2799 5.76522 0.430306 5.57563 0.619915L3.28955 2.906L4.5268 4.14208L6.14963 2.521Z" fill="#003C4F"/>
<path d="M12.25 9.33301V12.2497H1.75V9.33301H0V12.2497C0 12.7138 0.184374 13.1589 0.512563 13.4871C0.840752 13.8153 1.28587 13.9997 1.75 13.9997H12.25C12.7141 13.9997 13.1592 13.8153 13.4874 13.4871C13.8156 13.1589 14 12.7138 14 12.2497V9.33301H12.25Z" fill="#003C4F"/>
</g>
<defs>
<clipPath id="clip0_4003_25084">
<rect width="14" height="14" fill="white"/>
</clipPath>
</defs>
</svg>

                    </span>
                    Attach your file
                  </span>
                </span>
              </label>
              <p class="fs-12 mb-4 pb-3">
                Allowed formates are .jpg, .jpeg, .png, .gif, .docx, .doc, .pdf and maximum size 10MB
              </p>
              <div class="btn-wrap text-center">
                <button type="submit" class="bg-btn btn bg-clr-primary text-clr-dark1 px-4 fw-bold">
                  Submit Application
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!--/ job-application-form -->



<?php get_footer(); ?>