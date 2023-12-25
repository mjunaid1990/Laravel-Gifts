@extends('layouts.client')

@section('css')
<style>
    
    
</style>
@endsection

@section('content')

<div class="b-QNdonF">
    <div class="b-GjUpiu">
        <div class="b-fAUDcO">
            <div class="b-GpBDJU">
                <div class="b-qi87Hv">
                    <div class="b-SJd2qT">
                        

                        <h2 class="title">Drop us a note</h2>
                        <br />
                        <div class="row">
                            <div class="col-12 col-md-9">
                                <form id="contact-form">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <input type="text" name="name" class="form-control" placeholder="Name" required />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <input type="email" name="email" class="form-control" placeholder="Email" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <input type="text" name="phone" class="form-control" placeholder="Phone (optional)" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <input type="text" name="subject" class="form-control" placeholder="Subject" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <textarea name="message" class="form-control" rows="7" placeholder="Message"></textarea>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class='mb-3'>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-3">
                                <h5>Get in touch, we're here 24/7</h5>
                                <p>Fill in a form or open a live chat</p>
                            </div>
                        </div>    

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
