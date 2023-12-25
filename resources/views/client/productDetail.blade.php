@extends('layouts.client')


@section('css')
<style>
    input::-webkit-calendar-picker-indicator {
        opacity: 0;
    }
/*    select option {
        text-align: center;
    }
    @media(max-width: 767px) {
        select {
            margin-left: calc(100% - 70%) !important;
        }
        select option {
            text-align: left;
        }
    }*/
    .select-dropdown-item:hover {
        background-color: #ecefed;
        outline: none;
    }
</style>
@endsection

@section('content')



<section class="b-yXLVlF">
    <div class="b-orzNLz b-ddY4Q3 b-RRF6jh b-p8fxcv b-_CHfaj" style="--gap: var(--space-3);">
        <ul class="b-KzB9hm">
            <li class="b-CpMunR">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" style="color: var(--brand);">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.666626 14C0.666626 6.63684 6.63575 0.666687 14 0.666687C21.3631 0.666687 27.3333 6.63581 27.3333 14C27.3333 21.3632 21.3642 27.3334 14 27.3334C6.63678 27.3334 0.666626 21.3642 0.666626 14ZM14 3.33335C8.10864 3.33335 3.33329 8.10947 3.33329 14C3.33329 19.8913 8.10941 24.6667 14 24.6667C19.8913 24.6667 24.6666 19.8906 24.6666 14C24.6666 8.1087 19.8905 3.33335 14 3.33335Z" fill="currentColor"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14 5.46637C14.7363 5.46637 15.3333 6.06332 15.3333 6.7997V13.1759L19.3962 15.2077C20.0548 15.5371 20.3217 16.338 19.9923 16.9966C19.6629 17.6552 18.862 17.9221 18.2034 17.5928L13.4036 15.1924C12.9519 14.9665 12.6666 14.5049 12.6666 13.9999V6.7997C12.6666 6.06332 13.2636 5.46637 14 5.46637Z" fill="currentColor"></path>
                </svg>
                <p class="b-Y2umhV">Instant digital delivery</p>
            </li>
            <li class="b-CpMunR">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" style="color: var(--brand);">
                <path d="M16 16C15.2089 16 14.4355 16.2346 13.7777 16.6741C13.1199 17.1136 12.6072 17.7384 12.3045 18.4693C12.0017 19.2002 11.9225 20.0044 12.0769 20.7804C12.2312 21.5563 12.6122 22.269 13.1716 22.8284C13.731 23.3878 14.4437 23.7688 15.2196 23.9231C15.9956 24.0775 16.7998 23.9983 17.5307 23.6955C18.2616 23.3928 18.8863 22.8801 19.3259 22.2223C19.7654 21.5645 20 20.7911 20 20C20 18.9391 19.5786 17.9217 18.8284 17.1716C18.0783 16.4214 17.0609 16 16 16ZM16 21.3333C15.7363 21.3333 15.4785 21.2551 15.2592 21.1086C15.04 20.9621 14.8691 20.7539 14.7682 20.5102C14.6672 20.2666 14.6408 19.9985 14.6923 19.7399C14.7437 19.4812 14.8707 19.2437 15.0572 19.0572C15.2437 18.8707 15.4812 18.7437 15.7399 18.6923C15.9985 18.6408 16.2666 18.6672 16.5102 18.7682C16.7539 18.8691 16.9621 19.04 17.1086 19.2592C17.2551 19.4785 17.3333 19.7363 17.3333 20C17.3333 20.3536 17.1929 20.6928 16.9428 20.9428C16.6928 21.1929 16.3536 21.3333 16 21.3333ZM15.0533 12.9467C15.1801 13.0681 15.3297 13.1632 15.4933 13.2267C15.6529 13.2972 15.8255 13.3336 16 13.3336C16.1745 13.3336 16.3471 13.2972 16.5067 13.2267C16.6703 13.1632 16.8199 13.0681 16.9467 12.9467L20 9.94666C20.2581 9.68852 20.4032 9.3384 20.4032 8.97333C20.4032 8.60826 20.2581 8.25814 20 8C19.7418 7.74185 19.3917 7.59683 19.0267 7.59683C18.6616 7.59683 18.3115 7.74185 18.0533 8L17.3333 8.78666V4C17.3333 3.64638 17.1929 3.30724 16.9428 3.05719C16.6928 2.80714 16.3536 2.66666 16 2.66666C15.6464 2.66666 15.3072 2.80714 15.0572 3.05719C14.8071 3.30724 14.6667 3.64638 14.6667 4V8.78666L13.9467 8C13.6885 7.74185 13.3384 7.59683 12.9733 7.59683C12.6083 7.59683 12.2581 7.74185 12 8C11.7418 8.25814 11.5968 8.60826 11.5968 8.97333C11.5968 9.3384 11.7418 9.68852 12 9.94666L15.0533 12.9467ZM25.3333 20C25.3333 19.7363 25.2551 19.4785 25.1086 19.2592C24.9621 19.04 24.7539 18.8691 24.5102 18.7682C24.2666 18.6672 23.9985 18.6408 23.7399 18.6923C23.4812 18.7437 23.2437 18.8707 23.0572 19.0572C22.8707 19.2437 22.7437 19.4812 22.6923 19.7399C22.6408 19.9985 22.6672 20.2666 22.7682 20.5102C22.8691 20.7539 23.04 20.9621 23.2592 21.1086C23.4785 21.2551 23.7363 21.3333 24 21.3333C24.3536 21.3333 24.6928 21.1929 24.9428 20.9428C25.1929 20.6928 25.3333 20.3536 25.3333 20ZM26.6667 10.6667H22.6667C22.313 10.6667 21.9739 10.8071 21.7239 11.0572C21.4738 11.3072 21.3333 11.6464 21.3333 12C21.3333 12.3536 21.4738 12.6928 21.7239 12.9428C21.9739 13.1929 22.313 13.3333 22.6667 13.3333H26.6667C27.0203 13.3333 27.3594 13.4738 27.6095 13.7239C27.8595 13.9739 28 14.313 28 14.6667V25.3333C28 25.687 27.8595 26.0261 27.6095 26.2761C27.3594 26.5262 27.0203 26.6667 26.6667 26.6667H5.33333C4.97971 26.6667 4.64057 26.5262 4.39052 26.2761C4.14047 26.0261 3.99999 25.687 3.99999 25.3333V14.6667C3.99999 14.313 4.14047 13.9739 4.39052 13.7239C4.64057 13.4738 4.97971 13.3333 5.33333 13.3333H9.33333C9.68695 13.3333 10.0261 13.1929 10.2761 12.9428C10.5262 12.6928 10.6667 12.3536 10.6667 12C10.6667 11.6464 10.5262 11.3072 10.2761 11.0572C10.0261 10.8071 9.68695 10.6667 9.33333 10.6667H5.33333C4.27246 10.6667 3.25505 11.0881 2.5049 11.8382C1.75476 12.5884 1.33333 13.6058 1.33333 14.6667V25.3333C1.33333 26.3942 1.75476 27.4116 2.5049 28.1618C3.25505 28.9119 4.27246 29.3333 5.33333 29.3333H26.6667C27.7275 29.3333 28.7449 28.9119 29.4951 28.1618C30.2452 27.4116 30.6667 26.3942 30.6667 25.3333V14.6667C30.6667 13.6058 30.2452 12.5884 29.4951 11.8382C28.7449 11.0881 27.7275 10.6667 26.6667 10.6667ZM6.66666 20C6.66666 20.2637 6.74486 20.5215 6.89137 20.7408C7.03788 20.96 7.24612 21.1309 7.48975 21.2318C7.73339 21.3328 8.00147 21.3592 8.26011 21.3077C8.51876 21.2563 8.75633 21.1293 8.9428 20.9428C9.12927 20.7563 9.25626 20.5188 9.30771 20.2601C9.35916 20.0015 9.33275 19.7334 9.23183 19.4898C9.13092 19.2461 8.96002 19.0379 8.74075 18.8914C8.52149 18.7449 8.2637 18.6667 7.99999 18.6667C7.64637 18.6667 7.30723 18.8071 7.05719 19.0572C6.80714 19.3072 6.66666 19.6464 6.66666 20Z" fill="currentColor"></path>
                </svg>
                <p class="b-Y2umhV">Live E-Gifts</p>
            </li>
            
        </ul>

    </div>
</section>

<div style="max-width:var(--mw-medium)" class="b-GjUpiu">
    <section class="b-WgHHxh">
        <div class="b-FPX4DU">
            
            <div class="b-u9kbf9">
                <div class="b-QRbp6v">
                    <div class="b-orzNLz b-JJssGU b-RRF6jh b-qu6O9G" style="--gap:var(--space-3)">
                        <div class="b-EXzmIr b-gDKMPS" style="background-color:#ffffff;color:#000000">
                            <span class="b-MgKtnT"></span>
                            <img src="{{$product->productSingleImage && $product->productSingleImage->path?'/shop/products/'.$product->productSingleImage->path:''}}" loading="lazy" alt="{{$product->title}}" class="b-ildLo6" decoding="async" width="350" height="212" sizes="(min-width: 960px) 302px, (min-width: 600px) 15vw, (min-width: 480px) 45vw, 50vw" style="background:#ffffff">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="b-G9rOmh">
            <div class="b-orzNLz b-JJssGU" style="--gap:var(--space-4)">
                <div class="b-orzNLz b-JJssGU" style="--gap:var(--space-0)">
                    <nav aria-label="Breadcrumb">
                        <ol class="b-lpxIvE">
                            <li class="b-sH76tr">
                                <a href="/{{strtolower($country_detail->iso)}}/{{$category->slug}}">{{$country_detail->name}}</a>
                                <svg width="6" height="8" viewBox="0 0 6 8">
                                <polyline fill="none" stroke="#939393" stroke-linecap="round" stroke-linejoin="round" points="716 118 720 122 724 118" transform="rotate(-90 303.5 420.5)"></polyline>
                                </svg>
                            </li>
                            @if($category->parent_category_id)
                                @php
                                $maincat = App\Models\Category::where('id', $category->parent_category_id)->first();
                                @endphp
                                
                                @if($maincat)
                                <li class="b-sH76tr">
                                    <a href="/{{strtolower($maincat->country)}}/{{$maincat->slug}}">{{$maincat->name}}</a>
                                    <svg width="6" height="8" viewBox="0 0 6 8">
                                    <polyline fill="none" stroke="#939393" stroke-linecap="round" stroke-linejoin="round" points="716 118 720 122 724 118" transform="rotate(-90 303.5 420.5)"></polyline>
                                    </svg>
                                </li>
                                @endif
                                
                            @endif
                            <li class="b-sH76tr">
                                <a href="/{{strtolower($country_detail->iso)}}/{{$category->slug}}">{{$category->name}}</a>
                                <svg width="6" height="8" viewBox="0 0 6 8">
                                <polyline fill="none" stroke="#939393" stroke-linecap="round" stroke-linejoin="round" points="716 118 720 122 724 118" transform="rotate(-90 303.5 420.5)"></polyline>
                                </svg>
                            </li>
                            <li class="b-zRKtNh b-sH76tr">
                                <a aria-current="page" href="#">{{$product->title}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <div class="b-yj9SMj">
                        <div class="b-amI1jW b-NwU0us">
                            <div class="b-rk1Weu" style="width:48px;height:48px;background:#ffffff;border:var(--border-primary)">
                                <img src="{{$product->productSingleImage && $product->productSingleImage->path?'/shop/products/'.$product->productSingleImage->path:''}}"  loading="lazy" alt="{{str_replace('-', ' ', $product->title)}}" width="48" height="48" style="background:#ffffff">
                            </div>
                        </div>
                        <h1>{{$product->title}}</h1>

                    </div>
                </div>
                <p class="b-RwfI_t b-jYnlmm">{!! nl2br(strip_tags($product->desc)) !!}</p>
                <div>
                    <div class="b-lx5dU5">
                        <span class="">
                            <span class="b-IJrtNC"> 🇬🇧 </span> This gift code may only work in United Kingdom </span>
                    </div>
                </div>
                @php
                $prices = explode(',', $product->price);
                $placeholder = number_format($prices[0], 2);
                if(count($prices) > 1) {
                $price2 = end($prices);
                    $placeholder .= ' - '.number_format($price2, 2); 
                }
                
                $is_dropdown = $product->is_dropdown;
                
                
                @endphp
                
                <div class="b-orzNLz b-JJssGU" style="--gap:var(--space-4)">
                    <div class="b-fZPF4b">
                        <div class="b-wpwku7">
                            <div class="b-KAD6B_">
                                <div class="b-lJERBi" role="listbox">
                                    <div class="b-ThtwlR b-crHHVe b-gAdjYu">
                                        <header class="b-nA7YeQ">
                                            <label for="downshift-0-input" class="b-Y21Q2B">
                                                <span class="">Select amount</span>
                                            </label>
                                        </header>
                                        <div class="b-NSfkh0 b-dJ63gw b-A_Jxtv">
                                            @if($is_dropdown)
                                            <div class="b-W2hfZb">
                                                <button type="button" id="downshift-83-toggle-button" aria-haspopup="listbox" aria-expanded="false" aria-labelledby="downshift-83-label downshift-83-toggle-button" class="b-TcVlp9">
                                                    <span>£{{$prices[0]}}</span>
                                                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </button>
                                                <input type="hidden" id="downshift-0-input" value="{{$prices[0]}}" />
                                            </div>
                                            @else
                                            <label for="downshift-0-input" class="b-ytiTiV b-dJ63gw">£</label>
                                            <input type="text" id="downshift-0-input" pattern="[0-9]+([\.,][0-9]+)?" class="b-vUYFCN b-XfZYOb" step="1" inputmode="decimal" placeholder="{{$placeholder}}" value="">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div id="downshift-menu" style="display: none;">
                                    <ul class="b-N9SL7V">
                                        @foreach($prices as $price)
                                            <li class="b-WIiQKq select-dropdown-item" data-val="{{$price}}"><p class="b-b5PT2I">£{{$price}}</p></li>
                                        @endforeach
                                    </ul>
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="b-gX0zG1">
                        <button class="b-gPrz3t b-Gs7JJs b-rCVOGz b-xaOU52 b-EHuDI4 b-_jYOFY add-to-cart" type="button" data-id-product="{{$product->id}}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.73779 19.75C7.73779 18.7835 8.52129 18 9.48779 18C10.4543 18 11.2378 18.7835 11.2378 19.75C11.2378 20.7165 10.4543 21.5 9.48779 21.5C8.52129 21.5 7.73779 20.7165 7.73779 19.75Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17 19.75C17 18.7835 17.7835 18 18.75 18C19.7165 18 20.5 18.7835 20.5 19.75C20.5 20.7165 19.7165 21.5 18.75 21.5C17.7835 21.5 17 20.7165 17 19.75Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 3.98361C2 3.44038 2.44038 3 2.98361 3H6.26229C6.73111 3 7.13476 3.33087 7.22677 3.79057L7.88882 7.09836H21.0164C21.3095 7.09836 21.5874 7.22911 21.7743 7.45497C21.9611 7.68083 22.0375 7.97827 21.9826 8.26622L20.6697 15.1506C20.5498 15.7544 20.2213 16.2968 19.7417 16.6828C19.265 17.0666 18.6691 17.2716 18.0573 17.2623H10.1066C9.49487 17.2716 8.89897 17.0666 8.42218 16.6828C7.94293 16.297 7.61455 15.755 7.49445 15.1516C7.49439 15.1513 7.49432 15.151 7.49425 15.1506L6.12599 8.31445C6.11986 8.28912 6.1147 8.2634 6.11056 8.23735L5.45605 4.96721H2.98361C2.44038 4.96721 2 4.52684 2 3.98361ZM8.28256 9.06557L9.42378 14.7674C9.45376 14.9183 9.53588 15.0539 9.65576 15.1504C9.77564 15.2469 9.92564 15.2982 10.0795 15.2953L10.0984 15.2951H18.0656L18.0844 15.2953C18.2383 15.2982 18.3883 15.2469 18.5082 15.1504C18.6273 15.0545 18.7091 14.92 18.7396 14.7702C18.7398 14.7693 18.74 14.7683 18.7402 14.7674L19.8275 9.06557H8.28256Z" fill="currentColor"></path>
                            </svg>
                            <span style="display:block;width:var(--space-2);min-width:var(--space-2);height:var(--space-2);min-height:var(--space-2)"></span>
                            <span class="">Add to cart</span>
                        </button>

                    </div>
                </div>

                <ul class="b-gnB0Ej" id="product-tabs">
                    <li class="b-qGxEcv">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43726 15.628 1.87979 13.4881 2.02167 11.3363C2.16356 9.18455 2.9972 7.13631 4.39828 5.49706C5.79935 3.85781 7.69278 2.71537 9.79619 2.24013C11.8996 1.7649 14.1003 1.98232 16.07 2.85999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M22 4L12 14.01L9 11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <p>
                            <span class="">Instant, Private, Safe</span>
                        </p>
                    </li>
                    <li class="b-qGxEcv">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43726 15.628 1.87979 13.4881 2.02167 11.3363C2.16356 9.18455 2.9972 7.13631 4.39828 5.49706C5.79935 3.85781 7.69278 2.71537 9.79619 2.24013C11.8996 1.7649 14.1003 1.98232 16.07 2.85999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M22 4L12 14.01L9 11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <p>
                            <span class="">Email Delivery</span>
                        </p>
                    </li>
                </ul>
                <div class="b-jQeYpK ">
                    <div data-state="open" class="b-oJvLzB accordion" id="accordiondesc2">
                        <div data-state="open" class="">
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapsedesc2" class="b-ONGvsp" data-radix-collection-item="">
                                <span class="">Description</span>
                                <svg width="20" height="20" class="b-L2SSrf" fill="none" viewBox="0 0 24 24">
                                <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <div id="collapsedesc2" class="b-NGwsL7 collapse show" data-parent="#accordiondesc2" style="--radix-accordion-content-height: var(--radix-collapsible-content-height); --radix-accordion-content-width: var(--radix-collapsible-content-width); transition-duration: 0s; animation-name: none; --radix-collapsible-content-height: 150.34375px; --radix-collapsible-content-width: 582px;">
                            <div class="b-tT1Bqf">{!! $product->desc2 !!}</div>
                        </div>
                    </div>

                    <div data-state="open" class="b-oJvLzB accordion" id="accordionredeem1">
                        <div data-state="open" class="">
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#accordionredeem" class="b-ONGvsp" data-radix-collection-item="">
                                <span class="">How to Redeem</span>
                                <svg width="20" height="20" class="b-L2SSrf" fill="none" viewBox="0 0 24 24">
                                <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <div id="accordionredeem" class="b-NGwsL7 collapse" data-parent="#accordionredeem1" style="--radix-accordion-content-height: var(--radix-collapsible-content-height); --radix-accordion-content-width: var(--radix-collapsible-content-width); transition-duration: 0s; animation-name: none; --radix-collapsible-content-height: 150.34375px; --radix-collapsible-content-width: 582px;">
                            <div class="b-tT1Bqf">{!! $product->redeem_desc !!}</div>
                        </div>
                    </div>

                    <div data-state="open" class="b-oJvLzB accordion" id="accordionterms2">
                        <div data-state="open" class="">
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#accordionterms" class="b-ONGvsp" data-radix-collection-item="">
                                <span class="">Terms and Conditions</span>
                                <svg width="20" height="20" class="b-L2SSrf" fill="none" viewBox="0 0 24 24">
                                <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <div id="accordionterms" class="b-NGwsL7 collapse" data-parent="#accordionterms2" style="--radix-accordion-content-height: var(--radix-collapsible-content-height); --radix-accordion-content-width: var(--radix-collapsible-content-width); transition-duration: 0s; animation-name: none; --radix-collapsible-content-height: 150.34375px; --radix-collapsible-content-width: 582px;">
                            <div class="b-tT1Bqf">{!! $product->terms !!}</div>
                        </div>
                    </div>


                </div>
                
                @php
                $faqs = $product->faqs?json_decode($product->faqs):'';
                @endphp
                
                @if($faqs)
                <div class="b-orzNLz b-JJssGU b-xrRiDy b-xiyEcD my-4" style="--gap: var(--space-1);">
                                <div class="b-g2SvTi">
                                    <div class="b-orzNLz b-JJssGU" style="--gap: var(--space-2);">
                                        <h3 class="b-n3Bc0w">Frequently asked questions</h3>
                                    </div>
                                </div>
                                <div class="b-g2SvTi b-jQeYpK">

                                    @foreach($faqs as $k=>$faq)
                                        @if($faq->question)
                                        <div class="b-oJvLzB accordion" id="accordionFeq{{$k}}">
                                            <div data-state="open" class="">
                                                <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq-{{$k}}" class="b-ONGvsp" data-radix-collection-item="">
                                                    <p class="b-RwfI_t b-tzetrj">{{$faq->question}}</p>
                                                    <svg width="20" height="20" class="b-L2SSrf" fill="none" viewBox="0 0 24 24">
                                                    <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div id="collapseFaq-{{$k}}" class="b-oqdQr_ b-NGwsL7 collapse {{$k==0?'show':''}}" data-parent="#accordionFeq{{$k}}" style="--radix-accordion-content-height: var(--radix-collapsible-content-height); --radix-accordion-content-width: var(--radix-collapsible-content-width); transition-duration: 0s; animation-name: none; --radix-collapsible-content-height: 73.59375px; --radix-collapsible-content-width: 980px;">
                                                <span class="">{!! nl2br($faq->answer) !!}</span>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                @endif
                
                
                
                
                
            </div>
        </div>
    </section>
</div>

@endsection

@section('js')

<script>

    

</script>

@endsection