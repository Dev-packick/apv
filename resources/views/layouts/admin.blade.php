<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content=""/>
	<meta name="author" content=""/>
	<meta name="robots" content=""/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="eshop Hotel Admin Dashboard"/>
	<meta property="og:title" content="eshop Hotel Admin Dashboard"/>
	<meta property="og:description" content="eshop Hotel Admin Dashboard"/>
	<meta property="og:image" content="social-image.png"/>
	<meta name="format-detection" content="telephone=no">
	<!-- PAGE TITLE HERE -->
	<title>APV - Admin</title>
	<!-- FAVICONS ICON -->
	<link href="admin/assets/images/LGA.png" rel="shortcut icon" type="image/png"/>
	<link href="admin/assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="admin/assets/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" rel="stylesheet"/>
	<link href="admin/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="admin/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="admin/assets/vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
	<link href="admin/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<!-- Style css -->
	<link href="admin/assets/vendor/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<link href="admin/assets/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="admin/assets/css/style.css" rel="stylesheet">
	<!-- Sweet alert -->
	<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
    <!-- Lightgallery CSS -->
    <link href="https://cdn.jsdelivr.net/npm/lightgallery.js@1.9.0/dist/css/lightgallery-bundle.min.css" rel="stylesheet">
    <!-- Lightgallery JS -->
    <script src="https://cdn.jsdelivr.net/npm/lightgallery.js@1.9.0/dist/lightgallery.min.js"></script>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
			<a href="{{route('TABLEAU')}}" class="brand-logo">
				<img class="brand-title" src="admin/assets/images/LGA.png" width="50" height="50" viewBox="0 0 110 33" fill="none" alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="headaer-title">
								<h1 class="font-w600 mb-0">Tableau de bord</h1>
							</div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link nav-action" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                   <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M10.4524 25.6682C11.0605 27.0357 12.409 28 14.0005 28C15.592 28 16.9405 27.0357 17.5487 25.6682C16.4265 25.7231 15.2594 25.76 14.0005 25.76C12.7417 25.76 11.5746 25.723 10.4524 25.6682Z" fill="#737B8B"/>
										<path d="M26.3532 19.74C24.877 17.8785 22.3996 14.2195 22.3996 10.64C22.3996 7.09073 20.1193 3.89758 16.7996 2.72382C16.7593 1.21406 15.5183 0 14.0007 0C12.482 0 11.2422 1.21406 11.2018 2.72382C7.88101 3.89758 5.6007 7.09073 5.6007 10.64C5.6007 14.2207 3.1244 17.8785 1.64712 19.74C1.15433 20.3616 1.00197 21.1825 1.24058 21.9363C1.47354 22.6721 2.05367 23.2422 2.79288 23.4595C4.08761 23.8415 6.20997 24.2715 9.44682 24.491C10.8479 24.5851 12.3543 24.64 14.0008 24.64C15.646 24.64 17.1525 24.5851 18.5535 24.491C21.7915 24.2715 23.9128 23.8415 25.2086 23.4595C25.9478 23.2422 26.5268 22.6722 26.7598 21.9363C26.9983 21.1825 26.8449 20.3616 26.3532 19.74Z" fill="#737B8B"/>
									</svg>
                                    <span class="badge light text-white bg-primary rounded-circle"></span>
                                </a>
                            </li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell-link nav-action " href="javascript:void(0);">
                                	<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M14.8257 17.5282C14.563 17.6783 14.2627 17.7534 14 17.7534C13.7373 17.7534 13.437 17.6783 13.1743 17.5282L0 9.49598V20.193C0 22.4826 1.83914 24.3217 4.12869 24.3217H23.8713C26.1609 24.3217 28 22.4826 28 20.193V9.49598L14.8257 17.5282Z" fill="#737B8B"/>
										<path d="M23.8713 3.67829H4.12863C2.17689 3.67829 0.525417 5.06703 0.112549 6.90617L13.9999 15.3887L27.8873 6.90617C27.4745 5.06703 25.823 3.67829 23.8713 3.67829Z" fill="#737B8B"/>
									</svg>
									<span class="badge light text-white bg-primary rounded-circle"></span>
                                </a>
							</li>
							<li class="nav-item dropdown header-profile">
								<div id="datepicker" class="input-group date dz-calender" data-date-format="mm-dd-yyyy">
									<span class="input-group-addon d-flex align-items-center">
										<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M14.8337 3.16667H14.0003V1.50001C14.0003 1.27899 13.9125 1.06703 13.7563 0.910749C13.6 0.754469 13.388 0.666672 13.167 0.666672C12.946 0.666672 12.734 0.754469 12.5777 0.910749C12.4215 1.06703 12.3337 1.27899 12.3337 1.50001V3.16667H5.66699V1.50001C5.66699 1.27899 5.5792 1.06703 5.42292 0.910749C5.26663 0.754469 5.05467 0.666672 4.83366 0.666672C4.61265 0.666672 4.40068 0.754469 4.2444 0.910749C4.08812 1.06703 4.00033 1.27899 4.00033 1.50001V3.16667H3.16699C2.50395 3.16667 1.86807 3.43006 1.39923 3.8989C0.930384 4.36775 0.666992 5.00363 0.666992 5.66667V6.5H17.3337V5.66667C17.3337 5.00363 17.0703 4.36775 16.6014 3.8989C16.1326 3.43006 15.4967 3.16667 14.8337 3.16667Z" fill="#F66F4D"/>
											<path d="M0.666992 14.8333C0.666992 15.4964 0.930384 16.1322 1.39923 16.6011C1.86807 17.0699 2.50395 17.3333 3.16699 17.3333H14.8337C15.4967 17.3333 16.1326 17.0699 16.6014 16.6011C17.0703 16.1322 17.3337 15.4964 17.3337 14.8333V8.16666H0.666992V14.8333Z" fill="var(--primary)"/>
										</svg>
									</span>
									<input class="form-control" type="text" readonly />
								</div>
                            </li>
                        </ul>
					</div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<div class=" dropdown header-bx">
					<a class="nav-link header-profile2 position-relative" href="javascript:void(0);"  role="button" data-bs-toggle="dropdown">
						<div class="header-content">
							<h2 class="font-w500">Bienvenue {{Session::get('UserName')}}</h2>
							<span class="font-w400">Nous les amis de la planète vivable souhaitons la bienvenue a tous les membres!</span>
						</div>
					</a>
				</div>
				<ul class="metismenu" id="menu">
					@if(Session::get('UserRole') == "ADMIN")
                    <li>
						<a href="{{route('TABLEAU')}}" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Tableau de bord</span>
						</a>
                    </li>
					<li>
						<a href="{{route('VOIR-MESSAGE')}}" aria-expanded="false">
							<i class="fas fa-comments"></i>
							<span class="nav-text">Messages</span>
						</a>
                    </li>
					<li>
						<a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-022-copy"></i>
							<span class="nav-text">Gestion des projets</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="{{route('AJOUTER-PRODUIT')}}">partager un projet</a></li>
							<li><a href="{{route('VOIR-PRODUITS')}}">voir nos projets</a></li>
						</ul>
                    </li>
                    <li>
                        <a href="{{ route('VOIR-DOCUMENTS') }}" aria-expanded="false">
                            <i class="fa-solid fa-file-pdf"></i>
                            <span class="nav-text">Gestion documents</span>
                        </a>
                    </li>
					<li>
						<a href="{{route('VOIR-VENDEURS')}}" aria-expanded="false">
							<i class="flaticon-381-user-7"></i>
							<span class="nav-text">Gestion des membres</span>
						</a>
                    </li>
					<li>
						<a href="{{route('SHOWNEWSLETTER')}}" aria-expanded="false">
							<i class="fas fa-mail-bulk"></i>
							<span class="nav-text">Newsletters</span>
						</a>
                    </li>
					<li>
						<a href="{{route('VOIR-CATEGORIE')}}" aria-expanded="false">
							<i class="flaticon-381-tab"></i>
							<span class="nav-text">Catégories de projets</span>
						</a>
                    </li>
					<li>
						<a href="{{route('VOIR-PUBLICITES')}}" aria-expanded="false">
							<i class="flaticon-381-picture"></i>
							<span class="nav-text">Publicités</span>
						</a>
                    </li>
					<li>
						<a href="{{route('PROFIL')}}" aria-expanded="false">
							<i class="flaticon-381-user-9"></i>
							<span class="nav-text">Profil</span>
						</a>
                    </li>
					<li>
						<a href="{{route('LOGOUT')}}" aria-expanded="false">
							<i class="ti-power-off"></i>
							<span class="nav-text">Déconnecter</span>
						</a>
                    </li>
					@else
					<li>
						<a href="{{route('TABLEAU')}}" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Tableau de bord</span>
						</a>
                    </li>
					<li>
						<a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-022-copy"></i>
							<span class="nav-text">Gestion des projets</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="{{route('AJOUTER-PRODUIT')}}">partager un projet</a></li>
							<li><a href="{{route('VOIR-PRODUITS')}}">voir nos projets</a></li>
						</ul>
                    </li>
					<li>
						<a href="{{route('PROFIL')}}" aria-expanded="false">
							<i class="flaticon-381-user-7"></i>
							<span class="nav-text">Profil</span>
						</a>
                    </li>
					<li>
						<a href="{{route('LOGOUT')}}" aria-expanded="false">
							<i class="ti-power-off"></i>
							<span class="nav-text">Déconnecter</span>
						</a>
                    </li>
					@endif
                </ul>
				<div class="copyright">
					<h6>Eshop - admin<span class="fs-14 font-w400">© 2024 All Rights Reserved</span></h6>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        @yield('content')

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a target="_blank">Eshop</a> 2024</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		</div>
		<!--**********************************
			Main wrapper end
		***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="admin/assets/vendor/global/global.min.js"></script>
	<script src="admin/assets/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="admin/assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="admin/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="admin/assets/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="admin/assets/vendor/owl-carousel/owl.carousel.js"></script>
	<script src="admin/assets/vendor/lightgallery/js/lightgallery-all.min.js"></script>
	<!-- Swiper-js -->
	<script src="admin/assets/vendor/swiper/js/swiper-bundle.min.js"></script>
	<!-- Apex Chart -->
	<script src="admin/assets/vendor/apexchart/apexchart.js"></script>
	<!-- Chart piety plugin files -->
    <script src="admin/assets/vendor/peity/jquery.peity.min.js"></script>
	<!-- Dashboard 1 -->
	<script src="admin/assets/js/dashboard/dashboard-1.js"></script>
	<script src="admin/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="admin/assets/js/plugins-init/datatables.init.js"></script>
    <script src="admin/assets/js/custom.min.js"></script>
	<script src="admin/assets/js/deznav-init.js"></script>
	<script src="admin/assets/js/demo.js"></script>
    <script src="admin/assets/js/styleSwitcher.js"></script>
	<!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
	<!-- Toastr JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- input choix multiple -->
	<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
    <!-- JS for dotted map -->
	<script src="admin/assets/vendor/dotted-map/js/contrib/jquery.smallipop-0.3.0.min.js"></script>
    <script src="admin/assets/vendor/dotted-map/js/contrib/suntimes.js"></script>
    <script src="admin/assets/vendor/dotted-map/js/contrib/color-0.4.1.js"></script>
	<script>
    	new MultiSelectTag('taille')  // id
	</script>
	<script>
    	new MultiSelectTag('couleur')  // id
	</script>
	<!-- input choix multiple End-->
	<script>
		$(function () {
			  $("#datepicker").datepicker({
					autoclose: true,
					todayHighlight: true
			  }).datepicker('update', new Date());
		});
	</script>
	<script>
	 var swiper = new Swiper(".front-view-slider", {
        slidesPerView: 5,
        spaceBetween: 30,
		centeredSlides: true,
		loop:true,
        pagination: {
          el: ".room-swiper-pagination",
          clickable: true,
        },
		breakpoints: {
		  360: {
            slidesPerView: 1,
            spaceBetween: 20,
          },
		  575: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
          1024: {
            slidesPerView: 3,
          },
		  1400: {
            slidesPerView: 5,
            spaceBetween: 20,
          },
		  1600: {
            slidesPerView: 5,
            spaceBetween: 30,
          },
		}
      });
	</script>
	@yield('scripts')
</body>

</html>
