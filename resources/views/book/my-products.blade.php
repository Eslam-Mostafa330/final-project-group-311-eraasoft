@extends('layouts.main')

@section('head')
    <style>
        .purchase-btn, .book-details-btn {
            background: #4FA72C !important;
            color: #fff !important;
        }
        .purchase-btn:hover, .book-details-btn:hover {
            background: #388E3C !important;
        }
        .main-header {
            text-align: center;
            color: #388E3C ;
        }
        .footer {
            margin-top: 100px !important;
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <a class="purchase-btn btn mb-5" href="{{url('/#books')}}"><i class="fa-solid fa-plus"></i> Purchase a book</a>

        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <h4 class="main-header mb-3">Books Recently Purchased</h4>
                @if($my_books->count() > 0)
                @foreach ($my_books as $book)
                <div class="row p-2 bg-white border rounded">
                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{asset('storage/' . $book->cover_image)}}"></div>
                    <div class="col-md-6 my-auto">
                        <h5><a href="{{url("book/details/$book->id")}}">{{$book->title}}</a></h5>
                        <div class="d-flex flex-row">
                            <div class="ratings mr-2">
                                <span class="score">
                                    <div class="score-wrap">
                                        <span class="stars-active" style="width:{{$book->rate()*20}}%">
                                            <i class="fa-regular fa-star " aria-hidden="true"></i>
                                            <i class="fa-regular fa-star " aria-hidden="true"></i>
                                            <i class="fa-regular fa-star " aria-hidden="true"></i>
                                            <i class="fa-regular fa-star " aria-hidden="true"></i>
                                            <i class="fa-regular fa-star " aria-hidden="true"></i>
                                        </span>
                                        <span class="stars-inactive">
                                            <i class="fa-regular fa-star " aria-hidden="true"></i>
                                            <i class="fa-regular fa-star " aria-hidden="true"></i>
                                            <i class="fa-regular fa-star " aria-hidden="true"></i>
                                            <i class="fa-regular fa-star " aria-hidden="true"></i>
                                            <i class="fa-regular fa-star " aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="mt-1 mb-1 spec-1"><span>{{$book->category->name}}<br></span></div>
                        <div class="mt-1 mb-1 spec-1"><span>Date of purchase: {{$book->pivot->created_at->diffForHumans()}}<br></span></div>
                        <p class="text-justify text-truncate para mb-0">Number of copies: {{$book->pivot->number_of_copies}}<br><br></p>
                    </div>
                    <div class="align-items-center align-content-center col-md-3 border-left my-auto">
                        <div class="d-flex flex-row align-items-center">
                            <h4 class="mr-1">{{$book->pivot->price}}$</h4>
                        </div>
                        <h6 class="text-success">Total Price: {{$book->pivot->number_of_copies * $book->pivot->price}}$</h6>
                        <div class="d-flex flex-column mt-4">
                            <a type="button" class="btn btn-outline-success btn-sm book-details-btn" href="{{url("book/details/$book->id")}}">Book Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="alert alert-info mx-auto" role="alert">
                    There are no books have been purchased yet.
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
