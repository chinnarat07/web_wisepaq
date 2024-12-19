
<?php include("./includes/header.php");?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo constant('page_contact_1') ?></h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php"><?php echo constant('page_contact_2') ?></a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page"><?php echo constant('page_contact_3') ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

     <!-- Contact Start -->
     <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h5 class="section-title text-secondary"><?php echo constant("page_contact_31") ?></h5>
                <h1 class="display-6 mb-4"><?php echo constant("page_contact_4") ?></h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div class="bg-light d-flex align-items-center w-100 p-4 ">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 50px; height: 50px;">
                                <i class="fa fa-map-marker-alt text-primary "></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2"><?php echo constant("page_contact_5") ?></p>
                                <h5 class="mb-0"><?php echo constant("page_contact_6") ?></h5>
                            </div>
                        </div>
                        <div class="bg-light d-flex align-items-center w-100 p-4 mt-4">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width:50px; height: 50px;">
                                <i class="fa fa-phone-alt text-primary "></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2"><?php echo constant("page_contact_7") ?></p>
                                <h5 class="mb-0">+66 21 195 300</h5>
                            </div>
                        </div>
                        <div class="bg-light d-flex align-items-center w-100 p-4 mt-4">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 50px; height: 50px;">
                                <i class="fa fa-envelope-open text-primary "></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2"><?php echo constant("page_contact_8") ?></p>
                                <h5 class="mb-0">hello@wisepaq.com</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    
                    <form>
                        <div class="row g-3 mt-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name"><?php echo constant("page_contact_9") ?></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email"><?php echo constant("page_contact_91") ?></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject"><?php echo constant("page_contact_92") ?></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                    <label for="message"><?php echo constant("page_contact_94") ?></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit"><?php echo constant("page_contact_95") ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Google Map Start -->
    <div class="container-xxl pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
        <iframe class="w-100 mb-n2" style="height: 450px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14027.54378343298!2d100.55850681273924!3d13.71653334796036!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2a1e14e5f1c45%3A0x96187e02d34a4e78!2sWisepaq%20Business%20Solutions%20Provider%20Co.%2CLtd.!5e0!3m2!1sth!2sth!4v1733302520108!5m2!1sth!2sth"frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Google Map End -->



    <?php include("./includes/footer.php") ?>
