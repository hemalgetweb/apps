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
            <label for="jobTitle" class="form-label fs-14 fw-bold text-clr-dark2">Job Title *</label>
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
              <label for="fName" class="form-label fs-14 fw-bold text-clr-dark2">First Name *</label>
              <input type="text" class="form-control form-field" id="fName" placeholder="Enter your first name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-4 pb-2">
              <label for="lName" class="form-label fs-14 fw-bold text-clr-dark2">Last Name</label>
              <input type="text" class="form-control form-field" id="lName" placeholder="Enter your last name">
            </div>
          </div>
          <div class="col-12">
            <div class="country-code mb-4">
              <label for="pNumber" class="form-label fs-14 fw-bold text-clr-dark2">
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
              <label for="Email" class="form-label fs-14 fw-bold text-clr-dark2">Email</label>
              <input type="email" class="form-control form-field" id="Email" placeholder="Enter your email">
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-4">
              <label for="Country" class="form-label fs-14 fw-bold text-clr-dark2">Country</label>
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
              <label for="upload-file" class="form-label fs-14 fw-bold text-clr-dark2 d-block">
                CV upload
                <input type="file" id="upload-file" class="d-none">
                <span class="attach-file d-block p-3 bg-white rounded-4 mt-2 text-center">
                  <span class="attach-text fw-normal">
                    <span class="ni ni-upload text-clr-dark1"></span>
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