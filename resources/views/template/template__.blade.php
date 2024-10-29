<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Topup Game Terbaik di Indonesia, Bawa Permainanmu ke Level Berikutnya! — Kios Games </title>
    <link rel="shortcut icon" href="images/1685096996_98e6f7ee5dd56b4ed29b.png" />
    <meta name="description" content="Kios Games menyediakan layanan Top up game dan Reseller Voucher Game termurah dan terpercaya di Indonesia."/>
    <meta name="keyword" content="kontergame, top up game, freefire, ff, mobile legend, Top up , Isi ulang , Voucher , Beli " />
    <meta name="author" content="Kiosweb.id" />
    <meta name="theme-color" content="#11143A" />
    <meta name="robots" content="index, follow" />
    <meta content="desktop" name="device" />
    <meta name="coverage" content="Worldwide" />
    <meta name="apple-mobile-web-app-title" content="Kios Games — Topup Game Terbaik di Indonesia, Bawa Permainanmu ke Level Berikutnya!" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://kontergame.id" />
    <meta property="og:title" content="Kios Games — Topup Game Terbaik di Indonesia, Bawa Permainanmu ke Level Berikutnya!" />
    <meta property="og:description" content="Kios Games menyediakan layanan Top up game dan Reseller Voucher Game termurah dan terpercaya di Indonesia."/>
    <meta property="og:image" content />
    <link rel="stylesheet" href="assets/css/daterangepicker.css" />
    <link rel="stylesheet" href="assets/css/toastr.min.css" />
    <script defer src="assets/js/cdn.min.js"></script>
    <script defer src="assets/js/cdn.min_1.js"></script>
    <link href="assets/css/output.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://kontergame.id/cloudme.fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="assets/css/css2.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/customswiper.css" />
  </head>
  <body class="bg-darkblue relative">
    {{-- NAV --}}
    @include('template._partial.navbar')
    
    {{-- MAIN SECTION --}}
    @yield('content')
    
    {{-- FOOTER --}}
    @include('template._partial.footer')
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script type="text/javascript" src="assets/js/moment.min.js"></script>
    <script type="text/javascript" src="assets/js/daterangepicker.min.js"></script>
    <script type="module" src="assets/js/ionicons.esm.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script>
      setInterval(function() {
        $("#toolbarContainer").remove();
      }, 500);

      function salin(text, label_text) {
        navigator.clipboard.writeText(text);
        toastr.success(label_text);
      }
    </script>
  </body>
</html>