@extends('admin.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection
@section('button')
<a href="{{ route('productCreate') }}" class="btn btn-outline-primary">Add</a>
@endsection
@section('content')
<div class="card">
  <div class="card-body">
        
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>No</th>

                    <th>Category</th>
                    <th>Related To</th>
                    <th>Total Products</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $k=>$row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    
                    <td><a href="/admin/product/view/category/{{$row->id}}">{{$row->name}}</a></td>
                    <td>
                        @if($row->is_home == 1)
                        <span>Homepage</span>
                        @endif
                        @if($row->is_header == 1 && $row->parent_category_id == null)
                        <span>Top Menu</span>
                        @endif
                        
                        @if($row->is_header == 1 && $row->parent_category_id != null)
                        <span>Child Menu</span>
                        @endif
                        
                    </td>
                    <td>{{$row->product?count($row->product):''}}</td>
                    <td>
                        <a href="{{ route('productViewCategory', $row->id ) }}"><span class="btn btn-sm btn-outline-primary">View</span></a>
                        <a href="{{ route('productCreate') }}?cat={{$row->id}}"><span class="btn btn-sm btn-outline-primary">Add</span></a>
                        
                    </td>
                </tr>
                @endforeach
                <tbody>
        </table>
  </div>
</div>
@endsection
@section('js')
<!--<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script> 
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>-->
<script>
  let table1 = document.querySelector('#table1');
  let dataTable = new simpleDatatables.DataTable(table1);
  
  $(document).on('click', '.select-all', function() {
    if($(this).hasClass('all')) {
        $(".checkbox-item").prop("checked", false);
        $(this).removeClass('all');
        $(this).html('Select All');
        $('.delete-all').addClass('d-none');
    }else {
        $(this).addClass('all');
        $(".checkbox-item").prop("checked", true);
        $(this).html('Deselect All');
        $('.delete-all').removeClass('d-none');
    } 
})
$(document).on('click', '.checkbox-item', function() {
    var checked = $(".checkbox-item:checked").length;
    $('.delete-all').removeClass('d-none');
    if(checked == 0) {
        $('.delete-all').addClass('d-none');
    }
});
$(document).on('click', '.delete-all', function() {
    // Collect IDs of checked rows
    var selectedIds = [];
    $(".checkbox-item:checked").each(function() {
      selectedIds.push($(this).val());
    });

    // Send an AJAX request to delete the selected rows
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        method: "POST", // You can use POST, DELETE, or any appropriate HTTP method
        url: "/admin/product/delete-all", // Replace with your server endpoint
        data: {_token: "{{ csrf_token() }}", ids: selectedIds }, // Send the selected IDs to the server
        dataType: 'json',
        success: function(response) {
            if(response.success) {
                window.location.reload();
            }
        },
        error: function(xhr, status, error) {
            console.error("Error deleting rows: " + error);
        }
    });
})
  
</script>
@endsection