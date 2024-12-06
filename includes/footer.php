 <!-- Footer Start -->
 <div id="footer">
     <div class="container-fluid bg-dark text-light footer mt-5 pt-0 wow fadeIn" data-wow-delay="0.1s">
         <div class="container py-5">
             <div class="row g-5 " style="margin-left: 10%;">
                 <div class="col-lg-3 col-md-6 " style="width:35%;" >
                     <h1 class="text-light mb-4 "><?php echo constant('page_footer_1') ?></h1>
                     <p class="mb-2 fs-5"><i class="fa fa-map-marker-alt me-3"></i><?php echo constant('page_footer_12') ?></p>
                     <p class="mb-2 fs-5"><i class="fa fa-phone-alt me-3"></i><?php echo constant('page_footer_13') ?></p>
                     <p class="mb-2 fs-5"><i class="fa fa-fax me-3"></i><?php echo constant('page_footer_14') ?></p>
                     <p class="mb-2 fs-5"><i class="fa fa-envelope me-3"></i><?php echo constant('page_footer_15') ?></p>
                     <p class="mb-2 fs-5"><i class="fab fa-line me-3"></i><?php echo constant('page_footer_16') ?></p>
                 </div>
                 <div class="col-lg-3 col-md-6 " style="width:30%;" >
                     <h1 class="text-light mb-4"><?php echo constant('page_footer_2') ?></h1>
                     <?php $query = "SELECT * FROM services_small";
                            $ser_small = mysqli_query($connection, $query);
                            if (mysqli_num_rows($fetch_data) == 0) {
                                //echo "<h1 class='text-center'>No content Found</h1>";
                            } else {
                                while ($Row_ser = mysqli_fetch_assoc($ser_small)) {
                                    if ($_SESSION['lang'] == 'en') {
                                        $ser_small_name = $Row_ser['service_name'];
                                    } else {
                                        $ser_small_name = $Row_ser['service_name_th'];
                                    }
                                    $link_ser_name = $Row_ser['link_ser_name'];
                     ?>
                     <a class="btn btn-link fs-5" href="<?php echo  $link_ser_name ?>"><?php echo  $ser_small_name ?></a>

                     <?php } } ?>
                 </div>
                 <div class="col-lg-3 col-md-6 ms-5 " >
                     <h1 class="text-light mb-4"><?php echo constant('page_footer_3') ?></h1>
                     <a class="btn btn-link fs-5" href=""><?php echo constant('page_footer_31') ?></a>
                     <a class="btn btn-link fs-5" href=""><?php echo constant('page_footer_32') ?></a>
                     <a class="btn btn-link fs-5" href=""><?php echo constant('page_footer_33') ?></a>

                     <h1 class="text-light mb-3 mt-4"><?php echo constant('page_footer_4') ?></h1>
                     <div class="d-flex pt-2">
                         <a class="btn btn-outline-light btn-social fs-5" href="https://twitter.com/Wisepaq" target="_parent"><i
                                 class="fab fa-twitter "></i></a>
                         <a class="btn btn-outline-light btn-social fs-5" href="https://www.facebook.com/Wisepaqbusiness/" target="_blank"><i
                                 class="fab fa-facebook-f"></i></a>
                         <a class="btn btn-outline-light btn-social fs-5" href=""><i class="fab fa-youtube"></i></a>
                         <!-- <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a> -->
                     </div>
                 </div>
                 <!-- <div class="col-lg-3 col-md-6 ">
                     <h4 class="text-light mb-2"><?php echo constant('page_footer_4') ?></h4>
                     <div class="d-flex pt-2">
                         <a class="btn btn-outline-light btn-social " href="https://twitter.com/Wisepaq" target="_parent"><i
                                 class="fab fa-twitter "></i></a>
                         <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/Wisepaqbusiness/" target="_blank"><i
                                 class="fab fa-facebook-f"></i></a>
                         <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                         <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                     </div>
                 </div> -->
             </div>
         </div>
         <div class="container">
             <div class="copyright text-center">
                <span class="border-bottom" ><?php echo constant('page_footer_0') ?></span>
             </div>
         </div>
     </div>
 </div>
 <!-- Footer End -->


 <!-- Back to Top -->
 <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-3 back-to-top"><i class="bi bi-arrow-up fa-lg"></i></a>