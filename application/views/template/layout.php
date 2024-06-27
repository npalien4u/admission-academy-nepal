<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->

<head>
	<!--begin::Base Path (base relative path for assets of this page) -->
	<base href="../">
	<!--end::Base Path -->
	<meta charset="utf-8" />
	<title><?= ($this->session->userdata["tenant"])->name ?> :: <?= @$consent_text->form_title ? $consent_text->form_title : "Online Registration Form"; ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin::Fonts -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Asap+Condensed:500"]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!--end::Fonts -->
	<!--begin::Page Vendors Styles(used by this page) -->
	<link href="<?= base_url() ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors Styles -->
	<!--begin:: Global Mandatory Vendors -->
	<link href="<?= base_url() ?>assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

	<!--end:: Global Mandatory Vendors -->

	<!--begin:: Global Optional Vendors -->
	<link href="<?= base_url() ?>assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />

	<link href="<?= base_url() ?>assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

	<!--end:: Global Optional Vendors -->

	<!--begin::Global Theme Styles(used by all pages) -->
	<link href="<?= base_url() ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/css/demo1/pages/custom/general/error/error-5.css" rel="stylesheet" type="text/css" />


	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->
	<link href="<?= base_url() ?>assets/css/custom.css" rel="stylesheet" type="text/css" />

	<?php
	if (@$this->session->userdata("tenant")->custom_css != "") {
		echo "<link href='" . base_url("assets/css/custom/" . $this->session->userdata("tenant")->custom_css) . "' rel='stylesheet' type='text/css' />";
	}
	?>

	<!--end::Layout Skins -->

	<script src="<?= base_url() ?>assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
	<link rel="shortcut icon" href="<?= base_url() ?>assets/media/logos/favicon.ico" />
	<link rel="manifest" href="<?= base_url() ?>manifest.json">
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-page--fluid kt-page-content-white kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

	<!-- begin:: Page -->


	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

				<!-- begin:: Header -->
				<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
					<div class="kt-container">

						<!-- begin:: Brand -->
						<div class="kt-header__brand " id="kt_header_brand">

							<div class="kt-header__brand-nav">
								<div class="dropdown">
									<a href="<?= ($this->session->userdata["tenant"])->website ?>" target="_blank" class="btn btn-default">
										FormsNepal: Online Registration Forms for Educational Institutions
									</a>
								</div>
							</div>
						</div>


					</div>
				</div>

				<!-- end:: Header -->
				<div class="kt-container kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch" id="kt_body">

					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
									<?= ($this->session->userdata["tenant"])->name ?> </h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="javascript:" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="<?= base_url() ?>" class="kt-subheader__breadcrumbs-link">
										Online Registration Form</a>

								</div>
							</div>
							<div class="kt-subheader__toolbar">
								<div class="kt-subheader__wrapper">
									<a href="<?= base_url("applicant") ?>">Login</a>
									<a class="btn kt-subheader__btn-daterange">
										<span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title">Today</span>&nbsp;
										<span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date"><?= date("M d") ?></span>
										<i class="flaticon2-calendar-1"></i>
									</a>

								</div>
							</div>
						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-content kt-grid__item kt-grid__item--fluid">

							<!--Begin::Dashboard 4-->
							<div class="row">
								<div class="col-xl-12">
									<div class="kt-portlet">
										<div class="kt-portlet__body">
											<div class="kt-widget kt-widget--user-profile-3 d-block d-sm-none">
												<div class="kt-widget__top-">
													<center>
														<div class="kt-widget__media">
															<img style="max-height: 80px;" src="<?= base_url() ?>uploads/tenants/<?= ($this->session->userdata["tenant"])->logo ?>" alt="image">
														</div>
														<div class=" kt-font-brand kt-font-bolder">
															<h3><?= ($this->session->userdata["tenant"])->name ?></h3>
															<p><a href="mail:<?= ($this->session->userdata["tenant"])->email ?>"><?= ($this->session->userdata["tenant"])->email ?></a>															<p>
															<p>Phone: <?= ($this->session->userdata["tenant"])->phone ?></p>
														</div>
													</center>

												</div>
											</div>
											<div class="kt-widget kt-widget--user-profile-3 d-none d-sm-block">
												<div class="kt-widget__top">
													<div class="kt-widget__media">
														<img style="max-height:80px" src="<?= base_url() ?>uploads/tenants/<?= ($this->session->userdata["tenant"])->logo ?>" alt="image">
													</div>
													<div class=" kt-font-brand kt-font-bolder">
														<h1><?= ($this->session->userdata["tenant"])->name ?></h1>
														<p>Address: <?= ($this->session->userdata["tenant"])->address ?>
														<p>
														<p>Website: <a href="<?= ($this->session->userdata["tenant"])->website ?>"><?= ($this->session->userdata["tenant"])->website ?></a>
														<p>
														<p>Phone: <?= ($this->session->userdata["tenant"])->phone ?></p>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--Begin::Section-->
							<div class="row">
								<div class="col-xl-12">
									<?= $this->load->view($child_view, @$data, true) ?>
								</div>
							</div>

							<!--End::Section-->


							<!--End::Dashboard 4-->
						</div>

						<!-- end:: Content -->
					</div>
				</div>

				<!-- begin:: Footer -->
				<div class="kt-footer kt-grid__item" id="kt_footer">
					<div class="kt-container">
						<div class="kt-footer__wrapper">
							<div class="kt-footer__copyright">
								<?= date("Y") ?>&nbsp;&copy;&nbsp;<a href="#" target="_blank" class="kt-link">FormsNepal</a>
							</div>
							<div class="kt-footer__menu">
								<a href="#" target="_blank" class="kt-link">About Us</a>
								<a href="#" target="_blank" class="kt-link">Contact Us</a>
								<a href="#" target="_blank" class="kt-link">Support</a>
							</div>
						</div>
					</div>
				</div>

				<!-- end:: Footer -->
			</div>
		</div>
	</div>

	<!-- end:: Page -->



	<!-- begin::Scrolltop -->
	<div id="kt_scrolltop" class="kt-scrolltop">
		<i class="fa fa-arrow-up"></i>
	</div>

	<!-- end::Scrolltop -->

	<!-- begin::Global Config(global config for global JS sciprts) -->
	<script>
		var KTAppOptions = {
			"colors": {
				"state": {
					"brand": "#5d78ff",
					"light": "#ffffff",
					"dark": "#282a3c",
					"primary": "#5867dd",
					"success": "#34bfa3",
					"info": "#36a3f7",
					"warning": "#ffb822",
					"danger": "#fd3995"
				},
				"base": {
					"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
					"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
				}
			}
		};
	</script>
	<!-- end::Global Config -->

	<!--begin:: Global Mandatory Vendors -->
	<script src="<?= base_url() ?>assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
	<!--end:: Global Mandatory Vendors -->

	<!--begin:: Global Optional Vendors -->
	<script src="<?= base_url() ?>assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
	<!--end:: Global Optional Vendors -->

	<!--begin::Page Vendors(used by this page) -->
	<script src="<?= base_url() ?>assets/js/demo1/scripts.bundle.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
	<!--end::Page Vendors -->

	<!--begin::Global Theme Bundle(used by all pages) -->
	<script src="<?= base_url() ?>assets/js/scripts.bundle.js" type="text/javascript"></script>
	<!--end::Global Theme Bundle -->

	<!--begin::Page Scripts(used by this page) -->
	<script src="<?= base_url() ?>assets/js/pages/crud/forms/validation/form-widgets.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/js/pages/crud/datatables/data-sources/ajax-server-side.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/js/pages/crud/forms/ajax-actions.js" type="text/javascript"></script>
	<!--end::Page Scripts -->
	<script>
		if ('serviceWorker' in navigator) {
			console.log("Will the service worker register?");
			navigator.serviceWorker.register('<?= base_url() ?>service-worker.js')
				.then(function(reg) {
					console.log("Yes, it did.");
				}).catch(function(err) {
					console.log("No it didn't. This happened: ", err)
				});
		}
	</script>
</body>
<!-- end::Body -->

</html>