@extends('layouts.client')

@section('css')
<style>

    .checkoutpage .card-js {
        margin-bottom: 20px;
    }
    .checkoutpage .card-js input {
        height: 40px !important;
        line-height: 40px !important;
        margin-bottom: 16px;
        background-color: #fff !important;
    }
    .checkoutpage .card-js input:hover, .checkoutpage .card-js input:focus {
        box-shadow: unset;
        border: 2px solid var(--input-default-text);
    }
    .checkoutpage .card-js .icon {
        top: 6px;
    }
    .overlay-loader {
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        position: fixed;
        background: #fff;
        z-index: 9999;
    }
    .overlay-loader .overlay__inner {
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        position: absolute;
    }
    .overlay-loader .overlay__content {
        left: 50%;
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
    }
    .overlay-loader .spinner {
        width: 75px;
        height: 75px;
        display: inline-block;
        border-width: 2px;
        border-color: #25396f;
        border-top-color: #fff;
        animation: spin 1s infinite linear;
        border-radius: 100%;
        border-style: solid;
    }
    @keyframes  spin {
        100% {
            transform: rotate(360deg);
        }
    }
</style>
@endsection

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/checkout.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/card-js.min.css')}}" />
<div class="b-QNdonF checkoutpage">
    <div class="b-GjUpiu" data-fillmobile="true">
        <div class="b-XokLof">
            <div class="b-rHhQ9u b-lG0p9W b-NJvsF_" data-full-width="true" data-show-owerflow="true" data-onclick="false" style="border-radius: 0px;">
                <div class="b-zuTI10">
                    <h2 class="b-L8lGpL">Order summary</h2>
                    <button class="b-ISwV0Q">
                        <svg class="" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>
                <div class="">
                    <div style="height: 102px;">
                        <div>
                            <div>
                                <div>
                                    <div class="b-orzNLz b-JJssGU" style="--gap: var(--space-3);">
                                        @include('client/_order_cart', ['cart'=>$cart])

                                        <hr class="b-Twfju0 b-p10W_f b-qzWSDd">
                                        <span style="display: block; width: var(--space-0); min-width: var(--space-0); height: var(--space-0); min-height: var(--space-0);"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="b-YPP25G"></div>

                <span style="display: block; width: var(--space-4); min-width: var(--space-4); height: var(--space-4); min-height: var(--space-4);"></span>
                <div class="b-hrYwoX">
                    <div class="b-uMV3sQ">
                        <button class="b-jhPOVW" type="button">
                            <div class="b-orzNLz b-ddY4Q3 b-RRF6jh b-p8fxcv" style="--gap: var(--space-0);">
                                <span>
                                    <span class="">Total Estimate</span>
                                </span>
                                <svg class="b-kNzhFV" width="22" height="22" viewBox="0 0 24 24" fill="none">
                                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12 16V12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </button>
                    </div>
                    <span>£{{number_format($total, 2)}}</span>
                </div>
            </div>
            <div class="b-rHhQ9u b-w4sPIJ position-relative" data-full-width="true" data-onclick="false" style="border-radius: 0px;">
                
                <div class="overlay-loader" style="display: none;">
                    <div class="overlay__inner">
                        <div class="overlay__content">
                            <span class="spinner"></span>
                        </div>
                    </div>
                </div>
                
                
                
                <span style="display: block; width: var(--space-4); min-width: var(--space-4); height: var(--space-4); min-height: var(--space-4);"></span>
                <form id="checkoutform" action="{{ route('clientCheckoutSave') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <h1 class="b-n3Bc0w">Create an account</h1>
                    
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="b-ThtwlR">
                                <header class="b-nA7YeQ">
                                    <label for="email" class="b-l1OXiv">
                                        <span class="">Email address</span>
                                    </label>
                                </header>
                                <div class="b-NSfkh0 b-jnlYzn">
                                    <input type="email" id="email" class="b-vUYFCN b-BOOdsl" name="email" autocomplete="email" required="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="b-ThtwlR">
                                <header class="b-nA7YeQ">
                                    <label for="password" class="b-l1OXiv">
                                        <span class="">Password</span>
                                    </label>
                                </header>
                                <div class="b-NSfkh0 b-jnlYzn">
                                    <input type="password" id="password" class="b-vUYFCN b-BOOdsl" name="password" required="" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h1 class="b-n3Bc0w">Account information</h1>
                    
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="b-ThtwlR">
                                <header class="b-nA7YeQ">
                                    <label for="firstname" class="b-l1OXiv">
                                        <span class="">First Name</span>
                                    </label>
                                </header>
                                <div class="b-NSfkh0 b-jnlYzn">
                                    <input type="text" id="firstname" class="b-vUYFCN b-BOOdsl" name="firstname" required="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="b-ThtwlR">
                                <header class="b-nA7YeQ">
                                    <label for="lastname" class="b-l1OXiv">
                                        <span class="">Last Name</span>
                                    </label>
                                </header>
                                <div class="b-NSfkh0 b-jnlYzn">
                                    <input type="text" id="lastname" class="b-vUYFCN b-BOOdsl" name="lastname" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="" style="margin-bottom: 16px;">
                                <header class="b-nA7YeQ">
                                    <label for="phone" class="b-l1OXiv">
                                        <span class="">Phone</span>
                                    </label>
                                </header>
                                <div class="b-NSfkh0 b-jnlYzn">
                                    <input type="tel" id="phone" class="b-vUYFCN b-BOOdsl" name="phone" required="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="" style="margin-bottom: 16px;">
                                <header class="b-nA7YeQ">
                                    <label for="address" class="b-l1OXiv">
                                        <span class="">Address</span>
                                    </label>
                                </header>
                                <div class="b-NSfkh0 b-jnlYzn">
                                    <input type="text" id="address" class="b-vUYFCN b-BOOdsl" name="address" required="" value="">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="b-ThtwlR">
                                <header class="b-nA7YeQ">
                                    <label for="city" class="b-l1OXiv">
                                        <span class="">City</span>
                                    </label>
                                </header>
                                <div class="b-NSfkh0 b-jnlYzn">
                                    <input type="text" id="city" class="b-vUYFCN b-BOOdsl" name="city" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="b-ThtwlR">
                                <header class="b-nA7YeQ">
                                    <label for="state" class="b-l1OXiv">
                                        <span class="">State/Province</span>
                                    </label>
                                </header>
                                <div class="b-NSfkh0 b-jnlYzn">
                                    <input type="text" id="state" class="b-vUYFCN b-BOOdsl" name="state" value="">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="" style="margin-bottom: 16px;">
                        <div class="b-ThtwlR">
                            <header class="b-nA7YeQ">
                                <label for="zip" class="b-l1OXiv">
                                    <span class="">Zip</span>
                                </label>
                            </header>
                            <div class="b-NSfkh0 b-jnlYzn">
                                <input type="text" id="zip" class="b-vUYFCN b-BOOdsl" name="zip" value="" required />
                            </div>
                        </div>
                    </div>


                    <div class="" style="margin-bottom: 16px;">
                        <header class="b-nA7YeQ">
                            <label for="country" class="b-l1OXiv">
                                <span class="">Country</span>
                            </label>
                        </header>
                        <div class="b-NSfkh0 b-jnlYzn">
                            <select name="country" id="country" class="b-vUYFCN b-BOOdsl" required>
                                <option value="">Select Country</option>
                                @if($countries)
                                @foreach($countries as $country)
                                <option value="{{$country->name}}">{{$country->name}}</option>
                                @endforeach
                                @endif
                            </select>

                        </div>
                    </div>

                    <h2 class="b-L8lGpL" style="margin-bottom: 16px;">Card Informaiton</h2>

                    <div class="card-js" id="example">
                        <input class="card-number my-custom-class" name="card_number">
                        <input class="name" id="the-card-name-id" name="card_holders_name" placeholder="Name on card">
                        <input class="expiry-month" name="expiry_month">
                        <input class="expiry-year" name="expiry_year">
                        <input class="cvc" name="cvc">
                    </div>
                    
                    
                    


                    
                    
                    <div class="b-FKWDvq">
                        <span style="display: block; width: var(--space-5); min-width: var(--space-5); height: var(--space-5); min-height: var(--space-5);"></span>
                        <button class="b-gPrz3t b-X00x77 b-rCVOGz b-geimFG b-xaOU52 b-EHuDI4 b-_jYOFY" type="submit" font-weight="600">
                            <span class="">Pay Now</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/card-js.min.js') }}"></script>
<script>

var myCard = $('#card-info');
var cardNumber = myCard.CardJs('cardNumber');
var cardType = myCard.CardJs('cardType');
var name = myCard.CardJs('name');
var expiryMonth = myCard.CardJs('expiryMonth');
var expiryYear = myCard.CardJs('expiryYear');
var cvc = myCard.CardJs('cvc');




</script>
@endsection