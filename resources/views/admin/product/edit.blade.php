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

</style>
@endsection
@section('content')
  <div class="card">
    <div class="card-body row">
      <div class="col-md-6 col-12">
        <form action="{{ route('productEditSave', ['product' => $product->slug, 'id' => $product->id]) }}" method="post" enctype="multipart/form-data">
          @csrf
          
          
          
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control " placeholder="Chicken nugget spicy" value="{{ old('title') ? old('title') : $product->title }}" required>
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" required>
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
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control  @error('price') is-invalid @enderror" placeholder="e.g. 20,40,50 etc" value="{{ $product->price }}" >
            @error('price') 
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-check">
            <input class="form-check-input" name="is_dropdown" type="checkbox" value="1" id="is_dropdown" {{ $product->is_dropdown == 1?'checked':''; }}>
            <label class="form-check-label" for="is_dropdown">
              Force Dropdown
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" name="is_homepage" type="checkbox" value="1" id="is_homepage" {{ $product->is_homepage == 1?'checked':''; }}>
            <label class="form-check-label" for="is_homepage">
              Force Dropdown
            </label>
          </div>
          <div class="form-group">
            <label for="country_id">Country</label>
            <select name="country" id="country_id" class="form-select" required>
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
              <label for="desc">Description</label>
              <textarea name="desc" id="desc" cols="30" class="form-control autosize @error('desc') is-invalid @enderror" placeholder="Homade spicy chicken nuggets with healty chicken  . . ." required>{{ $product->desc }}</textarea>
              @error('desc')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
          <div class="form-group">
              <label for="desc">Description 2</label>
              <textarea name="desc2" id="desc2" cols="30" class="form-control " placeholder="Homade spicy chicken nuggets with healty chicken  . . ." required>{{ $product->desc2 }}</textarea>
              @error('desc2')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
          <div class="form-group">
              <label for="desc">Redeem Description</label>
              <textarea name="redeem_desc" id="redeem_desc" cols="30" class="form-control " placeholder="Homade spicy chicken nuggets with healty chicken  . . ." required>{{ $product->redeem_desc }}</textarea>
              @error('redeem_desc')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
          <div class="form-group">
              <label for="desc">Term and conditions</label>
              <textarea name="terms" id="terms" cols="30" class="form-control " placeholder="Homade spicy chicken nuggets with healty chicken  . . ." required>{{ $product->terms }}</textarea>
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
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Faq 1
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                      <div class="form-group">
                        <label for="faq-q0">Question</label>
                        <input type="text" name="faq[0][question]" id="faq-q0" class="form-control " placeholder="" value="{{ isset($faqs[0]->question)?$faqs[0]->question:'' }}" >
                      </div>
                      
                      <div class="form-group">
                        <label for="faq-a0">Answer</label>
                        <textarea name="faq[0][answer]" id="faq-a0" class="form-control " placeholder="" >{{ isset($faqs[0]->answer)?$faqs[0]->answer:'' }}</textarea>
                      </div>
                  </div>
              </div>
            </div>
              
              
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Faq 2
                  </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="form-group">
                          <label for="faq-q1">Question</label>
                          <input type="text" name="faq[1][question]" id="faq-q1" class="form-control " placeholder="" value="{{ isset($faqs[1]->question)?$faqs[1]->question:'' }}" >
                        </div>

                        <div class="form-group">
                          <label for="faq-a1">Answer</label>
                          <textarea name="faq[1][answer]" id="faq-a1" class="form-control " placeholder="" >{{ isset($faqs[1]->answer)?$faqs[1]->answer:'' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
              
              
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                    Faq 3
                  </button>
                </h2>
                <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="form-group">
                          <label for="faq-q2">Question</label>
                          <input type="text" name="faq[2][question]" id="faq-q2" class="form-control " placeholder="" value="{{ isset($faqs[2]->question)?$faqs[2]->question:'' }}" >
                        </div>

                        <div class="form-group">
                          <label for="faq-a2">Answer</label>
                          <textarea name="faq[2][answer]" id="faq-a2" class="form-control " placeholder="" >{{ isset($faqs[2]->answer)?$faqs[2]->answer:'' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
              
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                    Faq 4
                  </button>
                </h2>
                <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="form-group">
                          <label for="faq-q3">Question</label>
                          <input type="text" name="faq[3][question]" id="faq-q3" class="form-control " placeholder="" value="{{ isset($faqs[3]->question)?$faqs[3]->question:'' }}" >
                        </div>

                        <div class="form-group">
                          <label for="faq-a3">Answer</label>
                          <textarea name="faq[3][answer]" id="faq-a3" class="form-control " placeholder="" >{{ isset($faqs[3]->answer)?$faqs[3]->answer:'' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
              
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                    Faq 5
                  </button>
                </h2>
                <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="form-group">
                          <label for="faq-q4">Question</label>
                          <input type="text" name="faq[4][question]" id="faq-q4" class="form-control " placeholder="" value="{{ isset($faqs[4]->question)?$faqs[4]->question:'' }}" >
                        </div>

                        <div class="form-group">
                          <label for="faq-a4">Answer</label>
                          <textarea name="faq[4][answer]" id="faq-a4" class="form-control " placeholder="" >{{ isset($faqs[4]->answer)?$faqs[4]->answer:'' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
              
            
          </div>
          
          
          
          <button type="submit" class="btn btn-primary float-end">Save</button>
        </form>
      </div>
      <div class="col-md-6 col-12">
        <form method="post" action="{{route('productAddImagesSave')}}" enctype="multipart/form-data" class="dropzone mt-4" id="dropzone" style="border-radius:12px;">
          <input type="hidden" name="id_product" value="{{$product->id}}">
          <div class="dz-message" data-dz-message>
            <span>Upload Product Gallery</span><br>
            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.75 12.25H19.25V19.25H12.25V22.75H19.25V29.75H22.75V22.75H29.75V19.25H22.75V12.25ZM21 3.5C11.34 3.5 3.5 11.34 3.5 21C3.5 30.66 11.34 38.5 21 38.5C30.66 38.5 38.5 30.66 38.5 21C38.5 11.34 30.66 3.5 21 3.5ZM21 35C13.2825 35 7 28.7175 7 21C7 13.2825 13.2825 7 21 7C28.7175 7 35 13.2825 35 21C35 28.7175 28.7175 35 21 35Z" fill="black" fill-opacity="0.3"/></svg>
          </div>
          @csrf
        </form>
        <div class="row mt-3 product-images">
          
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <a href="javascript:void(0)" onClick="deleteProduct('{{ route('productDelete', $product->id) }}')" class="btn btn-danger float-end">Delete</a>
    </div>
  </div>
@endsection
@section('js')
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/select-live/dselect.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="{{ asset('assets/vendors/dropzone/dropzone.js') }}"></script>
<script>
$(document).ready(function() {

        CKEDITOR.replace( 'desc', {
            enterMode: CKEDITOR.ENTER_BR, 
            toolbar: [
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList'] }
            ],
        });
        CKEDITOR.replace( 'redeem_desc', {
            enterMode: CKEDITOR.ENTER_BR, 
                toolbar: [
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
                    { name: 'paragraph', items: ['NumberedList', 'BulletedList'] }
                ],
        });
        CKEDITOR.replace( 'desc2', {
            enterMode: CKEDITOR.ENTER_BR, 
                toolbar: [
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList'] }
            ],
        });
        CKEDITOR.replace( 'terms', {
            enterMode: CKEDITOR.ENTER_BR, 
                toolbar: [
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList'] }
            ],
        });
    })
autosize();
function autosize(){
    var text = $('.autosize');

    text.each(function(){
        $(this).attr('rows',1);
        resize($(this));
        this.style.overflow = 'hidden';
    });

    text.on('input', function(){
        resize($(this));
    });
    
    function resize ($text) {
        $text.css('height', 'auto');
        $text.css('height', $text[0].scrollHeight+'px');
    }
}

  var select_box_element = document.querySelector('#category')
  dselect(select_box_element, {
      search: true
  });
    var select_box_country_element = document.querySelector('#country_id')
  dselect(select_box_country_element, {
      search: true
  });

  document.getElementById('desc').addEventListener('keyup', function() {
      this.style.overflow = 'hidden';
      this.style.height = 0;
      this.style.height = this.scrollHeight + 'px';
  }, false);

//$(document).on('input', '#title2', function() {
//        var v = $(this).val();
//        console.log(v);
//        
//        let result = v.replace(/\s+/g, "-");
//        let capital = v.replace(/[A-Z]/g, "$&");
//        let vr = result.toLowerCase()
//        
//        $('#title').val(vr);
//    })
//
//  const title = document.getElementById("title");
//  title.addEventListener('keyup', function(e){
//      let result = title.value.replace(/\s+/g, "-");
//      let capital = title.value.replace(/[A-Z]/g, "$&");
//      title.value = result.toLowerCase()
//  });
//
//  $('#title2').keyup(function(){
//    let title = $('#title').val()
//
//    setTimeout(() => {
//      $.ajax({
//        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
//        type: 'POST',
//        dataType: 'json',
//        data: {"_token" : "{{ csrf_token() }}", title: title},
//        url: '{{ route("productCheck") }}',
//        success: function(data){
//          if(title == '{{ $product->title }}'){
//            $('#title2').removeClass('is-invalid');
//            $('#title2').addClass('is-valid');
//          }else if(data.code == 200){
//            $('#title2').addClass('is-invalid');
//            $('#title2').removeClass('is-valid');
//          }else if(data.code == 201){
//            $('#title2').removeClass('is-invalid');
//            $('#title2').addClass('is-valid');
//          }
//        },
//      })
//    }, 100);
//
//  })

  function allDataImages(){
    $.ajax({
      type: "POST",
      dataType: 'json',
      data: {"_token": "{{ csrf_token() }}", id_products:'{{ $product->id }}'},
      url : '{{ route("productGetImages") }}',
      success: function(response){
       let data = "";
       $.each(response, function(key, value){
          data = data + '<div class="col-lg-3 col-md-3 col-12 ">'
          data = data + '<div class="product-image-item mb-4">'
          data = data + '<button class="btn btn-danger btn-sm delete-image-product" data-id="'+value.id+'" style="position:absolute;z-index:9;right:0;" onClick=alertconfirm("'+value.path+'")><i class="bi bi-trash"></i></button>'
          data = data + '<img src="{{ asset("shop/products/")}}/'+value.path+'">'
          data = data + '</div>'
          data = data + '</div>'
        })
        $('.product-images').html(data);

      }
    })
  }

  allDataImages();

  Dropzone.options.dropzone = {
      accept: function(file, done) {
            done();
          },
          init: function() {
          this.on("maxfilesexceeded", function(file){
              document.getElementById('alerts').classList.add('show');
              this.removeFile(file);
          });
      },
      renameFile: function(file) {
          function getFileExtension(filename){
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
      removedfile: function(file)
      {
        var name = file.upload.filename;
          
          $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
              type: 'POST',
              url: '{{ route("productDeleteImages") }}',
              data: {"_token": "{{ csrf_token() }}", filename: name},
              success: function (data){
                allDataImages();
              },
              error: function(e) {
                  console.log(e);
              }
          });
          var fileRef;
          return (fileRef = file.previewElement) != null ?
          fileRef.parentNode.removeChild(file.previewElement) : void 0;
      },
      success: function(file, response)
      {
        allDataImages();
      },
      error: function(file, response)
      {
        return false;
      }
  };

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
              success: function (data){
                allDataImages();
                Toastify({
                  text: "Image deleted",
                  duration: 3000,
                  close:true,
                  gravity:"top",
                  position: "right",
                  backgroundColor: "#4fbe87",
                }).showToast();
              },
              error: function(e) {
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