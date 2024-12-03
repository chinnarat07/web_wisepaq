 <!-- Spinner Start -->
 <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
     <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
         <span class="sr-only">Loading...</span>
     </div>
 </div>
 <!-- Spinner End -->

 <!-- Topbar Start -->
 <div class="container-fluid bg-light p-0">
     <div class="row gx-0 d-none d-lg-flex">
         <div class="col-lg-7 px-5 text-start">
             <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                 <small class="fa fa-map-marker-alt text-primary me-2"></small>
                 <small>116/69 SSP Tower 2, 19th Floor, Na Ranong Road,<br> Klongtoey, Klongtoey Bangkok, Thailand 10110</small>
             </div>
             <div class="h-100 d-inline-flex align-items-center py-3">
                 <small class="far fa-clock text-primary me-2"></small>
                 <small>Mon - Fri : 08.30 AM - 17.00 PM</small>
             </div>
         </div>
         <div class="col-lg-5 px-5 text-center">
             <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                 <small class="fa fa-phone-alt text-primary me-2"></small>
                 <small>021 195 300, 081 935 9559, 089 615 5559</small>
             </div>
             <div class="h-100 d-inline-flex align-items-center">
                 <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.facebook.com/Wisepaqbusiness/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                 <a class="btn btn-sm-square bg-white text-primary me-1" href="https://twitter.com/Wisepaq" target="_blank"><i class="fab fa-twitter"></i></a>
                 <a class="btn btn-sm-square bg-white text-primary me-0" href="https://www.youtube.com/@Wisepaq-business/videos" target="_blank"><i class="fab fa-youtube"></i></a>
             </div>
         </div>
     </div>
 </div>
 <!-- Topbar End -->


 <!-- Navbar Start -->
<!-- <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
     <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
         <h2 class="m-0 "><img src="img/wisepaq.jpg" alt="" width="60" height="60" style="margin-right: 5px;">WISEPAQ</h2>
     </a>
     <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
         <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarCollapse">
         <div class="navbar-nav ms-auto p-4 p-lg-0">
             <?php
                $query = "SELECT * FROM menu";
                $fetch_data = mysqli_query($connection, $query);

                if (mysqli_num_rows($fetch_data) == 0) {
                    //echo "<h1 class='text-center'>No content Found</h1>";
                } else {

                    while ($Row = mysqli_fetch_assoc($fetch_data)) {
                        $menu_id = $Row['id'];
                        $menu_title = $Row['menu_name'];
                        $link = $Row['link_name'];
                ?>
                  <?php  if($menu_id <=6) { ?>
                        <a href="<?php echo $link; ?>" class="nav-item nav-link active"><?php echo $menu_title; ?></a>
                  <?php }else { ?>
                      <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">More</a>
                         <div class="dropdown-menu fade-up m-0">
                             <a href="<?php echo $link; ?>" class="dropdown-item"><?php echo $menu_title; ?></a>
                             <a href="<?php echo $link; ?>" class="dropdown-item"><?php echo $menu_title; ?></a>
                             <a href="<?php echo $link; ?>" class="dropdown-item"><?php echo $menu_title; ?></a>
                             <a href="<?php echo $link; ?>" class="dropdown-item"><?php echo $menu_title; ?></a>
                             <a href="<?php echo $link; ?>" class="dropdown-item"><?php echo $menu_title; ?></a>
                         </div>
                     </div>
        <?php } ?>
           <?php }
                } ?>
                
     </div>

          <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a> 
     </div>
 </nav>-->
 <!-- Navbar End -->
 
 <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 "><img src="img/wisepaq.jpg" alt="" width="60" height="60" style="margin-right: 5px;">WISEPAQ</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <?php
            $query = "SELECT * FROM menu";
            $fetch_data = mysqli_query($connection, $query);

            if (mysqli_num_rows($fetch_data) == 0) {
                //echo "<h1 class='text-center'>No content Found</h1>";
            } else {
                while ($Row = mysqli_fetch_assoc($fetch_data)) {

                    $menu_id = $Row['menu_id'];
                    if ($_SESSION['lang'] == 'en') {
                        $menu_title = $Row['menu_name'];
                    } else {
                        $menu_title = $Row['menu_name_thai'];
                    }
                    $link = $Row['link_name'];
           ?>
                
                    <div class="nav-item dropdown">       
                   <a href="<?php echo $link; ?>" class="nav-item nav-link active"><?php echo $menu_title;  ?></a>
              
            <?php

                        $query_sub = "SELECT * FROM sub_menu where menu_id= $menu_id";
                        $fetch_data_sub = mysqli_query($connection, $query_sub);

                        if (mysqli_num_rows($fetch_data_sub) == 0) {
                            //echo "<h1 class='text-center'>No content Found</h1>";
                        } else {
                       ?>     
                              <div class="dropdown-menu fade-up m-0">
                      <?php       
                            while ($Row_sub = mysqli_fetch_assoc($fetch_data_sub)) {
                                $menu_title_sub = $Row_sub['menu_subname'];
                                $link_sub = $Row_sub['link_subname'];
                  ?>
                                    <a href="<?php echo $link_sub;  ?>" class="dropdown-item"><?php echo $menu_title_sub  ?></a>
                            <?php 
                              }
                          } ?>                 
                 </div>    
                     </div>         
            <?php 
                }
            } ?>

            <!-- <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a> -->
        </div>
       </div>        
    </nav>
    <!-- Navbar End -->