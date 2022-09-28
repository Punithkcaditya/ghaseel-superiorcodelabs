<?= $this->extend('layouts/mainfifth') ?>

<?= $this->section('content') ?>
    

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">

        <!-- header and footer bar go here-->
        <div class="header header-fixed header-auto-show header-logo-app">
            <a href="index.html" class="header-title">GHASEEL</a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-dark"><i
                    class="fas fa-sun"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-light"><i
                    class="fas fa-moon"></i></a>
            <a href="#" data-menu="menu-highlights" class="header-icon header-icon-3"><i class="fas fa-brush"></i></a>
        </div>


        <div class="page-content">

            <div class="page-title page-title-small nobackdrnd">



                <div mbsc-page class="demo-display">
                    <div style="height:100%">

                        <div mbsc-form>
                            <div class="mbsc-form-group">

                                <div class="mbsc-form-group mbsc-btn-group-block">

                                    <!-- <button mbsc-button id="show-bottom">Try bottom display mode</button> -->
                                    <h2><a href="#" mbsc-button id="show-bottom"><?= !empty( get_cookie("location")) ?  get_cookie("location") : 'Location' ?> <i class='fas fa-angle-down'
                                                style='font-size:13px'></i></a>
                                        <!-- <a href="#" onclick="openForm()">Location <i class='fas fa-angle-down'
                            style='font-size:13px'></i></a> -->
                                    </h2>

                                </div>
                            </div>
                        </div>


                        <div id="demo-bottom" class="mbsc-cloak">
                            <div class="mbsc-align-center mbsc-padding">

                                <div class="accordion" id="accordion-1">

                                <?php 
                            //    echo '<pre>';
                            //    print_r($cities);
                                
                                if (!empty($cities)) : 
                                    $i = 1;
                                foreach ($cities as $main_menus) : ?>
                                    <div class="mb-0">
                                        <button class="btn accordion-btn no-effect color-theme"
                                            data-bs-toggle="collapse" data-bs-target="#collapse<?=  $i ?>">
                                            <i class="fa-solid fa-location-pin"></i>
                                           <?= $main_menus->city_name?>
                                            <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                                        </button>
                                        <div id="collapse<?=  $i ?>" class="collapse" data-bs-parent="#accordion-1">
                                            <div class="pt-1 pb-2 ps-3 pe-3">
                                            <?php
                                            
                                            $var=explode(',',$main_menus->differentlocations);
                                            foreach ($var as $rows) : ?>
                                             <input type="hidden"    name="location" id="location" class="form-control"  value="<?php echo (!empty($rows)) ? $rows : '' ?>"   >
                                           <p class="location" data-productid="<?php echo $main_menus->id?>"  data-productname="<?php echo $rows?>" ><?= $rows ?></p>

                                                <?php endforeach; ?>
                                         
                                            </div>
                                        </div>
                                    </div>
                               
                                    <?php
                                
                                $i++;
                                endforeach; ?>
                    <?php endif; ?>
                                  

                                </div>
                            </div>
                        </div>
                    </div>
                </div>








                <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img"
                    data-src="images/avatars/5s.png"></a>
                <!-- <a href="#" data-menu="menu-main" class="bg-fade-highlight-light  preload-img" ><i class="fa-solid fa-bars" style="font-size: 26px;"></i></a> -->

            </div>
            <div class="card header-card shape-rounded" data-card-height="150">
                <div class="card-overlay bg-highlight opacity-95"></div>
                <div class="card-overlay dark-mode-tint"></div>
                <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
            </div>



            <!-- MODAL CONTENT SAMPLE STARTS HERE -->


            <!-- MODAL CONTENT SAMPLE ENDS HERE -->





            <!-- display from bottom start -->









            <!-- display from bottom end -->






            <div class="card card-style">
                <div class="content">
                    <h4 class="mb-0">Choose Brands</h4>
                   
                </div>
                <div class="divider mb-0"></div>
           
                <div class="content my-n1">
                    <div class="gallery-views gallery-view-1">



                    <?php
            //    echo '<pre>';
            //    print_r($cars);
            if (!empty($brands)) : 
            $i = 1;
            foreach ($brands as $main_menus) : ?>
 <a data-gallery="gallery-1" href="images/brands/eicher-logo.png" title="Vynil and Typerwritter">
                            <img src="<?= base_url("uploads/" . $main_menus['name']) ?>" data-src="<?= base_url("uploads/" . $main_menus['name']) ?>" class="rounded-m preload-img shadow-l img-fluid" alt="<?= $main_menus['brand_name'] ?>">
                            <div class="caption">
                                <h4 class="color-theme"><?= $main_menus['brand_name'] ?></h4>
                         
                                <div class="divider bottom-0"></div>
                            </div>
                        </a>



<?php
                                
                                $i++;
                                endforeach;
                                endif; ?>


                  			
                    </div>
                </div>
            </div>
    



            <!-- footer and footer card-->
            <div class="footer" data-menu-load="menu-footer.html"></div>



            <div class="mylocation" id="mylocation"></div>
        </div>
        <!-- end of page content-->


        <div id="menu-share" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-load="menu-share.html"
            data-menu-height="420" data-menu-effect="menu-over">
        </div>

        <div id="menu-highlights" class="menu menu-box-bottom menu-box-detached rounded-m"
            data-menu-load="menu-colors.html" data-menu-height="510" data-menu-effect="menu-over">
        </div>

        <div id="menu-main" class="menu menu-box-right menu-box-detached rounded-m" data-menu-width="260"
            data-menu-load="menu-main.html" data-menu-active="nav-pages" data-menu-effect="menu-over">
        </div>



    </div>







    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/multiple/js/bootstrap.js'?>"></script>

    <script type="text/javascript">
    var baseURL= "<?php echo base_url();?>";
	$(document).ready(function(){
        
        myFunction();
        function myFunction() {
            var data = "<?php echo get_cookie("location") ?>";
            if(data != null && data != '') {
             console.log(data);   
}else{
    document.getElementById("show-bottom").click();
}
  
}



		$('.location').click(function(){
			var product_id    = $(this).data("productid");
			var product_name  = $(this).data("productname");
           // console.log(product_name);
         
			$.ajax({
				url : '<?=base_url()?>/locate',
				method : "post",
				data : {product_id: product_id, product_name: product_name},
				success: function(data){
					//$('#detail_cart').html(data);
                    window.location.reload();
				},
                error: function(response){
						
						console.log(response);
					}
			});
		});
    });
    </script>








  
    <?= $this->endSection() ?>