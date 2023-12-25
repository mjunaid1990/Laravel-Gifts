@extends('admin.layout')
@section('css')
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
        <form action="{{ route('scapping-start') }}" method="post" enctype="multipart/form-data">
          @csrf
          
          
          <div class="form-group">
            <label for="parent_category_id">Category</label>
            <select name="category" id="parent_category_id" class="form-select">
              <option selected disabled>Select Category</option>
              @foreach ($categories as $item)
                <option value="{{ $item->name }}" >{{ $item->name }}</option>
              @endforeach
            </select>
          </div>
          
          <div class="form-group">
            <label for="country">Country</label>
            <select name="country" id="country" class="form-select" required>
              <option selected disabled>Select Country</option>
              @foreach ($countries as $country)
              <option value="{{ strtoupper($country->iso) }}">{{ $country->name }}</option>
              @endforeach
            </select>
          </div>
          
          
          

          <button type="submit" class="btn btn-primary float-end">Scrap Now</button>
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
    

  
  var select_box_country_element = document.querySelector('#country')
  dselect(select_box_country_element, {
      search: true
  });


</script>
@endsection