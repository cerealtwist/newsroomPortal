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
    <link rel="icon" type="image/x-icon" href="{{
      \App\Models\Setting::find(1)->blog_icon
    }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href={{asset('../backend/assets/vendor/fonts/boxicons.css')}} />

    <!-- Core CSS -->
    <link rel="stylesheet" href={{asset("../backend/assets/vendor/css/core.css")}} class="template-customizer-core-css" />
    <link rel="stylesheet" href={{asset("../backend/assets/vendor/css/theme-default.css")}} class="template-customizer-theme-css" />
    <link rel="stylesheet" href={{asset("../backend/assets/css/demo.css")}} />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href={{asset("../backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css")}} />

    <link rel="stylesheet" href={{asset("../backend/assets/vendor/libs/apex-charts/apex-charts.css")}} />
    <link rel="stylesheet" href={{asset("../backend/dist/libs/ijabo/ijabo.min.css")}} />
    <link rel="stylesheet" href={{asset("../backend/dist/libs/ijaboCropTool/ijaboCropTool.min.css")}} />
    

    @stack('stylesheets')
    @livewireStyles

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../backend/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../backend/assets/js/config.js"></script>
  </head>

  <body>
    @include('backend.layouts.inc.navbar')

    <!-- Content -->

    @yield('content')

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('../backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="../backend/assets/vendor/libs/popper/popper.js"></script>
    <script src="../backend/assets/vendor/js/bootstrap.js"></script>
    <script src="../backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../backend/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../backend/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../backend/assets/js/main.js"></script>

    <!-- Libs JS -->
    <script src="{{ asset('backend/dist/libs/ijabo/ijabo.min.js') }}"></script>
    <script src="{{ asset('backend/dist/libs/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
    <script src="{{ asset('backend/dist/libs/ijaboViewer/jquery.IjaboViewer.min.js') }}"></script>
    

    <!-- Page JS -->
    <script src="../backend/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    @stack('scripts')
    @livewireScripts
  </body>
</html>
