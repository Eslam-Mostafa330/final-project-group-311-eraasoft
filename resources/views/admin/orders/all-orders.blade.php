<style>
    .fa-angle-right {
        font-size: 16px !important;
    }
    .purchases {
        color: #ccc;
    }
    .view-order {
        position: relative;
        font-size: 16px;
        color: #4FA72C;
        transition: .2s;
    }
    .view-order:hover {
        color: #388E3C;
        text-decoration: none !important;
    }
</style>

@section('head')
<!-- Custom styles for this page -->
<link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection



@extends('admin.main')


@section('heading')
Dashboard <i class="fa-solid fa-angle-right"></i> <span class="purchases">Purchases Processes</span>
@endsection




@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="books-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>View Details</th>
                        <th>Order Number</th>
                        <th>Purchaser Account</th>
                        <th>Book Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @forelse($all_orders as $order)
                            <td><a class="view-order" href="{{url("admin/orders/order/$order->id")}}">View Order Details</a></td>
                            <td>#{{$order->id}}</td>
                            <td>{{$order->user::find($order->user_id)->name}}</td>
                            <td>{{$order->book::find($order->book_id)->title}}</td>
                            <td>
                                <form action="{{url("admin/orders/order/$order->id")}}" method="post">
                                    @csrf
                                    <button class="delete-btn" type="submit" class="delete-btn"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <td colspan="6" class="text-center default-msg">
                        <div>
                            There are no purchased products yet!
                        </div>
                    </td>
                    @endforelse
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
