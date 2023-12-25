@extends('admin.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/select-live/dselect.scss') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/dropzone/dropzone.min.css') }}">
<style>
    .product-image-item{
        display: inline-block;
        height: 100px;
        width: 100px;
        text-align: center;
        position: relative;
        overflow: hidden;
        border-radius:8px;
    }

    .product-image-item img{
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
    }

    .form-select{
        text-align:left !important;
    }

    .dropdown-menu{
        border: 1px solid #dce7f1;
    }
    .cke_top {
        display: none !important;
    }
</style>
@endsection
@section('content')
<div class="card">
    <div class="card-body">


        <ul class="nav nav-tabs" id="productTabs">
            @foreach ($products as $k=>$product)
            <li class="nav-item">
                <a class="nav-link {{$k==0?'active':''}}" id="tab{{ $product->id }}" data-bs-toggle="tab" href="#content{{ $product->id }}">
                    {{ $product->title }}
                </a>
            </li>
            @endforeach
        </ul>

        <form action="{{ route('productEditMultipleSave', ['category' => $cat]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="tab-content">
                @foreach ($products as $k=>$product)
                <div class="tab-pane fade {{$k==0?'active show':''}}" id="content{{ $product->id }}">
                    <input type="hidden" name="products[{{ $product->id }}][id]" class="productid" value="{{ $product->id }}">

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="title-{{ $product->id }}">Title</label>
                                <input type="text" name="products[{{ $product->id }}][title]" id="title-{{ $product->id }}" class="form-control " placeholder="Chicken nugget spicy" value="{{ old('title') ? old('title') : $product->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="category-{{ $product->id }}">Category</label>
                                <select name="products[{{ $product->id }}][category]" id="category-{{ $product->id }}" class="form-select category-list @error('category') is-invalid @enderror" required>
                                    <option selected disabled>Select Category</option>
                                    @foreach (Auth::user()->shop->parentCategory as $item)
                                    <option value="{{ $item->id }}" {{ $product->category->id   == $item->id ? 'selected' : '' }}>{{ $item->name.' ('.$item->catLocation($item).')' }}</option>
                                    @php
                                    $sub_cats = App\Models\Category::where('parent_category_id', $item->id)->get();
                                    @endphp

                                    @if($sub_cats)
                                    @foreach($sub_cats as $cat)
                                    <option value="{{ $cat->id }}" {{ $product->category->id   == $cat->id ? 'selected' : '' }}>--{{$cat->name.' ('.$cat->catLocation($cat).')'}}</option>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </select>
                                @error('category') 
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price-{{ $product->id }}">Price</label>
                                <input type="text" name="products[{{ $product->id }}][price]" id="price-{{ $product->id }}" class="form-control  @error('price') is-invalid @enderror" placeholder="e.g. 20,40,50 etc" value="{{ $product->price }}" >
                                @error('price') 
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="products[{{ $product->id }}][is_dropdown]" type="checkbox" value="1" id="is_dropdown-{{ $product->id }}" {{ $product->is_dropdown == 1?'checked':''; }}>
                                <label class="form-check-label" for="is_dropdown-{{ $product->id }}">
                                    Force Dropdown
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="products[{{ $product->id }}][is_homepage]" type="checkbox" value="1" id="is_homepage-{{ $product->id }}" {{ $product->is_homepage == 1?'checked':''; }}>
                                <label class="form-check-label" for="is_homepage-{{ $product->id }}">
                                    Force Dropdown
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="country_id-{{ $product->id }}">Country</label>
                                <select name="products[{{ $product->id }}][country]" id="country_id-{{ $product->id }}" class="form-select country-list" required>
                                    <option selected disabled>Select Country</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->iso }}" {{ $product->country == $country->iso ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country') 
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc-{{ $product->id }}">Description</label>
                                <textarea name="products[{{ $product->id }}][desc]" id="desc-{{ $product->id }}" cols="30" class="form-control ckeditor-textarea autosize @error('desc') is-invalid @enderror" placeholder="Homade spicy chicken nuggets with healty chicken  . . ." required>{{ $product->desc }}</textarea>
                                @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="desc-{{ $product->id }}">Description 2</label>
                                <textarea name="products[{{ $product->id }}][desc2]" id="desc2-{{ $product->id }}" cols="30" class="form-control ckeditor-textarea" placeholder="Homade spicy chicken nuggets with healty chicken  . . ." required>{{ $product->desc2 }}</textarea>
                                @error('desc2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="redeem_desc-{{ $product->id }}">Redeem Description</label>
                                <textarea name="products[{{ $product->id }}][redeem_desc]" id="redeem_desc-{{ $product->id }}" cols="30" class="form-control ckeditor-textarea" placeholder="Homade spicy chicken nuggets with healty chicken  . . ." required>{{ $product->redeem_desc }}</textarea>
                                @error('redeem_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="terms-{{ $product->id }}">Term and conditions</label>
                                <textarea name="products[{{ $product->id }}][terms]" id="terms-{{ $product->id }}" cols="30" class="form-control ckeditor-textarea" placeholder="Homade spicy chicken nuggets with healty chicken  . . ." required>{{ $product->terms }}</textarea>
                                @error('terms')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @php
                            $faqs = $product->faqs?json_decode($product->faqs):null;
                            @endphp

                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-{{ $product->id }}" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Faq 1
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne-{{ $product->id }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="form-group">
                                                <label for="faq-q0-{{ $product->id }}">Question</label>
                                                <input type="text" name="products[{{ $product->id }}][faq][0][question]" id="faq-q0-{{ $product->id }}" class="form-control " placeholder="" value="{{ isset($faqs[0]->question)?$faqs[0]->question:'' }}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="faq-a0-{{ $product->id }}">Answer</label>
                                                <textarea name="products[{{ $product->id }}][faq][0][answer]" id="faq-a0-{{ $product->id }}" class="form-control " placeholder="" >{{ isset($faqs[0]->answer)?$faqs[0]->answer:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo-{{ $product->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo-{{ $product->id }}" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Faq 2
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo-{{ $product->id }}" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="form-group">
                                                <label for="faq-q1-{{ $product->id }}">Question</label>
                                                <input type="text" name="products[{{ $product->id }}][faq][1][question]" id="faq-q1-{{ $product->id }}" class="form-control " placeholder="" value="{{ isset($faqs[1]->question)?$faqs[1]->question:'' }}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="faq-a1-{{ $product->id }}">Answer</label>
                                                <textarea name="products[{{ $product->id }}][faq][1][answer]" id="faq-a1-{{ $product->id }}" class="form-control " placeholder="" >{{ isset($faqs[1]->answer)?$faqs[1]->answer:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3-{{ $product->id }}" aria-expanded="false" aria-controls="flush-collapse3">
                                            Faq 3
                                        </button>
                                    </h2>
                                    <div id="flush-collapse3-{{ $product->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading3" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="form-group">
                                                <label for="faq-q2-{{ $product->id }}">Question</label>
                                                <input type="text" name="products[{{ $product->id }}][faq][2][question]" id="faq-q2-{{ $product->id }}" class="form-control " placeholder="" value="{{ isset($faqs[2]->question)?$faqs[2]->question:'' }}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="faq-a2-{{ $product->id }}">Answer</label>
                                                <textarea name="products[{{ $product->id }}][faq][2][answer]" id="faq-a2-{{ $product->id }}" class="form-control " placeholder="" >{{ isset($faqs[2]->answer)?$faqs[2]->answer:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4-{{ $product->id }}" aria-expanded="false" aria-controls="flush-collapse4">
                                            Faq 4
                                        </button>
                                    </h2>
                                    <div id="flush-collapse4-{{ $product->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading4" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="form-group">
                                                <label for="faq-q3-{{ $product->id }}">Question</label>
                                                <input type="text" name="products[{{ $product->id }}][faq][3][question]" id="faq-q3-{{ $product->id }}" class="form-control " placeholder="" value="{{ isset($faqs[3]->question)?$faqs[3]->question:'' }}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="faq-a3-{{ $product->id }}">Answer</label>
                                                <textarea name="products[{{ $product->id }}][faq][3][answer]" id="faq-a3-{{ $product->id }}" class="form-control " placeholder="" >{{ isset($faqs[3]->answer)?$faqs[3]->answer:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading5">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5-{{ $product->id }}" aria-expanded="false" aria-controls="flush-collapse5">
                                            Faq 5
                                        </button>
                                    </h2>
                                    <div id="flush-collapse5-{{ $product->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading5" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="form-group">
                                                <label for="faq-q4-{{ $product->id }}">Question</label>
                                                <input type="text" name="products[{{ $product->id }}][faq][4][question]" id="faq-q4-{{ $product->id }}" class="form-control " placeholder="" value="{{ isset($faqs[4]->question)?$faqs[4]->question:'' }}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="faq-a4-{{ $product->id }}">Answer</label>
                                                <textarea name="products[{{ $product->id }}][faq][4][answer]" id="faq-a4-{{ $product->id }}" class="form-control " placeholder="" >{{ isset($faqs[4]->answer)?$faqs[4]->answer:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="dropzone mt-4 my-dropzone" id="dropzone-{{$product->id}}" data-id="{{$product->id}}" style="border-radius:12px;">
                                <div class="dz-message" data-dz-message>
                                    <span>Upload Product Gallery</span><br>
                                    <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.75 12.25H19.25V19.25H12.25V22.75H19.25V29.75H22.75V22.75H29.75V19.25H22.75V12.25ZM21 3.5C11.34 3.5 3.5 11.34 3.5 21C3.5 30.66 11.34 38.5 21 38.5C30.66 38.5 38.5 30.66 38.5 21C38.5 11.34 30.66 3.5 21 3.5ZM21 35C13.2825 35 7 28.7175 7 21C7 13.2825 13.2825 7 21 7C28.7175 7 35 13.2825 35 21C35 28.7175 28.7175 35 21 35Z" fill="black" fill-opacity="0.3"/></svg>
                                </div>
                            </div>
                            <div class="row mt-3 product-images">

                            </div>
                        </div>

                    </div>


                </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>


    </div>
</div>


@endsection
@section('js')
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/select-live/dselect.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="{{ asset('assets/vendors/dropzone/dropzone.js') }}"></script>
<script>
$(document).ready(function () {
    var textareas = document.querySelectorAll('.ckeditor-textarea');

    for (var i = 0; i < textareas.length; i++) {
        CKEDITOR.replace(textareas[i], {
            toolbar: []
        });
    }
    
})
autosize();
function autosize() {
    var text = $('.autosize');

    text.each(function () {
        $(this).attr('rows', 1);
        resize($(this));
        this.style.overflow = 'hidden';
    });

    text.on('input', function () {
        resize($(this));
    });

    function resize($text) {
        $text.css('height', 'auto');
        $text.css('height', $text[0].scrollHeight + 'px');
    }
}

var categorylist = document.querySelectorAll('.category-list');

for (var i = 0; i < categorylist.length; i++) {
    dselect(categorylist[i], {
        search: true
    });
}
var countrylist = document.querySelectorAll('.country-list');
for (var i = 0; i < countrylist.length; i++) {
    dselect(countrylist[i], {
        search: true
    });
}



function init_images() {
    $('.productid').each(function() {
        var id = $(this).val();
        allDataImages(id);
    })
}
init_images();

function allDataImages($id) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {"_token": "{{ csrf_token() }}", id_products: $id},
        url: '{{ route("productGetImages") }}',
        success: function (response) {
            let data = "";
            $.each(response, function (key, value) {
                data = data + '<div class="col-lg-3 col-md-3 col-12 ">'
                data = data + '<div class="product-image-item mb-4">'
                data = data + '<button class="btn btn-danger btn-sm delete-image-product" data-id="' + value.id + '" style="position:absolute;z-index:9;right:0;" onClick=alertconfirm("' + value.path + '")><i class="bi bi-trash"></i></button>'
                data = data + '<img src="{{ asset("shop/products/")}}/' + value.path + '">'
                data = data + '</div>'
                data = data + '</div>'
            })
            $('.product-images').html(data);

        }
    })
}
Dropzone.autoDiscover = false;
var dropzones = document.querySelectorAll('.my-dropzone');
dropzones.forEach(function (form) {
    var formId = form.id;
    var pid = form.dataset.id;
    var myDropzone = new Dropzone('#'+formId, {
        url: '/admin/product/images/save',
        paramName: 'fileOrg',
        uploadMultiple: true,
        accept: function (file, done) {
            done();
        },
        init: function () {
            this.on("maxfilesexceeded", function (file) {
                document.getElementById('alerts').classList.add('show');
                this.removeFile(file);
            });
        },
        renameFile: function (file) {
            function getFileExtension(filename) {
                const extension = filename.split('.').pop();
                return extension;
            }
            const result1 = getFileExtension(file.name);
            var dt = new Date();
            var time = dt.getTime();
            return time + '.' + result1;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.pdf,.doc,.docx",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function (file)
        {
            var name = file.upload.filename;

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '{{ route("productDeleteImages") }}',
                data: {"_token": "{{ csrf_token() }}", filename: name},
                success: function (data) {
                    init_images();
                },
                error: function (e) {
                    console.log(e);
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function (file, response)
        {
            init_images();
        },
        error: function (file, response)
        {
            return false;
        }
    });
    myDropzone.on('sending', function (file, xhr, formData) {
        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

        // Append the CSRF token as a header
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        // Append additional data to the formData object
        formData.append('id_product', pid);
        formData.append('file', file);
        // You can append more data as needed
    });
});


const alertconfirm = (path) => {
    Swal.fire({
        title: 'Sure to delete this image?',
        text: "This image will delete permanently",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                type: 'POST',
                url: '{{ route("productDeleteImages") }}',
                data: {"_token": "{{ csrf_token() }}", filename: path},
                success: function (data) {
                    allDataImages();
                    Toastify({
                        text: "Image deleted",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#4fbe87",
                    }).showToast();
                },
                error: function (e) {
                    console.log(e);
                }
            });
        }
    })
}

const deleteProduct = (url) => {
    Swal.fire({
        title: 'Sure to delete this product?',
        text: "This product will delete permanently",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.replace(url);
        }
    })
}

</script>
@endsection