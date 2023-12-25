@extends('admin.layout')
@section('css')
  <link rel="stylesheet" href="{{ asset('assets/vendors/select-live/dselect.scss') }}">
   <link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.css') }}">
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
    <div class="card-body row">
      <div class="col-md-6 col-12">
        <form action="{{ route('productCopySave', ['product' => $product->slug, 'id' => $product->id]) }}" method="post" enctype="multipart/form-data">
          @csrf
          
          
          
          
          <div class="form-group">
            <label for="category">Category</label>
            <select name="categories[]" id="category" class="form-select" multiple="true" required>
              
              @foreach (Auth::user()->shop->parentCategory as $item)
                <option value="{{ $item->id }}" >{{ $item->name.' ('.$item->catLocation($item).')' }}</option>
                @php
                $sub_cats = App\Models\Category::where('parent_category_id', $item->id)->get();
                @endphp
                
                @if($sub_cats)
                    @foreach($sub_cats as $cat)
                        <option value="{{ $cat->id }}" >--{{ $cat->name.' ('.$cat->catLocation($cat).')' }}</option>
                    @endforeach
                @endif
                @endforeach
            </select>
            @error('category') 
              <small class="text-danger">{{ $message }}</small>
            @enderror
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
<script>
$(document).ready(function() {
        
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
  const choices = new Choices(select_box_element);


</script>
@endsection