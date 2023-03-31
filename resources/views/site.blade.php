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
        margin-top: 20px !important;

    }
    .score {
        position: relative;
        top: -10px;
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
    width: 300px !important;
    height: 35px !important;
    border: 1px solid #ccc;
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
}
.search:focus {
    border-color: #388E3C !important;
    outline: 0 !important;
    color: #388E3C;
}

.line {
    color: #388E3C !important;
}
.line2 {
    position: relative;
    bottom: -30px;
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
.books-title {
    margin-bottom: 35px;
}

.carousel-card {
    margin-right: 8px !important;
    background: #fff !important;
    border: none !important;
    box-shadow: 0 !important;
    width: 300px;
    height: 370px !important;
}

.carousel-card-header {
    color: #388E3C !important;
    text-align: center;
    background-color: #f1f7ef !important;
}

.carousel-card-img {
    width: 100% !important;
    height: 370px !important;
}

.card-last {
    width: 400px !important;
}

.fa-chevron-left , .fa-chevron-right {
    color: #388E3C;
    font-size: 25px;
    transform: translateY(50%)
}

.fa-chevron-left {
    margin-right: 260px;
}
.fa-chevron-right {
    margin-left: 260px;
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
    .buy-btn {
        background: #4FA72C !important;
        width: 40%;
        transform: translateX(50%);
        position: relative;
        top: -15px;
        margin-left: 30px;
        color: #fff;
    }
    .buy-btn:hover {
        background: #388E3C !important;
        color: #fff !important;
    }
    .category-text {
        color: #4FA72C;
    }
    .category-text:hover {
        text-decoration: none;
        color: #1DC88A ;
    }
    .author-text {
        position: relative;
        bottom: -10px;
    }
    .book-title {
        text-decoration: none;
        color: #388E3C;
    }
    .free-shipping {
        background-color: #4FA72C;
        color: #fff;
        padding: 4px 14px;
        position: absolute;
        left: -30px;
        top: -10px;
        rotate: -30deg;
        letter-spacing: 2px;
        border-radius: 4px;
    }

@media screen and (max-width: 767px) {
    .top-header {
        display: none;
    }
    .carousel {
        margin-left: 70px !important;
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
                <a class="explore" href="#books">Explore Our Books Now</a>
            </ul>
          </div>
        </div>
      </div>
</div>

    <div class="container">
    <hr class="line">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <h4 class="categories-title">Browse our categories</h4>
              <div class="carousel-item active">
                <div class="row">
                    <div class="card-group">
                        <div class="card carousel-card">
                            <h4 class="card-header carousel-card-header">Learn Programming</h4>
                                <img class="card-img carousel-card-img" src="{{'storage' . '\images/programming-cover.jpg'}}" class="card-img-top" alt="Programming Picture Cover">
                        </div>
                        <div class="card carousel-card">
                            <h4 class="card-header carousel-card-header">Information Security</h4>
                          <img class="card-img carousel-card-img" src="{{'storage' . '\images/security-cover.jpeg'}}" class="card-img-top" alt="...">
                        </div>
                        <div class="card carousel-card">
                            <h4 class="card-header carousel-card-header">Networking Books</h4>
                          <img class="card-img carousel-card-img" src="{{'storage' . '\images/network-cover.jpeg'}}" class="card-img-top" alt="...">
                        </div>
                      </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                    <div class="card-group">
                        <div class="card carousel-card">
                            <h4 class="card-header carousel-card-header">Artificial intelligence</h4>
                          <img class="card-img carousel-card-img" src="{{'storage' . '\images/ai-cover.jpeg'}}" class="card-img-top" alt="...">
                        </div>
                        <div class="card carousel-card">
                            <h4 class="card-header carousel-card-header">Cryptocurrencies Books</h4>
                          <img class="card-img carousel-card-img" src="{{'storage' . '\images/crypto-cover.jpeg'}}" class="card-img-top" alt="...">

                        </div>
                        <div class="card carousel-card">
                            <h4 class="card-header carousel-card-header">Design Books</h4>
                          <img class="card-img carousel-card-img" src="{{'storage' . '\images/design-cover.jpeg'}}" class="card-img-top" alt="...">
                        </div>
                      </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                    <div class="card-group">
                        <div class="card carousel-card">
                            <h4 class="card-header carousel-card-header">Art Books</h4>
                          <img class="card-img carousel-card-img" src="{{'storage' . '\images/art-cover.jpeg'}}" class="card-img-top" alt="...">
                        </div>
                        <div class="card carousel-card">
                            <h4 class="card-header carousel-card-header">Marketing Books</h4>
                          <img class="card-img carousel-card-img" src="{{'storage' . '\images/e-marketing-cover.jpeg'}}" class="card-img-top" alt="...">
                        </div>
                        <div class="card carousel-card">
                            <h4 class="card-header carousel-card-header">Entrepreneurship Books</h4>
                          <img class="card-img carousel-card-img" src="{{'storage' . '\images/entrepreneurship-cover.jpeg'}}" class="card-img-top" alt="...">
                        </div>
                      </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                    <div class="card-group card-last">
                        <div class="card carousel-card">
                            <h4 class="card-header carousel-card-header">Remote Working Advice Books</h4>
                            <img class="card-img carousel-card-img" src="{{'storage' . '\images/freelancing-cover.jpeg'}}" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
              <i class="fa-solid fa-chevron-left"></i>

            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
          </div>
          <hr class="line line2 pt-5">

            <div class="mt-4 mb-2">
                <h4 class="books-title">{{$title}}</h4>
                <div id="books" class="row">
                    @if($books->count())
                        @foreach ($books as $book)
                        {{-- A Condition to check if the store is not out of books --}}
                            @if($book->number_of_copies > 0)
                                <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                                    <div class="card mb-5 ms-2 card-main">
                                        <p class="free-shipping">Free Shipping</p>
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
                                                    <p class="book-title mb-0">{{$book->title}}</p>
                                                </h6>
                                                {{-- displaying all books related to the chosen category --}}
                                                <a href="{{route('show-books-category', $book->category)}}" class="category-text" data-abc="true">
                                                    {{$book->category->name}}
                                                </a>
                                                {{-- Displaying author name --}}
                                                <p class="author-text">By:
                                                    @foreach($book->authors as $author)
                                                        {{$loop->first ? '' : ' and'}}
                                                        {{$author->name}}
                                                    @endforeach
                                                </p>
                                            </div>
                                            <h4 class="price mb-3 font-weight-semibold">{{$book->price}} $</h4>
                                            <div>
                                                <span class="score">
                                                    <div class="score-wrap">
                                                        <span class="stars-active" style="width:{{$book->rate()*20}}%">
                                                            <i class="fa-regular fa-star" aria-hidden="true"></i>
                                                            <i class="fa-regular fa-star" aria-hidden="true"></i>
                                                            <i class="fa-regular fa-star" aria-hidden="true"></i>
                                                            <i class="fa-regular fa-star" aria-hidden="true"></i>
                                                            <i class="fa-regular fa-star" aria-hidden="true"></i>
                                                        </span>
                                                        <span class="stars-inactive">
                                                            <i class="fa-regular fa-star" aria-hidden="true"></i>
                                                            <i class="fa-regular fa-star" aria-hidden="true"></i>
                                                            <i class="fa-regular fa-star" aria-hidden="true"></i>
                                                            <i class="fa-regular fa-star" aria-hidden="true"></i>
                                                            <i class="fa-regular fa-star" aria-hidden="true"></i>
                                                        </span>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        {{-- A URL to the book details page when users click on buy now --}}
                                        <a href="{{url("book/details/$book->id")}}" class="buy-btn btn">Buy Now <i class="fa-solid fa-cart-arrow-down"></i></a>
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
let items = document.querySelectorAll(".carousel .carousel-item");
items.forEach((el) => {
  const minPerSlide = 4;
  let next = el.nextElementSibling;
  for (var i = 1; i < minPerSlide; i++) {
    if (!next) {
      // wrap carousel by using first child
      next = items[0];
    }
    let cloneChild = next.cloneNode(true);
    el.appendChild(cloneChild.children[0]);
    next = next.nextElementSibling;
  }
});
</script>
