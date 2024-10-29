<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ !$config ? '' : $config->judul_web }}</title>
    
    <meta name="title" content="{{ !$config ? '' : $config->judul_web }}">
    <meta name="description" content="{{ !$config ? '' : $config->deskripsi_web }}">
    
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ ENV('APP_URL') }}">
    <meta property="og:title" content="{{ !$config ? '' : $config->judul_web }}">
    <meta property="og:description" content="{{ !$config ? '' : $config->deskripsi_web }}">
    <meta name="twitter:image" content="{{ !$config ? '' : $config->logo_footer }}" />
    <meta property="og:image" content="{{ !$config ? '' : $config->logo_footer }}" />
    <meta name="robots" content="index, follow">
    <meta content="desktop" name="device">
    <meta name="author" content="{{ ENV('APP_NAME') }}">
    <meta name="coverage" content="Worldwide">
    <meta name="apple-mobile-web-app-title" content="{{ !$config ? '' : $config->judul_web }}">
    
    <link rel="shortcut icon" href="{{ url('') }}{{ !$config ? '' : $config->logo_favicon }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/themes/green/pace-theme-flash.min.css">
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css"/>
    <link rel="stylesheet" type="text/css" href="https://ditusi.co.id/assets/css/owl.carousel.css"/>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    
    
    <meta name="theme-color" content="#FFFFFF">
    <meta name="msapplication-navbutton-color" content="#FFFFFF">
    <meta name="apple-mobile-web-app-status-bar-style" content="#FFFFFF">
   
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.css');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Days+One&family=Inter:wght@400;500;600;700&display=swap');

        :root {
            --warna_1: <?= $config->warna1; ?>;
            --warna_2: <?= $config->warna2; ?>;
            --warna_3: <?= $config->warna3; ?>;
            --warna_4: <?= $config->warna4; ?>;
            --dark: #202737;
            --lightdark: rgb(38 46 64 / 1);
            --textlight: #ddd;
        }
        
        ::-webkit-scrollbar {
          display: none;
        }
        textarea:hover, 
        input:hover, 
        textarea:active, 
        input:active, 
        textarea:focus, 
        input:focus,
        button:focus,
        button:active,
        button:hover,
        label:focus,
        .btn:active,
        .btn.active
        {
            outline:0px !important;
            -webkit-appearance:none;
            box-shadow: none !important;
        }
    
       /*
font-family: 'Days One', sans-serif;
font-family: 'Inter', sans-serif;
*/

*{
    font-family: 'Inter', sans-serif;
}

        body {
            /*background: #d0d0d0;*/
            /*background: #f2f1f8;*/
            background: var(--dark);
            color: var(--textlight);
            font-family: Roboto;
            
        }
        
        nav#navs {
            background: var(--lightdark);
        }
        
        a.nav-link {
            color: var(--textlight)!important;
        }
        
        .content {
            /*max-width: 480px;*/
            margin: auto;
            background: var(--dark);
        }
         .cont {
            overflow: hidden;
            width: 100%;
            height: 240px;
            background: var(--warna_2);
            text-align: center;
            padding-top: 20px;
         }
        .circles {
            overflow: hidden;
            width: 100%;
            height: 185px;
            background: var(--warna_2);
            text-align: center;
            padding-top: 20px;
        }
        .circles img {
            max-width: 50%;
            max-height: 40px;
        }
        
        .circles li {
            position: relative;
            list-style: none;
            width: 20px;
            height: 20px;
            background: #fff;
            animation: animate 15s linear infinite;
            bottom: -100%;
            left: -80%;
        }
        
        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }
        
        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }
        
        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }
        
        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }
        
        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }
        
        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }
        
        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }
        
        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }
        
        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }
        
        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }
        
        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.50;
                border-radius: 0;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }
        .header {
            display: flex;
            top: 8px;
            left: 0;
            right: 0;
            margin: 0 auto;
            position: fixed;
            max-width: 370px;
            height: 64px;
            color: #fff;
            filter: drop-shadow(8px 2px 40px #16b36a);
            border-radius: 1.5rem;
            background: rgb(255 255 255 / 65%);
            -webkit-backdrop-filter: blur(8px);
            -moz-backdrop-filter: blur(8px);
            -ms-backdrop-filter: blur(8px);
            backdrop-filter: blur(8px);
            backface-visibility: hidden;
            padding: 13px;
            padding-right: 18px;
            justify-content: space-between!important;
            z-index: 5;
           
        }
        .header img {
            max-width: 100%;
            max-height: 25px;
            margin: 8px;
            margin-left: 7px;
        }
        .header i {
            color: #fff !important;
        }
        .header span {
            color: #fff !important;
        }
        .content-body {
            padding: 0 5px;
        }
        .content-body-populer {
            padding: 0 5px;
        }
        .content-body form input {
            outline: none;
            margin-top: -30px;
            border: none !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
        }
        .my-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
  .section-title{
    width: 100%;
    float: left;
    margin-top: 20px;
    margin-bottom: 0px;
}
.section-title h3{
    font-size: 24px;
    font-family: Days One, sans-serif;
    color: var(--textlight);
    float: left;
    width: auto;
}
.section-title .link{
    float: right;
    padding-top: 3px;
}

   .buying-step-card p{
    color: #1E222E;
    line-height: 150%;
}
.buying-step-card{
    width: 100%;
    float: left;
    margin-bottom: 5px;
    background: #fff;
    padding: 16px;
    border-radius: 8px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
}
.buying-step-card h5{
    width: 100%;
    float: left;
    margin-bottom: 16px;
    font-size: 16px;
    font-weight: 500;
    color: #1E222E;
    margin-top: 16px;
}
.buying-step-card.dark{
    background: var(--warna_2);
    border: 1px solid rgba(255,255,255,0.1);
}
.buying-step-card.dark h5,
.buying-step-card.dark table td,
.buying-step-card.dark td a{
    color: #fff;
}
.buying-step-card.dark td a{
    font-weight: 600;
}
.buying-step-card.dark table td{
    font-size: 16px;
}
.buying-step-card.dark table hr{
    background: rgba(255,255,255,0.2);
}
.ico-btn{
    border: none;
    background: none;
}
.buying-step-card.dark table hr{
    background: rgba(255,255,255,0.2);
}
 .buying-step-card.dark p{
    color: rgba(255,255,255,0.7);
}
.flash-sale p .timer{
    display: inline-block;
    padding: 5px 16px;
    background: #AB0000;
    font-size: 16px;
    font-weight: 700;
    color: #fff;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    letter-spacing: 2px;
    margin-left: 8px;
}
.fss{
    width: calc(100% + 16px);
    margin-left: -8px;
}
.fss .item{
    padding: 0 8px;
}
.flash-sale-card{
    background: #1E253E;
    border: 1px solid rgba(255,255,255,0.3);
    border-radius: 8px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    position: relative;
    width: 100%;
    float: left;
}
.flash-sale-card img{
    opacity: 15%;
    top: -50px;
}
.flash-sale-card h3{
    font-size: 16px;
    font-weight: 600;
    position: absolute;
    top: 16px;
    left: 16px;
    width: calc(100% - 32px);
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.flash-sale-card h3 a{
    color: #fff;
}
.flash-sale-card .text{
    position: absolute;
    bottom: 0;
    left: 0;
    padding: 16px;
    z-index: 2;
    color: #fff;
    width: 100%;
}
.old-price{
    position: relative;
    font-size: 10px;
    color: rgba(255,255,255,0.6);
    width: auto;
    display: inline-block;
}
.old-price::after{
    content: "";
    width: 100%;
    height: 1px;
    background: #FF0000;
    position: absolute;
    left: 0;
    top: 50%;
}
.dprice{
    position: relative;
    font-size: 10px;
    color: rgba(255,255,255,0.6);
    width: auto;
    display: auto;
}
.dprice::after{
    content: "";
    width: 36%;
    height: 1px;
    background: #FF0000;
    position: absolute;
    left: 0;
    top: 50%;
}
.price{
    font-size: 14px;
    font-weight: 600;
    color: #fff;
}
.bar{
    width: 100%;
    float: left;
    height: 3px;
    margin-top: 5px;
    background: rgba(255,255,255,0.2);
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
}
.bar span{
    float: left;
    height: 3px;
    background: #FF0000;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
}

.flash-sale-card .text span{
    font-size: 10px;
    color: rgba(255,255,255,0.5);
}
        
        @media (max-width: 576px){
    .product .box {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),0 2px 4px -1px rgba(0, 0, 0, 0.06);
        border-radius: 0.75rem;
        text-align: center;
        background: #646464;
        display: block;
        text-decoration: none;
        color: #fff;
        height: 10rem;
    }
}
@media (min-width: 576px){
  .product .box {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),0 2px 4px -1px rgba(0, 0, 0, 0.06);
    border-radius: 0.75rem;
    text-align: center;
    background: #646464;
    display: block;
    text-decoration: none;
    color: #fff;
    height: 15rem;
}
}

.card-product {
    
    margin-bottom: -30px;
    gap: 0.5rem;
}

/* NEW LIST PRODUK*/

.col-g {
    padding: 0 4px;
}

.games-area {
    position: relative;
    margin-bottom: 14px;
    padding: 2px;
}

.games-area:hover:before {
    opacity: 1;
}

.games-area:before {
    border-radius: 14px;
    content: ' ';
    background: var(--warna_2);
    position: absolute;
    right: 0;
    left: 0;
    top: 0;
    bottom: 0;
    transition: 0.3s;
    opacity: 0;
}

.product_list {
    height: 282px;
    position: relative;
    display: block;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid #34373b;
}

.product_list:hover .games-bg-blur {
    margin-top: 0;
}

.games-bg-blur {
    margin-top: 282px;
    height: 100%;
    width: 100%;
    padding: 190px 12px 0 20px;
    position: relative;
    border-radius: 9px;
    transition: .4s;
    background: linear-gradient(357deg, #101010, #8383832b);
}

a:hover {
    color: #eee;
    text-decoration: none;
}

.games-bg-blur h6 {
    font-size: 16px;
    color: rgb(195 201 204);
    font-weight: 500;
    line-height: 24px;
    margin-bottom: 2px;
}

.games-bg-blur span {
    color: rgb(195 201 204);
}

/**/


@media (max-width: 576px) {
    .product p {
        font-size: 12px!important;
    }
    
    .product_list {
        height: 155px;
    }
    
    .games-bg-blur {
        padding: 106px 12px 12px 12px;
    }
    
    .games-bg-blur h6 {
        font-size: 12px;
        line-height: 12px;
        margin-bottom: 2px;
        white-space: nowrap;
        overflow: hidden;
    }
    
    .games-bg-blur span {
        font-size: 11px;
    }
    
    .games-area {
        margin-bottom: 10px;
    }
}

.product .box img {
    width: 100%;
    height: 100%;
    display: block;
    margin: auto;
    object-fit: cover;
    border-radius: 0.75rem;
}
        
        
        .product .box span {
            font-size: xx-small;
            margin-top: 15px;
            display: block;
            text-transform: uppercase;
            color: #535452;
        }
        .product .box p {
            margin-top: 0.3rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 135px;
            font-weight: 500;
            font-size: 0.85rem;
            font-family: 'Roboto',serif;
        }
        
        .product .box h {
         margin-top: 15px;
         border-radius: 0.7rem;
         display: block;
         font-family: Impact,sans-serif;
           }      
           
        .product .box:hover {
        transform: scale(1.080);
        filter: brightness(1.1);
        }
        
        .card {
            cursor: pointer;
            /*background: #edf2f8;*/
            background: var(--dark);
        }
        
        .card-scroll {
            flex: 0 0 auto;
            margin-top: 7px;
            width: 31%;
        }
        .product-populer {
            overflow-x: scroll;
        }
        .product-populer .box {
            
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border-radius: 0.5rem;
            text-align: center;
            background: #fff;
            display: block;
            text-decoration: none;
            color: #333;
            min-height: 143px;
        }
        .product-populer .box img {
            width: 56px;
            display: block;
            margin: auto;
            margin-top: calc(1.5rem * -1);
            border-radius: 0.5rem;
        }
        .product-populer .box span {
            font-size: xx-small;
            margin-top: 15px;
            display: block;
            text-transform: uppercase;
            color: #718096;
        }
        .product-populer .box p {
            margin-top: 0.5rem;
            font-weight: 500;
            font-size: 0.75rem;
            font-family: Roboto,serif;
        }
        
        .lb {
            border-top: 5px solid var(--warna_1);
        }
        .footer img {
            padding-top: 2.5rem 0;
        }
        .menu-bottom {
            position: fixed;
            bottom: 0px;
            left: 0;
            right: 0;
            background: #fff;
            margin: 0 auto;
            max-width: 480px;
            border-radius: 0.3rem;
            border-top: 1px solid #262f40;
            border-radius: 0;
            filter: drop-shadow(25px 8px 40px #262f40);
            background: rgb(38 38 38 / 65%);
            -webkit-backdrop-filter: blur(8px);
            -moz-backdrop-filter: blur(8px);
            -ms-backdrop-filter: blur(8px);
            backdrop-filter: blur(8px);
            backface-visibility: hidden;
            padding: 0.25rem 0;
            text-align: center;
            z-index: 2;
        }
        .menu-bottom i {
            font-size: 24px;
            color: #718096;
        }
        .menu-bottom a {
            text-decoration: none;
        }
        .menu-bottom a.active i, .menu-bottom a.active p {
            color: var(--warna_2) !important;
        }
        .menu-bottom p {
            color: #718096;
            font-size: 0.875rem;
            margin-top: -5px;
            margin-bottom: 3px;
            font-weight: 400;
        }
        .text-copyright {
            color: #718096;
            font-size: 0.875rem;
        }
        .sosmed {
            margin-bottom: 20px;
        }
        .sosmed a {
            margin: 0 10px;
            text-decoration: none;
        }
        .sosmed a img {
            width: 24px;
        }
        .item .metode {
            margin: 5px 0;
            background: #fff;
            border-radius: 8px;
            padding: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
        }
        .my-form label {
            font-size: 1rem;
        }
        .my-form .form-control {
            background: #e5e7eb;
            margin-top: 6px;
            /*border: 2px solid var(--warna_2) !important;*/
        }
        .my-form .form-control:active, .my-form .form-control:focus {
            border-color: #3182ce !important;
            box-shadow: none !important;
            outline: none !important;
        }
        .color {
            color: var(--warna_2) !important;
        }
        .bg {
            background-color: var(--warna_2);
        }
        .btn {
            border: none;
            font-weight: 500;
        }
        .btn-primary, .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
            background: var(--warna_2);
        }
        .bg-primary {
            background: var(--warna_2) !important;
        }
        .bg-secondary {
            background: var(--warna_3) !important;
         }
        .bg-white-custom {
            background: var(--warna_4) !important;
        }
        .cursor-pointer {
            cursor: pointer;
        }
        #toolbarContainer {
            display: none;
        }
        .btn.disabled, .btn:disabled, fieldset:disabled {
            background: #56ccfd;
            border-color: #56ccfd;
        }
        .fw-500 {
            font-weight: 500;
        }
        .otp .col-2 {
            padding: 0 2px;
        }
        .method-list {
            overflow: hidden;
            cursor: pointer;
        }
        .method-list.active {
            border-color: var(--warna_2) !important;
        }
        .method-list.active:before {
            display: inline-block;
            content: 'L';
            position: relative;
            background: var(--warna_2);
            margin-left: -12px;
            height: 53px;
            line-height: 40px;
            width: 20px;
            text-align: center;
            color: #fff;
            top: -23px;
            transform: rotate(45deg) scaleX(-1);;
        }
        .method-list.active table {
            margin-top: -53px;
        }
        
        .btn:hover {
            background-color: #3080E3!important;
        }
        
        
        .carousel-inner  {
            border-radius: 12px;
        }
        
    .slider {
        width: 100%;
        margin: 100px auto;
    }
    .slick-slide {
      margin: 0px 10px;
    }
    .slick-slide img {
      width: 100%;
      border-radius: 12px;
    }
    .slick-prev:before,
    .slick-next:before {
      color: black;
    }
    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    .slick-active {
      opacity: .5;
    }
    .slick-current {
      opacity: 1;
    }
    .section-title .btn-group{
    float: right;
}
    .search-box {
  font-size: 12px;
  border: solid 0.3em #16b36a;
  display: inline-block;
  position: relative;
  border-radius: 1.5em;
}
.search-box input[type=text] {
  font-family: inherit;
  font-weight: bold;
  width: 1.9em;
  height: 1.9em;
  padding: 0.3em 1.1em 0.3em 0.4em;
  border: none;
  box-sizing: border-box;
  border-radius: 1.9em;
  transition: width 800ms cubic-bezier(0.68, -0.55, 0.27, 1.55) 150ms;
}
.search-box input[type=text]:focus {
  outline: none;
}
.search-box input[type=text]:focus, .search-box input[type=text]:not(:placeholder-shown) {
  width: 8em;
  transition: width 800ms cubic-bezier(0.68, -0.55, 0.27, 1.55);
}
.search-box input[type=text]:focus + button[type=reset], .search-box input[type=text]:not(:placeholder-shown) + button[type=reset] {
  transform: rotate(-45deg) translateY(0);
  transition: transform 150ms ease-out 800ms;
}
.search-box input[type=text]:focus + button[type=reset]:after, .search-box input[type=text]:not(:placeholder-shown) + button[type=reset]:after {
  opacity: 1;
  transition: top 150ms ease-out 950ms, right 150ms ease-out 950ms, opacity 150ms ease 950ms;
}
.search-box button[type=reset] {
  background-color: transparent;
  width: 1.8em;
  height: 1.8em;
  border: 0;
  padding: 0;
  outline: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 0.55em;
  right: 0.55em;
  transform: rotate(-45deg) translateY(2.2em);
  transition: transform 150ms ease-out 150ms;
}
.search-box button[type=reset]:before, .search-box button[type=reset]:after {
  content: "";
  background-color: #16b36a;
  width: 0.3em;
  height: 1.4em;
  position: absolute;
}
.search-box button[type=reset]:after {
  transform: rotate(90deg);
  opacity: 0;
  transition: transform 150ms ease-out, opacity 150ms ease-out;
}
    .notification {
	position: absolute;
	bottom: 50px;
	left: 50px;
	width: max-content;
	padding: 20px 15px;
	border-radius: 4px;
	background-color: #141619;
	color: #f6f5f9;
	box-shadow: 0 1px 10px rgba(0, 0, 0, 0.1);
	transform: translateY(30px);
	opacity: 0;
	visibility: hidden;
	animation: fade-in 4s infinite forwards;
}
.notification__progress {
	position: absolute;
	left: 5px;
	bottom: 5px;
	width: calc(100% - 10px);
	height: 3px;
	transform: scaleX(0);
	transform-origin: left;
	background-image: linear-gradient(to right, #539bdb, #3250bf);
	border-radius: inherit;
	animation: load 3s 0.25s infinite forwards;
}
@keyframes fade-in {
	5% {
		opacity: 1;
		visibility: visible;
		transform: translateY(0);
	}
	90% {
		opacity: 1;
		transform: translateY(0);
	}
}
     @media only screen and (max-width: 480px){
    .flash-sale-card .text{
        padding: 8px;
    }
    .flash-sale-card h3{
        top: 8px;
        left: 8px;
    }
    .flash-sale-card .ratio-1{
        padding-top: 120%;
    }
}   
.top-bar {
        padding: 0.5rem 0;
        background: #202737;
}

.top-bar a {
    color: #ddd;
    text-decoration: none;
}

ul + .content-body {
    margin-top: -125px; 
    opacity: 100;
}

@media only screen and (min-width: 600px) {
    ul + .content-body {
        margin: 0!important;
    }
    
    .games-banner {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }
    
    .games-banner + div {
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        margin-bottom: 30px!important;
    }
}
    </style>
    
    
    
    @yield('custom_style')

            
<body>
    <div class="top-bar d-none d-md-block">
        <div class="container" bis_skin_checked="1">
            <div class="d-flex justify-content-between">
                <div>
                    <a href="#" class=""><span class="d-none d-md-inline-block">Tentang Kami</span></a>
                    <a href="#" class="ms-3"><span class="d-none d-md-inline-block">Komunitas</span></a>
                </div>
                <div>
                    <a href="#" class="me-3">
                        <span class="d-none d-md-inline-block">Informasi Reseller</span>
                    </a>
                    <a href="#" class="me-3">
                        <span class="d-none d-md-inline-block">FAQ</span>
                    </a>
                    <a href="#" class="me-3">
                        <span class="d-none d-md-inline-block">Ketentuan Layanan</span>
                    </a>
                    <a href="#" class="">
                        <span class="d-none d-md-inline-block">Kebijakan Privasi</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <nav id="navs" class="navbar navbar-expand-lg navbar-light d-none d-md-block sticky-top py-3">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
          {{-- <img src="{{url('')}}{{ !$config ? '' : $config->logo_header }}" alt="" width="150"> --}}
          <img src="{{url('')}}{{ !$config ? '' : '/assets/logo/KGdark (1).svg' }}" alt="" width="150">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('cari') }}">Lacak Pesanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('daftar-harga') }}">Daftar Harga</a>
            </li>
            @if(Auth::check())
                @if(Auth()->user()->role == 'Member' || Auth()->user()->role == 'Platinum' || Auth()->user()->role == 'Gold' || Auth()->user()->role == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('riwayat-pembelian') }}">Riwayat</a>
                    </li>
                @endif
            @endif
            <li class="nav-item">
              <a class="nav-link" href="https://wa.me/628123456192">Hubungi Kami</a>
            </li>
          </ul>
          @if(Auth::check())
            @if(Auth()->user()->role == 'Member' || Auth()->user()->role == 'Platinum' || Auth()->user()->role == 'Gold')
              <a href="{{url('user/dashboard')}}">
                <button type="button" class="btn btn-primary">Akun</button>
              </a>
            @else
              <a href="{{url('user/dashboard')}}">
                <button type="button" class="btn btn-primary me-3">Akun</button>
              </a>
              <a href="{{url('dashboard')}}">
                <button type="button" class="btn btn-outline-primary" style="border:1px solid;">Dashboard</button>
              </a>
            @endif
        @else
            <a href="{{url('login')}}">
                <button type="button" class="btn btn-primary">Masuk / Daftar</button>
              </a>
        @endif
        </div>
      </div>
    </nav>
    
    <div class="content px-0">

    @yield('content')
     
        
    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
    
    <script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
<script type="text/javascript">
    $(document).on('ready', function() {
      $('.center').slick({
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
    });
</script>

    
    
    @stack('custom_script')
    
</body>
</html>