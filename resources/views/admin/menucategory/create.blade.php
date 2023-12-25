@extends('admin.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/upload.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/vendors/select-live/dselect.scss') }}">
<style>
    .form-select{
      text-align:left !important;
    }
</style>
@endsection
@section('content')
  <div class="card">
    <div class="card-body row">
      <div class="col-md-6 col-12">
        <form action="{{ route('menucategorySave') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div id="file-upload-form" class="uploader d-none @error('path') is-invalid @enderror">
            <input id="file-upload" type="file" name="path" accept="image/*" />
            <label for="file-upload" id="file-drag">
              <img id="file-image" src="#" alt="Preview" class="hidden">
              <div id="start">
              <i class="fa fa-download" aria-hidden="true"></i>
              <div>Upload image category</div>
              @error('path')
                <span class="text-danger">{{ $message }}</span><br>
              @enderror
              <div id="notimage" class="hidden">Please select an image            
              </div>
              <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
              </div><br>
              @if(session('errorUpload'))
                <span class="text-danger">You must use button</span><br>
              @enderror
              <div id="response" class="hidden">
              <span class="text-danger" id="max-file"></span>
              <div id="messages">
              
              </div>
              <progress class="progress" id="file-progress" value="0">
                <span>0</span>%
              </progress>
              </div>
            </label>
          </div>

          
          
          <div class="form-group">
            <label for="name">Category name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Chicken" value="{{old('name')}}" required autofocus>
          </div>
          
          <div class="form-group">
            <label for="parent_category_id">Parent Category</label>
            <select name="parent_category_id" id="parent_category_id" class="form-select">
              <option selected disabled>Select Parent Category</option>
              @foreach ($main_categories as $item)
                <option value="{{ $item->id }}" {{ old('parent_category_id') == $item->id ? 'selected' : '' }}>{{ str_replace('-', ' ', $item->name) }}</option>
              @endforeach
            </select>
          </div>
          
          <div class="form-group">
            <label for="country">Country</label>
            <select name="country" id="country" class="form-select" required>
              <option selected disabled>Select Country</option>
              @foreach ($countries as $country)
              <option value="{{ $country->iso }}">{{ $country->name }}</option>
              @endforeach
            </select>
          </div>
          
          <div class="form-check">
              <input class="form-check-input" name="is_show_menu" type="checkbox" value="1" id="is_show_menu">
            <label class="form-check-label" for="is_show_menu">
              Show on menu
            </label>
          </div>
          

          <button type="submit" class="btn btn-primary float-end">Create</button>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script src="{{ asset('assets/js/upload.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/select-live/dselect.js') }}"></script>
<script>
    
//    $(document).on('input', '#name2', function() {
//        var v = $(this).val();
//        console.log(v);
//        
//        let result = v.replace(/\s+/g, "-");
//        let capital = v.replace(/[A-Z]/g, "$&");
//        let vr = result.toLowerCase()
//        
//        $('#name').val(vr);
//    })
    
//  const name = document.getElementById("name");
//  name.addEventListener('keyup', function(e){
//      let result = name.value.replace(/\s+/g, "-");
//      let capital = name.value.replace(/[A-Z]/g, "$&");
//      name.value = result.toLowerCase()
//  });
  
  var select_box_country_element = document.querySelector('#country')
  dselect(select_box_country_element, {
      search: true
  });

//  $('#name2').keyup(function(){
//    let name = $('#name').val();
//
//    setTimeout(() => {
//      $.ajax({
//        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
//        type: 'POST',
//        dataType: 'json',
//        data: {"_token" : "{{ csrf_token() }}", name: name},
//        url: '{{ route("categoryCheck") }}',
//        success: function(data){
//
//        },
//        statusCode: {
//          200: () => {
//            $('#name2').addClass('is-invalid');
//            $('#name2').removeClass('is-valid');
//          },
//          201: () => {
//            $('#name2').removeClass('is-invalid');
//            $('#name2').addClass('is-valid');
//          }
//        }
//      })
//    }, 100);
//
//  })

</script>
@endsection