<?= $this->extend('layouts/mainsecond') ?>


<?= $this->section('content') ?>
<div id="global-loader"></div>
<div class="page">
    <div class="page-main">
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar ">

            <div class="sidebar-img">
                <a class="navbar-brand" href="<?= base_url() ?>"><img alt="..." class="navbar-brand-img main-logo"
                        src="<?= base_url() ?>/assets/img/brand/logo-dark.png"> <img alt="..."
                        class="navbar-brand-img logo" src="<?= base_url() ?>/assets/img/brand/logo.png"></a>
                <ul class="side-menu">

                    <?php if (!empty($_SESSION['sidebar_menuitems'])) : ?>


                    <?php foreach ($_SESSION['sidebar_menuitems'] as $main_menus) : ?>
                    <li <?php if (strtolower($main_menus->menuitem_link) == strtolower($menuslinks)) { ?>class="active slide"
                        <?php } else { ?>class="slide" <?php } ?>>
                        <a class="side-menu__item active" data-toggle="slide"
                            href="#<?php echo $main_menus->menuitem_text; ?>">
                            <i class="<?php echo $main_menus->menu_icon; ?>" style="min-width: 2.25rem;"></i>
                            <span class="side-menu__label"> <?php echo $main_menus->menuitem_text; ?></span>
                            <i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <?php if (!empty($main_menus->submenus)) : ?>
                            <?php foreach ($main_menus->submenus as $submenus) : ?>
                            <li class="slide-item" <?php /*if($submenus->menuitem_link==$route){ ?>class="active"
                                <?php } */ ?>>
                                <a href="<?php echo base_url($submenus->menuitem_link); ?>">
                                    <i class="<?php echo $submenus->menu_icon; ?>"></i>
                                    <span class="side-menu__label"><?php echo $submenus->menuitem_text; ?></span>
                                </a>
                            </li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <li>
                        <a class="side-menu__item" href="https://themeforest.net/user/sprukosoft/portfolio"><i
                                class="side-menu__icon fa fa-question-circle"></i><span class="side-menu__label">Help &
                                Support</span></a>
                    </li>
                </ul>
            </div>

        </aside>
        <!-- Sidebar menu-->

        <!-- app-content-->
        <div class="app-content ">
            <div class="side-app">
                <div class="main-content">
                    <div class="p-2 d-block d-sm-none navbar-sm-search">
                        <!-- Form -->
                        <form class="navbar-search navbar-search-dark form-inline ml-lg-auto">
                            <div class="form-group mb-0">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div><input class="form-control" placeholder="Search" type="text">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Top navbar -->
                    <nav class="navbar navbar-top  navbar-expand-md navbar-dark" id="navbar-main">
                        <div class="container-fluid">
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>

                            <!-- Horizontal Navbar -->


                            <!-- Brand -->
                            <a class="navbar-brand pt-0 d-md-none" href="index-2.html">
                                <img src="<?= base_url() ?>/assets/img/brand/logo-light.png" class="navbar-brand-img"
                                    alt="...">
                            </a>
                            <!-- Form -->

                            <!-- User -->
                            <ul class="navbar-nav align-items-center ">

                                <li class="nav-item dropdown">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0"
                                        data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder"
                                                    src="<?= base_url() ?>/assets/img/faces/female/32.jpg"></span>
                                            <div class="media-body ml-2 d-none d-lg-block">

                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                        <div class=" dropdown-header noti-title">
                                            <h6 class="text-overflow m-0">Welcome!</h6>
                                        </div>
                                        <a class="dropdown-item" href="user-profile.html"><i
                                                class="ni ni-single-02"></i> <span>My profile</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-settings-gear-65"></i>
                                            <span>Settings</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-calendar-grid-58"></i>
                                            <span>Activity</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-support-16"></i>
                                            <span>Support</span></a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item"
                                            href="login.html"><i class="ni ni-user-run"></i> <span>Logout</span></a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown d-none d-md-flex">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-0"
                                        data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <i class="fe fe-user "></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right">


                                        <a class="dropdown-item" href="<?= base_url('adminlogout') ?>"><span
                                                class="iconify" data-icon="fe:logout"></span> Logout</a>



                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Top navbar-->

                    <!-- Page content -->
                    <div class="container-fluid pt-8">
                        <div class="page-header mt-0 shadow p-3">
                            <ol class="breadcrumb mb-sm-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                            </ol>
                            <div class="btn-group mb-0">
                                <a href="<?php echo base_url(); ?>/addNewCategory">
                                    <button type="button" class="btn btn-primary btn-sm"><?= $page_heading ?></button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h2 class="mb-0"><?= $title ?></h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsives">
                                            <form action="<?= base_url('savenewcompanylist') ?>" method="POST"  enctype="multipart/form-data">
                                                <?php if ($session->getFlashdata('error')) : ?>
                                                <div class="alert alert-danger rounded-0">
                                                    <?= $session->getFlashdata('error') ?>
                                                </div>
                                                <?php endif; ?>
                                                <?php if ($session->getFlashdata('success')) : ?>
                                                <div class="alert alert-success rounded-0">
                                                    <?= $session->getFlashdata('success') ?>
                                                </div>
                                                <?php endif; ?>
                                                <?php if ($session->getFlashdata('warning')) : ?>
                                                <div class="alert alert-warning rounded-0">
                                                    <?= $session->getFlashdata('warning') ?>
                                                </div>
                                                <?php endif; ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Enter Company Name</label>
                                                            <input type="text" class="form-control" name="first_name"
                                                                id="first_name" placeholder="Enter Company Name" value="<?=!empty($query[0]->company_name) ? $query[0]->company_name : '' ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label">Enter Company Phone Number</label>
                                                            <input type="text" class="form-control" name="phone_number"
                                                                id="phone_number" placeholder="Enter Phone Number"
                                                                value="<?=!empty($query[0]->phone_number) ? $query[0]->phone_number : '' ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Enter Password</label>
                                                            <input type="password" class="form-control" name="password"
                                                                id="password" placeholder="Enter Password"
                                                                value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Choose Company Status</label>
                                                            <select name="status_ind" id="status_ind"
                                                                class="form-control">
                                                                <option value="">-- Company Status --</option>

                                                                <option value="1"  <?php echo (!empty($query[0]->status_ind) && $query[0]->status_ind == 1) ? 'selected' : '' ?>>Active</option>
                                                                <option value="0" <?php echo (!empty($query[0]->status_ind) && $query[0]->status_ind == 0) ? 'selected' : '' ?>>Inactive</option>
                                                            </select>
                                                        </div>

                         

                                                        <div class="form-group">

                                                        <label for="title">Select Services:</label>
                                                        <select name="service_id[]" id="service_id" class="category form-control" multiple>
                                                                <option value="">-- Select Services --</option>

                                                                <?php 
                                                                if(!empty($query[0]->company_service_id)){
                                                                
                                                                foreach ($services as $row) : ?>
                                                                <option value="<?php echo $row['id'] ?>"
                                                                    <?php 
                                                                    
                                                                    $myObj = $query[0]->company_service_id;
                                                                    $myArray = explode (",", $myObj); 
                                                                    
                                                                    echo (!empty($query[0]->company_service_id) &&  in_array($row['id'], $myArray) ) ? 'selected' : '' ?>>
                                                                    <?php echo $row['Services'] ?></option>
                                                                <?php endforeach;
                                                                } else{
                                                                    foreach ($services as $row) : ?>
                                                                        <option value="<?php echo $row['id'] ?>"
                                                                        <?php  echo (!empty($query[0]->company_service_id) &&  in_array($row['id'], $myArray) ) ? 'selected' : '' ?>>
                                                                    <?php echo $row['Services'] ?></option>

                                                                    <?php endforeach; } ?>
                                                                
                                                            </select>


                                                      
                                                                </div>
                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                          
                                                            <label class="form-label">Enter Company Email
                                                                Address</label>
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="Enter Email Address" value="<?=!empty($query[0]->company_email) ? $query[0]->company_email : '' ?>">
                                                        </div>


                                                        <div class="form-group" hidden>
                                                        <?php if (!empty($role_id) && $role_id == 1) { ?>
                                                   
                                                        <input type="hidden" id="role_id" name="role_id" value="1">

                                                        <?php } else {?>
                                                            <input type="hidden" id="role_id" name="role_id" value="7">

                                                            <?php } ?>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="form-label">Confirm Password</label>
                                                            <input type="password" class="form-control" name="cpassword"
                                                                id="cpassword" placeholder="Confirm Password"
                                                                value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput"><?= $title2 ?></label>
                                                            <input type="file" name="file" class="form-control" id="file" onchange="showPreviewcategory(event);"  accept=".png, .jpg, .jpeg" />
                                                        </div>

                                                        <div class="form-group">
                                                                            <div class="preview">
                                                                            <img id="file-ip-2-preview">
                                                                            </div>
                                                                    </div>
                                                        <div class="form-group">

                                                            <?php if (!empty($query[0]->profile_pic)) { ?>

                                                            <img style="width: 139px;" id="blah"
                                                                src="<?= base_url("uploads/" . $query[0]->profile_pic) ?>" />
                                                            <?php } else {?>
                                                            <div id="containtwo"></div>
                                                            <?php }?>

                                                        </div>




                                                        <div class="form-group">
                                                        <input type="hidden" class="company_id_hidd" name="company_id_hidd"  value="<?php echo (!empty($query[0]->company_user_id)) ? $query[0]->company_user_id : "" ?>" />

                                                            <label for="title">Select City:</label>
                                                            <select name="customer_location_id" id="customer_location_id" class="form-control">
                                                                <option value="">-- Select City --</option>
                                                                <?php foreach ($city as $row) : ?>
                                                                <option value="<?php echo $row['id'] ?>"
                                                                    <?php echo (!empty($query[0]->customer_location_id) && $query[0]->customer_location_id == $row['id']) ? 'selected' : '' ?>>
                                                                    <?php echo $row['city_name'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>




                                                        <div class="form-group">
                                                            <label for="title">Select Location:</label>
                                                            <?php  if(empty($query[0]->customer_city_branches_id)) {?>
                                                            <select name="location[]" id="location"  class="category  form-control" multiple>
                                                            <option value="">-- Select Location --</option>
                                                           
                                                            </select>
                                                            <?php } else {?>
                                                            <select name="location[]" id="locationnew" class="category form-control" multiple>
                                                                <option value="">-- Select Services --</option>
                                                                <?php foreach ($locates as $row) : ?>
                                                                <option value="<?php echo $row['location_id'] ?>"
                                                                    <?php 
                                                                    $myObj = $query[0]->customer_city_branches_id;
                                                                    $myArray = explode (",", $myObj); 
                                                                    
                                                                    echo (!empty($query[0]->customer_city_branches_id) &&  in_array($row['location_id'], $myArray) ) ? 'selected' : '' ?>>
                                                                    <?php echo $row['locations_name'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?php } ?>

                                                        </div>
                                                    </div>




                                                    <div class="col-md-12" style="text-align: center;">
                                                        <div class="d-grid gap-1">
                                                            <button
                                                                class="btn rounded-0 btn-primary bg-gradient">Save</button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Footer -->
                        <footer class="footer">
                            <div class="row align-items-center justify-content-xl-between">
                                <div class="col-xl-6">
                                    <div class="copyright text-center text-xl-left text-muted">
                                        <p class="text-sm font-weight-500">Copyright 2022 © All Rights
                                            Reserved.Dashboard Template</p>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <p class="float-right text-sm font-weight-500"><a
                                            href="www.templatespoint.net">Templates Point</a></p>
                                </div>
                            </div>
                        </footer>
                        <!-- Footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>


<script type='text/javascript'>
// baseURL variable
var baseURL= "<?php echo base_url();?>";
$(document).ready(function(){
// City change
$('#customer_location_id').change(function(){


var city = $(this).val();
// AJAX request
$.ajax({
url:'<?=base_url()?>/depedentselectthree',
method: 'POST',
data: {city: city},
dataType: 'JSON',
success: function(response){
// Remove options 

$('#location').find('option').not(':first').remove();
$.each(response,function(index,data){
$('#location').append('<option value="'+data['location_id']+'">'+data['locations_name']+'</option>');
});
$('.category').select2();
},
error: function(response){
						
						console.log(response);
					}
});
});
// Department change

});
</script>

<?= $this->endSection() ?><?= $this->extend('layouts/mainsecond') ?>