@extends('admin.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection
@section('button')
<a href="{{ route('productCreate') }}?cat={{$category->id}}" class="btn btn-outline-primary">Add</a>
@endsection
@section('content')
<div class="card">
  <div class="card-body">
        @if($products && count($products) > 0)
            <a href="javascript:void(0);" class="select-all me-2 mb-3 d-inline-block text-primary">Select All</a>
            <a href="javascript:void(0);" class="delete-all me-2 text-danger d-none">Delete All</a>
            
            <a href="javascript:void(0);" class="edit-all mb-3 d-inline-block text-info d-none">Edit All</a>
            
        @endif
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th></th>
                    <th>Title</th>
                    <th>Stock</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $k=>$row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><input type="checkbox" class="checkbox-item" value="{{$row->id}}" /></td>
                    <td>{!! str_replace('-', ' ', ucwords($row->title)) !!}</td>
                    
                    <td>{{ $row->stock }}</td>
                    <td>
                        <a href="{{ route('productEdit', $row->slug ) }}"><span class="btn btn-sm btn-outline-primary">Detail</span></a>
                        <a href="{{ route('productCopy', $row->slug ) }}"><span class="btn btn-sm btn-outline-success">Copy</span></a>
                        @if($k > 0)
                        <a href="/admin/product/move-up/{{$row->id}}?cat={{$category->id}}"  class="btn btn-sm btn-primary"><i class="bi bi-arrow-up-square-fill"></i></a>
                        @endif
                        @if($k < count($products) - 1)
                        <a href="/admin/product/move-down/{{$row->id}}?cat={{$category->id}}"  class="btn btn-sm btn-primary"><i class="bi bi-arrow-down-square-fill"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                <tbody>
        </table>
  </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script> 
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
//  let table1 = document.querySelector('#table1');
//  let dataTable = new simpleDatatables.DataTable(table1);
  var category = {{$category->id}};
  $(document).on('click', '.select-all', function() {
    if($(this).hasClass('all')) {
        $(".checkbox-item").prop("checked", false);
        $(this).removeClass('all');
        $(this).html('Select All');
        $('.delete-all').addClass('d-none');
        $('.edit-all').addClass('d-none');
    }else {
        $(this).addClass('all');
        $(".checkbox-item").prop("checked", true);
        $(this).html('Deselect All');
        $('.delete-all').removeClass('d-none');
        $('.edit-all').removeClass('d-none');
    } 
})
$(document).on('click', '.checkbox-item', function() {
    var checked = $(".checkbox-item:checked").length;
    $('.delete-all').removeClass('d-none');
    $('.edit-all').removeClass('d-none');
    if(checked == 0) {
        $('.delete-all').addClass('d-none');
        $('.edit-all').addClass('d-none');
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
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
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
});

$(document).on('click', '.edit-all', function() {
    // Collect IDs of checked rows
    var selectedIds = [];
    $(".checkbox-item:checked").each(function() {
      selectedIds.push($(this).val());
    });
    if(selectedIds && selectedIds.length > 0) {
        window.location.href='/admin/product/multipleedit?cat='+category+'&ids='+selectedIds.join(',')
    }
})
  
</script>
@endsection