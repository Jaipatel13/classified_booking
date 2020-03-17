
    <div class="site-blocks-cover overlay" style="background-image: url(<?php echo base_url();?>frontend_assets/images/hero_3.jpeg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-12">          
            
            <div class="row justify-content-center mb-2">
              <div class="col-md-8 text-center">
                <h1 class="text-primary" data-aos="fade-up"><b>BOOK YOUR ADVERTIESMENT</b></h1>
                <p class="text-white" data-aos="fade-up" data-aos-delay="100"><b>You can book advertiesment on the Go.</b></p>
              </div>
            </div>

            <div class="container-fluid" style="padding-left:0px; padding-right:0px;">
              <form id="homeForm" action="#" method="post">
              <input type="hidden" id="flowhidden" name="flowhidden"/>
              <div class="cover-bg">
                <div class="homepage">
                  <!-- <div class="big-text">Book Newspaper Classified Ads Online 
                    <div class="initiative"><span>A Times Group Initiative</span></div>
                  </div> -->
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="ad-sample-container">
                          <div class="pr">
                            <img src="<?php echo base_url();?>frontend_assets/images/img1.jpeg" class="rotate left">
                            <!-- <img src="images/img_4.gif'" class="rotate right"> -->
                          </div>
                        </div>
                        <a href="#" class="btn btn-primary py-2 px-4 text-white" id="rolFlow">Book Classified Text Ad</a>
                        </div>

                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="ad-sample-container">
                          <div class="pr">
                            <img src="<?php echo base_url();?>frontend_assets/images/img2.jpeg" class="rotate left">
                            <!-- <img src="images/img_4.gif'" class="rotate right"> -->
                          </div>
                        </div>
                        <a href="#" class="btn btn-primary py-2 px-4 text-white" id="rolFlow">Book Classified Display Ad</a>
                      </div>
                      <?php /* ?>
                      <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="ad-sample-container">
                          <div class="pr">
                            <img src="<?php echo base_url();?>frontend_assets/images/img3.jpeg" class="rotate left">
                            <!-- <img src="images/img_4.gif'" class="rotate right"> -->
                          </div>
                        </div>
                        <button class="btn btn-primary py-2 px-4 text-white" id="rolFlow" onclick="location.href='Classified_booking';checkFlow(this.id);">Book Classified Text Ad</button>
                      </div>
                      <?php */ ?>
                  </div>          
            </div>
              </form>         
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>  

    <div class="site-section bg-light">
      <div class="container">
        
        <div class="overlap-category mb-5">
              
          <div class="row align-items-stretch no-gutters">
            <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
              <a href="#" class="popular-category h-100">
                <span class="icon"><span class="flaticon-house"></span></span>
                <span class="caption mb-2 d-block">House sell(Rent)</span>
              
              </a>
            </div>
            <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
              <a href="#" class="popular-category h-100">
                <span class="icon"><span class="flaticon-books"></span></span>
                <span class="caption mb-2 d-block">Education</span>
                
              </a>
            </div>
            <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
              <a href="#" class="popular-category h-100">
                <span class="icon"><span class="flaticon-bunk-bed"></span></span>
                <span class="caption mb-2 d-block">Furniture</span>
                
              </a>
            </div>
            <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
              <a href="#" class="popular-category h-100">
                <span class="icon"><span class="flaticon-innovation"></span></span>
                <span class="caption mb-2 d-block">Electronics</span>
                
              </a>
            </div>
            <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
              <a href="#" class="popular-category h-100">
                <span class="icon"><span class="flaticon-car"></span></span>
                <span class="caption mb-2 d-block">Cars &amp; Vehicles</span>
                
              </a>
            </div>
            <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
              <a href="#" class="popular-category h-100">
                <span class="icon"><span class="flaticon-pizza"></span></span>
                <span class="caption mb-2 d-block">Other</span>
                
              </a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <h2 class="h5 mb-4 text-black"><center><b>Book Ad By Publication</b></center></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12  block-13">
            <div class="owl-carousel nonloop-block-13">
              <?php
                  $all_newspaper = array();
                  $inc = 1;
                  if(isset($data) && !empty($data))
                  {
                     $all_newspaper = $data['all_newspaper'];
                  }
                  if(isset($all_newspaper) && !empty($all_newspaper))
                  {
                      foreach ($all_newspaper as $key => $aco) {

                      $newspaper_id = $aco['newspaper_id'];
                      $newspaper_name = $aco['newspaper_name'];

                      $newspaper_image_url = "";
                      $newspaper_ads_url = "";
                      if($inc == 1)
                      {
                        //$newspaper_image_url = base_url().'frontend_assets/images/img_1.png';
                        $newspaper_image_url = base_url().'frontend_assets/images/img_6.gif';
                        $newspaper_ads_url = base_url().'advertiesment/index/newspaper_id/'.$newspaper_id;
                      }
                      elseif($inc == 2)
                      {
                        //$newspaper_image_url = base_url().'frontend_assets/images/img_2.png';
                        $newspaper_image_url = base_url().'frontend_assets/images/bm.jpeg';
                        $newspaper_ads_url = base_url().'advertiesment/index/newspaper_id/'.$newspaper_id;
                      }
                      elseif($inc == 3)
                      {
                        //$newspaper_image_url = base_url().'frontend_assets/images/img_3.gif';
                        $newspaper_image_url = base_url().'frontend_assets/images/pune.jpeg';
                        $newspaper_ads_url = base_url().'advertiesment/index/newspaper_id/'.$newspaper_id;
                      }
                      elseif($inc == 4)
                      {
                        //$newspaper_image_url = base_url().'frontend_assets/images/img_4.gif';
                        $newspaper_image_url = base_url().'frontend_assets/images/img_5.gif';
                        $newspaper_ads_url = base_url().'advertiesment/index/newspaper_id/'.$newspaper_id;
                      }
                      elseif($inc == 5)
                      {
                        //$newspaper_image_url = base_url().'frontend_assets/images/img_5.gif';
                        $newspaper_image_url = base_url().'frontend_assets/images/img_4.gif';
                        $newspaper_ads_url = base_url().'advertiesment/index/newspaper_id/'.$newspaper_id;
                      }
                      elseif($inc == 6)
                      {
                        //$newspaper_image_url = base_url().'frontend_assets/images/pune.jpeg';
                        $newspaper_image_url = base_url().'frontend_assets/images/img_3.gif';
                        $newspaper_ads_url = base_url().'advertiesment/index/newspaper_id/'.$newspaper_id;
                      }
                      elseif($inc == 7)
                      {
                        // $newspaper_image_url = base_url().'frontend_assets/images/bm.jpeg';
                        $newspaper_image_url = base_url().'frontend_assets/images/img_2.png';
                        $newspaper_ads_url = base_url().'advertiesment/index/newspaper_id/'.$newspaper_id;
                      }
                      elseif($inc == 8)
                      {
                        // $newspaper_image_url = base_url().'frontend_assets/images/img_6.gif';
                        $newspaper_image_url = base_url().'frontend_assets/images/img_1.png';
                        $newspaper_ads_url = base_url().'advertiesment/index/newspaper_id/'.$newspaper_id;
                      }
              ?>
              <div class="d-block d-md-flex listing vertical">
                <a href="<?php echo $newspaper_ads_url;?>" class="img d-block" style="background-image: url('<?php echo $newspaper_image_url;?>')"></a>
                <div class="lh-content">
                  <span class="category"><?php echo $newspaper_name;?></span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <h3><a href="<?php echo $newspaper_ads_url;?>">Book your Advertiesment</a></h3>
                  <!-- <address>Gujarat,India</address> -->
                  <!-- <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p> -->
                </div>
              </div>
              <?php
                      $inc++;
                      }
                  }
              ?>

              <?php /* ?>
              <div class="d-block d-md-flex listing vertical">
                <a href="listings-single.html" class="img d-block" style="background-image: url('<?php echo base_url();?>frontend_assets/images/img_2.png')"></a>
                <div class="lh-content">
                  <span class="category">Sandesh</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <h3><a href="listings-single.html">Book Your Advertiesment</a></h3>
                  <!-- <address>Gujarat,India</address> -->
                  <!-- <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p> -->
                </div>
              </div>

              <div class="d-block d-md-flex listing vertical">
                <a href="listings-single.html" class="img d-block" style="background-image: url('<?php echo base_url();?>frontend_assets/images/img_3.gif')"></a>
                <div class="lh-content">
                  <span class="category">Gujarat Samachar</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <h3><a href="listings-single.html">Book Your Advertiesment</a></h3>
                  <address>Gujarat,India</address>
                  <!-- <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p> -->
                </div>
              </div>

              <div class="d-block d-md-flex listing vertical">
                <a href="listings-single.html" class="img d-block" style="background-image: url('<?php echo base_url();?>frontend_assets/images/img_4.gif')"></a>
                <div class="lh-content">
                  <span class="category">The Times Of India</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <!-- <h3><a href="listings-single.html">iPhone X gray</a></h3> -->
                  <address>India</address>
                  <!-- <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p> -->
                </div>
              </div>

              <div class="d-block d-md-flex listing vertical">
                <a href="listings-single.html" class="img d-block" style="background-image: url('<?php echo base_url();?>frontend_assets/images/img_5.gif')"></a>
                <div class="lh-content">
                  <span class="category">Maharast Times</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <!-- <h3><a href="listings-single.html">Red Luxury Car</a></h3> -->
                  <address>Maharast,India</address>
                  <!-- <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p> -->
                </div>
              </div>

              <div class="d-block d-md-flex listing vertical">
                <a href="listings-single.html" class="img d-block" style="background-image: url('<?php echo base_url();?>frontend_assets/images/pune.jpeg')"></a>
                <div class="lh-content">
                  <span class="category">Pune Mirror</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <h3><a href="listings-single.html">Book Your Advertiesment</a></h3>
                  <address>Pune,India</address>
                  <!-- <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p> -->
                </div>
              </div>

              <div class="d-block d-md-flex listing vertical">
                <a href="listings-single.html" class="img d-block" style="background-image: url('<?php echo base_url();?>frontend_assets/images/bm.jpeg')"></a>
                <div class="lh-content">
                  <span class="category">Banglore Mirror</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <h3><a href="listings-single.html">Book Your Advertiesment</a></h3>
                  <address>Banglore,India</address>
                  <!-- <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p> -->
                </div>
              </div>


              <div class="d-block d-md-flex listing vertical">
                <a href="listings-single.html" class="img d-block" style="background-image: url('<?php echo base_url();?>frontend_assets/images/img_6.gif')"></a>
                <div class="lh-content">
                  <span class="category">Rajshtan Patrika</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                 <!--  <h3><a href="listings-single.html">House with Swimming Pool</a></h3>
 -->                  <address>Rajshtan,India</address>
                <!--   <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p>
 -->                </div>
              </div>
              <?php */ ?>

            </div>
          </div>


        </div>
      </div>
    </div>