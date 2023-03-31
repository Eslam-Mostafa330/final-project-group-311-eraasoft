
<style>
    .fa-angle-right {
        font-size: 16px !important;
    }
    .view-message {
        position: relative;
        font-size: 16px;
        color: #4FA72C;
        transition: .2s;
    }
    .view-message:hover {
        color: #388E3C;
        text-decoration: none !important;
    }
    .inbox {
        color: #ccc;
    }
</style>

@extends('admin.main')


@section('heading')
Dashboard <i class="fa-solid fa-angle-right"></i> <span class="inbox">Inbox</span>
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="inbox-table" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>View</th>
                    <th>Sender Name</th>
                    <th>Sender Email</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                    <tr>
                        <td><a class="view-message" href="{{url("admin/inbox/message-details/$message->id")}}"><i class="fa-solid fa-envelope-open-text"></i> Open Message</a></td>
                        <td>{{$message->guest_name}}</td>
                        <td>{{$message->guest_email}}</td>
                        <td>{{$message->created_at}}</td>
                        <td>
                            <form action="{{route('inbox.delete', $message)}}" method="post">
                                @csrf
                                <button type="submit" class="delete-btn"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="2" class="text-center">There's no Messages.</td>
                </tr>
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
            $("#inbox-table").DataTable();
        });
    </script>
@endsection
