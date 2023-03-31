@extends('layouts.main')

@section('head')
    <style>
        .about-main {
            box-shadow: 3px 3px 3px 1px #f1f7ef;
            padding: 75px !important;
        }
        .part-one, .part-two, .part-three, .part-four, .part-five, .part-six {
            color: #4FA72C;
            font-weight: bold;
        }
        .team {
            color: #4FA72C;
            font-weight: bolder;
            position: relative;
            bottom: -20px;
            font-family: 'Bad Script', cursive !important;
            font-style: italic;
        }
    </style>
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 mx-auto mt-5 p-5 about-main">
            <p>
                <span class="part-one">Welcome to our online bookstore!</span> We are a team of book lovers who are passionate about connecting readers with the books they love. Our mission is to provide a wide selection of books at competitive prices, with fast and reliable shipping to your doorstep.
            </p>
            <p>
                <span class="part-two">At our core,</span> we believe in the power of books to inspire, educate, and entertain. We understand that every reader has unique interests and preferences, which is why we curate our collection to include a diverse range of genres, from classic literature to contemporary bestsellers. Whether you're looking for the latest thriller, a heartwarming romance, or a thought-provoking memoir, we've got you covered.
            </p>
            <p>
                <span class="part-three">In addition to our extensive collection of print books,</span> we also offer a variety of formats to suit your needs. If you prefer the convenience of digital reading, we have a vast selection of eBooks and audiobooks available for instant download. If you prefer the feel of a physical book in your hands, we offer fast and reliable shipping to your doorstep, so you can start reading your new book as soon as possible.
            </p>
            <p>
                <span class="part-four">Our team is dedicated to providing exceptional customer service.</span> We are book experts and we are always here to help you find the perfect book or answer any questions you may have. Whether you need help selecting the right book for your next book club meeting or recommendations for books to read with your kids, we're here to help.
            </p>
            <p>
                <span class="part-five">We are committed to making your shopping experience as smooth and easy as possible.</span> We offer a secure online checkout process, and we accept all major credit cards and PayPal. If for any reason you're not completely satisfied with your purchase, we offer a hassle-free return policy.
            </p>
            <p>
                <span class="part-six">Thank you for choosing our bookstore,</span> and happy reading! We hope that our collection of books will inspire you, challenge you, and bring you joy. If you have any questions or comments, please don't hesitate to contact us.
            </p>

            <h6 class="team">My Bookstore Team</h6>
        </div>
</div>
@endsection


@section('footer')

@endsection
