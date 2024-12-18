 <!-- Footer Start -->
 <div id="footer" >
     <div class="container-fluid bg-dark text-light footer mt-5  wow fadeIn "  data-wow-delay="0.1s">
         <div class="container py-5">
             <div class="row g-5 ">
                 <div class="col-lg-3 col-md-6 ">
                     <h1 class="text-light mb-4 "><?php echo constant('page_footer_1') ?></h1>
                     <p class="mb-2 "><i class="fa fa-map-marker-alt me-3"></i><?php echo constant('page_footer_12') ?></p>
                     <p class="mb-2 "><i class="fa fa-phone-alt me-3"></i><?php echo constant('page_footer_13') ?></p>
                     <p class="mb-2 "><i class="fa fa-fax me-3"></i><?php echo constant('page_footer_14') ?></p>
                     <p class="mb-2 "><i class="fa fa-envelope me-3"></i><?php echo constant('page_footer_15') ?></p>
                     <p class="mb-2 "><i class="fab fa-line me-3"></i><?php echo constant('page_footer_16') ?></p>
                 </div>
                 <div class="col-lg-3 col-md-6 ">
                     <h1 class="text-light mb-4"><?php echo constant('page_footer_2') ?></h1>
                     <?php $query = "SELECT * FROM tbl_services_small";
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
                             <a class="btn btn-link " href="<?php echo  $link_ser_name ?>"><?php echo  $ser_small_name ?></a>

                     <?php }
                        } ?>
                 </div>
                 <div class="col-lg-3 col-md-6 ">
                     <h1 class="text-light mb-4"><?php echo constant('page_footer_3') ?></h1>
                     <a class="btn btn-link " href=""><?php echo constant('page_footer_31') ?></a>
                     <a class="btn btn-link " href=""><?php echo constant('page_footer_32') ?></a>
                     <a class="btn btn-link " href=""><?php echo constant('page_footer_33') ?></a>

                     <h1 class="text-light mb-3 mt-4"><?php echo constant('page_footer_4') ?></h1>
                     <div class="d-flex pt-2">
                         <a class="btn btn-outline-light btn-social " href="https://twitter.com/Wisepaq" target="_parent"><i
                                 class="fab fa-twitter "></i></a>
                         <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/Wisepaqbusiness/" target="_blank"><i
                                 class="fab fa-facebook-f"></i></a>
                         <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/@Wisepaq-business/videos" target="_blank"><i class="fab fa-youtube"></i></a>
                         <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/peraphol/" target="_blank"><i class="fab fa-instagram"></i></a>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6 ">
                     <h1 class="text-light mb-4"><?php echo constant('page_footer_5') ?></h1>
                     
                             <div class="position-relative h-100">
                                 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15504.243776250698!2d100.5580155!3d13.7147587!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2a1e14e5f1c45%3A0x96187e02d34a4e78!2sWisepaq%20Business%20Solutions%20Provider%20Co.%2CLtd.!5e0!3m2!1sth!2sth!4v1733478257715!5m2!1sth!2sth" 
                                    width="350" height="250" style="border:0;"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                             </div>

                 </div>
             </div>
         </div>
         <div class="container">
             <div class="copyright text-center">
                 <span class="border-bottom"><?php echo constant('page_footer_0') ?></span>
             </div>
         </div>
     </div>
 </div>
 <!-- Footer End -->


 <!-- Back to Top -->
 <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-3 back-to-top"><i class="bi bi-arrow-up fa-lg"></i></a>