  <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo base_url();?>frontend_assets/images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">            
            
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <?php
                  $advertiesment_details_id = $data['advertiesment']['advertiesment_details_id'];
                  $newspaper_id = $data['advertiesment']['newspaper_id'];
                  $advertiesment_name = $data['advertiesment']['advertiesment_name'];
                  $description = $data['advertiesment']['description'];
                  $advertiesment_amount = $data['advertiesment']['advertiesment_amount'];
                  $advertiesment_amount_str = $advertiesment_amount." ".ORDER_AMOUNT_CURRENCY_SYMBOL; 
                  $advertiesment_height = $data['advertiesment']['advertiesment_height'];
                  $advertiesment_width = $data['advertiesment']['advertiesment_width'];
                  $category_type = $data['advertiesment']['category_type'];
                  $newspaper_image_url = $data['newspaper_image_url'];
                ?>
                <h1><?php echo $advertiesment_name; ?></h1>
                <!-- <p class="mb-0">Don St, Brooklyn, New York</p> -->
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <?php 
              $message = $this->session->flashdata('message');
              $success = $this->session->flashdata('success');

              if (isset($success) && $success == true)
              {
                  $message_icon_class = "glyphicon glyphicon-ok cls_padding_right_1_perc cls_font_size_100_perc";
                  $message_class = "cls_message_success_true";
              }
              else
              {
                  $message_icon_class = "glyphicon glyphicon-remove cls_padding_right_1_perc cls_font_size_100_perc";
                  $message_class = "cls_message_success_false";
              }

              if (isset($message))
              {
          ?>
          <div class="row">
              <div class="col-md-12 cls_text_align_center">
                  <span class="<?php echo $message_class; ?>"><i class="<?php echo $message_icon_class; ?>"></i><?php echo $message; ?></span>
              </div>
          </div>
          <?php 
                  $this->session->unset_userdata('message');
              }
          ?>
        <div class="row">
          <div class="col-lg-7">
            
            <div class="mb-4">
              <div class=""> <!-- slide-one-item home-slider owl-carousel -->
                <div><img src="<?php echo $newspaper_image_url;?>" alt="Image" class="img-fluid"></div>
                <!-- <div><img src="<?php echo base_url();?>frontend_assets/images/img_2.png" alt="Image" class="img-fluid"></div>
                <div><img src="<?php echo base_url();?>frontend_assets/images/img_3.gif" alt="Image" class="img-fluid"></div>
                <div><img src="<?php echo base_url();?>frontend_assets/images/img_4.gif" alt="Image" class="img-fluid"></div> -->
              </div>
            </div>
            
            <h4 class="h5 mb-4 text-black">Amount</h4>
            <p><?php echo $advertiesment_amount_str; ?></p>

            <h4 class="h5 mb-4 text-black">Description</h4>
            <p><?php echo $description; ?></p>

            <h4 class="h5 mb-4 text-black">Specifications</h4>
            <p><label>Advertiesment Height :</label><strong> <?php echo $advertiesment_height; ?></strong></p>
            <p><label>Advertiesment width :</label><strong> <?php echo $advertiesment_width; ?></strong></p>
            <p><label>Category Type :</label><strong> <?php echo $category_type; ?></strong></p> 

          </div>
          <div class="col-lg-5 ml-auto">

        <div class="mb-5"  data-aos="fade">

            <form action="<?php echo base_url(); ?>advertiesment/addAdvertiesment" method="post" class="p-3 bg-white">
              <input type="hidden" name="advertiesment_details_id" value="<?php echo $advertiesment_details_id; ?>">
              <input type="hidden" name="newspaper_id" value="<?php echo $newspaper_id; ?>">
              <input type="hidden" name="advertiesment_name" value="<?php echo $advertiesment_name; ?>">
              <input type="hidden" name="advertiesment_amount" value="<?php echo $advertiesment_amount; ?>">
             
             <?php /* ?>
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">First Name</label>
                  <input type="text" id="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Last Name</label>
                  <input type="text" id="lname" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Subject</label> 
                  <input type="subject" id="subject" class="form-control">
                </div>
              </div>
              <?php */ ?>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Describe your Advertiesment<br/><strong>[Note: For adding Images provide Image Links only]</strong></label> 
                  <textarea name="description" id="message" cols="30" rows="7" class="form-control" placeholder="Describe your Advertiesment"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Book Now" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>
          </div>
        </div>          
      </div>
    </div>
  </div>

    
    