

@extends('admin.main')

@section('head')
<style>
    .fa-angle-right {
        font-size: 16px !important;
    }
    .back-btn {
        display: flex;
        justify-content: right;
        position: relative;
        bottom: 35px;
        margin-right: 80px;
        font-size: 20px;
        transition: .2s;
        color: #1DC88A;
        cursor: pointer !important;
    }
    .back-btn:hover {
      color: #388E3C !important;
      text-decoration: none;
    }

    .delete-btn {
        position: relative;
        right: -93%;
        bottom: 56px;
        display: flex;
        justify-content: right;
        padding: 5px 10px !important;
        font-size: 20px !important;
        border: 0 !important;
        padding: 0 !important;
    }
    .delete-btn:hover {
        color: rgb(222, 79, 79) !important;
    }

    .media-heading {
        position: relative;
        top: -7px;
    }
    @media(max-width: 667px) {
      .main {
        padding: 10px;
      }
      .line-under-customer-phone {
        display: block !important;
      }
      .line {
        width: 38%;
      }
      .back-btn {
        display: none;
      }
      .details {
        display: none;
    }
    .media-heading {
        position: relative;
        top: -25px;
    }
    .delete-btn {
        margin-top: 5px;
        margin-right: -10px;
    }
    }
    .message-details {
        color: #ccc;
    }

body {
    background:#eee;
}

.message-wrapper {
  position: relative;
  padding: 10px;
  background-color: #fff;
  margin: 0px;
  box-shadow: 10px 10px 10px 10px rgba(241, 247, 239, 0.8) !important;
}

.panel-body {
    position: relative;
    top: -45px;
}

.message-wrapper .message-sideright[class*="col-"] {
  padding: 30px;
}

.message-wrapper .media .media-heading {
  margin-bottom: 0px;
}

.table:hover, .table tr:hover, .table td:hover {
    /* background: #fff !important; */
}

.text-notes {
    background: #fff !important;
}

.order-details {
    font-weight: bold;
}
.table td {
    border-top: none;
}
.if-not-provided-info {
    color: #1DC88A;
    padding-top: 20px !important;
}
.email-btn {
    color: #1DC88A;
    position: relative;
    left: -10px;
    box-shadow: none !important;
}
.email-btn:hover {
    color: #388E3C;
}
.text-notes-tr {
    background: #fff !important;
}
.delivery-info-text {
    font-weight: bold;
    color: #1DC88A;
}
</style>
@endsection

@section('heading')
Dashboard <i class="fa-solid fa-angle-right"></i> Orders <i class="fa-solid fa-angle-right"></i> <span class="message-details">Order Details</span>
@endsection

@section('content')
<div class="row">
<div class="container">
<div class="row message-wrapper rounded  mb-5">
    <div class="col-12 message-sideright">
        <div class="panel">
            <div class="panel-heading">
                <div class="media">
                    <div class="media-body">
                        <h5 class="media-heading">Order number <span class="order-details">#{{$order->id}}</span> <span class="details">details:</span> </h5>
                    </div>
                </div>
                <div>
                    <a title="Go back to inbox" href="{{url('admin/orders/all-orders')}}" class="back-btn"><i class="fa fa-share"></i></a>
                </div>
                <div>
                    <form action="{{url("admin/orders/order/$order->id")}}" method="post" >
                        @csrf
                        <button title="Delete this message" type="submit" class="btn delete-btn"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>

            </div>
            <div class="panel-body">
                <hr>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Book Name</td>
                            <td>{{$order->book::find($order->book_id)->title}}</td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Number Of Copies</td>
                            <td>{{$order->number_of_copies}}</td>
                        </tr>
                            <td>Book Price</td>
                            <td>{{$order->price}} $</td>
                        </tr>
                        <tr>
                            <td>Total Required</td>
                            <td>{{$order->price * $order->number_of_copies}} $</td>
                        </tr>
                        <tr>
                            <td>Order Date</td>
                            <td>{{$order->created_at->diffForHumans()}}</td>
                        </tr>
                        <tr>
                            <td><h6 class="delivery-info-text">Delivery Information</h6></td>
                            <td></td>
                        </tr>
                        @if($order->user::find($order->user_id)->full_name && $order->user::find($order->user_id)->phone && $order->user::find($order->user_id)->address_1)
                            <tr>
                                <td>Customer Full Name</td>
                                <td>{{$order->user::find($order->user_id)->full_name}}</td>
                            </tr>
                            <tr>
                                <td>Curtomer Phone</td>
                                <td>{{$order->user::find($order->user_id)->phone}}</td>
                            </tr>
                            <tr>
                                <td>Customer Address One</td>
                                <td>{{$order->user::find($order->user_id)->address_1}}</td>
                            </tr>
                            <tr>
                                <td>Customer Address Two</td>
                                <td>{{$order->user::find($order->user_id)->address_2}}</td>
                            </tr>
                            <tr>
                                <td>Customer Notes</td>
                                <td><textarea disabled class="form-control text-notes" cols="5" rows="4">{{$order->user::find($order->user_id)->notes}}</textarea></td>
                            </tr>
                            @else
                            <tr>
                                <td class="if-not-provided-info">Delivery information hasn't been filled out yet.</td>
                                <td><a class="btn email-btn" href="mailto:{{$order->user->email}}">Email the customer <i class="fa-regular fa-paper-plane"></i></a></td>
                            </tr>
                        @endif
                    </tbody>

                </table>
                <br>

            </div>
        </div>

    </div>
</div>
</div>
    </div>
@endsection

