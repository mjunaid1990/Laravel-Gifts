@extends('admin.layout')
@section('css')
  
  <!--<link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/base.min.css') }}">-->
  <link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/select-live/dselect.scss') }}">
  <style>
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
      <div class="col-md-8 col-12">
        <form action="{{ route('producSave') }}" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control  @error('title') is-invalid @enderror" placeholder="Chicken nugget spicy" value="{{ old('title') }}" required>
            
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select name="categories[]" id="category" class="form-select " multiple="true" required>
              
              @foreach (Auth::user()->shop->parentCategory as $item)
                <option value="{{ $item->id }}" {{ old('category') == $item->id  ? 'selected' : '' }} {{ $incat == $item->id  ? 'selected' : '' }}>{{ $item->name.' ('.$item->catLocation($item).')' }}</option>
                
                @php
                $sub_cats = App\Models\Category::where('parent_category_id', $item->id)->get();
                @endphp
                
                @if($sub_cats && count($sub_cats) > 0)
                    @foreach($sub_cats as $cat)
                        <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : '' }} {{ $incat == $cat->id  ? 'selected' : '' }}>--{{$cat->name.' ('.$cat->catLocation($cat).')'}}</option>
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
            <input type="text" name="price" id="price" class="form-control  @error('price') is-invalid @enderror" placeholder="e.g. 20,40,50 etc" value="{{ old('price') }}" required>
            @error('price') 
              <small class="text-danger">{{ $message }}</small>
            @enderror
            <p><small>Note: add comma separated values e.g. 20,40,50 etc.</small></p>
          </div>
          
          <div class="form-check">
            <input class="form-check-input" name="is_dropdown" type="checkbox" value="1" id="is_dropdown">
            <label class="form-check-label" for="is_dropdown">
              Force Dropdown
            </label>
          </div>
          
          <div class="form-check">
            <input class="form-check-input" name="is_homepage" type="checkbox" value="1" id="is_homepage">
            <label class="form-check-label" for="is_homepage">
              Show on homepage
            </label>
          </div>
          
          <div class="form-group">
            <label for="country_id">Country</label>
            <select name="country" id="country_id" class="form-select" required>
              <option selected disabled>Select Country</option>
              @foreach ($countries as $country)
                <option value="{{ $country->iso }}" {{ old('country') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
              @endforeach
            </select>
            @error('country') 
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          
          <div class="form-group">
              <label for="desc">Description</label>
              <textarea name="desc" id="desc" cols="30" class="form-control @error('desc') is-invalid @enderror" placeholder="Homade spicy chicken nuggets with healty chicken  . . ." required>{{ old('desc') }}</textarea>
              @error('desc')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
          <div class="form-group">
              <label for="desc">Description 2</label>
              <textarea name="desc2" id="desc2" cols="30" class="form-control " placeholder="Homade spicy chicken nuggets with healty chicken  . . ." required>{{ old('desc2') }}</textarea>
              @error('desc2')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
          
          
          <div class="form-group">
              <label for="desc">Redeem Description</label>
              <textarea name="redeem_desc" id="redeem_desc" cols="30" class="form-control " placeholder="Homade spicy chicken nuggets with healty chicken  . . ." required>{{ old('redeem_desc') }}</textarea>
              @error('redeem_desc')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
          <div class="form-group">
              <label for="desc">Term and conditions</label>
              <textarea name="terms" id="terms" cols="30" class="form-control " placeholder="Homade spicy chicken nuggets with healty chicken  . . ." required>{{ old('terms') }}</textarea>
              @error('terms')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
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
                        <input type="text" name="faq[0][question]" id="faq-q0" class="form-control " placeholder="" value="{{ old('faq[0][question]') }}" >
                      </div>
                      
                      <div class="form-group">
                        <label for="faq-a0">Answer</label>
                        <textarea name="faq[0][answer]" id="faq-a0" class="form-control " placeholder="" >{{ old('faq[0][answer]') }}</textarea>
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
                          <input type="text" name="faq[1][question]" id="faq-q1" class="form-control " placeholder="" value="{{ old('faq[1][question]') }}" >
                        </div>

                        <div class="form-group">
                          <label for="faq-a1">Answer</label>
                          <textarea name="faq[1][answer]" id="faq-a1" class="form-control " placeholder="" >{{ old('faq[1][answer]') }}</textarea>
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
                          <input type="text" name="faq[2][question]" id="faq-q2" class="form-control " placeholder="" value="{{ old('faq[2][question]') }}" >
                        </div>

                        <div class="form-group">
                          <label for="faq-a2">Answer</label>
                          <textarea name="faq[2][answer]" id="faq-a2" class="form-control " placeholder="" >{{ old('faq[2][answer]') }}</textarea>
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
                          <input type="text" name="faq[3][question]" id="faq-q3" class="form-control " placeholder="" value="{{ old('faq[3][question]') }}" >
                        </div>

                        <div class="form-group">
                          <label for="faq-a3">Answer</label>
                          <textarea name="faq[3][answer]" id="faq-a3" class="form-control " placeholder="" >{{ old('faq[3][answer]') }}</textarea>
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
                          <input type="text" name="faq[4][question]" id="faq-q4" class="form-control " placeholder="" value="{{ old('faq[4][question]') }}" >
                        </div>

                        <div class="form-group">
                          <label for="faq-a4">Answer</label>
                          <textarea name="faq[4][answer]" id="faq-a4" class="form-control " placeholder="" >{{ old('faq[4][answer]') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
              
            
          </div>
          
          
          
          <button type="submit" class="btn btn-primary float-end">Save</button>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/select-live/dselect.js') }}"></script>
<script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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
    
  var select_box_element = document.querySelector('#category')
  const choices = new Choices(select_box_element);
//  dselect(select_box_element, {
//      search: true
//  });
  
  var select_box_country_element = document.querySelector('#country_id')
  
  dselect(select_box_country_element, {
      search: true
  });

  document.getElementById('desc').addEventListener('keyup', function() {
      this.style.overflow = 'hidden';
      this.style.height = 0;
      this.style.height = this.scrollHeight + 'px';
  }, false);

//    $(document).on('input', '#title2', function() {
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
//
//        },
//        statusCode: {
//          200: () => {
//            $('#title2').addClass('is-invalid');
//            $('#title2').removeClass('is-valid');
//          },
//          201: () => {
//            $('#title2').removeClass('is-invalid');
//            $('#title2').addClass('is-valid');
//          }
//        }
//      })
//    }, 100);
//
//  })

</script>
@endsection