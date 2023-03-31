@extends('layouts.main')

@section('head')
    <style>
        .container {
            width: 80% !important;
        }
        .card-header {
            color: #4FA72C;
            font-weight: bold;
        }

        .table-head {
            color: #388E3C;
        }
        .blank_row
        {
            height: 50px !important; /* overwrites any other rules */
            background-color: #FFFFFF;
        }
        .delete-btn {
        font-size: 100%;
        font-family: inherit;
        border: 0;
        padding: 0;
        color: red;
        margin-left: 10px;
        font-size: 20px;
        transition: .2s !important;
        position: relative;
        top: -3px;
    }
    .delete-btn:hover {
        color: rgb(224, 32, 32) !important;
    }
    tr {
        /* height: 65px !important; */

    }
    td, .title-th{
        padding-top: 20px !important;
        /* margin-bottom: auto !important; */
        height: 65px !important;
    }
    .remove-from-cart {
        display: flex;
    }
    .number-of-copies-input {
        width: 45px !important;
        text-align: center;
        height: 25px !important;
        padding-right: 15px !important;
    }
    .remove-one-btn, .addCart {
        border: none !important;
        background: #f1f7ef !important;
        height: 22px;
        margin-top: auto;
        margin-bottom: auto;
        /* font-weight: bold; */
        font-size: 22px;
        display: flex;
        align-items: center;
        padding-bottom: 5px !important;
        height: 17px;
        position: relative;
        left: -4px;
    }
    .addCart {
        /* left: -4px; */
        margin-top: 4px !important;
        margin-bottom: auto;
        outline: none !important;
    }
    .remove-one-btn:hover, .addCart:hover {
        font-weight: bold;
        transition: .1s;
        color: #388E3C;
        transform: scale(1.3);

    }
    .total-payment {
        margin-bottom: 22px !important;
    }
    .toast {
        margin-left: auto !important;
        color: #fff !important;
        background: #4FA72C;
        font-size: 15px !important;
    }
    .actions {
        position: relative;
        left: -15px;
    }
    button.btn-close{
        color: #fff !important;
    }
    @media(max-width: 992px) {
        .container {
            width: 100% !important;
        }
    }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Shopping Cart <i class="fa-solid fa-basket-shopping"></i></div>
                    <div class="card-body">
                        @if($books->count())
                            <table class="table">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="col">Book</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                @php($total_price = 0)
                                @foreach ($books as $book)
                                    @php($total_price += $book->price * $book->pivot->number_of_copies)
                                    <tbody>
                                        <tr>
                                            <th class="title-th" scope="row">{{ $book->title }}</th>
                                            <td>{{ $book->price }} $</td>
                                            <td>{{ $book->pivot->number_of_copies }}</td>
                                            <td>{{ $book->price * $book->pivot->number_of_copies }} $</td>
                                            <td class="actions">
                                                <form class="remove-from-cart" style="float:left; margin: auto 5px" method="post" action="{{ route('cart.remove', $book->id) }}">
                                                    @csrf
                                                    <button title="Remove one" class="remove-one-btn" type="submit">-</button>
                                                    <input type="text" class="form-control input-sm number-of-copies-input" value="{{ $book->pivot->number_of_copies }}" id="quantity" name="quantity" max="{{ $book->number_of_copies }}" min="1">
                                                </form>
                                                {{-- Add books to cart by authenticated users with the maximum number of the available quantity in stock --}}
                                                @auth
                                                <div class="form text-center mb-2" id="form">
                                                    <input id="bookId" type="hidden" value="{{ $book->id }}">
                                                    <span class="text-muted mb-3"><input class="form-control d-inline mx-auto" id="quantity" name="quantity" type="hidden" value="1" min="1" max="{{ $book->number_of_copies }}" style="width:10%;" required></span>
                                                    <button title="Add one more" onclick="location.reload()" id="addCart" type="submit" class="addCart">+</button>
                                                </div>
                                                    <span class="add-successfully" id="addSuccessfully"></span>
                                                    <span class="error-while-add" id="errorWhileAdd"></span>
                                                @endauth
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <td colspan="4" style="text-align: right;"><h4 class="total-payment">Total: {{ $total_price }}$</h4></td>
                                        <td>
                                            <a href="{{ route('credit.checkout')}}" class="d-inline-block mb-4 float-start btn bg-cart" style="text-decoration:none;">
                                                <span>Checkout</span>
                                                <i class="fa-solid fa-money-check"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        @else
                            <div class="alert alert-info text-center">
                                There are no books in the cart
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

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

        },
        error: function() {
            document.getElementById("errorWhileAdd").innerHTML = "Something went wrong!";
        }
    })
});
</script>
@endsection
