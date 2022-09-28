<?= $this->extend('layouts/mainsecond') ?>


<?= $this->section('content') ?>
<div id="global-loader"></div>
<div class="page">
    <div class="page-main">
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar ">

            <div class="sidebar-img">
                <a class="navbar-brand" href="<?= base_url() ?>"><img alt="..." class="navbar-brand-img main-logo" src="<?= base_url() ?>/assets/img/brand/logo-dark.png"> <img alt="..." class="navbar-brand-img logo" src="<?= base_url() ?>/assets/img/brand/logo.png"></a>
                <ul class="side-menu">

                    <?php if (!empty($_SESSION['sidebar_menuitems'])) : ?>


                        <?php foreach ($_SESSION['sidebar_menuitems'] as $main_menus) : ?>
                            <li <?php if (strtolower($main_menus->menuitem_link) == strtolower($menuslinks)) { ?>class="active slide" <?php } else { ?>class="slide" <?php } ?>>
                                <a class="side-menu__item active" data-toggle="slide" href="#<?php echo $main_menus->menuitem_text; ?>">
                                    <i class="<?php echo $main_menus->menu_icon; ?>" style="min-width: 2.25rem;"></i>
                                    <span class="side-menu__label"> <?php echo $main_menus->menuitem_text; ?></span>
                                    <i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <?php if (!empty($main_menus->submenus)) : ?>
                                        <?php foreach ($main_menus->submenus as $submenus) : ?>
                                            <li class="slide-item" <?php /*if($submenus->menuitem_link==$route){ ?>class="active"<?php } */ ?>>
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
                        <a class="side-menu__item" href="https://themeforest.net/user/sprukosoft/portfolio"><i class="side-menu__icon fa fa-question-circle"></i><span class="side-menu__label">Help & Support</span></a>
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
                                <img src="<?= base_url() ?>/assets/img/brand/logo-light.png" class="navbar-brand-img" alt="...">
                            </a>
                            <!-- Form -->

                            <!-- User -->
                            <ul class="navbar-nav align-items-center ">

                                <li class="nav-item dropdown">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0" data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder" src="<?= base_url() ?>/assets/img/faces/female/32.jpg"></span>
                                            <div class="media-body ml-2 d-none d-lg-block">

                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                        <div class=" dropdown-header noti-title">
                                            <h6 class="text-overflow m-0">Welcome!</h6>
                                        </div>
                                        <a class="dropdown-item" href="user-profile.html"><i class="ni ni-single-02"></i> <span>My profile</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-settings-gear-65"></i> <span>Settings</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-calendar-grid-58"></i> <span>Activity</span></a>
                                        <a class="dropdown-item" href="#"><i class="ni ni-support-16"></i> <span>Support</span></a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="login.html"><i class="ni ni-user-run"></i> <span>Logout</span></a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown d-none d-md-flex">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <i class="fe fe-user "></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right">


                                        <a class="dropdown-item" href="<?= base_url('adminlogout') ?>"><span class="iconify" data-icon="fe:logout"></span> Logout</a>



                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Top navbar-->

                    <!-- Page content -->
                    <div class="container-fluid pt-8">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h2 class="mb-0"><?= $title ?></h2>

                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsives">
                                            <form id="user_form" name="user_form" action="<?= base_url('savebrands') ?>" method="POST" enctype="multipart/form-data">
                                      
                                                <?php if ($session->getFlashdata('error')) { ?>
                                                    <div class="alert alert-danger rounded-0">
                                                        <?= $session->getFlashdata('error') ?>
                                                    </div>
                                                <?php } else if ($session->getFlashdata('success')) { ?>
                                                    <div class="alert alert-success rounded-0">
                                                        <?= $session->getFlashdata('success') ?>
                                                    </div>

                                                <?php } else if ($session->getFlashdata('warning')) { ?>
                                                    <div class="alert alert-warning rounded-0">
                                                        <?= $session->getFlashdata('warning') ?>
                                                    </div>
                                                <?php } else {
                                                } ?>


                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <input type="hidden" name="brand_id_hidd" id="brand_id_hidd" value="<?php echo (!empty($query[0]->id)) ? $query[0]->id : "" ?>" />
                                                        <div class="form-group">

                                                            <label class="form-label">Brand name</label>
                                                            <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Enter Brand Name" value="<?= !empty($query[0]->brand_name) ? $query[0]->brand_name : '' ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="preview">
                                                        <img id="file-ip-1-preview">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                               
                                                    <?php if (!empty($query[0]->name)) { ?>
                                                        
                                                            <img   style="width: 139px;" id="blah" src="<?= base_url("uploads/" . $query[0]->name) ?>" />
                                                        
                                                    <?php } else {?>
                                                    <div id="blah"></div>
                                                    <?php }?>
                                                       
                                                    </div>
                     
                                                    <div class="form-group col-md-12">
                                                        <label for="formGroupExampleInput">Upload Image</label>
                                                        <input type="file" name="file" class="form-control" id="file" onchange="showPreview(event);" accept=".png, .jpg, .jpeg"  />
                                                    </div>






                                                    <div class="col-md-12" style="text-align: center;">
                                                        <div class="d-grid gap-1">
                                                            <button class="btn rounded-0 btn-primary bg-gradient">Save</button>
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
                                        <p class="text-sm font-weight-500">Copyright 2022 © All Rights Reserved.Dashboard Template</p>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <p class="float-right text-sm font-weight-500"><a href="www.templatespoint.net">Templates Point</a></p>
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
<?= $this->endSection() ?><?= $this->extend('layouts/mainsecond') ?>