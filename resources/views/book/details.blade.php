@extends('layouts.main')

<style>

@import url('https://fonts.googleapis.com/css2?family=Bad+Script&display=swap');

  .addCart {
    font-family: 'Bad Script', cursive !important;
    font-weight: bold !important;
  }

    .table, .card, .card-body, tr, td, .card-header {
        background-color: #fff !important;
    }
     .card-details, .card-details-body {
        background-color: #fff !important;

    }
    .img-thumbnail {
        height: 600px !important;
        width: 500px !important;
    }

    .add-successfully, .error-while-add {
        position: relative;
        left: -187px;
        bottom: -60px;
        color: green;
        font-size: 16px;
        font-weight: bold;
    }
    .error-while-add {
        color: red !important;
    }
    .card-header {
        color: #4FA72C !important;
        font-weight: bold;
        font-size: 17px;
    }
    .heart {
        color: red;
    }
    .rate-book {
        color: #388E3C;
    }
    .main {
        margin-bottom: 50px !important;
    }
    .delivery-info-alert {
        margin-bottom: 0px !important;
        color: red !important;
        display: flex;
        flex-direction: row;
        padding: 15px !important;
        background: #fff !important;
    }
    .delivery-info-btn, .login-btn {
        margin-left: auto;
        text-decoration: none;
        color: #4FA72C;
        border: 1px solid #4FA72C;
        padding: 5px 9px;
        border-radius: 4px;
    }
    .delivery-info-btn {
        margin-top: 10px;
        padding: 8px 15px;
        border-top-left-radius: 4px !important;
        border-bottom-left-radius: 4px !important;
    }
    .login-btn {
        padding: 7px 15px;
        position: relative;
        right: -5px;
    }
    .delivery-info-btn:hover, .login-btn:hover {
        background: #4FA72C;
        color: #fff;
        transition: .2s;
    }
    .delivery-info-text {
        padding-top: 5px !important;
        font-size: 17px;
    }

    .icon-hover:hover {
  border-color: #3b71ca !important;
  background-color: white !important;
  color: #3b71ca !important;
}

.icon-hover:hover i {
  color: #3b71ca !important;
}
.category-text {
    color: #4FA72C;
    font-size: 16px;
}
.category-text:hover {
    text-decoration: none;
}
.add-to-cart-main {
    display: flex !important;
    width: 450px !important;
}

.quantity {
    width: 60px !important;
}
.delivery-info-alert {
    width: 450px !important;
}
.ratings-reviews-main {
    height: 250px !important;
}
.ratings-btn {
    background: #4FA72C !important;
    color: #fff !important
}
</style>

@section('content')
<!-- content -->
<section class="py-0 p-3">
  <div class="container">
    <div class="row gx-0">

      <aside class="col-lg-6">
        <div class=" mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="{{asset('storage/' . $book->cover_image)}}">
            <img style="width: 100%; height: 100vh; margin: auto;" class="rounded-4 fit img-thumbnail" src="{{asset('storage/' . $book->cover_image)}}" />
          </a>
        </div>
      </aside>

      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
            {{$book->title}} <br />
          </h4>
          <a class="category-text" href="{{route('show-books-category', $book->category)}}">{{$book->category->name}}</a>

          <div class="d-flex flex-row my-3">
            <div class="text-warning mb-1 me-2">
                    <span class="score mb-1">
                        <div class="score-wrap">
                            <span class="stars-active" style="width:{{$book->rate()*20}}%">
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                            </span>
                            <span class="stars-inactive">
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                            </span>
                        </div>
                    </span>
                    @if ($book->ratings()->count() == 0)
                        <span>Not rated yet</span>
                    @elseif ($book->ratings()->count() == 1)
                        <span>Rated by: 1 customer</span>
                    @else
                        <span>Rated by: {{$book->ratings()->count()}} customers</span>
                    @endif
            </div>

            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>{{$book->shopping()->count()}} orders</span>
            @if($book->number_of_pages > 0)
                <span class="text-success ms-2">In Stock</span>
            @else
                <span class="text-danger ms-2">Out Of Stock</span>
            @endif
          </div>

          <div class="mb-3">
            <span class="h5">{{$book->price}} $</span>
          </div>

          <p>
            {{$book->description}}
          </p>

          <div class="row">
            <dt class="col-3">By:</dt>
            <dd class="col-9">
                @if($book->authors()->count() > 0)
                        @foreach($book->authors as $author)
                            {{$loop->first ? '' : ' and'}}
                            {{$author->name}}
                        @endforeach
                @endif
            </dd>

            <dt class="col-3">Pages:</dt>
            <dd class="col-9">{{$book->number_of_pages}}</dd>

            <dt class="col-3">Published at:</dt>
            @if($book->publish_year)
                <dd class="col-9">{{$book->publish_year}}</dd>
            @else
                <dd class="col-9">Not Provided</dd>
            @endif

            <dt class="col-3">Publisher:</dt>
            <dd class="col-9">{{$book->publisher->name}}</dd>

            <dt class="col-3">ISBN:</dt>
            <dd class="col-9">{{$book->isbn}}</dd>

            <dt class="col-3">Copies left:</dt>
            <dd class="col-9">{{$book->number_of_copies}}</dd>
          </div>
          <hr />

          <div class="row mb-4 add-to-cart-main">
            <div class=" mb-3">
              <div class="input-group mb-3" >
                @if (auth()->check())
                    {{-- Displaying a warning message to the authenticated user if he doesn't fill out
                        his delivery information yet and also a link to the delivery info page --}}
                        @if(auth()->user()->full_name == null || auth()->user()->phone == null ||  auth()->user()->address_1 == null)
                            <div class="delivery-info-alert alert alert-secondary" role="alert">
                                <span class="delivery-info-text">To purchase this book, you will need to complete your delivery information.</span>
                                {{-- <a class="delivery-info-btn" href="{{url('profile/delivery-info')}}">Delivery Information</a> --}}
                            </div>
                            <a class="delivery-info-btn" href="{{url('profile/delivery-info')}}">Delivery Information</a>
                        @else
                        {{-- Add books to cart by authenticated users with the maximum number of the available quantity in stock --}}
                            @auth
                                <div class="form text-center mb-2" id="form">
                                    <input id="bookId" type="hidden" value="{{ $book->id }}">
                                    <span class="text-muted mb-2"><input class="form-control d-inline mx-auto quantity" id="quantity" name="quantity" type="number" value="1" min="1" max="{{ $book->number_of_copies }}" style="width:10%;" required></span>
                                    <button type="submit" class="btn bg-cart addCart mb-1"><i class="fa fa-cart-plus"></i> Take me home <span class="heart">&#9829;</span></button>
                                </div>
                                <span class="add-successfully" id="addSuccessfully"></span>
                                <span class="error-while-add" id="errorWhileAdd"></span>
                            @endauth
                        @endif
                @else
                    {{-- Display a login route and warning message if the user has not authenticated yet --}}
                    <div class="delivery-info-alert alert alert-secondary" role="alert">
                        <span class="delivery-info-text">Please login to add this book to your cart.</span>
                        <a class="login-btn" href="{{url('login')}}">Login</a>
                    </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </main>
      {{-- <hr> --}}
    </div>
  </div>
</section>
<!-- content -->

<section class="bg-light border-top py-4 ">
  <div class="container">
    <div class="row gx-4">
      <div class="col-lg-8 mb-4">
        <div class="border rounded-2 px-3 py-3 ratings-reviews-main">

          <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
            <li class="nav-item d-flex" role="presentation">
              <a class="ratings-btn nav-link d-flex align-items-center justify-content-center w-100 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" href="#ex1-pills-1" role="tab" aria-controls="pills-home" aria-selected="true">Ratings</a>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
              <p>
                {{-- Condition to check how many customers have rated this book,
                    and display a different output based on the condition result --}}
                @if ($book->ratings()->count() == 0)
                    <h5>Be the first one to rate this book!</h5>
                @elseif ($book->ratings()->count() == 1)
                    <h5>This book has currently been rated by one customer. You can also give it a rating</h5>
                @else
                    <h5>This book has currently been rated by {{$book->ratings()->count()}} customers. You can also give it a rating</h5>
                @endif
                {{-- The book can only be rated by authenticated users who have already purchased it --}}
                @auth
                <h4 class="mb-3 rate-book mt-3">Rate this book</h4>
                    @if($findBook)
                    {{-- To check if the user bought the book --}}
                    {{-- Display the stars with specific color if the authenticated user already rated the book, else display stars with different color --}}
                        @if(auth()->user()->rated($book))
                            <div class="rating" id="rate">
                                <span class="rating-star {{ auth()->user()->bookRating($book)->value == 5 ? 'checked' : '' }}" data-value="5"></span>
                                <span class="rating-star {{ auth()->user()->bookRating($book)->value == 4 ? 'checked' : '' }}" data-value="4"></span>
                                <span class="rating-star {{ auth()->user()->bookRating($book)->value == 3 ? 'checked' : '' }}" data-value="3"></span>
                                <span class="rating-star {{ auth()->user()->bookRating($book)->value == 2 ? 'checked' : '' }}" data-value="2"></span>
                                <span class="rating-star {{ auth()->user()->bookRating($book)->value == 1 ? 'checked' : '' }}" data-value="1"></span>
                            </div>
                        @else
                            <div class="rating">
                                <span class="rating-star" data-value="5"></span>
                                <span class="rating-star" data-value="4"></span>
                                <span class="rating-star" data-value="3"></span>
                                <span class="rating-star" data-value="2"></span>
                                <span class="rating-star" data-value="1"></span>
                            </div>
                        @endif
                    @else
                        <div class="alert alert-info mt-4" role="alert">
                            In order to rate a book, you need to purchase it first.
                        </div>
                    @endif
                @endauth
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@section('script')
<script>
    $('.rating-star').click(function() {

        var submitStars = $(this).attr('data-value');

        $.ajax({
            type: 'post',
            url: {{ $book->id }} + '/rate',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'value' : submitStars
            },
            success: function() {
                location.reload();
            },
            error: function() {
                document.getElementById("rate").innerHTML = "Oops something went wrong!";
                document.getElementById("rate").style.color = "red";
                document.getElementById("rate").style.fontSize = "18px";
            },
        });
    });
</script>

<script>
$('.addCart').on('click', function(event) {
            var token = '{{ Session::token() }}';
            var url = "{{ route('cart.add') }}";

            event.preventDefault();

            var bookId = $(this).parents(".form").find("#bookId").val()
            var quantity = $(this).parents(".form").find("#quantity").val()

            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    quantity: quantity,
                    id: bookId,
                    _token: token
                },
                success : function(data) {
                    $('span.badge').text(data.number_of_product);
                    document.getElementById("addSuccessfully").innerHTML = "Book added successfully!";
                },
                error: function() {
                    document.getElementById("errorWhileAdd").innerHTML = "Something went wrong!";
                }
            })
        });
</script>
@endsection



