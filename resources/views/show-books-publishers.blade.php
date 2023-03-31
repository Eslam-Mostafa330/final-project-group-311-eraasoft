@extends('layouts.main')

@section('head')
<style>
.main-title {
    color: #4FA72C;
}

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

.line {
    color: #388E3C !important;
}

.page-link {
        margin-bottom: 6px !important;
    }
    .page-item:not(:first-child) .page-link {
        color: #1DC88A !important;
        box-shadow: none !important;
    }
    .page-item:not(:first-child) .page-link:hover {
        color: #388E3C !important;
    }
    .page-item:not(:last-child) .page-link:hover {
        color: #388E3C !important;
    }
    .page-item:not(:last-child) .page-link {
        color: #1DC88A  !important;
        box-shadow: none !important;
    }
    .page-item.active .page-link {
        background: #388E3C !important;
        color: #fff !important;
        border-color:  #388E3C !important;
        box-shadow: none !important;
    }
    .page-item.active .page-link:hover {
        color: #fff !important;
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
                <a class="explore" href="/#books">Explore All Books Now!</a>
            </ul>
          </div>
        </div>
      </div>
</div>


<div class="container">
<hr class="line">
    <div class="mt-4 mb-2">
        <h4 class="main-title">{{$title}}</h4>
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
