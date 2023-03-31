<style>
    .fa-angle-right {
        font-size: 16px !important;
    }
    .delete-btn:hover {
        color: rgb(206, 59, 59) !important;
    }
</style>


@section('head')
<!-- Custom styles for this page -->
<link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection



@extends('admin.main')


@section('heading')
Dashboard <i class="fa-solid fa-angle-right"></i> <span class="purchases">Newsletter</span>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="books-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>E-mails Subscribed</th>
                        <th>Subscription Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @forelse($newsletter as $subscribed)
                            <td>{{$subscribed->newsletter_email}}</td>
                            <td>{{$subscribed->created_at->diffForHumans()}}</td>
                            <td>
                                <form action="{{url("admin/newsletter/newsletter-details/$subscribed->id")}}" method="post">
                                    @csrf
                                    <button class="delete-btn" type="submit" class="delete-btn"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <td colspan="6" class="text-center default-msg">
                        <div>
                            There are no Subscriptions yet!
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
