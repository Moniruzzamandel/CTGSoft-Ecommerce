<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ $shareData['system_name'] }}</title>
    

    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/crumina-fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/grid.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/styles.css') }}">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/primary-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/toaster.min.css') }}">

    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="css/rtl.css">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

</head>


<body class=" ">

<header class="header" id="site-header">

    <div class="container">

        <div class="header-content-wrapper">

            <ul class="nav-add">
                <li class="cart">

                    <a href="#" class="js-cart-animate">
                        <i class="seoicon-basket"></i>
                        <span class="cart-count">{{ Cart::content()->count() }}</span>
                    </a>

                    <div class="cart-popup-wrap">
                        <div class="popup-cart">
                            <h4 class="title-cart align-center">{{ Cart::total() }} BDT</h4>
                            <br>
                            <a href="{{ route('cart') }}">
                                <div class="btn btn-small btn--dark">
                                    <span class="text">view cart</span>
                                </div>
                            </a>
                        </div>
                    </div>

                </li>
            </ul>
        </div>

    </div>

</header>


@yield('content')

<!-- Footer -->

<footer class="footer">
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                </div>
            </div>
        </div>
    </div>
</footer>



<script src="{{ asset('front/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('front/js/crum-mega-menu.js') }}"></script>
<script src="{{ asset('front/js/swiper.jquery.min.js') }}"></script>
<script src="{{ asset('front/js/theme-plugins.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>
<script src="{{ asset('front/js/form-actions.js') }}"></script>

<script src="{{ asset('front/js/velocity.min.js') }}"></script>
<script src="{{ asset('front/js/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('front/js/animation.velocity.min.js') }}"></script>
<script src="{{ asset('front/js/toaster.min.js') }}"></script>

<!-- ...end JS Script -->
<script type="text/javascript">
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif

    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}")
    @endif
</script>

</body>

</html>