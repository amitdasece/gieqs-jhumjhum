<?php require '../../assets/includes/config.inc.php';?>

<?php

			//$openaccess = 0;
			

			
			//$general = new general;
			//$video = new video;
			//$tagCategories = new tagCategories;

			//error_reporting(0);

			?>

<!DOCTYPE html>
<html lang="en">



<head>

<?php

//define user access level

$openaccess = 0;
$requiredUserLevel = 3;

require BASE_URI . '/head.php';

$formv1 = new formGenerator;

?>

	<title>Ghent International Endoscopy Symposium - Backend - Main</title>
  
  

	<style>
		.modal-backdrop {
			opacity: 0.75 !important;
		}

		@media screen and (max-width: 400px) {


			.scroll {

				font-size: 1em;

			}

			.h5 {

				font-size: 1em;
			}

			.tiny {
				font-size: 0.75em;

			}

			.btn {

				padding: 0.25rem 1.00rem;
				margin-bottom: 0.75rem;
			}
		}
	</style>
</head>

<body>
	<header class="header header-transparent" id="header-main">
		<!-- Topbar -->

		<?php require BASE_URI . '/topbar.php';?>

		<!-- Main navbar -->

		<?php require BASE_URI . '/nav.php';?>

	</header>

	<div class="container">



		<section class="header-account-page bg-dark d-flex align-items-end" data-offset-top="#header-main"
			style="padding-top: 147.4px;">
			<!-- Header container -->
			<div class="container pt-4 pt-lg-0">
				<div class="row">
					<div class=" col-lg-12">
						<!-- Salute + Small stats -->
						<div class="row align-items-center mb-4">
							<div class="col-md-5 mb-4 mb-md-0">
								<span class="h2 mb-0 text-white d-block">GIEQs backend</span>

								<!-- <span class="text-white">Have a nice day!</span> -->
							</div>
							<!-- <div class="col-auto flex-fill d-none d-xl-block">
                <ul class="list-inline row justify-content-lg-end mb-0">
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                    <span class="badge badge-dot text-white">
                      <i class="bg-success"></i>Sales
                    </span>
                    <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                      20.5%
                      <small class="fas fa-angle-up text-success"></small>
                    </a>
                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                    <span class="badge badge-dot text-white">
                      <i class="bg-warning"></i>Tasks
                    </span>
                    <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                      5.7%
                      <small class="fas fa-angle-up text-warning"></small>
                    </a>
                  </li>
                  <li class="list-inline-item col-sm-4 col-md-auto px-3 my-2 mx-0">
                    <span class="badge badge-dot text-white">
                      <i class="bg-danger"></i>Sales
                    </span>
                    <a class="d-sm-block h5 text-white font-weight-bold pl-2" href="#">
                      -3.24%
                      <small class="fas fa-angle-down text-danger"></small>
                    </a>
                  </li>
                </ul>
              </div> -->
						</div>

						<!-- Account navigation -->
						<?php require('backendNav.php');?>


					</div>
				</div>
			</div>
		</section>

		<section class="slice bg-section-secondary">
			<div class="container">
				<!-- Stats -->
				<div class="mb-5">
					<div class="row">
						<div class="col-lg-4">
							<div
								class="card card-stats bg-gradient-primary border-0 hover-shadow-lg hover-translate-y-n3 mb-4 ml-lg-0">
								<div class="actions actions-dark">
									<a href="#" class="action-item">
										<i class="fas fa-sync-alt"></i>
									</a>
									<div class="dropdown">
										<a href="#" class="action-item" data-toggle="dropdown" aria-expanded="false"><i
												class="fas fa-ellipsis-h"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="#" class="dropdown-item">Refresh</a>
											<a href="#" class="dropdown-item">Manage Widgets</a>
											<a href="#" class="dropdown-item">Settings</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<div>
											<div class="icon text-white icon-sm">
												<i class="fas fa-credit-card"></i>
											</div>
                    </div>
                    <div class="pl-4">
											<span class="d-block h5 text-white mr-2 mb-1">Sponsorship</span>
											<span class="text-white"></span>
                    </div>
  </div>
  <div class="d-flex">
										<div class="pl-4">
                      <span class="text-white">Target sponsorship</span>
                      <span class="d-block h5 text-white mr-2 mb-1">&euro; 149,232.88</span>
                    </div>
                    <div class="pl-4">
                      <span class="text-white">Current sponsorship</span>
                      <span class="d-block h5 text-white mr-2 mb-1">&euro; 143,250.00</span>
                      </div>
                      </div>
                      <div class="d-flex p-2">
										<div>
                    <div class="pl-4">
                      <span class="text-white ">Confirmed sponsors</span>
                      <ul class="p-0 m-0">Boston (&euro; 25,000)</ul>
                      <ul class="p-0 m-0">Olympus <br/>(&euro; target 25,000 [15,000 given])</ul>
                      <ul class="p-0 m-0">Fujifilm <br/>(&euro; target 25,000 [15,000 given])</ul>
                      <ul class="p-0 m-0">Boucart (&euro; 5,000)</ul>
                      <ul class="p-0 m-0">Cook (&euro; 4,000)</ul>
                      <ul class="p-0 m-0">Mundipharmam (&euro; 7,500)</ul>
                      <ul class="p-0 m-0">Prion (&euro; 3,000)</ul>
                      <ul class="p-0 m-0">Medtronic (&euro; 15,000)</ul>
                      <ul class="p-0 m-0">Norgine (&euro; 7,500)</ul>
                      <ul class="p-0 m-0">Takeda (&euro; 7,500)</ul>
  </div>
  </div>
  </div>

										
									
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div
								class="card card-stats bg-gradient-info border-0 hover-shadow-lg hover-translate-y-n3 mb-4 ml-lg-0">
								<div class="actions actions-dark">
									<a href="#" class="action-item">
										<i class="fas fa-sync-alt"></i>
									</a>
									<div class="dropdown">
										<a href="#" class="action-item" data-toggle="dropdown" aria-expanded="false"><i
												class="fas fa-ellipsis-h"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="#" class="dropdown-item">Refresh</a>
											<a href="#" class="dropdown-item">Manage Widgets</a>
											<a href="#" class="dropdown-item">Settings</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<div>
											<div class="icon text-white icon-sm">
												<i class="fas fa-file-alt"></i>
											</div>
										</div>
										<div class="pl-4">
											<span class="d-block h5 text-white mr-2 mb-1">Attendees</span>
											<span class="text-white">3</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div
								class="card card-stats bg-gradient-dark border-0 hover-shadow-lg hover-translate-y-n3 mb-4 ml-lg-0">
								<div class="actions actions-dark">
									<a href="#" class="action-item">
										<i class="fas fa-sync-alt"></i>
									</a>
									<div class="dropdown">
										<a href="#" class="action-item" data-toggle="dropdown" aria-expanded="false"><i
												class="fas fa-ellipsis-h"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="#" class="dropdown-item">Refresh</a>
											<a href="#" class="dropdown-item">Manage Widgets</a>
											<a href="#" class="dropdown-item">Settings</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<div>
											<div class="icon text-white icon-sm">
												<i class="fas fa-clock"></i>
											</div>
										</div>
										<div class="pl-4">
											<span class="d-block h5 text-white mr-2 mb-1">
												Target Timeline
											</span>
											<span class="text-white"></span>
										</div>
                  </div>
                  <div class="d-flex">
                  <div class="pl-4">
											<span class="d-block h5 text-white mr-2 mb-1">
												programme complete
											</span>
											<span class="text-white">3 April 2020</span>
										</div>
  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Today's meetings -->
				<!-- <div class="actions-toolbar py-2 mb-4">
          <h5 class="mb-1">Today's meetings</h5>
          <p class="text-sm text-muted mb-0">Manage pending orders and track invoices.</p>
        </div>
        <div class="card-deck flex-column flex-lg-row mb-5">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <span class="avatar bg-primary text-white rounded-circle avatar-lg">TC</span>
                <div class="avatar-content ml-3">
                  <h6 class="mb-0">Betty Mavis</h6>
                  <small class="d-block text-muted font-weight-bold">betty.mavis@example.com</small>
                  <span class="text-muted"><i class="fas fa-clock mr-2"></i>10:30 AM</span>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div>
                  <a href="#" class="text-sm font-weight-bold d-block">7 members going</a>
                </div>
                <div>
                  <a href="#" class="text-sm font-weight-bold d-block">3 pending</a>
                </div>
              </div>
              <div class="mt-3 mb-2">
                <div class="avatar-group">
                  <a href="#" class="avatar rounded-circle avatar-sm">
                    <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg" class="">
                  </a>
                  <a href="#" class="avatar rounded-circle avatar-sm">
                    <img alt="Image placeholder" src="../../assets/img/theme/light/team-2-800x800.jpg" class="">
                  </a>
                  <a href="#" class="avatar rounded-circle avatar-sm">
                    <img alt="Image placeholder" src="../../assets/img/theme/light/team-3-800x800.jpg" class="">
                  </a>
                </div>
              </div>
              <small class="h6 text-sm font-weight-bold">Reminder:</small>
              <p class="text-sm lh-160 mb-0">When we strive to become better than we are everything around us becomes better too.</p>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <img alt="Image placeholder" src="../../assets/img/theme/light/team-2-800x800.jpg" class="avatar  rounded-circle avatar-lg hover-shadow-lg hover-scale-110">
                <div class="avatar-content ml-3">
                  <h6 class="mb-0">Jennifer Stone</h6>
                  <small class="d-block text-muted font-weight-bold">jennifer.stone@example.com</small>
                  <span class="text-muted"><i class="fas fa-clock mr-2"></i>12:15 PM</span>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div>
                  <a href="#" class="text-sm font-weight-bold d-block">7 members going</a>
                </div>
                <div>
                  <a href="#" class="text-sm font-weight-bold d-block">3 pending</a>
                </div>
              </div>
              <div class="mt-3 mb-2">
                <div class="avatar-group">
                  <a href="#" class="avatar rounded-circle avatar-sm">
                    <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg" class="">
                  </a>
                  <a href="#" class="avatar rounded-circle avatar-sm">
                    <img alt="Image placeholder" src="../../assets/img/theme/light/team-2-800x800.jpg" class="">
                  </a>
                  <a href="#" class="avatar rounded-circle avatar-sm">
                    <img alt="Image placeholder" src="../../assets/img/theme/light/team-3-800x800.jpg" class="">
                  </a>
                </div>
              </div>
              <small class="h6 text-sm font-weight-bold">Reminder:</small>
              <p class="text-sm lh-160 mb-0">When we strive to become better than we are everything around us becomes better too.</p>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <img alt="Image placeholder" src="../../assets/img/theme/light/team-3-800x800.jpg" class="avatar  rounded-circle avatar-lg hover-shadow-lg hover-scale-110">
                <div class="avatar-content ml-3">
                  <h6 class="mb-0">Michael White</h6>
                  <small class="d-block text-muted font-weight-bold">michael.white@example.com</small>
                  <span class="text-muted"><i class="fas fa-clock mr-2"></i>6:00 PM</span>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div>
                  <a href="#" class="text-sm font-weight-bold d-block">7 members going</a>
                </div>
                <div>
                  <a href="#" class="text-sm font-weight-bold d-block">3 pending</a>
                </div>
              </div>
              <div class="mt-3 mb-2">
                <div class="avatar-group">
                  <a href="#" class="avatar rounded-circle avatar-sm">
                    <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg" class="">
                  </a>
                  <a href="#" class="avatar rounded-circle avatar-sm">
                    <img alt="Image placeholder" src="../../assets/img/theme/light/team-2-800x800.jpg" class="">
                  </a>
                  <a href="#" class="avatar rounded-circle avatar-sm">
                    <img alt="Image placeholder" src="../../assets/img/theme/light/team-3-800x800.jpg" class="">
                  </a>
                </div>
              </div>
              <small class="h6 text-sm font-weight-bold">Reminder:</small>
              <p class="text-sm lh-160 mb-0">When we strive to become better than we are everything around us becomes better too.</p>
            </div>
          </div>
        </div> -->
				<!-- Latest projects -->
				<!-- <div class="mb-5">
          <div class="actions-toolbar py-2 mb-4">
            <h5 class="mb-1">Latest projects</h5>
            <p class="text-sm text-muted mb-0">Manage pending orders and track invoices.</p>
          </div>
          <div>
            <table class="table table-cards align-items-center">
              <thead>
                <tr>
                  <th scope="col" class="sort" data-sort="name">Project</th>
                  <th scope="col" class="sort" data-sort="budget">Budget</th>
                  <th scope="col" class="sort" data-sort="status">Status</th>
                  <th scope="col">Users</th>
                  <th scope="col" class="sort" data-sort="completion">Completion</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list">
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div>
                        <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-1.png" class="avatar  rounded-circle">
                      </div>
                      <div class="media-body ml-4">
                        <span class="name mb-0 text-sm">Purpose Design System</span>
                      </div>
                    </div>
                  </th>
                  <td class="budget">
                    $2500 USD
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status">pending</span>
                    </span>
                  </td>
                  <td>
                    <div class="avatar-group">
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg" class="">
                      </a>
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-2-800x800.jpg" class="">
                      </a>
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-3-800x800.jpg" class="">
                      </a>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">60%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                    
                    <div class="actions ml-3">
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Quick view">
                        <i class="fas fa-external-link-alt"></i>
                      </a>
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title="" data-original-title="Move to trash">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr class="table-divider"></tr>
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div>
                        <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-2.png" class="avatar  rounded-circle">
                      </div>
                      <div class="media-body ml-4">
                        <span class="name mb-0 text-sm">Website redesign</span>
                      </div>
                    </div>
                  </th>
                  <td class="budget">
                    $1800 USD
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-success"></i>
                      <span class="status">completed</span>
                    </span>
                  </td>
                  <td>
                    <div class="avatar-group">
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg" class="">
                      </a>
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-2-800x800.jpg" class="">
                      </a>
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-3-800x800.jpg" class="">
                      </a>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">100%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                    
                    <div class="actions ml-3">
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Quick view">
                        <i class="fas fa-external-link-alt"></i>
                      </a>
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title="" data-original-title="Move to trash">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr class="table-divider"></tr>
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div>
                        <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-3.png" class="avatar  rounded-circle">
                      </div>
                      <div class="media-body ml-4">
                        <span class="name mb-0 text-sm">Webpixels website launch</span>
                      </div>
                    </div>
                  </th>
                  <td class="budget">
                    $3150 USD
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-danger"></i>
                      <span class="status">delayed</span>
                    </span>
                  </td>
                  <td>
                    <div class="avatar-group">
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg" class="">
                      </a>
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-2-800x800.jpg" class="">
                      </a>
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-3-800x800.jpg" class="">
                      </a>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">72%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                   
                    <div class="actions ml-3">
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Quick view">
                        <i class="fas fa-external-link-alt"></i>
                      </a>
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title="" data-original-title="Move to trash">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr class="table-divider"></tr>
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div>
                        <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-4.png" class="avatar  rounded-circle">
                      </div>
                      <div class="media-body ml-4">
                        <span class="name mb-0 text-sm">Purpose Website UI Kit</span>
                      </div>
                    </div>
                  </th>
                  <td class="budget">
                    $4400 USD
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-info"></i>
                      <span class="status">on schedule</span>
                    </span>
                  </td>
                  <td>
                    <div class="avatar-group">
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg" class="">
                      </a>
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-2-800x800.jpg" class="">
                      </a>
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-3-800x800.jpg" class="">
                      </a>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">90%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                   
                    <div class="actions ml-3">
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Quick view">
                        <i class="fas fa-external-link-alt"></i>
                      </a>
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title="" data-original-title="Move to trash">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr class="table-divider"></tr>
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div>
                        <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-5.png" class="avatar  rounded-circle">
                      </div>
                      <div class="media-body ml-4">
                        <span class="name mb-0 text-sm">Prototype Purpose Dashboard</span>
                      </div>
                    </div>
                  </th>
                  <td class="budget">
                    $2200 USD
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <i class="bg-success"></i>
                      <span class="status">completed</span>
                    </span>
                  </td>
                  <td>
                    <div class="avatar-group">
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg" class="">
                      </a>
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-2-800x800.jpg" class="">
                      </a>
                      <a href="#" class="avatar rounded-circle avatar-sm">
                        <img alt="Image placeholder" src="../../assets/img/theme/light/team-3-800x800.jpg" class="">
                      </a>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="completion mr-2">100%</span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                   
                    <div class="actions ml-3">
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Quick view">
                        <i class="fas fa-external-link-alt"></i>
                      </a>
                      <a href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title="" data-original-title="Move to trash">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div> -->
				<!-- Project stats -->
				<!-- <div class="actions-toolbar py-2 mb-4">
          <h5 class="mb-1">Project stats</h5>
          <p class="text-sm text-muted mb-0">Manage pending orders and track invoices.</p>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card mb-0">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="mb-0">Project progress</h6>
                  </div>
                  <div class="text-right">
                    <div class="actions">
                      <a href="#" class="action-item"><i class="fas fa-sync"></i></a>
                      <div class="dropdown action-item" data-toggle="dropdown">
                        <a href="#" class="action-item"><i class="fas fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a href="#" class="dropdown-item">Refresh</a>
                          <a href="#" class="dropdown-item">Manage Widgets</a>
                          <a href="#" class="dropdown-item">Settings</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-1.png" class="avatar  rounded-circle">
                    </div>
                    <div class="flex-fill pl-3 text-limit">
                      <h6 class="progress-text mb-1 text-sm d-block text-limit">Purpose Design System</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                        <div>
                          <span class="font-weight-bold text-warning">Pending</span>
                        </div>
                        <div>
                          20 Aug 2018
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-2.png" class="avatar  rounded-circle">
                    </div>
                    <div class="flex-fill pl-3 text-limit">
                      <h6 class="progress-text mb-1 text-sm d-block text-limit">Website redesign</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                        <div>
                          <span class="font-weight-bold text-success">Completed</span>
                        </div>
                        <div>
                          20 Aug 2018
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-3.png" class="avatar  rounded-circle">
                    </div>
                    <div class="flex-fill pl-3 text-limit">
                      <h6 class="progress-text mb-1 text-sm d-block text-limit">Webpixels website launch</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                        <div>
                          <span class="font-weight-bold text-danger">Delayed</span>
                        </div>
                        <div>
                          20 Aug 2018
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-4.png" class="avatar  rounded-circle">
                    </div>
                    <div class="flex-fill pl-3 text-limit">
                      <h6 class="progress-text mb-1 text-sm d-block text-limit">Purpose Website UI Kit</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                        <div>
                          <span class="font-weight-bold text-info">On schedule</span>
                        </div>
                        <div>
                          20 Aug 2018
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-5.png" class="avatar  rounded-circle">
                    </div>
                    <div class="flex-fill pl-3 text-limit">
                      <h6 class="progress-text mb-1 text-sm d-block text-limit">Prototype Purpose Dashboard</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex justify-content-between text-xs text-muted text-right mt-1">
                        <div>
                          <span class="font-weight-bold text-success">Completed</span>
                        </div>
                        <div>
                          20 Aug 2018
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card mb-0">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="mb-0">Project budgets</h6>
                  </div>
                  <div class="text-right">
                    <div class="actions">
                      <a href="#" class="action-item"><i class="fas fa-sync"></i></a>
                      <div class="dropdown action-item" data-toggle="dropdown">
                        <a href="#" class="action-item"><i class="fas fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a href="#" class="dropdown-item">Refresh</a>
                          <a href="#" class="dropdown-item">Manage Widgets</a>
                          <a href="#" class="dropdown-item">Settings</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media align-items-center">
                    <div class="mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-1.png" class="avatar  rounded-circle">
                    </div>
                    <div class="media-body">
                      <h6 class="text-sm d-block text-limit mb-0">Purpose Design System</h6>
                      <span class="d-block text-sm text-muted">Development</span>
                    </div>
                    <div class="media-body text-right">
                      <span class="text-sm text-dark font-weight-bold ml-3">
                        $2500
                      </span>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media align-items-center">
                    <div class="mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-2.png" class="avatar  rounded-circle">
                    </div>
                    <div class="media-body">
                      <h6 class="text-sm d-block text-limit mb-0">Website redesign</h6>
                      <span class="d-block text-sm text-muted">Identity</span>
                    </div>
                    <div class="media-body text-right">
                      <span class="text-sm text-dark font-weight-bold ml-3">
                        $1800
                      </span>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media align-items-center">
                    <div class="mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-3.png" class="avatar  rounded-circle">
                    </div>
                    <div class="media-body">
                      <h6 class="text-sm d-block text-limit mb-0">Webpixels website launch</h6>
                      <span class="d-block text-sm text-muted">Branding</span>
                    </div>
                    <div class="media-body text-right">
                      <span class="text-sm text-dark font-weight-bold ml-3">
                        $3150
                      </span>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media align-items-center">
                    <div class="mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-4.png" class="avatar  rounded-circle">
                    </div>
                    <div class="media-body">
                      <h6 class="text-sm d-block text-limit mb-0">Purpose Website UI Kit</h6>
                      <span class="d-block text-sm text-muted">Marketing</span>
                    </div>
                    <div class="media-body text-right">
                      <span class="text-sm text-dark font-weight-bold ml-3">
                        $4400
                      </span>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media align-items-center">
                    <div class="mr-3">
                      <img alt="Image placeholder" src="../../assets/img/theme/light/brand-avatar-5.png" class="avatar  rounded-circle">
                    </div>
                    <div class="media-body">
                      <h6 class="text-sm d-block text-limit mb-0">Prototype Purpose Dashboard</h6>
                      <span class="d-block text-sm text-muted">Frameworks</span>
                    </div>
                    <div class="media-body text-right">
                      <span class="text-sm text-dark font-weight-bold ml-3">
                        $2200
                      </span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div> -->
			</div>
		</section>



    
    <!--<script src="<?php echo BASE_URL;?>/resources/js/purpose/libs/countdown.js"></script>  //TODO make countdown work--> 

</body>




<!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->

<!-- Purpose JS -->

<?php require BASE_URI . '/footer.php';?>




</html>