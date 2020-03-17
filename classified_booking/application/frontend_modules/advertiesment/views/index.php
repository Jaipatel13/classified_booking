  <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo base_url();?>frontend_assets/images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <?php
                  $newspaper_name = $data['newspaper_name'];
                ?>
                <h1><?php echo $newspaper_name; ?></h1>               
                <!-- <p class="mb-0"><?php echo $newspaper_name; ?></p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section bg-light">
      <div class="container">

    <div class="row">
          <div class="col-12">
            <h2 class="h5 mb-4 text-black"><center><b>Advertiesments</b></center></h2>
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
                     $all_newspaper = $data['all_advertiesment'];
                  }
                  if(isset($all_newspaper) && !empty($all_newspaper))
                  {
                      foreach ($all_newspaper as $key => $aco) {

                      $advertiesment_details_id = $aco['advertiesment_details_id'];
                      $advertiesment_name = $aco['advertiesment_name'];
                      $category_type = $aco['category_type'];

                      $newspaper_image_url = "";
                      $newspaper_ads_url = "";
                      if($inc == 1)
                      {
                        //$newspaper_image_url = base_url().'frontend_assets/images/img_1.png';
                        $newspaper_image_url = base_url().'frontend_assets/images/att-1.jpg';
                        $current_ad_image_url_key = 'sess_current_ad_image_url_'.$advertiesment_details_id;
                        $sess_data = array(                                
                                $current_ad_image_url_key  => $newspaper_image_url,
                             );
                        $this->session->set_userdata($sess_data);
                        $newspaper_ads_url = base_url().'advertiesment/advertiesment_details/advertiesment_details_id/'.$advertiesment_details_id;
                      }
                      elseif($inc == 2)
                      {
                        //$newspaper_image_url = base_url().'frontend_assets/images/img_2.png';
                        $newspaper_image_url = base_url().'frontend_assets/images/att-2.jpg';
                        $current_ad_image_url_key = 'sess_current_ad_image_url_'.$advertiesment_details_id;
                        $sess_data = array(                                
                                $current_ad_image_url_key  => $newspaper_image_url,
                             );
                        $this->session->set_userdata($sess_data);
                        $newspaper_ads_url = base_url().'advertiesment/advertiesment_details/advertiesment_details_id/'.$advertiesment_details_id;
                      }
                      elseif($inc == 3)
                      {
                        //$newspaper_image_url = base_url().'frontend_assets/images/img_3.gif';
                        $newspaper_image_url = base_url().'frontend_assets/images/att-3.jpg';
                        $current_ad_image_url_key = 'sess_current_ad_image_url_'.$advertiesment_details_id;
                        $sess_data = array(                                
                                $current_ad_image_url_key  => $newspaper_image_url,
                             );
                        $this->session->set_userdata($sess_data);
                        $newspaper_ads_url = base_url().'advertiesment/advertiesment_details/advertiesment_details_id/'.$advertiesment_details_id;
                      }
                      elseif($inc == 4)
                      {
                        //$newspaper_image_url = base_url().'frontend_assets/images/img_4.gif';
                        $newspaper_image_url = base_url().'frontend_assets/images/att-4.jpg';
                        $current_ad_image_url_key = 'sess_current_ad_image_url_'.$advertiesment_details_id;
                        $sess_data = array(                                
                                $current_ad_image_url_key  => $newspaper_image_url,
                             );
                        $this->session->set_userdata($sess_data);
                        $newspaper_ads_url = base_url().'advertiesment/advertiesment_details/advertiesment_details_id/'.$advertiesment_details_id;
                      }
                      elseif($inc == 5)
                      {
                        //$newspaper_image_url = base_url().'frontend_assets/images/img_5.gif';
                        $newspaper_image_url = base_url().'frontend_assets/images/att-5.jpg';
                        $current_ad_image_url_key = 'sess_current_ad_image_url_'.$advertiesment_details_id;
                        $sess_data = array(                                
                                $current_ad_image_url_key  => $newspaper_image_url,
                             );
                        $this->session->set_userdata($sess_data);
                        $newspaper_ads_url = base_url().'advertiesment/advertiesment_details/advertiesment_details_id/'.$advertiesment_details_id;
                      }
                      elseif($inc == 6)
                      {
                        //$newspaper_image_url = base_url().'frontend_assets/images/pune.jpeg';
                        $newspaper_image_url = base_url().'frontend_assets/images/atd-1.jpg';
                        $current_ad_image_url_key = 'sess_current_ad_image_url_'.$advertiesment_details_id;
                        $sess_data = array(                                
                                $current_ad_image_url_key  => $newspaper_image_url,
                             );
                        $this->session->set_userdata($sess_data);
                        $newspaper_ads_url = base_url().'advertiesment/advertiesment_details/advertiesment_details_id/'.$advertiesment_details_id;
                      }
                      elseif($inc == 7)
                      {
                        // $newspaper_image_url = base_url().'frontend_assets/images/bm.jpeg';
                        $newspaper_image_url = base_url().'frontend_assets/images/atd-2.jpg';
                        $current_ad_image_url_key = 'sess_current_ad_image_url_'.$advertiesment_details_id;
                        $sess_data = array(                                
                                $current_ad_image_url_key  => $newspaper_image_url,
                             );
                        $this->session->set_userdata($sess_data);
                        $newspaper_ads_url = base_url().'advertiesment/advertiesment_details/advertiesment_details_id/'.$advertiesment_details_id;
                      }
                      elseif($inc == 8)
                      {
                        // $newspaper_image_url = base_url().'frontend_assets/images/img_6.gif';
                        $newspaper_image_url = base_url().'frontend_assets/images/atd-3.jpg';
                        $current_ad_image_url_key = 'sess_current_ad_image_url_'.$advertiesment_details_id;
                        $sess_data = array(                                
                                $current_ad_image_url_key  => $newspaper_image_url,
                             );
                        $this->session->set_userdata($sess_data);
                        $newspaper_ads_url = base_url().'advertiesment/advertiesment_details/advertiesment_details_id/'.$advertiesment_details_id;
                      }
              ?>

              <div class="d-block d-md-flex listing vertical">
                <a href="<?php echo $newspaper_ads_url;?>" class="img d-block" style="background-image: url('<?php echo $newspaper_image_url;?>')"></a>
                <div class="lh-content">
                  <span class="category" title="Advertiesment Name"><?php echo $advertiesment_name;?></span>
                  <span class="category" title="Category Type"><?php echo $category_type;?></span>
                  <!-- <a href="#" class="bookmark"><span class="icon-heart"></span></a> -->
                  <h3><a href="<?php echo $newspaper_ads_url;?>">Book your Advertiesment</a></h3>
                  <!-- <address>Gujarat,India</address> -->
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
                  <address>Gujarat,India</address>
                </div>
              </div>

              <div class="d-block d-md-flex listing vertical">
                <a href="listings-single.html" class="img d-block" style="background-image: url('<?php echo base_url();?>frontend_assets/images/img_3.gif')"></a>
                <div class="lh-content">
                  <span class="category">Gujarat Samachar</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <h3><a href="listings-single.html">Book Your Advertiesment</a></h3>
                  <address>Gujarat,India</address>
                </div>
              </div>

              <div class="d-block d-md-flex listing vertical">
                <a href="listings-single.html" class="img d-block" style="background-image: url('<?php echo base_url();?>frontend_assets/images/img_4.gif')"></a>
                <div class="lh-content">
                  <span class="category">The Times Of India</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <address>India</address>
                </div>
              </div>

              <div class="d-block d-md-flex listing vertical">
                <a href="listings-single.html" class="img d-block" style="background-image: url('<?php echo base_url();?>frontend_assets/images/img_5.gif')"></a>
                <div class="lh-content">
                  <span class="category">Maharast Times</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <address>Maharast,India</address>
                </div>
              </div>

              <div class="d-block d-md-flex listing vertical">
                <a href="listings-single.html" class="img d-block" style="background-image: url('<?php echo base_url();?>frontend_assets/images/img_6.gif')"></a>
                <div class="lh-content">
                  <span class="category">Rajshtan Patrika</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <address>Rajshtan,India</address>
                </div>
              </div>
              <?php */ ?>

          </div>
        </div>
      </div>

    </div>
  </div>
