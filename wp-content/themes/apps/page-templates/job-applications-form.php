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
              <div class="phone-wrap border d-flex align-items-center overflow-hidden bg-white phoneNumber-select">
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
                    <span class="">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.25 16.175V6.9L8.25 9.9L7.175 8.825L12 4L16.825 8.825L15.75 9.9L12.75 6.9V16.175H11.25ZM5.5 20C5.1 20 4.75 19.85 4.45 19.55C4.15 19.25 4 18.9 4 18.5V14.925H5.5V18.5H18.5V14.925H20V18.5C20 18.9 19.85 19.25 19.55 19.55C19.25 19.85 18.9 20 18.5 20H5.5Z" fill="#00C7C7"/>
                      </svg>

                    </span>
                    Attach your file
                  </span>
                </span>
              </label>
              <p class="fs-14 mb-4 pb-3">
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