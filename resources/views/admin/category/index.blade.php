@extends('admin.layout')
@section('button')
  <a href="{{ route('categoryCreate') }}" class="btn btn-outline-primary">Create</a>
@endsection
@section('content')
  <div class="card">
    <div class="card-body">
        @if($category && count($category) > 0)
        <a href="javascript:void(0);" class="select-all me-2 mb-3 d-inline-block text-primary">Select All</a>
        <a href="javascript:void(0);" class="delete-all text-danger d-none">Delete All</a>
        @endif
        <table class="table table-striped">
            <tbody>
                @foreach ($category as $k=>$item)
                
                
                
                <tr>
                    <td><input type="checkbox" class="checkbox-item" value="{{$item->id}}" /></td>
                    <td>{{$item->name}}</td>
                    <td style="text-align: right;">
                        <a href="javascript:void(0)" onclick="alertconfirm('{{route('categoryDelete', ['id' => $item->id] )}}')"  class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                        <a href="{{ route('categoryEdit', $item->slug ) }}"  class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                        @if($k > 0)
                        <a href="/admin/category/move-up/{{$item->id}}"  class="btn btn-sm btn-success"><i class="bi bi-arrow-up-square-fill"></i></a>
                        @endif
                        @if($k < count($category) - 1)
                        <a href="/admin/category/move-down/{{$item->id}}"  class="btn btn-sm btn-success"><i class="bi bi-arrow-down-square-fill"></i></a>
                        @endif
                    </td>
                </tr>
          
        @endforeach
            </tbody>
        </table>
      
    </div>
  </div>
@endsection
@section('js')
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script> 
<script>
   
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
        url: "/admin/category/delete-all", // Replace with your server endpoint
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
const alertconfirm = (url) => {
    Swal.fire({
        title: 'Sure to delete this category?',
        text: "This category will delete permanently",
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