<?php

?>

<!-- statement -->
<section class="statement ">
  <div class="map">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/map-img.svg" alt="map img" class="img-fluid">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-7 offset-lg-5 section-padding">
        <div class="statement-info radius-16 position-relative mx-4 ms-xl-5">
          <div class="inner-statement p-4 radius-16">

            <?php if (!empty($settings['statement_title'])): ?>
              <h3 class="statement_title text-white fs-36 fw-bold"><?php echo $settings['statement_title']; ?></h3>
            <?php endif; ?>


            <?php if (!empty($settings['statement_inner_title'])): ?>
              <h4 class="statement_title text-white fs-4 fw-bold"><?php echo $settings['statement_inner_title']; ?></h4>
            <?php endif; ?>




            <?php if (!empty($settings['statement_description'])): ?>
              <p class="statement_description text-clr-dark5 fs-5 fw-normal mb-4">
                <?php echo $settings['statement_description']; ?>
              </p>
            <?php endif; ?>


            <div
              class="statement-bottom d-flex align-items-center justify-content-center justify-content-sm-between flex-wrap">
              <div class="owner-info d-flex align-items-center gap-2">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/owner.png" alt="owner-img"
                  class="owner-img img-fluid rounded-circle">
                <div class="name">
                  <h4 class="fs-18 text-clr-dark5">
                    <b> MD Shah Alam</b> — Founder & CEO
                  </h4>
                </div>
              </div>
              <div class="owner-sign">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/signatory.svg" alt="owner-img"
                  class="img-fluid flex-shrink-0">
              </div>
            </div>
            <div class="quote-shape">
              <img src="<?php echo get_template_directory_uri() ?>/assets/img/quote-left.svg" alt="icon"
                class="quote-left img-fluid position-absolute">
              <img src="<?php echo get_template_directory_uri() ?>/assets/img/quote-right.svg" alt="icon"
                class="quote-right img-fluid position-absolute">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ statement -->



<?php ?>