<style>
    .fa-angle-right {
        font-size: 16px !important;
    }
    .authors {
        color: #ccc;
    }
</style>

@section('head')
<!-- Custom styles for this page -->
<link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection



@extends('admin.main')


@section('heading')
Dashboard <i class="fa-solid fa-angle-right"></i> <span class="authors">Authors</span>
@endsection




@section('content')
<a class="btn btn-success" href="{{url('admin/authors/create')}}"><i class="fa-solid fa-plus"></i> Add Author</a>
<hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="books-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td>{{$author->name}}</td>
                            <td>{{$author->description}}</td>
                            <td class="actions">
                                <a href="{{url("admin/authors/edit/$author->id")}}" class="edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{route('authors.delete', $author)}}" method="post">
                                    @csrf
                                    <button type="submit" class="delete-btn"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("#books-table").DataTable();
        });
    </script>
@endsection
