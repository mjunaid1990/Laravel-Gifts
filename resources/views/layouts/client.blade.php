<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'E-Gift Cards') }}</title>



        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/toastify/toastify.css') }}">
        <link rel="shortcut icon" type="image/jpg" href="{{ asset('e-gifts-fav.jpg') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('assets/css/jquery-simple-mobilemenu.css')}}" />
        <!--<link rel="stylesheet" href="{{asset('assets/css/jquery-simple-mobilemenu-slide.css')}}" />-->
        <link rel="stylesheet" href="{{asset('assets/css/product.css')}}" />
        <link href="{{ asset('assets/css/client.css?v='.time()) }}" rel="stylesheet">
        @yield('css')
        <style>
            .mobile-view header .b-tAWNLA {
                display: flex;
                flex-direction: column;
                width: 100%;
                align-items: self-start;
            }
            .mobile-view header .b-eYXZxj.b-mXP44v {
                display: block;
                position: relative;
                height: 44px;
                top: unset;
                left: unset;
                right: unset;
                bottom: unset;
                width: 100%;
                padding: 0;
            }
            .mobile-view .b-hXJltP {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: var(--space-1) 0 var(--space-4) 0;
                width: 100%;
                height: unset;
            }
            .mobile-view .b-TdZseo {
                position: absolute;
                top: var(--space-3);
                right: var(--space-5);
            }
        </style>
    </head>
    <body>
        @php
        $current_url = url()->current();
        @endphp
        @if( $current_url == 'https://e-gifts.uk/contact-us' || $current_url == 'https://e-gifts.uk/checkout' || $current_url == 'https://e-gifts.uk/checkout/payment-rejected')
        
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/64fdce58b2d3e13950eefe7c/1h9vms2r2';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
        @endif
        <div id="app" class="{{isMobile2()?'mobile-view':''}}">
            <div class="b-kRUhIW" style="justify-content: flex-start; min-height: 70vh;">
                @include('layouts._client_header')

                <div id="main">
                    @yield('content')
                    @include('layouts._client_footer')
                </div>

            </div>



        </div>
        <div id="cart-html"></div>
        <!-- Scripts -->
        <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/mazer.js') }}"></script>
        <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/toastify/toastify.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" ></script>
        <script src="{{ asset('assets/js/jquery-simple-mobilemenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/front.js?v='.time()) }}"></script>
        @yield('js')
        @stack('js')

        <script>
            
        $(document).ready(function() {
            
            $('#mobile-menu-button, #close-mobile-menu').on('click', function() {
                
                $('#sm_menu_ham').trigger('click');
                if($('.sm_menu_outer').hasClass('active')) {
                    $('#mobile-menu-button').css('display', 'none');
                    $('#close-mobile-menu').css('display', 'flex');
                }else {
                    $('#mobile-menu-button').css('display', 'flex');
                    $('#close-mobile-menu').css('display', 'none');
                }
            })
            
            $(".mobile_menu").slideMobileMenu({

                // Hamburger Id
                "hamburgerId"   : "sm_menu_ham", 

                // Menu Wrapper Class
                "wrapperClass"  : "sm_menu_outer", 

                // Submenu Class
                "submenuClass"  : "submenu", 

                // or 'accordion'
                "menuStyle": "slide",

                // Calls when menu loaded
                "onMenuLoad"    : function() { return true; }, 

                // Calls when menu open/close
                "onMenuToggle"  : function() { return true; } 

              });
            
        })    
        
        $(".add-to-cart").click(function (e) {
            e.preventDefault();
            let product_id = $(this).attr("data-id-product");
            let quantity = 1;

            var v = $('#downshift-0-input').val();
            if(!v) {
                alert('please enter value');
                return true;
            }


            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                dataType: "json",
                data: {"_token": "{{ csrf_token() }}", product_id: product_id, quantity: quantity, value: v},
                url: '{{ route("clientAddToCart") }}',
                success: function (data) {
                    $('#cartCount').text(data.cartCount);
                    showCart();
                }
            })
        });
        
        $(document).on('click', '.plus-product', function (e) {
            e.preventDefault();
            var pid = $(this).data('product');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                dataType: "json",
                data: {"_token": "{{ csrf_token() }}", product_id: pid, quantity: 1},
                url: '{{ route("clientUpdateCart") }}',
                success: function (data) {
                    $('#cartCount').text(data.cartCount);
                    var q = $('cart-qty-input-'+pid).val();
                    var plus = parseInt(q) + 1;
                    $('cart-qty-input-'+pid).val(plus)
                    if($('.checkoutpage').length > 0) {
                        window.location.reload();
                    }else {
                        showCart();
                    }
                },

            })
        })
        $(document).on('click', '.minus-product', function (e) {
            e.preventDefault();
            var pid = $(this).data('product');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                dataType: "json",
                data: {"_token": "{{ csrf_token() }}", id: pid},
                url: '{{ route("clientDeleteCart") }}',
                success: function (data) {
                    $('#cartCount').text(data.cartCount);
                    var q = $('cart-qty-input-'+pid).val();
                    var plus = parseInt(q) - 1;
                    $('cart-qty-input-'+pid).val(plus)
                    if($('.checkoutpage').length > 0) {
                        window.location.reload();
                    }else {
                        showCart();
                    }
                },

            })
        })
        
        $(document).on('click', '.cart-modal', function (e) {
            if($('#minicart-modal').length > 0) {
                $('#cart-html').html('');
            }else {
                showCart();
            }
            
        })
        
        function showCart() {
            $.ajax({
                type: "get",
                dataType: "json",
                url: '/show-minicart',
                success: function (data) {
                    if(data.status) {
                        $('#cart-html').html(data.html);
                    }
                },
            })
        }
        
        $(document).on('click', '.category-btn-prev', function (e) {
            var id = $(this).data('cat');
            $('#category-list-'+id).find('.slick-prev').trigger('click');
        });
        
        $(document).on('click', '.category-btn-next', function (e) {
            var id = $(this).data('cat');
            $('#category-list-'+id).find('.slick-next').trigger('click');
        });
        
        $(document).on('click', function (e) {
            if ($(e.target).closest("#minicart-modal").length === 0) {
                $('#cart-html').html('');
            }
        });
        
        $(document).on('input, focus', '#downshift-0-input',function (e) {
            $('#downshift-menu').toggle();
        });
        
        $(document).on('click', '#downshift-83-toggle-button',function (e) {
            $('#downshift-menu').toggle();
        });
        
        $(document).on('click', '.select-dropdown-item',function (e) {
            var val = $(this).data('val');
            $('#downshift-83-toggle-button').html('£'+val);
            $('#downshift-0-input').val(val);
            $('#downshift-menu').toggle();
        });
        
        $(document).on('submit', '#checkoutform', function (event) {
            event.preventDefault(); // stopping submitting
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            var $this = $(this);

            $('.overlay-loader').show();
            setTimeout(function() {
                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'json',
                    data: data,
                    success: function (response) {
                        if(response.success) {
                            window.location.href='/checkout/payment-rejected';
                        }else {
                            $('.overlay-loader').fadeOut();
                        }
                    },
                    error: function (err) {
                        console.log(err);
                        $('.overlay-loader').fadeOut();
                    }
                });
            },3000);

            return false; // prevent default form submission
        });
        
        
        </script>

    </body>
</html>
