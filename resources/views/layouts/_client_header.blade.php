<div class="b-WlLesi" style="">

    <header class="b-yfZllI">
        <div class="b-GjUpiu">
            <div class="b-hXJltP">
                <div class="b-tAWNLA">
                    <div class="b-G2zKeR">
                        <button id="mobile-menu-button" class="b-gPrz3t b-HHDx2m b-EHuDI4 b-GI9OxF" aria-label="open navigation" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:Rd2la:" data-state="closed"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M22 6C22 6.55228 21.5523 7 21 7L3 7C2.44772 7 2 6.55228 2 6C2 5.44771 2.44772 5 3 5L21 5C21.5523 5 22 5.44772 22 6Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 12.5523 21.5523 13 21 13L3 13C2.44772 13 2 12.5523 2 12C2 11.4477 2.44772 11 3 11L21 11C21.5523 11 22 11.4477 22 12Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M22 18C22 18.5523 21.5523 19 21 19L3 19C2.44772 19 2 18.5523 2 18C2 17.4477 2.44772 17 3 17L21 17C21.5523 17 22 17.4477 22 18Z" fill="currentColor"></path></svg></button>
                        <button id="close-mobile-menu" style="display: none;" class="b-gPrz3t b-HHDx2m b-EHuDI4 b-GI9OxF" type="button"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6 6L18 18M18 6L6 18L18 6Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>
                        <a class="b-hbhcU4 b-kLQ1Hp" href="/">
                            <img src="/assets/images/logo_transparent_background_red.png" alt="" style="height: 70px;" />
                        </a>
                    </div>
                    <div class="b-eYXZxj {{isMobile2()?'b-mXP44v':''}}">
                        <form class="b-NntrIY" action="/" role="combobox" aria-expanded="false" aria-owns="search-dropdown" aria-haspopup="listbox" method="get">
                            <svg class="b-sWGJaQ" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1111 5C7.73604 5 5 7.73604 5 11.1111C5 14.4862 7.73604 17.2222 11.1111 17.2222C12.7989 17.2222 14.3253 16.5393 15.4323 15.4323C16.5393 14.3253 17.2222 12.7989 17.2222 11.1111C17.2222 7.73604 14.4862 5 11.1111 5ZM3 11.1111C3 6.63147 6.63147 3 11.1111 3C15.5908 3 19.2222 6.63147 19.2222 11.1111C19.2222 12.9901 18.5824 14.721 17.5101 16.0959L20.7071 19.2929C21.0976 19.6834 21.0976 20.3166 20.7071 20.7071C20.3166 21.0976 19.6834 21.0976 19.2929 20.7071L16.0959 17.5101C14.721 18.5824 12.9901 19.2222 11.1111 19.2222C6.63147 19.2222 3 15.5908 3 11.1111Z" fill="currentColor"></path>
                            </svg>
                            <label for="search-input" id="search-label" class="b-zcdblN">Search for products</label>
                            <input class="b-kIu8E9" type="search" name="q" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" placeholder="Search for products" id="search-input" aria-autocomplete="list" aria-controls="search-dropdown" value="{{isset($_GET['q'])?$_GET['q']:''}}">
                        </form>
                    </div>
                </div>
                @php
                $cart = session()->get('cart');
                @endphp
                <div class="b-TdZseo">


                    <a href="/login" type="button" class="b-ifJBST">
                        <span class="b-Q923fz">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M15.7139 12.7093C16.699 11.9383 17.418 10.8811 17.7709 9.68482C18.1238 8.48852 18.093 7.21258 17.6828 6.03449C17.2727 4.8564 16.5035 3.83475 15.4823 3.11166C14.4611 2.38857 13.2387 2 11.9851 2C10.7316 2 9.50917 2.38857 8.48799 3.11166C7.46681 3.83475 6.69762 4.8564 6.28744 6.03449C5.87726 7.21258 5.84647 8.48852 6.19936 9.68482C6.55226 10.8811 7.27129 11.9383 8.25642 12.7093C6.56836 13.3819 5.09547 14.4975 3.99474 15.9371C2.89402 17.3767 2.20672 19.0864 2.00611 20.8839C1.97668 21.1491 2.05436 21.415 2.22206 21.6231C2.38975 21.8313 2.63372 21.9647 2.9003 21.9939C3.16688 22.0232 3.43423 21.9459 3.64354 21.7792C3.85284 21.6124 3.98696 21.3697 4.01638 21.1046C4.23787 19.1515 5.17491 17.3479 6.6486 16.0383C8.12228 14.7287 10.0293 14.0047 12.0056 14.0047C13.9819 14.0047 15.889 14.7287 17.3627 16.0383C18.8364 17.3479 19.7734 19.1515 19.9949 21.1046C20.0223 21.35 20.1401 21.5766 20.3256 21.7407C20.5111 21.9049 20.7512 21.9948 20.9994 21.9933H21.1104C21.3736 21.9632 21.6142 21.8308 21.7798 21.625C21.9454 21.4193 22.0225 21.1568 21.9943 20.8947C21.7929 19.092 21.102 17.3777 19.9956 15.9357C18.8892 14.4937 17.409 13.3784 15.7139 12.7093ZM11.9851 11.9993C11.4572 11.9993 10.9345 11.8958 10.4468 11.6949C9.95905 11.494 9.51589 11.1995 9.1426 10.8283C8.76932 10.457 8.47321 10.0163 8.27119 9.53123C8.06917 9.04617 7.96519 8.52629 7.96519 8.00126C7.96519 7.47624 8.06917 6.95636 8.27119 6.4713C8.47321 5.98624 8.76932 5.54551 9.1426 5.17426C9.51589 4.80301 9.95905 4.50852 10.4468 4.3076C10.9345 4.10668 11.4572 4.00327 11.9851 4.00327C13.0513 4.00327 14.0738 4.42449 14.8277 5.17426C15.5816 5.92403 16.0051 6.94093 16.0051 8.00126C16.0051 9.0616 15.5816 10.0785 14.8277 10.8283C14.0738 11.578 13.0513 11.9993 11.9851 11.9993Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <span class="b-RwfI_t b-vlq5l5">Login</span>
                    </a>
                    <button type="button" class="b-ifJBST cart-modal">
                        <span class="b-Q923fz">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.73779 19.75C7.73779 18.7835 8.52129 18 9.48779 18C10.4543 18 11.2378 18.7835 11.2378 19.75C11.2378 20.7165 10.4543 21.5 9.48779 21.5C8.52129 21.5 7.73779 20.7165 7.73779 19.75Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17 19.75C17 18.7835 17.7835 18 18.75 18C19.7165 18 20.5 18.7835 20.5 19.75C20.5 20.7165 19.7165 21.5 18.75 21.5C17.7835 21.5 17 20.7165 17 19.75Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 3.98361C2 3.44038 2.44038 3 2.98361 3H6.26229C6.73111 3 7.13476 3.33087 7.22677 3.79057L7.88882 7.09836H21.0164C21.3095 7.09836 21.5874 7.22911 21.7743 7.45497C21.9611 7.68083 22.0375 7.97827 21.9826 8.26622L20.6697 15.1506C20.5498 15.7544 20.2213 16.2968 19.7417 16.6828C19.265 17.0666 18.6691 17.2716 18.0573 17.2623H10.1066C9.49487 17.2716 8.89897 17.0666 8.42218 16.6828C7.94293 16.297 7.61455 15.755 7.49445 15.1516C7.49439 15.1513 7.49432 15.151 7.49425 15.1506L6.12599 8.31445C6.11986 8.28912 6.1147 8.2634 6.11056 8.23735L5.45605 4.96721H2.98361C2.44038 4.96721 2 4.52684 2 3.98361ZM8.28256 9.06557L9.42378 14.7674C9.45376 14.9183 9.53588 15.0539 9.65576 15.1504C9.77564 15.2469 9.92564 15.2982 10.0795 15.2953L10.0984 15.2951H18.0656L18.0844 15.2953C18.2383 15.2982 18.3883 15.2469 18.5082 15.1504C18.6273 15.0545 18.7091 14.92 18.7396 14.7702C18.7398 14.7693 18.74 14.7683 18.7402 14.7674L19.8275 9.06557H8.28256Z" fill="currentColor"></path>
                            </svg>
                            <span class="b-b28Tmw" id="cartCount">{{$cart?count($cart):0}}</span>
                        </span>
                        <span class="b-RwfI_t b-vlq5l5">Cart</span>
                    </button>
                </div>
            </div>

        </div>
        @php
        $cats = App\Models\Category::where('parent_category_id', null)->where('is_header', 1)->where('is_show_menu', 1)->orderBy('orderno', 'asc')->get();
        @endphp


        @if(isMobile2())
        <div class="mobile-menu-wrap">
            @if($cats)
            <div class="mobile_menu">
                <ul class="m-0 p-0">
                    @foreach($cats as $cat)

                    @php
                    $subcats = App\Models\Category::where('parent_category_id', $cat->id)->where('is_show_menu', 1)->orderBy('orderno', 'asc')->get();
                    @endphp
                    @if($subcats && count($subcats) > 0)
                    <li>
                        <a href="/{{strtolower($cat->country)}}/{{$cat->slug}}">
                            <span class="" style="text-transform: capitalize; ">{{$cat->name}}</span>
                        </a>

                        <ul class="submenu" style="margin-top: 2px;">
                            @foreach($subcats as $scat)
                            <li>
                                <a  href="/{{strtolower($scat->country)}}/{{$scat->slug}}" style="text-transform: capitalize; ">
                                    {{$scat->name}}
                                </a>
                            </li>
                            @endforeach()
                        </ul>

                    </li>
                    @else
                    <li>
                        <a href="/{{strtolower($cat->country)}}/{{$cat->slug}}" style="text-transform: capitalize; ">
                            {{$cat->slug}}
                        </a>
                    </li>
                    @endif



                    @endforeach


                </ul>
                <footer class="b-Z7Wj9l" style="padding: 0 15px;">
                    
                    
                    <button class="b-gPrz3t b-HgNKnY b-tj1_de b-rCVOGz b-xaOU52 b-EHuDI4 b-GI9OxF" data-name="country" style="width: 100%;
    justify-content: start;">
                        <img src="/assets/images/flags_GB.webp" loading="lazy" alt="Flag for United Kingdom" class="b-yDS2qm b-xlTI5R" width="30" height="30" style="width: 24px; height: 24px;">
                        <span style="display: block; width: var(--space-2); min-width: var(--space-2); height: var(--space-2); min-height: var(--space-2);"></span>
                        <span class="">United Kingdom</span>
                    </button>
                    <button class="b-gPrz3t b-HgNKnY b-tj1_de b-rCVOGz b-xaOU52 b-EHuDI4 b-GI9OxF" data-name="language" style="width: 100%;
    justify-content: start;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M2 12H22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22C9.49872 19.2616 8.07725 15.708 8 12C8.07725 8.29203 9.49872 4.73835 12 2V2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span style="display: block; width: var(--space-2); min-width: var(--space-2); height: var(--space-2); min-height: var(--space-2);"></span>English </button>
                    
                </footer>
            </div>
            @endif

        </div>
        @else
        <nav aria-label="Main" data-orientation="horizontal" dir="ltr" class="b-D9UEcb">
            <div class="b-GjUpiu">
                <div style="position: relative;">
                    @if($cats)
                    <ul data-orientation="horizontal" class="b-6J8qN8" dir="ltr">
                        @foreach($cats as $cat)

                        @php
                        $subcats = App\Models\Category::where('parent_category_id', $cat->id)->where('is_show_menu', 1)->orderBy('orderno', 'asc')->get();
                        @endphp
                        @if($subcats && count($subcats) > 0)
                        <li class="position-relative has-dropdown">
                            <a class="b-hbhcU4 b-X5LbWN" id="radix-:r7:-trigger-gift_cards"  href="/{{strtolower($cat->country)}}/{{$cat->slug}}">
                                <span class="" style="text-transform: capitalize; ">{{$cat->name}}</span>
                            </a>

                            <ul class="sub-menu px-2 dropdown-menu" style="margin-top: 2px;">
                                @foreach($subcats as $scat)
                                <li>
                                    <a class="b-hbhcU4 b-X5LbWN" id="radix-:r7:-trigger-gift_cards"  href="/{{strtolower($scat->country)}}/{{$scat->slug}}">
                                        <span class="" style="text-transform: capitalize; ">{{$scat->name}}</span>
                                    </a>
                                </li>
                                @endforeach()
                            </ul>

                        </li>
                        @else
                        <li class="position-relative">
                            <a class="b-hbhcU4 b-X5LbWN" id="radix-:r7:-trigger-gift_cards"  href="/{{strtolower($cat->country)}}/{{$cat->slug}}">
                                <span class="" style="text-transform: capitalize; ">{{$cat->name}}</span>
                            </a>
                        </li>
                        @endif



                        @endforeach

                    </ul>
                    @endif
                </div>
            </div>

        </nav>
        @endif

    </header>
</div>