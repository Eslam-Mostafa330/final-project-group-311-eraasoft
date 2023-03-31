<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>My Bookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/app/css')}}">
    <style>
        .card {
            height: 500px !important;
            margin-top: 9px !important;
        }
        .card .card-title {
            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
        }
        .card-img {
            height: 275px !important;
        }
        .card, .card-body {
            background-color: #f1f7ef !important;
            border-color: #f1f7ef !important;
            box-shadow: 0 3px 3px #f1f7ef;
        }
        .card-details-body {
            background-color: #fff;
        }
        .card-main:hover{
            position: relative;
            top: -5px;
        }

        body {
            background-color: #fff;
            line-height: 1.4;
        }
        .navbar {
            background-color: #4FA72C !important;
            padding: 10px;
            height: 75px;
        }
        .dropdown-menu {
            /* position: relative;
            right: -19px !important; */
            background: #f1f7ef !important;
            border: none !important;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .navbar a {
            color: #fff;
            font-size: 16px !important;
        }
        .navbar a:hover {
            color: #dceed6;
        }
        .dashboard {
            padding-bottom: 10px !important;
        }
        .dashboard, .profile, .logout, .delivery {
            color: #000 !important;
        }
        .dashboard:hover, .profile:hover, .logout:hover, .delivery:hover {
            color: #fff!important;
            background: #4FA72C !important;
            border-radius: 4px !important;
            transition: .1s;
        }
        .username {
            color: #388E3C !important;
            font-weight: bold;
            border-bottom: 1px solid #4FA72C;
            padding: 4px;
        }
        .user-image {
            width: 45px;
            height: 45px;
        }
        .score {
            display: block;
            font-size: 16px;
            position: relative;
            overflow: hidden;
        }
        .score-wrap {
            display: inline-block;
            position: relative;
            height: 19px;
        }
        .score .stars-active {
            color: #ffca00;
            position: relative;
            z-index: 20;
            display: block;
            overflow: hidden;
            white-space: nowrap;
        }
        .score .stars-inactive {
            color: #ccc;
            position: absolute;
            top: 0;
            left: 0;
        }

        .rating {
            overflow: hidden;
            display: inline-block;
            position: relative;
            font-size: 20px;
        }
        .rating-star {
            padding: 0 5px;
            margin: 0;
            cursor: pointer;
            display: block;
            float: right;
        }
        .rating-star:after {
            position: relative;
            font-family: "Font Awesome 6 Free";
            content: '\f005';
            color: #ccc;
        }
        .rating-star.checked ~ .rating-star:after,
        .rating-star.checked:after {
            content: '\f005';
            color: #FFCA00;
        }
        .rating:hover .rating-star:after {
            content: '\f005';
            color: #ccc;
        }
        .rating-star:hover ~ .rating-star:after,
        .rating .rating-star:hover:after {
            content: '\f005';
            color: #FFCA00;
        }

        .bg-cart {
            background: #4FA72C;
            color: #fff;
        }
        .bg-cart:hover {
            background-color: #388E3C !important;
            color: #fff;
        }

        .list-group-item {
        border-bottom-color: #388E3C !important;
    }


.fa-angle-down {
    font-size: 13px;
    margin-left: 2px;
    position: relative;
    bottom: -2px;
}

.drop-menu-child {
  margin-bottom: 5px;
  width: max-content !important;
  z-index: 100 !important;
}
.drop-menu-child-author {
    width: 197px !important;
}

.drop-menu-child li {
      border-bottom: 1px solid #4FA72C !important;
}
.drop-menu-child li:last-child {
    border-bottom: none !important;
}


.drop-menu-child li a {
  height: 40px;
  padding-top: 10px!important;
  font-weight: normal;
  color: #4FA72C  !important;
}


.dropdown-toggle::after {
  display: none;
}

.drop-menu-parent a:hover {
    color: #fff !important;
}

.nav-item a:hover {
  color: #04AA6D !important;
  background-color: #4FA72C;
  color: #fff !important;
  border-radius: 3px;
}

.nav-item a.active {
  color: #fff!important;
  border-radius: 3px;
}

.nav-item a.active:hover {
  color: #fff !important;
  border-radius: 3px;
}

.dropdown-menu li a.dropdown-item:hover{
  transition: 0.2s !important;
}


.input-group-small {
    margin-top: 50px !important;
    margin-left: auto !important;
    margin-right: auto !important;
}

.nav-item a:hover {

  color: #dceed6 !important;
}

a {
      font-size:14px;
      font-weight:700
    }

    .form-control {
      outline:none !important;
      box-shadow: none !important;
    }

    .search-bar {
        height: 30px !important;
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
        outline: none !important;
        border: 0 !important;
    }

    .search-bar:focus {
        border-color: #388E3C !important;
        color: #388E3C;
    }

button.search-btn {
    background-color: #388E3C;
    position: relative;
    width: 45px !important;
    height: 31px !important;
    border: none;
    border-end-end-radius: 5px;
    border-start-end-radius: 5px;
    color: #fff;
    transition: .3s;
}
.badge {
    background: #f1f7ef;
    color: #4FA72C;
}

button.search-btn:hover {
    color: #ccc;
}

.dropdown-menu {
    margin-right: -25px !important;
}

.logo {
    width: 53px;
    height: 53px;
    position: relative;
    left: -20px;
}

.footer {
    background: #4FA72C;

}


.logo-img {
    width: 50px !important;
    height: 50px !important;
}

.footer-img-hr {
    width: 40% !important;
    margin-left: auto !important;
    margin-right: auto !important;
    position: relative;
    top: -5px;
}
.footer-link {
    text-decoration: none !important;
}
.footer-link:hover {
    color: #fff !important;
    text-decoration: underline !important;
    transition: 0.2s;
}

.fa-cc-mastercard, .fa-cc-visa {
    position: relative;
    top: -10px;
}

.footer-text {
    color: #fff;
    margin: auto;
}
.fa-heart {
    color: red;
}

.email-input::placeholder {
    color: #388E3C;
}

a.nav-link:hover:not(:active) {
    color: #e1dddd !important;
    /* border-bottom: 1px solid #e1dddd; */
}
a.nav-link:focus:not(:active) {
    color: #e1dddd !important;
    /* border-bottom: 1px solid #e1dddd; */
}

.validate-error::placeholder {
    color: red !important;
    font-size: 16px;
}

@media(max-width: 992px) {
    .nav-item {
        background: #4FA72C;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        margin-bottom: 5px;
        border-bottom: 1px solid #fff;
    }

.navbar-main {
    margin-top: 35px;
    background: #4FA72C;
    padding-left: 10px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px !important;
    margin-top: 40px !important;
}

  a.nav-link.dropdown-toggle {
    margin-top: 10px;
  }

  .drop-menu-child {
    width: 190px !important;
    z-index: 1000 !important;
    margin-left: 120px;
    /* border: none !important; */
  }

  .search-bar {
    margin-left: auto;
    margin-right: auto;
  }
}

    </style>
    @yield('head')
</head>
<body>
    @include('sweetalert::alert')
    <div>
        <nav class="navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{'/'}}"><img class="logo" src="{{'\storage' . '\images/logo.png'}}" alt="Logo"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="search-bar d-lg-none d-sm-block d-xs-block">
                {{-- Search method --}}
                <form action="{{ route('search') }}" method="get">
                    <div class="search-bar input-group-small mt-4 ms-5">
                        <input name="search" type="text" class="search-bar" placeholder=" Search for book..">
                        <button type="submit" class="search-btn"><i class="fa-solid  fa-magnifying-glass"></i></button>
                    </div>
                </form>
              </div>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="d-none d-lg-block">
                    {{-- Search method --}}
                    <form action="{{ route('search') }}" method="get">
                        <div class="search-bar input-group mt-3">
                            <input name="search" type="text" class="search-bar" placeholder=" Search for book..">
                            <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>

                <ul class="navbar-nav navbar-main mx-auto">
                    <li class="nav-item dropdown drop-menu-parent">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-regular fa-rectangle-list"></i>
                          Categories<i class="fa-solid fa-angle-down"></i>
                         </a>
                         <ul class="dropdown-menu mt-3 drop-menu-child start-50 translate-middle-x">
                          @foreach ($categories as $category)
                          <li><a class="dropdown-item" href="{{url("show-books-category/$category->id")}}">{{$category->name}} ({{$category->books->count()}})</a></li>
                          @endforeach
                       </ul>
                      </li>

                      <li class="nav-item dropdown drop-menu-parent">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-book-open-reader"></i>
                           Publishers<i class="fa-solid fa-angle-down"></i>
                         </a>
                         <ul class="dropdown-menu mt-3 drop-menu-child start-50 translate-middle-x">
                          @foreach ($publishers as $publisher)
                          <li><a class="dropdown-item" href="{{url("show-books-publisher/$publisher->id")}}">{{$publisher->name}} ({{$publisher->books->count()}})</a></li>
                          @endforeach
                       </ul>
                      </li>

                      <li class="nav-item dropdown drop-menu-parent">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user-pen"></i>
                           Authors<i class="fa-solid fa-angle-down"></i>
                         </a>
                         <ul class="dropdown-menu drop-menu-child-author mt-3 drop-menu-child start-50 translate-middle-x">
                          @foreach ($authors as $author)
                          <li><a class="dropdown-item" href="{{url("show-books-authors/$author->id")}}">{{$author->name}} ({{$author->books->count()}})</a></li>
                          @endforeach
                       </ul>
                      </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('contact/index')}}">
                            <i class="fa-solid fa-envelope"></i>
                            Contact
                        </a>
                    </li>

                    {{-- Link to the cart page and will only appear for authenticated users --}}
                    @auth
                        <li class="nav-item cart-nav">
                            <a class="nav-link" href="{{route('cart.view')}}">
                                <i class="fas fa-shopping-cart"></i>

                                {{-- If number of products of the authenticated user was greater then 0
                                    will display it on a span, otherwise will display 0
                                    (meaning the user doesn't add book to their cart yet) --}}
                                @if(Auth::user()->booksInCart()->count() > 0)
                                    <span class="badge">{{ Auth::user()->booksInCart()->count() }}</span>
                                @else
                                    <span class="badge">0</span>
                                @endif
                            </a>
                        </li>
                    @endauth
                </ul>


                <ul class="navbar-nav ms-auto side">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">{{__('Login')}}</a>
                        </li>
                        @if(Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('register')}}">{{__('Register')}}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown justify-content-start">
                            <a id="navbarDropdown" class="nav-link" href="#" data-bs-toggle="dropdown">
                                <img class="user-image rounded-circle object-cover" src="{{Auth::user()->profile_photo_url}}" alt="{{Auth::user()->name}}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end px-2 text-left mt-2">
                                <div class="flex items-center px-4 mt-1">
                                    <div>
                                        <div class="font-medium text-base username mb-3 text-center">{{ Auth::user()->name }}</div>
                                    </div>
                                </div>

                                {{-- display a link to the dashboard If the user was administrator  --}}
                                @can('admin_page')
                                    <a href="{{route('admin.index')}}" class="dropdown-item dashboard mt-3 pt-2 pb-2">Dashboard</a>
                                @endcan
                                <div>

                                    @auth
                                    <div>
                                        <x-responsive-nav-link href="{{ route('my-products') }}" class="dropdown-item profile">
                                            <i class="fa-solid fa-bag-shopping"></i> {{ __('My Purchases') }}
                                        </x-responsive-nav-link>
                                    </div>
                                    @endauth

                                    <div class="mt-1 ">
                                        <!-- Account Management -->
                                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="dropdown-item profile">
                                            <i class="fa-solid fa-user"></i> {{ __('Profile') }}
                                        </x-responsive-nav-link>
                                    @auth
                                        <x-responsive-nav-link href="{{ route('profile.delivery-info') }}" class="dropdown-item delivery">
                                            <i class="fa-solid fa-truck"></i> {{ __('Delivery Information') }}
                                        </x-responsive-nav-link>
                                    @endauth

                                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                            <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                                {{ __('API Tokens') }}
                                            </x-responsive-nav-link>
                                        @endif

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf

                                            <x-responsive-nav-link href="{{ route('logout') }}" class="mt-1 dropdown-item logout"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                                <i class="fa-solid fa-right-from-bracket"></i> {{ __('Log Out') }}
                                            </x-responsive-nav-link>
                                        </form>

                                        <!-- Team Management -->
                                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                            <div class="border-t border-gray-200"></div>

                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Team') }}
                                            </div>

                                            <!-- Team Settings -->
                                            <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                                {{ __('Team Settings') }}
                                            </x-responsive-nav-link>

                                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                                    {{ __('Create New Team') }}
                                                </x-responsive-nav-link>
                                            @endcan

                                            <div class="border-t border-gray-200"></div>

                                            <!-- Team Switcher -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Switch Teams') }}
                                            </div>

                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-switchable-team :team="$team" component="responsive-nav-link" />
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endguest
                </ul>
              </div>
            </div>
          </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<!-- Footer -->
<footer class="footer text-center text-white mt-5">
    <div class="container p-4">
      <section>
        <form action="{{url('main/store')}}" method="POST" id="addForm" onsubmit="return validateForm()">
            @csrf
          <div class="row d-flex justify-content-center">
            <div class="col-md-5 col-12">
              <div class="form-outline form-white mb-4">
                <input type="email" id="newsletter_email" name="newsletter_email" id="form5Example21" class="form-control email-input" placeholder="Sign up for our newsletter"/>
              </div>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-outline-light mb-4 subscribe-btn">
                Subscribe
              </button>
            </div>
          </div>
        </form>
      </section>

      <!-- Section: Links -->
      <section class="footer-links">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <ul class="list-unstyled mb-0">
                    <a href="{{'/'}}" class=" logo-main">
                        <img class="logo-img" src="{{'\storage' . '\images/logo.png'}}" alt="Logo">
                    </a>
                    <hr class="footer-img-hr">
                    <i class="fab fa-lg fa-cc-visa text-white"></i>
                    <i class="fab fa-lg fa-cc-mastercard text-white"></i>
                </ul>
              </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5>Store</h5>
                <ul class="list-unstyled mb-0">
                    <li><a class="text-white-50 footer-link" href="{{url("my-products")}}">My orders</a></li>
                    <li><a class="text-white-50 footer-link" href="{{url("profile/delivery-info")}}">Delivery Information</a></li>
                </ul>
            </div>

          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5>Information</h5>
            <ul class="list-unstyled mb-0">
                <li><a class="text-white-50 footer-link" href="{{url("about")}}">About us</a></li>
                <li><a class="text-white-50 footer-link" href="{{url("user/profile")}}">Profile</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5>Support</h5>
            <ul class="list-unstyled mb-0">
                <li><a class="text-white-50 footer-link" href="{{url("contact/index")}}">Contact Us</a></li>
                <li><a class="text-white-50 footer-link" href="mailto:admin@my-bookstore.test">Help center</a></li>
            </ul>
          </div>

        </div>
      </section>
    </div>

    <div class="text-center p-3" style="background-color: #388E3C;">
        <span class="footer-text ">Made with <i class="fa-solid fa-heart"></i> by Islam Mostafa</span>
    </div>
  </footer>
@yield('footer')

<script>
    function validateForm() {
        let validateEmail = document.forms["addForm"]["newsletter_email"].value;

        if(validateEmail == "") {
            let email = document.getElementById("newsletter_email");
            email.placeholder = "Please type your email";

            email.classList.add("validate-error");
            return false;
        }
    }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('script')
</body>
</html>
