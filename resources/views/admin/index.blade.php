@extends('admin.main')

<style>
    .fa-angle-right {
        font-size: 16px !important;
    }
    .text-xs {
        color: #388E3C !important;
    }
    .home {
        color: #ccc;
    }
</style>

@section('heading')
    Dashboard <i class="fa-solid fa-angle-right"></i> <span class="home">Home</span>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$categories_number}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-regular fa-rectangle-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                Books</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$books_number}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                Publishers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$publishers_number}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-book-open-reader fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                Authors</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$authors_number}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user-pen fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$orders_number}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-basket-shopping fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                Messages</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$messages_number}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-regular fa-comment-dots fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                Newsletter Subscriptions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$newsletter_subscriptions}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-envelopes-bulk fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
