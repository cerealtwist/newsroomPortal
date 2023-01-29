<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../backend/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>@yield('pageTitle')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../backend/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href={{asset("../backend/assets/vendor/fonts/boxicons.css")}} />

    <!-- Core CSS -->
    <link rel="stylesheet" href={{asset("../backend/assets/vendor/css/core.css")}} class="template-customizer-core-css" />
    <link rel="stylesheet" href={{asset("../backend/assets/vendor/css/theme-default.css")}} class="template-customizer-theme-css" />
    <link rel="stylesheet" href={{asset("../backend/assets/css/demo.css")}} />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href={{asset("../backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css")}} />

    <!-- Page CSS -->
    <link rel="stylesheet" href={{asset("../backend/dist/libs/ijabo/ijabo.min.css")}} />

    @stack('stylesheets')
    @livewireStyles

    <!-- Helpers -->
    <script src="../backend/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../backend/assets/js/config.js"></script>
  </head>

  <body>
    
    <!-- / Layout wrapper -->
    @yield('content')
    
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../backend/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../backend/assets/vendor/libs/popper/popper.js"></script>
    <script src="../backend/assets/vendor/js/bootstrap.js"></script>
    <script src="../backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../backend/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../backend/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../backend/assets/js/pages-account-settings-account.js"></script>

    <!-- Libs JS -->
    <script src="{{ asset('backend/dist/libs/ijabo/ijabo.min.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    @stack('scripts')
    @livewireScripts
    <script>
      window.addEventListener('showToastr', function(event){
        toastr.remove();
        event.detail.type === 'info' ? toastr.info(event.detail.message)
        : event.detail.type === 'success' ? toastr.success(event.detail.message)
        : event.detail.type === 'error' ? toastr.error(event.detail.message)
        : event.detail.type === 'warning' ? toastr.warning(event.detail.message)
        : false;

      });
    </script>
  </body>
</html>
