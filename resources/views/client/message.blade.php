@extends('layouts.client')

@section('css')
<style>
    
</style>
@endsection

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/checkout.css')}}" />
<div class="b-QNdonF checkoutpage">
    <div class="b-GjUpiu" data-fillmobile="true">
        <div class="b-XokLof" style="display: flex;
    max-width: 100%;
    width: 450px;
    margin: 0 auto;">
            
            <div class="b-rHhQ9u b-w4sPIJ text-center" data-full-width="true" data-onclick="false" style="border-radius: 0px;">
                <h1 class="b-n3Bc0w">Payment declined!</h1>
                <br />
                <br />
                <p>Your card is declined please try again with another payment method or contact your bank provider.</p>
                <br />
                <br />
                <p><a href="/checkout" class='btn btn-primary'>Try again</a></p>
            </div>
        </div>
    </div>
</div>
@endsection

