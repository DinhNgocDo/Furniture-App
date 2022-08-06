<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="{{ asset('client/img/favicon.png') }}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}">
<!-- animate CSS -->
<link rel="stylesheet" href="{{ asset('client/css/animate.css') }}">
<!-- owl carousel CSS -->
<link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css') }}">
<!-- nice select CSS -->
<link rel="stylesheet" href="{{ asset('client/css/nice-select.css') }}">
<!-- font awesome CSS -->
<link rel="stylesheet" href="{{ asset('client/css/all.css') }}">
<!-- flaticon CSS -->
<link rel="stylesheet" href="{{ asset('client/css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('client/css/themify-icons.css') }}">
<!-- font awesome CSS -->
<link rel="stylesheet" href="{{ asset('client/css/magnific-popup.css') }}">
<!-- swiper CSS -->
<link rel="stylesheet" href="{{ asset('client/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('client/css/price_rangs.css') }}">
<!-- style CSS -->
<link rel="stylesheet" href="{{ asset('client/css/style.css') }}">

@yield('link')
<style>
    .s-text {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .s-text-2 {
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 2;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        width: fit-content;
    }

    .navbar_menu li.account-cus:hover .account_selection {
        visibility: visible;
        opacity: 1;
        top: 100%;
    }

    .product-img {
        height: 300px;
    }

    .notification {
        position: fixed;
        bottom: 10px;
        right: 10px;
        z-index: 999;
    }

    .notification .message {
        background: #ff3368;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        margin-bottom: 10px;
        font-size: 20px;
    }

    .error {
        color: red;
    }

    .form-search {
        position: relative;
    }

    .form-search .header-search {
        position: absolute;
        right: 0;
        visibility: hidden;
    }

    .form-search .header-search input {
        border: none;
        border-bottom: 1px solid;
        padding: 2px 10px;
        font-size: 15px;
    }

    .grid_sorting_button a {
        color: black;
    }

    .grid_sorting_button.active a {
        color: white !important;
    }

    .text-bold {
        font-weight: bold !important;
    }
</style>