
@if(count($cart) > 0)

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

@endif
