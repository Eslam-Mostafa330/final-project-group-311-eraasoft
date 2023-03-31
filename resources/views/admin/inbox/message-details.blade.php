
<style>
    .fa-angle-right {
        font-size: 16px !important;
    }
</style>


<style>
    .name, .email {
        padding: 10px;
        position: relative;
        left: -12px;
        font-size: 18px;
    }
    /* .g-name, .g-email {
        font-size: 16px !important;
    } */
    .strong-color {
      color: #416ABA;
      font-size: 16px;
    }
    .message {
        padding: 5px;
    }
    .view-message {
        font-size: 17px;
    }
    .strong-message {
      position: relative;
      left: -5px;
    }
    .message-time {
      font-size: 15px;
      color: #416ABA;
    }
    .line {
      width: 28%;
    }
    .back-btn {
        margin-left: 138%;
        position: relative;
        bottom: 58px;
        font-size: 20px;
        transition: .2s;
        color: #1DC88A;

    }
    .back-btn:hover {
      color: #388E3C !important;

    }
    .card-header {
      padding-top: 8px !important;
      padding-bottom: 3px !important;
    }
    .card-title {
      font-weight: bold;
      font-size: 17px;
      color: #416ABA;
    }

    .delete-btn {
      display: flex;
      margin-left: 145% !important;
      padding: 5px 10px !important;
      position: relative;
      bottom: 80px;
      font-size: 20px !important;
        border: 0 !important;
        padding: 0 !important;
    }
    .delete-btn:hover {
        color: rgb(222, 79, 79) !important;
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
    }
    .message-details {
        color: #ccc;
    }


body {
    margin-top:20px;
    background:#eee;
}

/* ========================================================================
 * MESSAGES
 * ======================================================================== */


.message-wrapper {
  position: relative;
  padding: 0px;
  background-color: #fff;
  margin: 0px;
  box-shadow: 10px 10px 10px 10px rgba(241, 247, 239, 0.8) !important;
}

.panel-body {
    position: relative;
    top: -50px;
}

.message-wrapper .message-sideright[class*="col-"] {
  padding: 30px;
}

.message-wrapper .media .media-heading {
  margin-bottom: 0px;
}

.avatar{
    width:50px;
    height:50px;
    margin-right: 5px;
}

</style>

@extends('admin.main')


@section('heading')
Dashboard <i class="fa-solid fa-angle-right"></i> Inbox <i class="fa-solid fa-angle-right"></i> <span class="message-details">Message Details</span>
@endsection

@section('content')
    <div class="row">


<div class="container">
<div class="row message-wrapper rounded  mb-5">
    <div class="col-md-8 message-sideright">
        <div class="panel">
            <div class="panel-heading">
                <div class="media">
                    <img src="{{asset('storage' . '\images/reading.png')}}" alt="User Blank" class="img-circle avatar">
                    <div class="media-body">
                        <h4 class="media-heading">{{$guest->guest_name}}<small>(Guest)</small></h4>
                        <small>Since: {{Carbon\Carbon::parse($guest->created_at)->diffForHumans()}}</small>
                    </div>
                </div>
                <a title="Go back to inbox" href="{{url('admin/inbox')}}" class="back-btn"><i class="fa fa-share"></i></a>
                <form action="{{route('inbox.delete', $guest)}}" method="post">
                    @csrf
                    <button title="Delete this message" type="submit" class="btn delete-btn"><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </div>
            <div class="panel-body">
                <hr>
                <p>{{$guest->guest_message}}</p>
                <br>

            </div>
        </div>

    </div>
</div>
</div>






        {{-- <div class="card">
            <div class="card-header">

              <h5 class="card-title">Message Details <a title="Go back to inbox" class="back-btn" href="{{url('admin/inbox')}}">Back</a></h5>

            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <h5 class="name"><strong class="strong-color g-name">Guest Name:</strong> {{$guest->guest_name}}</h5>
                  <hr>
                  <h5 class="email"><strong class="strong-color g-email">Guest Email:</strong> {{$guest->guest_email}}</h5>
                  <hr class="line-under-customer-phone">
                </div>
                <div class="col-sm-6">
                  <p class="message"><strong class="strong-color strong-message">Guest Message:</strong></p>
                  <p class="view-message">{{$guest->guest_message}}</p>
                  <br>
                  <hr class="line">
                  <p class="message-time">Since: {{Carbon\Carbon::parse($guest->created_at)->diffForHumans()}}</p>
                  <form action="{{route('inbox.delete', $guest)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger delete-btn">Delete </button>
                </form>
                </div>
              </div>
            </div>
          </div> --}}
    </div>
@endsection
