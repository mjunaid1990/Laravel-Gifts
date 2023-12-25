@extends('layouts.client')

@section('css')
<style>
    .b-ildLo6 {
        width: 100%;
        height: auto;
        object-fit: cover;
    }
</style>
@endsection

@section('content')

<div class="b-QNdonF">
    <div class="b-GjUpiu">
        <div class="b-fAUDcO">
            
            <aside class="b-D0KxGT">
                @if($categories)
                <ul class="b-d9Cx1b">
                    @foreach($categories as $cat)
                    
                    @php
                        $subcats = App\Models\Category::where('parent_category_id', $cat->id)->orderBy('orderno', 'asc')->get();
                    @endphp
                    
                    <li>
                        <a class="b-hbhcU4 b-r_ATWU {{$cat->name == $slug->name ?'b-_TURiU':''}}" href="/{{strtolower($cat->country)}}/{{$cat->slug}}" style="text-transform: capitalize;">{{$cat->name}}</a>
                    </li>
                    @if($subcats && count($subcats) > 0)
                        @foreach($subcats as $scat)
                        <li>
                            <a class="b-hbhcU4 b-r_ATWU {{$scat->name == $slug->name ?'b-_TURiU':''}}" href="/{{strtolower($scat->country)}}/{{$scat->slug}}" style="text-transform: capitalize;">{{$scat->name}}</a>
                        </li>
                        @endforeach()
                    @endif
                    @endforeach
                    
                </ul>
                @endif
            </aside>

            <div class="b-GpBDJU">
                <div class="b-qi87Hv">
                    <div class="b-SJd2qT">

                        <div class="b-orzNLz b-JJssGU" style="--gap: var(--space-4);">
                            <header class="b-teGYIY">
                                <h1 class="b-AF_1VR">{{$category?$category->name:''}}</h1>
                            </header>
                            <div class="b-orzNLz b-ddY4Q3 b-qu6O9G" style="--gap: var(--space-3); justify-content: end;">

                                <div class="b-uqAjpF">
                                    <div class="b-orzNLz b-ddY4Q3 b-RRF6jh" style="--gap: var(--space-4);">
                                        <div class="b-HGhATz">
                                            <span class="b-ScUuuU">
                                                <span class="">Sort by:</span>
                                            </span>
                                            <div class="b-ThtwlR b-crHHVe b-KqNCi9">
                                                <div class="b-NSfkh0 b-jnlYzn b-A_Jxtv b-q_q1Gq">
                                                    <select id="order_by" type="select" class="b-vUYFCN">
                                                        <option value="">Select</option>
                                                        <option value="asc" {{$sort=='asc'?'selected':''}}>A-Z</option>
                                                        <option value="desc" {{$sort=='desc'?'selected':''}}>Recently Added</option>
                                                    </select>
                                                    <svg class="b-ceAEeU" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path d="m6 9 6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div>
                                <div class="b-OCzQS_">
                                    <div class="b-orzNLz b-JJssGU b-xrRiDy b-xiyEcD" style="--gap: var(--space-0);">
                                        <div class="b-_XIkIk" style="align-items: center;">
                                            <div class="">
                                                @if($category && $category->slug == 'pay-as-you-go-vouchers')
                                                <h1 class="b-uEgd6I">
                                                    <span class="">Pay as you go vouchers</span>
                                                </h1>
                                                @else
                                                <h1 class="b-uEgd6I">
                                                    <span class="">Gift cards</span>
                                                </h1>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="b-_GusL4" style="width: 100%;">
                                            
                                            @if($products)
                                                @foreach($products as $product)
                                                @php
                                                $price = explode(',', $product->price);
                                                @endphp
                                                <a class="b-hbhcU4 b-QRbp6v b-GPzt5k" href="/{{strtolower($product->country)}}/{{$product->category->slug}}/{{$product->slug}}">
                                                    <div class="b-orzNLz b-JJssGU b-RRF6jh b-qu6O9G" style="--gap:var(--space-3)">
                                                        <div class="b-EXzmIr b-gDKMPS" style="background-color:#ffffff;color:#000000">
                                                            <span class="b-MgKtnT"></span>
                                                            <img src="{{$product->productSingleImage && $product->productSingleImage->path?'/shop/products/'.$product->productSingleImage->path:''}}" loading="lazy" alt="{{$product->name}}" class="b-ildLo6" decoding="async" width="350" height="212" sizes="(min-width: 1180px) 203px, (min-width: 959px) 15vw, (min-width: 871px) 23vw, 30vw" style="background:#ffffff">
                                                        </div>
                                                        <div class="b-orzNLz b-JJssGU b-L3BgEH b-xiyEcD" style="--gap:var(--space-0)">
                                                            <div class="b-orzNLz b-ddY4Q3 b-xrRiDy b-qu6O9G" style="--gap:var(--space-3)">
                                                                <h2 class="b-QLqjHL b-PLopeM">{{$product->title}}</h2>
                                                            </div>
                                                            @if(count($price) > 1)
                                                            <p class="b-RwfI_t b-MU6y0d">£{{$price[0]}} - £{{end($price)}}</p>
                                                            @else
                                                            <p class="b-RwfI_t b-MU6y0d">£{{$price[0]}}</p>
                                                            @endif
                                                            
                                                            <p class="b-RwfI_t b-fD_Wi9"></p>
                                                        </div>
                                                    </div>
                                                </a>
                                                @endforeach
                                            @endif
                                            
                                            
                                            
                                            
                                            
                                        </div>
                     
                                        <div class="pagination-wrap my-5 w-100">
                                            {{ $products->links('vendor.pagination.bootstrap-5') }}
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
<form method="get" id="search-form" action="/{{strtolower($category->country)}}/{{$category->slug}}">
    <input type="hidden" name="q" value="{{$q}}" />
    <input type="hidden" name="sort" value="{{$sort}}" />
</form>

@endsection
@section('js')
<script>
$(document).on('change', '#order_by', function() {
    var v = $(this).val();
    
    $('input[name="sort"]').val(v);
    $('#search-form').submit();
})
</script>
@endsection