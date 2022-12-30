<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
     <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="og:type" content="website" />
  <meta property="og:title" content={{ env('APP_NAME') }} @yield('title') />
  <meta property="og:url" content= "https://www.vaidicyoddha.in">
  <meta property="og:description"   content="Vaidic Yoddha" />
  <meta property="og:image" itemprop="image" content="{{ asset('front/logo/thumb.jpg') }}">
  <title> {{ env('APP_NAME') }} @yield('title')</title>

<link rel="canonical" href="@yield('title')">
  @yield('style')
   <link rel="icon" href="{{ asset('front/logo/favicon.png') }}" type="image/png">
  <link rel="apple-touch-icon" href="{{ asset('/front')}}/app-assets/images/ico/apple-icon-120.html">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
    rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/vendors/css/vendors.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/vendors/css/forms/select/select2.min.css">
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/front')}}/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/vendors/css/extensions/swiper.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/vendors/css/charts/apexcharts.css"> -->
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/vendors/css/extensions/toastr.min.css">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/bootstrap-extended.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/colors.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/components.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/themes/dark-layout.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/themes/bordered-layout.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/themes/semi-dark-layout.min.css">

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/pages/dashboard-ecommerce.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/pages/app-ecommerce-details.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/plugins/forms/form-number-input.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/plugins/charts/chart-apex.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/plugins/extensions/ext-component-toastr.min.css">
  <!-- END: Page CSS-->

      <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/app-assets/css/pages/page-profile.min.css">
  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('/front')}}/assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Arya:wght@700&family=Baloo+2:wght@400;600&family=Eczar:wght@500&family=Laila:wght@700&family=Rozha+One&display=swap"
    rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/tgs5w2vmsbxl2ue2e162m9y4jg1rotwr6v8ymv2okxerp6iw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- END: Custom CSS-->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @livewireStyles
    @livewireScripts
    @stack('scripts')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  antialiased" data-open="hover"
  data-menu="horizontal-menu" data-col="">

  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '698106734861794',
        xfbml      : true,
        version    : 'v14.0'
      });
      FB.AppEvents.logPageView();
    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>

  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0&appId=698106734861794&autoLogAppEvents=1" nonce="gDcjeLea"></script>

            {{-- {{ $slot }} --}}

        {{-- @livewire('notifications') --}}

      @include('inc.header')

        @include('inc.navbar')


  <!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
      </div>
      <div class="content-body">

        @yield('content')


      </div>
    </div>
  </div>
  <!-- END: Content-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>

  @include('inc.foot')
  <!-- BEGIN: Footer-->
  <!-- <footer class="footer footer-static footer-light">
      <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT  &copy; 2021<a class="ms-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>-->
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
  <!-- END: Footer-->


  <!-- BEGIN: Vendor JS-->
  <script src="{{ asset('/front')}}/app-assets/vendors/js/vendors.min.js"></script>
  <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Page Vendor JS-->
  <script src="{{ asset('/front')}}/app-assets/vendors/js/ui/jquery.sticky.js"></script>

  <script src="{{ asset('/front')}}/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
  <script src="{{ asset('/front')}}/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
  <script src="{{ asset('/front')}}/app-assets/vendors/js/extensions/swiper.min.js"></script>
  <!-- <script src="{{ asset('/front')}}/app-assets/vendors/js/charts/apexcharts.min.js"></script> -->
  <!--
    <script src="{{ asset('/front')}}/app-assets/vendors/js/extensions/toastr.min.js"></script> -->
  <!-- END: Page Vendor JS-->

  <!-- BEGIN: Theme JS-->
  <script src="{{ asset('/front')}}/app-assets/js/core/app-menu.min.js"></script>
  <script src="{{ asset('/front')}}/app-assets/js/core/app.min.js"></script>
  <script src="{{ asset('/front')}}/app-assets/js/scripts/customizer.min.js"></script>
  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->
  <script src="{{ asset('/front')}}/app-assets/js/scripts/forms/form-select2.min.js"></script>
  <script src="{{ asset('/front')}}/app-assets/js/scripts/pages/app-ecommerce-details.min.js"></script>
  <script src="{{ asset('/front')}}/app-assets/js/scripts/forms/form-number-input.min.js"></script>
   <script src="{{ asset('/front')}}/app-assets/js/scripts/components/components-accordion.js"></script>
   <script src="{{ asset('/front')}}/app-assets/js/scripts/extensions/ext-component-clipboard.min.js"></script>
  <!-- <script src="{{ asset('/front')}}/app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script> -->

      <!-- BEGIN: Page JS-->
    <script src="{{ asset('/front')}}/app-assets/js/scripts/pages/page-profile.min.js"></script>
  <!-- END: Page JS-->
      @yield('script')
  <script>
    $(window).on('load', function () {
      if (feather) {
        feather.replace({
          width: 14,
          height: 14
        });
      }
    })
  </script>
</body>
<!-- END: Body-->

<!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/horizontal-menu-template/dashboard-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Sep 2022 06:53:13 GMT -->

</html>
