<style>
    .fa-angle-right {
        font-size: 16px !important;
    }
    .books {
        color: #ccc;
    }
    .actions {
        display: flex !important;
    }
    .delete-btn {
        font-size: 100%;
        font-family: inherit;
        border: 0;
        padding: 0;
        color: red;
        margin-left: 20px;
        font-size: 20px;
        transition: .2s !important;
    }
    .edit-btn {
        font-size: 20px;
        color: #1DC88A;
        transition: .2s;
        margin-left: 5px;
    }
    .edit-btn:hover {
        color: #388E3C;
    }
    .page-link {
        /* border-color: #1DC88A !important; */
    }
    .page-item:not(:first-child) .page-link {
        color: #388E3C !important;
    }
    .page-item.active .page-link {
        background: #388E3C !important;
        color: #fff !important;
        border-color:  #388E3C !important;
    }

</style>

@section('head')
<!-- Custom styles for this page -->
<link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection



@extends('admin.main')


@section('heading')
Dashboard <i class="fa-solid fa-angle-right"></i> <span class="books">Books</span>
@endsection




@section('content')
<a class="btn btn-success" href="{{url('admin/books/create')}}"><i class="fa-solid fa-plus"></i> Add Book</a>
<hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="books-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>ISBN</th>
                        <th>Category</th>
                        <th>Authors</th>
                        <th>Publishers</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td><a href="{{url("admin/books/show/$book->id")}}">{{$book->title}}</a></td>
                            <td>{{$book->isbn}}</td>
                            <td>{{$book->category->name}}</td>
                            <td>
                                @if($book->authors()->count() > 0)
                                    @foreach ($book->authors as $author)
                                        {{$loop->first ? '' : ' and '}}
                                        {{$author->name}}
                                    @endforeach
                                @endif
                            </td>
                            <td>{{$book->publisher->name}}</td>
                            <td>{{$book->price}}$</td>
                            <td class="actions">
                                <a href="{{url("admin/books/edit/$book->id")}}" class="edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{route('books.delete', $book)}}" method="post">
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
