@extends('layouts.main')

@section('head')
    <style>
        .top-header {
            width: 100% !important;
            position: relative;
            top: -25px;
        }
        .top-header-main {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        background-color: #dcefd6;
        height: 70px;
        box-shadow: 0 3px 3px #f1f7ef;
    }

    .price {
        position: relative;
        bottom: -13px !important;
    }
.explore {
    margin-left: 300px;
    color: #388E3C;
    font-size: 18px;
}
.explore:hover {
    text-decoration: none !important;
}

.top-header-text {
    position: relative !important;
    bottom: -7px !important;
    color: #388E3C;
    font-size: 18px;
}

.search {
    width: 230px !important;
    height: 35px !important;
    border: 1px solid #ccc;
}
.search:focus {
    border-color: #388E3C !important;
    outline: 0 !important;
    color: #388E3C;
}

.line {
    color: #388E3C !important;
}

.search-btn {
    background-color: #4FA72C;
    position: relative;
    width: 60px;
    left: -17px;
    height: 35px !important;
    border: none;
    border-end-end-radius: 5px;
    border-start-end-radius: 5px;
    color: #fff;
    transition: .3s;
}

.search-btn:hover {
    background-color: #388E3C;
}

.books-title, .categories-title {
    color: #4FA72C;
}

@media screen and (max-width: 767px) {
    .top-header {
        display: none;
    }
}


</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="top-header">
        <div>
          <div class="row">
            <ul class="top-header-main list-inline">
                <p class="top-header-text  ms-1">Buy One, Get One 50% Off!</p>
                <a class="explore" href="{{url('/#books')}}">Explore Our Books Now</a>
            </ul>
          </div>
        </div>
      </div>
</div>
    <div class="container">
        <hr class="line">
            <div class="mt-4 mb-2">
                <h4 class="books-title">{{$title}}</h4>
                <div id="books" class="row">
                    @if($books->count())
                        @foreach ($books as $book)
                        {{-- A Condition to check if the store is not out of books --}}
                            @if($book->number_of_copies > 0)
                                <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                                    <div class="card mb-4 card-main">
                                        <div>
                                            <div class="card-img-actions">
                                                {{-- A URL to the book details page when users click on the book cover --}}
                                                <a href="{{url("book/details/$book->id")}}">
                                                    <img src="{{asset('storage/' . $book->cover_image)}}" class="card-img img-fluid" width="96" height="350" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body bg-light text-center">
                                            <div class="mb-2">
                                                <h6 class="font-weight-semibold mb-2 card-title">
                                                    {{-- A URL to the book details page when users click on the book title --}}
                                                    <a href="{{url("book/details/$book->id")}}" class="text-default mb-0" data-abc="true">{{$book->title}}</a>
                                                </h6>
                                                {{-- A Route that displays all books related to the chosen category --}}
                                                <a href="{{route('show-books-category', $book->category)}}" class="text-muted" data-abc="true">
                                                    {{$book->category->name}}
                                                </a>
                                            </div>
                                            <h3 class="price mb-3 font-weight-semibold">{{$book->price}} $</h3>
                                            <div>
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
                                            {{-- <div class="text-muted mb-3">34 reviews</div> --}}
                                            {{-- <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button> --}}
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="alert alert-info" role="alert">
                                Oops We are currently out of books, please come back soon.
                            </div>

                            @endif
                        @endforeach
                    @else
                        <div class="alert alert-info" role="alert">
                            There's no books.
                        </div>
                    @endif
                </div>
            </div>
            {{$books->links()}}

    </div>


@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

</script>
