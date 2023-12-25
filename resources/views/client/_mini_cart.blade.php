<style>
    @media(max-width: 767px) {
        #minicart-modal {
            right: 5px !important;
            top: 65px !important;
        }
    }
</style>
<div id="minicart-modal" style="position: fixed; right: 40px; top: 50px; min-width: max-content; z-index: 100; --radix-popper-transform-origin: 100% 0px;">
    @if($cart && count($cart) > 0)
    

    
    <div class="b-p1TdDk" style="--radix-popover-content-transform-origin: var(--radix-popper-transform-origin); opacity: 1; transform: none;">
        
        @foreach($cart as $ct)
        
        @php
            $product = App\Models\Product::where('id', $ct['product_id'])->first();
        @endphp
        
        <a class="b-QgIbW4" href="/{{strtolower($product->country)}}/{{$product->category->name}}/{{$product->title}}">
            <div class="b-rk1Weu" style="width: 32px; height: 32px; background: rgb(255, 255, 255); border: var(--border-primary);">
                <img src="{{$product->productSingleImage && $product->productSingleImage->path?'/shop/products/'.$product->productSingleImage->path:''}}" loading="lazy" alt="{{$product->title}}" width="32" height="32" data-fill="true" style="background: rgb(255, 255, 255);">
            </div>
            <div class="b-rLtH8f">
                <div class="b-L5jd1Z">
                    <p class="b-wuTJLt" style="text-transform: capitalize;">{{str_replace('-', ' ', $product->title)}}</p>
                    <div class="b-DlR66_">
                        <p class="b-_0lJD0">£{{number_format($ct['price'], 2)}}</p>
                    </div>
                </div>
                <div class="b-_lkOTB">
                    <div class="b-zjrhY0">
                        <button class="b-sEy9Sn minus-product" data-product="{{$product->id}}">-</button>
                        <input type="text" class="b-ZaklDy cart-qty-input-{{$product->id}}" tabindex="-1" value="{{$ct['quantity']}}" readonly />
                        <button class="b-sEy9Sn  plus-product" data-product="{{$product->id}}">+</button>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        
        
        <div class="b-sYfuiE">
            <a class="b-hbhcU4 b-gPrz3t b-Uc1xhg b-EHuDI4 b-qADpFj" href="/">
                <span class="">Keep Shopping</span>
            </a>
            <a class="b-hbhcU4 b-gPrz3t b-GvrCDR b-EHuDI4 b-_jYOFY" href="/checkout">
                <span class="">Check out</span>
            </a>
        </div>
    </div>
    @else
    <div class="b-p1TdDk" style="--radix-popover-content-transform-origin: var(--radix-popper-transform-origin); opacity: 1; transform: none;">
    <div class="b-nRnlPl">
        <p class="b-LFtu7P">
            <span class="">Your cart is empty</span>
        </p>
        <p class="b-kVP3mk">
            <span class="">Looks like you haven't added anything to your cart yet</span>
        </p>
        <div data-centered="true" class="b-kRUhIW">
            <a class="b-hbhcU4 b-gPrz3t b-EHuDI4 b-qADpFj" href="/">
                <span class="">Browse Products</span>
            </a>
        </div>
    </div>
    </div>
    @endif

</div>