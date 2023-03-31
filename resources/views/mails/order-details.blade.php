<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
    <style>
        table {
			border-collapse: collapse;
			width: 100%;
			max-width: 700px;
			margin: auto;
			font-size: 1.2rem;
			text-align: center;
		}

		td {
			border: 1px solid #ddd;
			padding: 8px;
		}

		th {
			background-color: #4FA72C;
            border: 1px solid #f1f7ef;
            padding: 8px;
            color: #fff;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		.delivery-info {
			background-color: #f1f7ef;
			padding: 20px;
			margin-bottom: 20px;
			border-radius: 5px;
		}

		.delivery-info h2 {
			margin-top: 0;
			font-size: 1.5rem;
			font-weight: bold;
			color: #333;
		}

		.delivery-info p {
			margin: 0 0 10px;
			font-size: 1.2rem;
			color: #555;
		}

		.delivery-info .label {
			display: inline-block;
			width: 120px;
			font-weight: bold;
			color: #333;
		}

		.delivery-info .notes {
			margin-top: 10px;
			font-size: 1.2rem;
			color: #555;
			line-height: 1.3;
		}
        .contact-main {
            margin-top: 10px;
			font-size: 1.2rem;
			color: #555;
			line-height: 1.3;
        }
        .contact {
            color: #4FA72C;
            text-decoration: underline;
            cursor: pointer;
        }
        .contact:hover {
            text-decoration: none;
        }

		@media screen and (max-width: 600px) {
			table {
				font-size: 1rem;
			}
		}
    </style>
</head>
<body>
    {{-- Displaying the name of the user --}}
    <h3>Dear {{auth()->user()->name}},</h3>
    <p>Thank you for your order. We have received it and our representatives will deliver it within 24 hours according to the information you provided.</p>
    <h4>The following are the details of your order:</h4>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Book Title</th>
                <th>Number Of Copies</th>
                <th>Price</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($order as $book)
                <tr>
                    {{-- Displaying the order details to the email which provided by the user --}}
                    <td>{{$book->title}}</td>
                    <td>{{$book->pivot->number_of_copies}}</td>
                    <td>{{$book->price}}</td>
                    <td>{{$book->price * $book->pivot->number_of_copies}}$</td>
                    @php
                        $total += $book->price * $book->pivot->number_of_copies
                    @endphp
                </tr>
                <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                        <td class="total">{{$total}}$</td>
                    </tr>
                </tfoot>
            @endforeach
        </tbody>
    </table>
    <br>
    <div class="delivery-info">
		<h4>Delivery Information</h4>
		<p><span class="label">Full Name:</span> {{auth()->user()->full_name}}</p>
        <p><span class="label">Phone Number:</span> {{auth()->user()->phone}}</p>
        <p><span class="label">Address One:</span> {{auth()->user()->address_1}}</p>
        {{-- If address two not provided, will display a default message "because address two is optional" --}}
        @if(auth()->user()->address_2)
            <p><span class="label">Address Two:</span> {{auth()->user()->address_2}}</p>
        @else
            <p><span class="label">Address Two:</span> Not Provided.</p>
        @endif
                {{-- If the notes not provided, will display a default message "because notes are optional" --}}
        @if(auth()->user()->notes)
            <div class="notes">
                <span class="label">Notes:</span>
                <p>{{auth()->user()->notes}}</p>
            </div>
        @else
            <div class="notes">
                <span class="label">Notes:</span>
                <p>Not Provided.</p>
            </div>
        @endif
        <h4 class="contact-main">If you plan to change your delivery information please visit <a class="contact" href="#">Contact Page</a> or contact us at: support@my-bookstore.test</h4>
        <p><i>Best regards,</i></p>
        <p><i>My Bookstore team</i></p>
    </div>
</body>
</html>
