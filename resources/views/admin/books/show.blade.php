@extends('admin.main')

@section('heading')
    Book Details
@endsection

@section('head')
    <style>
        table {
            table-layout: fixed !important;
        }
        table tr th {
            width: 30% !important;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Book Details</div>
                    <div class="card-body">
                        <table class="table table-stribed">
                            <tr>
                                <th>Book Title</th>
                                <td class="lead"><b>{{$book->title}}</b></td>
                            </tr>
                                <tr>
                                    <th>ISBN</th>
                                    <td>{{$book->isbn}}</td>
                                </tr>
                            <tr>
                                <th>Book Cover</th>
                                <td><img class="img-fluid img-thumbnail" src="{{asset('storage/' . $book->cover_image)}}" alt=""></td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{$book->category->name}}</td>
                            </tr>
                            @if($book->authors()->count() > 0)
                            <tr>
                                <th>Authors</th>
                                <td>
                                    @foreach($book->authors as $author)
                                        {{$loop->first ? '' : ' and'}}
                                        {{$author->name}}
                                    @endforeach
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <th>Publisher</th>
                                <td>{{$book->publisher->name}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$book->description}}</td>
                            </tr>
                            <tr>
                                <th>Publish Year</th>
                                <td>{{$book->publish_year}}</td>
                            </tr>
                            <tr>
                                <th>Number Of Pages</th>
                                <td>{{$book->number_of_pages}}</td>
                            </tr>
                            <tr>
                                <th>Copies Left</th>
                                <td>{{$book->number_of_copies}}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{$book->price}} $</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection