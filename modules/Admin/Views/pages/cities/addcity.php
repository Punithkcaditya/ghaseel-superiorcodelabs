<?= $this->extend('layouts/mainthird') ?>


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
					<li class="slide">
						<a class="side-menu__item active" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<!-- <li>
									<a class="slide-item" href="">Retail Sales Dashboard</a>
								</li> -->
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Master</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<li>
								<a href="<?= base_url('/Main/addCity') ?>" class="slide-item">City</a>
							</li>
							<li>
								<a href="dragable-cards.html" class="slide-item">Category</a>
							</li>
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-bar-chart-2"></i><span class="side-menu__label">Services</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<!-- <li>
									<a href="chart-flot.html" class="slide-item">Flot Charts</a>
								</li> -->
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Account</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<!-- <li>
									<a href="login.html" class="slide-item">Login</a>
								</li> -->
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-edit"></i><span class="side-menu__label">Forms</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<!-- <li>
									<a href="forms.html" class="slide-item">Basic Forms</a>
								</li> -->
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-map"></i><span class="side-menu__label">Maps</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<li>
								<a href="maps.html" class="slide-item">Google Maps</a>
							</li>
							<li>
								<a href="vector-map.html" class="slide-item">Vector Map</a>
							</li>
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">Tables</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<!-- <li>
									<a href="tables.html" class="slide-item">Tables</a>
								</li> -->
						</ul>
					</li>

					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Pages</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<!-- <li>
									<a href="user-profile.html" class="slide-item">User Profile</a>
								</li> -->
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-italic"></i><span class="side-menu__label">Icons</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<!-- <li>
									<a href="icons-feather.html" class="slide-item">Feather Icons</a>
								</li> -->
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-underline"></i><span class="side-menu__label">Ui Elements</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<!-- <li>
									<a href="accordion.html" class="slide-item">Accordion</a>
								</li> -->
						</ul>
					</li>


					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-shopping-cart"></i><span class="side-menu__label">Shops</span><i class="angle fa fa-angle-right"></i></a>
						<ul class="slide-menu">
							<!-- <li>
									<a href="shop.html" class="slide-item">Products</a>
								</li> -->
						</ul>
					</li>

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

							<?php if ($session->login_type == 1) : ?>
								<ul class="navbar-nav align-items-center d-none d-xl-block">
									<li class="nav-item dropdown">
										<a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0 d-none d-lg-block" data-toggle="dropdown" href="#" role="button">
											Default Settings <span class="fas fa-caret-down"></span>
										</a>
										<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
											<a class="dropdown-item" href="#"><span>Manage Profile</span></a>
											<a class="dropdown-item" href="#"><span>Themes</span></a>
											<a class="dropdown-item" href="#"><span>Passwords</span></a>
											<a class="dropdown-item" href="#"><span>Payment methods</span></a>
											<a class="dropdown-item" href="#"><span>Other Settings</span></a>
										</div>
									</li>
									<li class="nav-item dropdown">
										<a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0 d-none d-lg-block" data-toggle="dropdown" href="#" role="button">
											Projects <span class="fas fa-caret-down"></span>
										</a>
										<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
											<a class="dropdown-item" href="#"><span>Active</span></a>
											<a class="dropdown-item" href="#"><span>Marketing</span></a>
											<a class="dropdown-item" href="#"><span>Users</span></a>
											<a class="dropdown-item" href="#"><span>Development</span></a>
											<a class="dropdown-item" href="#"><span>Settings</span></a>
										</div>
									</li>
								</ul>
							<?php endif; ?>
							<!-- Brand -->
							<a class="navbar-brand pt-0 d-md-none" href="index-2.html">
								<img src="<?= base_url() ?>/assets/img/brand/logo-light.png" class="navbar-brand-img" alt="...">
							</a>
							<!-- Form -->
							<form class="navbar-search navbar-search-dark form-inline mr-3 ml-lg-auto">
								<div class="form-group mb-0">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-search"></i></span>
										</div><input class="form-control" placeholder="Search" type="text">
									</div>
								</div>
							</form>
							<!-- User -->
							<ul class="navbar-nav align-items-center ">
								<?php if ($session->login_type == 1) : ?>
									<li class="nav-item d-none d-md-flex">
										<div class="dropdown d-none d-md-flex mt-2 ">
											<a class="nav-link full-screen-link pl-0 pr-0"><i class="fe fe-maximize-2 floating " id="fullscreen-button"></i></a>
										</div>
									</li>


									<li class="nav-item dropdown d-none d-md-flex">
										<a aria-expanded="false" aria-haspopup="true" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
											<div class="media align-items-center">
												<i class="fe fe-mail "></i>
											</div>
										</a>
										<div class="dropdown-menu  dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right">
											<a href="#" class="dropdown-item text-center">12 New Messages</a>
											<div class="dropdown-divider"></div>
											<a href="#" class="dropdown-item d-flex">
												<span class="avatar brround mr-3 align-self-center"><img src="<?= base_url() ?>/assets/img/faces/male/41.jpg" alt="img"></span>
												<div>
													<strong>Madeleine</strong> Hey! there I' am available....
													<div class="small text-muted">3 hours ago</div>
												</div>
											</a>
											<a href="#" class="dropdown-item d-flex">
												<span class="avatar brround mr-3 align-self-center"><img src="<?= base_url() ?>/assets/img/faces/female/1.jpg" alt="img"></span>
												<div>
													<strong>Anthony</strong> New product Launching...
													<div class="small text-muted">5 hour ago</div>
												</div>
											</a>
											<div class="dropdown-divider"></div>
											<a href="#" class="dropdown-item text-center">See all Messages</a>
										</div>
									</li>
									<li class="nav-item dropdown d-none d-md-flex">
										<a aria-expanded="false" aria-haspopup="true" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
											<div class="media align-items-center">
												<i class="fe fe-bell f-30 "></i>
											</div>
										</a>
										<div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right">
											<a href="#" class="dropdown-item d-flex">
												<div>
													<strong>Someone likes our posts.</strong>
													<div class="small text-muted">3 hours ago</div>
												</div>
											</a>
											<a href="#" class="dropdown-item d-flex">
												<div>
													<strong> 3 New Comments</strong>
													<div class="small text-muted">5 hour ago</div>
												</div>
											</a>
											<a href="#" class="dropdown-item d-flex">
												<div>
													<strong> Server Rebooted.</strong>
													<div class="small text-muted">45 mintues ago</div>
												</div>
											</a>
											<div class="dropdown-divider"></div>
											<a href="#" class="dropdown-item text-center">View all Notification</a>
										</div>
									</li>
								<?php endif; ?>
								<li class="nav-item dropdown">
									<a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0" data-toggle="dropdown" href="#" role="button">
										<div class="media align-items-center">
											<span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder" src="<?= base_url() ?>/assets/img/faces/female/32.jpg"></span>
											<div class="media-body ml-2 d-none d-lg-block">
												<span class="mb-0 "><?php echo $session->login_name ?></span>
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


										<a class="dropdown-item" href="<?= base_url('logout') ?>"><span class="iconify" data-icon="fe:logout"></span> Logout</a>

										<!-- 
											             <a class="dropdown-item d-flex" href="<?= base_url('update_user') ?>"><i class="fa fa-cog text-muted"></i> Update User</a>	
											<a class="dropdown-item d-flex" href="#">
												<span class="avatar brround mr-3 align-self-center"> <img src="assets/img/faces/male/4.jpg" alt="imag" ></span>
												<div>
													<strong>Madeleine Scott</strong> sent you friend request
													<div class=" mt-2 small text-muted">
														<span class="btn btn-sm btn-primary">Conform</span>
														<span class="btn btn-sm btn-outline-primary">Delete</span>
													</div>
												</div>
											</a> -->
										<!-- <a class="dropdown-item d-flex" href="#">
												<span class="avatar brround mr-3 align-self-center"><img src="assets/img/faces/female/14.jpg" alt="imag" ></span>
												<div>
													<strong>rebica</strong> sent you friend request
													<div class=" mt-2 small text-muted">
														<span class="btn btn-sm btn-primary">Conform</span>
														<span class="btn btn-sm btn-outline-primary">Delete</span>
													</div>
												</div>
											</a>
											<a class="dropdown-item d-flex" href="#">
												<span class="avatar brround mr-3 align-self-center"><img src="assets/img/faces/male/1.jpg" alt="imag"></span>
												<div>
													<strong>Devid robott</strong> sent you friend request
													<div class=" mt-2 small text-muted">
														<span class="btn btn-sm btn-primary">Conform</span>
														<span class="btn btn-sm btn-outline-primary">Delete</span>
													</div>
												</div>
											</a> -->
										<!-- <div class="dropdown-divider"></div><a class="dropdown-item text-center text-muted-dark" href="#">View all Requestes</a> -->
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
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
							<div class="btn-group mb-0">
								<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#"><i class="fas fa-plus mr-2"></i>Add new Page</a>
									<a class="dropdown-item" href="#"><i class="fas fa-eye mr-2"></i>View the page Details</a>
									<a class="dropdown-item" href="#"><i class="fas fa-edit mr-2"></i>Edit Page</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Settings</a>
								</div>
							</div>
						</div>

						<form action="<?= base_url('login') ?>" method="POST">
						<div class="row">
						
							<div class="col-md-12">
								<div class="card shadow">
									<div class="card-header">
										<h2 class="mb-0">Enter Details</h2>
									</div>
									
										<div class="card-body">
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
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<?php $i = 1; ?>

														<input type="text" class="form-control" name="input" placeholder="Enter City Name" value="">
													</div>
												</div>
											</div>
										</div>
								</div>
								<div class="card shadow" style="padding-bottom: 74px;">
									<div class="card-header">
										<h2 class="mb-0">Enter Locations </h2>
									</div>
									<div class="card-body" id="addanother">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													<input type="text" class="form-control" placeholder="Enter Location <?= $i ?>" name="example-text-input<?= $i++ ?>">
												</div>

											</div>
											<div class="col-md-6">
												<div class="form-group">

													<input type="text" class="form-control  state-valid" placeholder="Enter Location <?= $i ?>" name="example-text-input-valid<?= $i++ ?>">
												</div>

											</div>
											<!-- <div class="col-md-2">
											<button type="button" class="btn hideing btn-danger mt-1 mb-1" id="deleterow"><i class="fas fa-minus"></i> Delete Fields</button>
											</div> -->
										</div>
										<input type="hidden" name="count_items" id="count_items" value="<?= $i ?>" />
									</div>
									<div class="col-md-12 button_holder">
										<div class="card-body">
										<button type="submit" class="btn rounded-0 btn-primary bg-gradient">Submit</button>
											<button type="button" class="btn btn-info mt-1 mb-1" id="addrow"><i class="fas fa-plus-circle"></i> Add Fields</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						</form>
						<!-- Footer -->
						<footer class="footer">
							<div class="row align-items-center justify-content-xl-between">
								<div class="col-xl-6">
									<div class="copyright text-center text-xl-left text-muted">
										<p class="text-sm font-weight-500">Copyright 2018 © All Rights Reserved.Dashboard Template</p>
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
		<!-- app-content-->
	</div>
</div>
<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>





<?= $this->endSection() ?>