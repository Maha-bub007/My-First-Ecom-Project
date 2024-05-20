@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">SubCategory List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Sub-Category Name</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subCategories as $subCategory)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$subCategory->name}}</td>
                        <td>{{$subCategory->category->name}}</td>
                        <td>
                            <a href="{{url('/admin/sub-category/edit/'.$subCategory->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('/admin/sub-category/delete/'.$subCategory->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection

@push('script')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endpush
