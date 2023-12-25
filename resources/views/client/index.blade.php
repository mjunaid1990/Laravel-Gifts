@extends('layouts.client')
@section('css')

<style>
    .slick-slider {
        margin:0 -5px;
    }
    .slick-slide {
        margin-right:5px;
        margin-left:5px;
    }
    .slick-track {
        margin-left: 0;
    }
    .slick-prev, .slick-next {
        display: none;
    }
</style>
@endsection
@section('content')



<div class="b-QNdonF">
    <div class="b-GjUpiu">
        <div class="b-fAUDcO">
            <div class="b-GpBDJU">
                <div class="b-qi87Hv">
                    <div class="b-SJd2qT">
                        <div class="">
                            <div>

                                <div class="b-OCzQS_">



                                    <div class="b-orzNLz b-JJssGU b-xrRiDy b-xiyEcD" style="--gap: var(--space-0);">

                                        @if($category && count($category) > 0)
                                        @foreach($category as $cat)
                                            <div class="b-_XIkIk" style="align-items: center;">
                                                <div class="">
                                                    <a class="b-hbhcU4 b-BY2mzI b-uEgd6I" tabindex="-1" href="/{{strtolower($cat->country)}}/{{$cat->slug}}">
                                                        <h2 class="b-uEgd6I">
                                                            <span class="" style="text-transform: capitalize;">{{$cat->name}}</span>
                                                        </h2>
                                                    </a>
                                                </div>
                                                <div class="b-KSYi24">
                                                    <a class="b-hbhcU4 b-ken4wX" href="/{{strtolower($cat->country)}}/{{$cat->slug}}">
                                                        <span class="">See all</span>
                                                    </a>
                                                    <div class="b-KSYi24">
                                                        <button class="b-gPrz3t b-EGNzI0 b-t_utMn b-EHuDI4 b-qADpFj category-btn-prev" data-cat="{{$cat->id}}">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </button>
                                                        <button class="b-gPrz3t b-wXmwbO b-EGNzI0 b-t_utMn b-EHuDI4 b-qADpFj category-btn-next" data-cat="{{$cat->id}}">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            @if($cat->productHome)
                                            <div class="b-Ftiqq3">
                                                
                                                @if(isMobile2())
                                                <ul class="b-GmQQgc b-vqW3ze" id="category-list-{{$cat->id}}" style="--shelf-gap: var(--space-4);">
                                                    @foreach($cat->productHome as $prod)
                                                    
                                                        <li class="b-hletTI b-PHPPLb" style="margin-bottom: 10px;">
                                                            
                                                            
                                                            @php
                                                    $price = explode(',', $prod->price);
                                                    @endphp
                                                            <div class="b-SiF8GH">
                                                                <a class="b-hbhcU4 b-QRbp6v b-GPzt5k" href="/{{strtolower($prod->country)}}/{{$cat->slug}}/{{$prod->slug}}">
                                                                    <div class="b-orzNLz b-JJssGU b-RRF6jh b-qu6O9G">
                                                                        <div class="b-EXzmIr b-gDKMPS" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);">
                                                                            <span class="b-MgKtnT"></span>
                                                                            <img src="{{$prod->productSingleImage && $prod->productSingleImage->path?'/shop/products/'.$prod->productSingleImage->path:''}}" loading="eager" alt="{{$prod->title}}" class="b-ildLo6 b-oyeF5q" decoding="async" width="350" height="212" style="background: rgb(255, 255, 255);">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </a>
                                                                <div class="b-BTMpqM b-HIlNdv"></div>
                                                            </div>
                                                    <span style="display: block; width: var(--space-4); min-width: var(--space-4); height: var(--space-4); min-height: var(--space-4);"></span>
                                                            
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                @else
                                                
                                                <ul class=" b-vqW3ze category-slider" id="category-list-{{$cat->id}}">
                                                    @foreach($cat->productHome as $prod)
                                                    @php
                                                    $price = explode(',', $prod->price);
                                                    @endphp
                                                        <li class="b-hletTI b-xaziEg" style="margin-bottom: 10px;">
                                                            <div class="b-SiF8GH">
                                                                <a class="b-hbhcU4 b-QRbp6v b-GPzt5k" href="/{{strtolower($prod->country)}}/{{$cat->slug}}/{{$prod->slug}}">
                                                                    <div class="b-orzNLz b-JJssGU b-RRF6jh b-qu6O9G">
                                                                        <div class="b-EXzmIr b-gDKMPS" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);">
                                                                            <span class="b-MgKtnT"></span>
                                                                            <img src="{{$prod->productSingleImage && $prod->productSingleImage->path?'/shop/products/'.$prod->productSingleImage->path:''}}" loading="eager" alt="{{$prod->title}}" class="b-ildLo6 b-oyeF5q" decoding="async" width="350" height="212" style="background: rgb(255, 255, 255);">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </a>
                                                                <div class="b-BTMpqM b-HIlNdv"></div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                
                                                @endif
                                            </div>
                                            @endif
                                        
                                        @endforeach
                                        
                                        @else
                                        
                                        <div class="b-x7rY_q w-100"><h2 class="b-QLqjHL">No search results found</h2><a href="/" class="b-gPrz3t b-EHuDI4 b-_jYOFY"><span class="">Reset</span></a></div>
                                        
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="b-orzNLz b-JJssGU" style="--gap: var(--space-7);">
<!--                            <div class="b-orzNLz b-JJssGU b-RRF6jh" style="--gap: var(--space-4);">
                                <p class="b-RwfI_t b-rGlzlW">Showing 30 out of 174</p>
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="17.24137931034483" aria-valuetext="17%" role="progressbar" data-state="loading" data-value="17.24137931034483" data-max="100" class="b-HhgYad b-Y_z7On" style="width: 200px;">
                                    <div data-state="loading" data-value="17.24137931034483" data-max="100" class="b-oEDnr2" style="width: 17.2414%;"></div>
                                </div>
                                <button class="b-gPrz3t b-EHuDI4 b-_jYOFY">
                                    <span class="">Load more</span>
                                </button>
                            </div>-->
                            <div class="b-orzNLz b-JJssGU" style="--gap: var(--space-6);">
                                <h3 class="b-laOVmw b-RwfI_t b-FARywK">How gift cards work</h3>
                                <div class="b-orzNLz b-JJssGU b-rQxk33" style="--gap: var(--space-5);">
                                    <div class="b-Nh6QDq">
                                        <div class="b-HgreoR b-B9T9IB">
                                            <svg width="187" height="48" viewBox="0 0 187 48" fill="none">
                                            <rect x="1.33203" y="1" width="128" height="46" rx="3" fill="white" stroke="#002B28" stroke-width="2"></rect>
                                            <rect width="67.947" height="23" transform="translate(13.8672 12)" fill="white"></rect>
                                            <path d="M19.591 17.4H17.323C17.179 18.768 16.603 19.164 15.631 19.164H14.731V21.216H15.721C16.243 21.216 16.981 21.054 17.215 20.73V30H19.591V17.4Z" fill="#002B28"></path>
                                            <path d="M24.1076 21.774H26.5016C26.4656 20.244 27.2216 19.218 28.5716 19.218C29.7956 19.218 30.5696 19.974 30.5696 21.144C30.5696 22.062 30.0476 22.782 29.0216 23.286L27.0056 24.294C25.7996 24.888 24.0896 26.22 24.0896 28.254L24.1076 30H32.9636V27.93H26.4476C26.4476 27.156 27.3116 26.544 28.0316 26.166L29.9756 25.194C31.9736 24.204 32.9636 22.854 32.9636 21.162C32.9636 18.804 31.1636 17.256 28.5716 17.256C25.8176 17.256 24.0536 18.984 24.1076 21.774Z" fill="#002B28"></path>
                                            <path d="M37.1599 27.678V30H39.5719V27.678H37.1599Z" fill="#002B28"></path>
                                            <path d="M48.5459 25.806C49.6979 25.806 50.9579 25.176 51.4799 24.294C51.3719 26.508 50.2199 28.164 48.5279 28.164C47.3039 28.164 46.4219 27.498 46.2239 26.562H43.9919C44.2619 28.578 46.0259 30.144 48.6179 30.144C51.6059 30.144 53.6939 27.66 53.6939 23.25C53.6939 19.812 51.9659 17.256 48.8159 17.256C46.1699 17.256 44.1359 19.11 44.1359 21.558C44.1359 23.97 45.9179 25.806 48.5459 25.806ZM46.5299 21.558C46.5299 20.244 47.4299 19.326 48.7619 19.326C50.1119 19.326 51.0299 20.244 51.0299 21.558C51.0299 22.854 50.1119 23.772 48.7619 23.772C47.4299 23.772 46.5299 22.854 46.5299 21.558Z" fill="#002B28"></path>
                                            <path d="M62.5459 25.806C63.6979 25.806 64.9579 25.176 65.4799 24.294C65.3719 26.508 64.2199 28.164 62.5279 28.164C61.3039 28.164 60.4219 27.498 60.2239 26.562H57.9919C58.2619 28.578 60.0259 30.144 62.6179 30.144C65.6059 30.144 67.6939 27.66 67.6939 23.25C67.6939 19.812 65.9659 17.256 62.8159 17.256C60.1699 17.256 58.1359 19.11 58.1359 21.558C58.1359 23.97 59.9179 25.806 62.5459 25.806ZM60.5299 21.558C60.5299 20.244 61.4299 19.326 62.7619 19.326C64.1119 19.326 65.0299 20.244 65.0299 21.558C65.0299 22.854 64.1119 23.772 62.7619 23.772C61.4299 23.772 60.5299 22.854 60.5299 21.558Z" fill="#002B28"></path>
                                            <rect x="72.8672" y="12" width="2.5" height="23" rx="1.25" fill="#002B28"></rect>
                                            <circle cx="162.332" cy="24" r="24" fill="#EA0B2C"></circle>
                                            <path d="M170.225 23.4929C170.162 23.3293 170.067 23.1797 169.945 23.0529L163.279 16.3863C163.154 16.2619 163.007 16.1633 162.844 16.0961C162.682 16.0288 162.508 15.9941 162.332 15.9941C161.977 15.9941 161.636 16.1352 161.385 16.3863C161.261 16.5106 161.162 16.6582 161.095 16.8206C161.028 16.983 160.993 17.1571 160.993 17.3329C160.993 17.688 161.134 18.0285 161.385 18.2796L165.785 22.6663H155.665C155.312 22.6663 154.973 22.8067 154.723 23.0568C154.473 23.3068 154.332 23.646 154.332 23.9996C154.332 24.3532 154.473 24.6924 154.723 24.9424C154.973 25.1925 155.312 25.3329 155.665 25.3329H165.785L161.385 29.7196C161.26 29.8435 161.161 29.991 161.094 30.1535C161.026 30.316 160.991 30.4902 160.991 30.6663C160.991 30.8423 161.026 31.0166 161.094 31.179C161.161 31.3415 161.26 31.489 161.385 31.6129C161.509 31.7379 161.657 31.8371 161.819 31.9048C161.982 31.9725 162.156 32.0073 162.332 32.0073C162.508 32.0073 162.682 31.9725 162.845 31.9048C163.007 31.8371 163.155 31.7379 163.279 31.6129L169.945 24.9463C170.067 24.8195 170.162 24.6699 170.225 24.5063C170.359 24.1816 170.359 23.8175 170.225 23.4929Z" fill="white"></path>
                                            </svg>
                                        </div>
                                        <span style="display: block; width: var(--space-4); min-width: var(--space-4); height: var(--space-4); min-height: var(--space-4);"></span>
                                        <h4 class="b-laOVmw b-RwfI_t b-xzpi6L">Enter the amount</h4>
                                        <span style="display: block; width: var(--space-1); min-width: var(--space-1); height: var(--space-1); min-height: var(--space-1);"></span>
                                        <p class="b-RwfI_t b-CPOR29 b-lxsi3E">Select or type the amount you want the card to have.</p>
                                    </div>
                                    <div class="b-Nh6QDq">
                                        <div class="b-HgreoR b-B9T9IB">
                                            <img src="/assets/images/card-img-3.png" alt="" style="height: 70px;" >
                                            <svg width="153" height="56" viewBox="0 0 153 56" fill="none" style="display: none;">
                                            <g clip-path="url(#clip0_1641_83486)">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M47.7825 33.8064C44.5745 46.6368 31.5233 54.4904 18.6937 51.2824C5.86325 48.0744 -1.99035 35.0784 1.21765 22.1936C4.42565 9.36321 17.4217 1.50961 30.3065 4.71761C43.1369 7.92561 50.9905 20.9768 47.7825 33.8064V33.8064Z" fill="#F7931A"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M35.0656 24.568C35.564 21.36 33.1296 19.6456 29.812 18.5392L30.8632 14.1712L28.2632 13.5624L27.2128 17.7648C26.5108 17.6051 25.8103 17.4392 25.1112 17.2672L26.1624 13.0088L23.5072 12.3448L22.4568 16.6592C21.8488 16.5488 21.2952 16.4376 20.7424 16.272L17.148 15.3872L16.4288 18.2072L18.3648 18.6504C19.4152 18.9264 19.5808 19.6456 19.5808 20.1984L18.3088 25.1208C18.42 25.1208 18.5304 25.176 18.5856 25.2312C18.5296 25.1752 18.42 25.1752 18.3088 25.1208L16.5944 32.0328C16.484 32.3656 16.152 32.8632 15.3784 32.6416C15.4336 32.6976 13.4984 32.1992 13.4984 32.1992L12.1704 35.1856L15.5992 36.0704C16.2632 36.2368 16.8712 36.4024 17.4792 36.568L16.3736 40.9376L19.028 41.5456L20.0792 37.232C20.7976 37.4528 21.5168 37.6192 22.18 37.7848L21.1296 42.0984L23.784 42.7624L24.8352 38.3936C29.3144 39.2232 32.7432 38.8912 34.1256 34.8536C35.2872 31.536 34.0704 29.6552 31.6928 28.4384C33.4624 28.052 34.7344 26.8904 35.0656 24.5672V24.568ZM29.0376 33.0288C28.264 36.292 22.7336 34.5224 20.964 34.0792L22.4016 28.2728C24.1712 28.7152 29.9224 29.6008 29.0376 33.0288ZM29.868 24.512C29.1496 27.4984 24.5592 26.0056 23.0656 25.6184L24.3936 20.3648C25.8864 20.7512 30.6424 21.4152 29.868 24.512Z" fill="white"></path>
                                            </g>
                                            <path d="M80.3933 27.4933C80.3299 27.3297 80.2347 27.1801 80.1133 27.0533L73.4467 20.3867C73.3223 20.2623 73.1748 20.1637 73.0123 20.0965C72.8499 20.0292 72.6758 19.9945 72.5 19.9945C72.1449 19.9945 71.8044 20.1356 71.5533 20.3867C71.429 20.511 71.3304 20.6586 71.2631 20.821C71.1958 20.9834 71.1612 21.1575 71.1612 21.3333C71.1612 21.6884 71.3023 22.0289 71.5533 22.28L75.9533 26.6667H65.8333C65.4797 26.6667 65.1406 26.8071 64.8905 27.0572C64.6405 27.3072 64.5 27.6464 64.5 28C64.5 28.3536 64.6405 28.6928 64.8905 28.9428C65.1406 29.1929 65.4797 29.3333 65.8333 29.3333H75.9533L71.5533 33.72C71.4284 33.844 71.3292 33.9914 71.2615 34.1539C71.1938 34.3164 71.1589 34.4906 71.1589 34.6667C71.1589 34.8427 71.1938 35.017 71.2615 35.1794C71.3292 35.3419 71.4284 35.4894 71.5533 35.6133C71.6773 35.7383 71.8248 35.8375 71.9872 35.9052C72.1497 35.9729 72.324 36.0077 72.5 36.0077C72.676 36.0077 72.8503 35.9729 73.0128 35.9052C73.1752 35.8375 73.3227 35.7383 73.4467 35.6133L80.1133 28.9467C80.2347 28.8199 80.3299 28.6703 80.3933 28.5067C80.5267 28.1821 80.5267 27.8179 80.3933 27.4933Z" fill="#EA0B2C"></path>
                                            <rect x="97.5" y="1" width="54" height="54" rx="1" fill="white" stroke="#002B28" stroke-width="2"></rect>
                                            <path d="M122.5 8H106.25C105.56 8 105 8.55875 105 9.25V25.5C105 26.1913 105.56 26.75 106.25 26.75H122.5C123.19 26.75 123.75 26.1913 123.75 25.5V9.25C123.75 8.55875 123.19 8 122.5 8ZM121.25 24.25H107.5V10.5H121.25V24.25ZM111.25 21.75H117.5C118.19 21.75 118.75 21.1913 118.75 20.5V14.25C118.75 13.5588 118.19 13 117.5 13H111.25C110.56 13 110 13.5588 110 14.25V20.5C110 21.1913 110.56 21.75 111.25 21.75ZM112.5 15.5H116.25V19.25H112.5V15.5ZM143.75 8H127.5C126.81 8 126.25 8.55875 126.25 9.25V25.5C126.25 26.1913 126.81 26.75 127.5 26.75H143.75C144.44 26.75 145 26.1913 145 25.5V9.25C145 8.55875 144.44 8 143.75 8ZM142.5 24.25H128.75V10.5H142.5V24.25ZM132.5 21.75H138.75C139.44 21.75 140 21.1913 140 20.5V14.25C140 13.5588 139.44 13 138.75 13H132.5C131.81 13 131.25 13.5588 131.25 14.25V20.5C131.25 21.1913 131.81 21.75 132.5 21.75ZM133.75 15.5H137.5V19.25H133.75V15.5ZM143.75 29.25H127.5C126.81 29.25 126.25 29.8088 126.25 30.5V46.75C126.25 47.4413 126.81 48 127.5 48H143.75C144.44 48 145 47.4413 145 46.75V30.5C145 29.8088 144.44 29.25 143.75 29.25ZM142.5 45.5H128.75V31.75H142.5V45.5ZM132.5 43H138.75C139.44 43 140 42.4413 140 41.75V35.5C140 34.8088 139.44 34.25 138.75 34.25H132.5C131.81 34.25 131.25 34.8088 131.25 35.5V41.75C131.25 42.4413 131.81 43 132.5 43ZM133.75 36.75H137.5V40.5H133.75V36.75ZM122.5 29.25H116.25C115.56 29.25 115 29.8088 115 30.5V35.5H106.25C105.56 35.5 105 36.0588 105 36.75V46.75C105 47.4413 105.56 48 106.25 48H116.25C116.94 48 117.5 47.4413 117.5 46.75V38H122.5C123.19 38 123.75 37.4413 123.75 36.75V30.5C123.75 29.8088 123.19 29.25 122.5 29.25ZM115 45.5H107.5V38H115V45.5ZM121.25 35.5H117.5V31.75H121.25V35.5ZM105 30.5C105 29.8088 105.56 29.25 106.25 29.25H111.25C111.94 29.25 112.5 29.8088 112.5 30.5C112.5 31.1913 111.94 31.75 111.25 31.75H106.25C105.56 31.75 105 31.1913 105 30.5ZM112.5 43H110V40.5H112.5V43ZM123.75 40.5V46.75C123.75 47.4413 123.19 48 122.5 48H120C119.31 48 118.75 47.4413 118.75 46.75C118.75 46.0588 119.31 45.5 120 45.5H121.25V40.5C121.25 39.8088 121.81 39.25 122.5 39.25C123.19 39.25 123.75 39.8088 123.75 40.5Z" fill="#002B28"></path>
                                            <defs>
                                            <clipPath id="clip0_1641_83486">
                                                <rect width="48" height="48" fill="white" transform="translate(0.5 4)"></rect>
                                            </clipPath>
                                            </defs>
                                            </svg>
                                        </div>
                                        <span style="display: block; width: var(--space-4); min-width: var(--space-4); height: var(--space-4); min-height: var(--space-4);"></span>
                                        <h4 class="b-laOVmw b-RwfI_t b-xzpi6L">Pay with your debit or credit card.</h4>
                                        <span style="display: block; width: var(--space-1); min-width: var(--space-1); height: var(--space-1); min-height: var(--space-1);"></span>
                                        <p class="b-RwfI_t b-CPOR29 b-lxsi3E">Your payment is confirmed the same minute.</p>
                                    </div>
                                    <div class="b-Nh6QDq">
                                        <div class="b-HgreoR b-B9T9IB">
                                            <svg width="86" height="63" viewBox="0 0 86 63" fill="none">
                                            <rect x="6.73047" y="1.47852" width="78" height="55" rx="1" fill="white" stroke="#002B28" stroke-width="2"></rect>
                                            <rect x="1" y="6.5" width="78" height="55" rx="1" fill="white" stroke="#002B28" stroke-width="2"></rect>
                                            <rect x="10" y="15.5" width="12" height="12" rx="6" fill="#D7DCDA"></rect>
                                            <rect x="10" y="41.5" width="60" height="11" rx="2" fill="#D7DCDA"></rect>
                                            <circle cx="41" cy="33" r="20" fill="#EA0B2C"></circle>
                                            <path d="M46.5005 27.8186L39.3505 34.9853L36.6005 32.2353C36.4511 32.0608 36.2673 31.9191 36.0605 31.8191C35.8537 31.7191 35.6285 31.6628 35.399 31.654C35.1694 31.6451 34.9405 31.6838 34.7267 31.7676C34.5128 31.8514 34.3185 31.9785 34.1561 32.1409C33.9937 32.3033 33.8666 32.4976 33.7828 32.7114C33.699 32.9253 33.6603 33.1542 33.6692 33.3837C33.6781 33.6133 33.7343 33.8385 33.8343 34.0453C33.9344 34.252 34.0761 34.4359 34.2505 34.5853L38.1672 38.5186C38.3229 38.6731 38.5076 38.7953 38.7107 38.8783C38.9138 38.9612 39.1312 39.0032 39.3505 39.002C39.7878 39.0001 40.2068 38.8265 40.5172 38.5186L48.8505 30.1853C49.0068 30.0304 49.1307 29.846 49.2154 29.6429C49.3 29.4398 49.3435 29.222 49.3435 29.002C49.3435 28.782 49.3 28.5641 49.2154 28.361C49.1307 28.1579 49.0068 27.9736 48.8505 27.8186C48.5383 27.5082 48.1159 27.334 47.6755 27.334C47.2352 27.334 46.8128 27.5082 46.5005 27.8186Z" fill="white"></path>
                                            </svg>
                                        </div>
                                        <span style="display: block; width: var(--space-4); min-width: var(--space-4); height: var(--space-4); min-height: var(--space-4);"></span>
                                        <h4 class="b-laOVmw b-RwfI_t b-xzpi6L">That's it, ready to use it!</h4>
                                        <span style="display: block; width: var(--space-1); min-width: var(--space-1); height: var(--space-1); min-height: var(--space-1);"></span>
                                        <p class="b-RwfI_t b-CPOR29 b-lxsi3E">Redeem your card at your chosen retailer according to their instructions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="b-orzNLz b-JJssGU b-xrRiDy b-xiyEcD" style="--gap: var(--space-1);">
                                <div class="b-g2SvTi">
                                    <div class="b-orzNLz b-JJssGU" style="--gap: var(--space-2);">
                                        <h3 class="b-n3Bc0w">Frequently asked questions</h3>
                                    </div>
                                </div>
                                <div class="b-g2SvTi b-jQeYpK">

                                    <div class="b-oJvLzB accordion" id="accordionFeq1">
                                        <div data-state="open" class="">
                                            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" class="b-ONGvsp" data-radix-collection-item="">
                                                <p class="b-RwfI_t b-tzetrj">Can I buy gift cards with my debit or credit card?</p>
                                                <svg width="20" height="20" class="b-L2SSrf" fill="none" viewBox="0 0 24 24">
                                                <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div id="collapseOne" class="b-oqdQr_ b-NGwsL7 collapse show" data-parent="#accordionFeq1" style="--radix-accordion-content-height: var(--radix-collapsible-content-height); --radix-accordion-content-width: var(--radix-collapsible-content-width); transition-duration: 0s; animation-name: none; --radix-collapsible-content-height: 73.59375px; --radix-collapsible-content-width: 980px;">
                                            <span class="">Yes, you can buy gift cards with debit or credit card?. You can purchase over 5,000+ gift cards from a variety of retailers, including Amazon, Apple, Walmart, Steam, Google Play etc.</span>
                                        </div>
                                    </div>
                                    <div class="b-oJvLzB accordion" id="accordionFeq2">
                                        <div data-state="closed" class="">
                                            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" class="b-ONGvsp" data-radix-collection-item="">
                                                <p class="b-RwfI_t b-tzetrj">What gift card brands can I purchase with debit or credit card??</p>
                                                <svg width="20" height="20" class="b-L2SSrf" fill="none" viewBox="0 0 24 24">
                                                <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div id="collapseTwo" class="b-oqdQr_ b-NGwsL7 collapse"  data-parent="#accordionFeq2" style="--radix-accordion-content-height: var(--radix-collapsible-content-height); --radix-accordion-content-width: var(--radix-collapsible-content-width); transition-duration: 0s; animation-name: none;">
                                            <span class="">You can shop gift cards for a variety of brands with debit or credit card?. Some of the most popular brands include Amazon, Starbucks, Walmart, Apple, Netflix, Airbnb, Uber, eBay, Roblox, Spotify, Free Fire etc.</span>
                                        </div>
                                    </div>
                                    <div class="b-oJvLzB accordion" id="accordionFeq3">
                                        <div data-state="closed" class="">
                                            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" class="b-ONGvsp" >
                                                <p class="b-RwfI_t b-tzetrj">How will my e-gift card be delivered?</p>
                                                <svg width="20" height="20" class="b-L2SSrf" fill="none" viewBox="0 0 24 24">
                                                <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div id="collapseThree" class="b-oqdQr_ b-NGwsL7 collapse" data-parent="#accordionFeq3" style="--radix-accordion-content-height: var(--radix-collapsible-content-height); --radix-accordion-content-width: var(--radix-collapsible-content-width); transition-duration: 0s; animation-name: none;">
                                            <span class="">When buying an e-gift card online, you can choose to send an e-gift card by email. We’ll ask you for the email address of the person it’s for. We’ll email your e-gift card to whoever you choose, along with instructions on how to use it. If you don’t have their email address, then you can send the e-gift card to yourself to forward on later if you would prefer. We’ll also send the purchaser a purchase email confirmation. e-Gift Cards can only be sent by email and we’ll also send you a copy via email along with your purchase confirmation to the email address associated with your account. If you don’t know who your volunteer shopper is yet, or don’t have their email address, then you can send the e-gift card to yourself to forward on later if you would prefer.</span>
                                        </div>
                                    </div>
                                    
                                    <div class="b-oJvLzB accordion" id="accordionFeq4">
                                        <div data-state="closed" class="">
                                            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" class="b-ONGvsp" >
                                                <p class="b-RwfI_t b-tzetrj">How long does it take for the recipient to receive their e-gift cards?</p>
                                                <svg width="20" height="20" class="b-L2SSrf" fill="none" viewBox="0 0 24 24">
                                                <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div id="collapse4" class="b-oqdQr_ b-NGwsL7 collapse" data-parent="#accordionFeq4" style="--radix-accordion-content-height: var(--radix-collapsible-content-height); --radix-accordion-content-width: var(--radix-collapsible-content-width); transition-duration: 0s; animation-name: none;">
                                            <span class="">If you’ve chosen the ‘Send e-gift card now’ option during the purchase journey, we will deliver the e-gift card to the email provided within minutes of the purchase completing, this may take up to 2 hours in some instances.<br><br>If you’ve chosen the ‘Send e-gift card on a future date’ option, we will deliver the e-gift card to the recipient details provided via email on the morning of the date chosen.</span>
                                        </div>
                                    </div>
                                    
                                    <div class="b-oJvLzB accordion" id="accordionFeq5">
                                        <div data-state="closed" class="">
                                            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" class="b-ONGvsp" >
                                                <p class="b-RwfI_t b-tzetrj">What methods of payment do you accept?</p>
                                                <svg width="20" height="20" class="b-L2SSrf" fill="none" viewBox="0 0 24 24">
                                                <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div id="collapse5" class="b-oqdQr_ b-NGwsL7 collapse" data-parent="#accordionFeq5" style="--radix-accordion-content-height: var(--radix-collapsible-content-height); --radix-accordion-content-width: var(--radix-collapsible-content-width); transition-duration: 0s; animation-name: none;">
                                            <span class="">All major UK debit or credit cards.</li></ol></span>
                                        </div>
                                    </div>
                                    
                                    <div class="b-oJvLzB accordion" id="accordionFeq6">
                                        <div data-state="closed" class="">
                                            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" class="b-ONGvsp" >
                                                <p class="b-RwfI_t b-tzetrj">How quickly will my gift card arrive after I order it?</p>
                                                <svg width="20" height="20" class="b-L2SSrf" fill="none" viewBox="0 0 24 24">
                                                <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div id="collapse6" class="b-oqdQr_ b-NGwsL7 collapse" data-parent="#accordionFeq6" style="--radix-accordion-content-height: var(--radix-collapsible-content-height); --radix-accordion-content-width: var(--radix-collapsible-content-width); transition-duration: 0s; animation-name: none;">
                                            <span class="">If you order a gift card from our website, your digital gift card should arrive almost instantaneously after you order it. All gift cards are delivered via email too, so as soon as your order is processed, the gift card will be sent to the email address you provided.</span>
                                        </div>
                                    </div>
                                    
                                    <div class="b-oJvLzB accordion" id="accordionFeq7">
                                        <div data-state="closed" class="">
                                            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" class="b-ONGvsp" >
                                                <p class="b-RwfI_t b-tzetrj">I paid for the gift card but didn’t get it. What should I do now?</p>
                                                <svg width="20" height="20" class="b-L2SSrf" fill="none" viewBox="0 0 24 24">
                                                <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div id="collapse7" class="b-oqdQr_ b-NGwsL7 collapse" data-parent="#accordionFeq7" style="--radix-accordion-content-height: var(--radix-collapsible-content-height); --radix-accordion-content-width: var(--radix-collapsible-content-width); transition-duration: 0s; animation-name: none;">
                                            <span class="">We're sorry to hear that you didn't receive your gift card. Please reach out to our customer support team at <a class="b-hbhcU4" href="/contact-us" target="_blank" rel="noopener">our help center</a> and they will be more than happy to help you out.</span>
                                        </div>
                                    </div>
                                    
                                    <div class="b-oJvLzB accordion" id="accordionFeq8">
                                        <div data-state="closed" class="">
                                            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" class="b-ONGvsp" >
                                                <p class="b-RwfI_t b-tzetrj">I have a question not answered here. How can I get help?</p>
                                                <svg width="20" height="20" class="b-L2SSrf" fill="none" viewBox="0 0 24 24">
                                                <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div id="collapse8" class="b-oqdQr_ b-NGwsL7 collapse" data-parent="#accordionFeq8" style="--radix-accordion-content-height: var(--radix-collapsible-content-height); --radix-accordion-content-width: var(--radix-collapsible-content-width); transition-duration: 0s; animation-name: none;">
                                            <span class="">If you have a question that's not answered here you can visit <a class="b-hbhcU4" href="/contact-us" target="_blank" rel="noopener">our help center</a> and we'll be happy to assist you.</span>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="b-orzNLz b-JJssGU" style="--gap: var(--space-6);">
                                <div class="b-orzNLz b-ddY4Q3 b-Qi6Vyw b-YCqUBp" style="--gap: var(--space-5);">
                                    <div class="b-kdA6bv">
                                        <div class="b-orzNLz b-JJssGU b-RRF6jh b-p8fxcv" style="--gap: var(--space-1);">
                                            <div class="b-SEuQYI">
                                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" style="color: var(--brand);">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.666626 14C0.666626 6.63684 6.63575 0.666687 14 0.666687C21.3631 0.666687 27.3333 6.63581 27.3333 14C27.3333 21.3632 21.3642 27.3334 14 27.3334C6.63678 27.3334 0.666626 21.3642 0.666626 14ZM14 3.33335C8.10864 3.33335 3.33329 8.10947 3.33329 14C3.33329 19.8913 8.10941 24.6667 14 24.6667C19.8913 24.6667 24.6666 19.8906 24.6666 14C24.6666 8.1087 19.8905 3.33335 14 3.33335Z" fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14 5.46637C14.7363 5.46637 15.3333 6.06332 15.3333 6.7997V13.1759L19.3962 15.2077C20.0548 15.5371 20.3217 16.338 19.9923 16.9966C19.6629 17.6552 18.862 17.9221 18.2034 17.5928L13.4036 15.1924C12.9519 14.9665 12.6666 14.5049 12.6666 13.9999V6.7997C12.6666 6.06332 13.2636 5.46637 14 5.46637Z" fill="currentColor"></path>
                                                </svg>
                                            </div>
                                            <h4 class="b-laOVmw b-RwfI_t b-PGaFdL">Instant digital delivery</h4>
                                        </div>
                                    </div>
                                    <div class="b-kdA6bv">
                                        <div class="b-orzNLz b-JJssGU b-RRF6jh b-p8fxcv" style="--gap: var(--space-1);">
                                            <div class="b-SEuQYI">
                                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" style="color: var(--brand);">
                                                <path d="M16 16C15.2089 16 14.4355 16.2346 13.7777 16.6741C13.1199 17.1136 12.6072 17.7384 12.3045 18.4693C12.0017 19.2002 11.9225 20.0044 12.0769 20.7804C12.2312 21.5563 12.6122 22.269 13.1716 22.8284C13.731 23.3878 14.4437 23.7688 15.2196 23.9231C15.9956 24.0775 16.7998 23.9983 17.5307 23.6955C18.2616 23.3928 18.8863 22.8801 19.3259 22.2223C19.7654 21.5645 20 20.7911 20 20C20 18.9391 19.5786 17.9217 18.8284 17.1716C18.0783 16.4214 17.0609 16 16 16ZM16 21.3333C15.7363 21.3333 15.4785 21.2551 15.2592 21.1086C15.04 20.9621 14.8691 20.7539 14.7682 20.5102C14.6672 20.2666 14.6408 19.9985 14.6923 19.7399C14.7437 19.4812 14.8707 19.2437 15.0572 19.0572C15.2437 18.8707 15.4812 18.7437 15.7399 18.6923C15.9985 18.6408 16.2666 18.6672 16.5102 18.7682C16.7539 18.8691 16.9621 19.04 17.1086 19.2592C17.2551 19.4785 17.3333 19.7363 17.3333 20C17.3333 20.3536 17.1929 20.6928 16.9428 20.9428C16.6928 21.1929 16.3536 21.3333 16 21.3333ZM15.0533 12.9467C15.1801 13.0681 15.3297 13.1632 15.4933 13.2267C15.6529 13.2972 15.8255 13.3336 16 13.3336C16.1745 13.3336 16.3471 13.2972 16.5067 13.2267C16.6703 13.1632 16.8199 13.0681 16.9467 12.9467L20 9.94666C20.2581 9.68852 20.4032 9.3384 20.4032 8.97333C20.4032 8.60826 20.2581 8.25814 20 8C19.7418 7.74185 19.3917 7.59683 19.0267 7.59683C18.6616 7.59683 18.3115 7.74185 18.0533 8L17.3333 8.78666V4C17.3333 3.64638 17.1929 3.30724 16.9428 3.05719C16.6928 2.80714 16.3536 2.66666 16 2.66666C15.6464 2.66666 15.3072 2.80714 15.0572 3.05719C14.8071 3.30724 14.6667 3.64638 14.6667 4V8.78666L13.9467 8C13.6885 7.74185 13.3384 7.59683 12.9733 7.59683C12.6083 7.59683 12.2581 7.74185 12 8C11.7418 8.25814 11.5968 8.60826 11.5968 8.97333C11.5968 9.3384 11.7418 9.68852 12 9.94666L15.0533 12.9467ZM25.3333 20C25.3333 19.7363 25.2551 19.4785 25.1086 19.2592C24.9621 19.04 24.7539 18.8691 24.5102 18.7682C24.2666 18.6672 23.9985 18.6408 23.7399 18.6923C23.4812 18.7437 23.2437 18.8707 23.0572 19.0572C22.8707 19.2437 22.7437 19.4812 22.6923 19.7399C22.6408 19.9985 22.6672 20.2666 22.7682 20.5102C22.8691 20.7539 23.04 20.9621 23.2592 21.1086C23.4785 21.2551 23.7363 21.3333 24 21.3333C24.3536 21.3333 24.6928 21.1929 24.9428 20.9428C25.1929 20.6928 25.3333 20.3536 25.3333 20ZM26.6667 10.6667H22.6667C22.313 10.6667 21.9739 10.8071 21.7239 11.0572C21.4738 11.3072 21.3333 11.6464 21.3333 12C21.3333 12.3536 21.4738 12.6928 21.7239 12.9428C21.9739 13.1929 22.313 13.3333 22.6667 13.3333H26.6667C27.0203 13.3333 27.3594 13.4738 27.6095 13.7239C27.8595 13.9739 28 14.313 28 14.6667V25.3333C28 25.687 27.8595 26.0261 27.6095 26.2761C27.3594 26.5262 27.0203 26.6667 26.6667 26.6667H5.33333C4.97971 26.6667 4.64057 26.5262 4.39052 26.2761C4.14047 26.0261 3.99999 25.687 3.99999 25.3333V14.6667C3.99999 14.313 4.14047 13.9739 4.39052 13.7239C4.64057 13.4738 4.97971 13.3333 5.33333 13.3333H9.33333C9.68695 13.3333 10.0261 13.1929 10.2761 12.9428C10.5262 12.6928 10.6667 12.3536 10.6667 12C10.6667 11.6464 10.5262 11.3072 10.2761 11.0572C10.0261 10.8071 9.68695 10.6667 9.33333 10.6667H5.33333C4.27246 10.6667 3.25505 11.0881 2.5049 11.8382C1.75476 12.5884 1.33333 13.6058 1.33333 14.6667V25.3333C1.33333 26.3942 1.75476 27.4116 2.5049 28.1618C3.25505 28.9119 4.27246 29.3333 5.33333 29.3333H26.6667C27.7275 29.3333 28.7449 28.9119 29.4951 28.1618C30.2452 27.4116 30.6667 26.3942 30.6667 25.3333V14.6667C30.6667 13.6058 30.2452 12.5884 29.4951 11.8382C28.7449 11.0881 27.7275 10.6667 26.6667 10.6667ZM6.66666 20C6.66666 20.2637 6.74486 20.5215 6.89137 20.7408C7.03788 20.96 7.24612 21.1309 7.48975 21.2318C7.73339 21.3328 8.00147 21.3592 8.26011 21.3077C8.51876 21.2563 8.75633 21.1293 8.9428 20.9428C9.12927 20.7563 9.25626 20.5188 9.30771 20.2601C9.35916 20.0015 9.33275 19.7334 9.23183 19.4898C9.13092 19.2461 8.96002 19.0379 8.74075 18.8914C8.52149 18.7449 8.2637 18.6667 7.99999 18.6667C7.64637 18.6667 7.30723 18.8071 7.05719 19.0572C6.80714 19.3072 6.66666 19.6464 6.66666 20Z" fill="currentColor"></path>
                                                </svg>
                                            </div>
                                            <h4 class="b-laOVmw b-RwfI_t b-PGaFdL">Live E-Gifts</h4>
                                        </div>
                                    </div>
                                    <div class="b-kdA6bv">
                                        <div class="b-orzNLz b-JJssGU b-RRF6jh b-p8fxcv" style="--gap: var(--space-1);">
                                            <div class="b-SEuQYI">
                                                <svg width="28" height="24" viewBox="0 0 28 24" fill="none" style="color: var(--brand);">
                                                <path d="M23.3333 5.33333H22V4C22 2.93913 21.5786 1.92172 20.8284 1.17157C20.0783 0.421427 19.0609 0 18 0H4.66666C3.6058 0 2.58838 0.421427 1.83824 1.17157C1.08809 1.92172 0.666664 2.93913 0.666664 4V20C0.666664 21.0609 1.08809 22.0783 1.83824 22.8284C2.58838 23.5786 3.6058 24 4.66666 24H23.3333C24.3942 24 25.4116 23.5786 26.1618 22.8284C26.9119 22.0783 27.3333 21.0609 27.3333 20V9.33333C27.3333 8.27247 26.9119 7.25505 26.1618 6.50491C25.4116 5.75476 24.3942 5.33333 23.3333 5.33333ZM4.66666 2.66667H18C18.3536 2.66667 18.6928 2.80714 18.9428 3.05719C19.1929 3.30724 19.3333 3.64638 19.3333 4V5.33333H4.66666C4.31304 5.33333 3.9739 5.19286 3.72386 4.94281C3.47381 4.69276 3.33333 4.35362 3.33333 4C3.33333 3.64638 3.47381 3.30724 3.72386 3.05719C3.9739 2.80714 4.31304 2.66667 4.66666 2.66667ZM24.6667 16H23.3333C22.9797 16 22.6406 15.8595 22.3905 15.6095C22.1405 15.3594 22 15.0203 22 14.6667C22 14.313 22.1405 13.9739 22.3905 13.7239C22.6406 13.4738 22.9797 13.3333 23.3333 13.3333H24.6667V16ZM24.6667 10.6667H23.3333C22.2725 10.6667 21.255 11.0881 20.5049 11.8382C19.7548 12.5884 19.3333 13.6058 19.3333 14.6667C19.3333 15.7275 19.7548 16.7449 20.5049 17.4951C21.255 18.2452 22.2725 18.6667 23.3333 18.6667H24.6667V20C24.6667 20.3536 24.5262 20.6928 24.2761 20.9428C24.0261 21.1929 23.687 21.3333 23.3333 21.3333H4.66666C4.31304 21.3333 3.9739 21.1929 3.72386 20.9428C3.47381 20.6928 3.33333 20.3536 3.33333 20V7.77333C3.76169 7.92402 4.21258 8.00067 4.66666 8H23.3333C23.687 8 24.0261 8.14048 24.2761 8.39052C24.5262 8.64057 24.6667 8.97971 24.6667 9.33333V10.6667Z" fill="currentColor"></path>
                                                </svg>
                                            </div>
                                            <h4 class="b-laOVmw b-RwfI_t b-PGaFdL">Save money with our rewards</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection