@extends('admin.main')

<style>
    .fa-angle-right {
        font-size: 16px !important;
    }
    .edit {
        color: #ccc;
    }
    .star {
	color: red;
	font-size: 16px;
    font-weight: bold;
    }
</style>

@section('heading')
Dashboard <i class="fa-solid fa-angle-right"></i> Books <i class="fa-solid fa-angle-right"></i> <span class="edit">Edit</span>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="card mb-4 col-md-8">
            <div class="card-header">
                Update this book
            </div>
            <div class="card-body">
                <form class="edit-form" action="{{url("admin/books/update/$book->id")}}" method="post" enctype="multipart/form-data" id="editForm" onsubmit="return validateForm()">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="title">Book Title<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="title" id="title" value="{{$book->title}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="isbn">ISBN<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="isbn" id="isbn" value="{{$book->isbn}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="cover_image">Cover Image<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="file" accept="image/*" class="form-control" name="cover_image" id="cover_image">
                            <img class="img-fluid img-thumbnail" src="{{asset('storage/' . $book->cover_image)}}" alt="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="category">Category<span class="star">*</span></label>
                        <div class="col-md-6">
                            <select name="category" id="category" class="form-control">
                                <option disabled {{ $book->category == null ? 'selected' : '' }}></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $book->category == $category ? 'selected' : '' }} >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="authors">Authors<span class="star"></span></label>
                        <div class="col-md-6">
                            <select name="authors" id="authors" class="form-control" >
                                <option disabled selected>Choose Author</option>
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="publisher">Publisher<span class="star">*</span></label>
                        <div class="col-md-6">
                            <select name="publisher" id="publisher" class="form-control">
                                <option disabled {{ $book->publisher == null ? 'selected' : '' }}></option>
                                @foreach($publishers as $publisher)
                                    <option value="{{ $publisher->id }}" {{ $book->publisher == $publisher ? 'selected' : '' }} >{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="description">Book Description</label>
                        <div class="col-md-6">
                            <textarea name="description" class="form-control" id="description" cols="27" rows="5">{{ $book->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="publish_year">Publish Year</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="publish_year" id="publish_year" value="{{ $book->publish_year }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="number_of_pages">Number Of Pages<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="number_of_pages" id="number_of_pages" value="{{ $book->number_of_pages }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="number_of_copies">Number Of Copies<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="number_of_copies" id="number_of_copies" value="{{ $book->number_of_copies }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="price">Price<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="price" id="price" value="{{ $book->price }}">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
        function validateForm() {
        let validateBookTitle = document.forms["editForm"]["title"].value;
        let validateIsbn = document.forms["editForm"]["isbn"].value;
        let validateNumberOfPages = document.forms["editForm"]["number_of_pages"].value;
        let validateNumberOfCopies = document.forms["editForm"]["number_of_copies"].value;
        let validatePrice = document.forms["editForm"]["price"].value;


        if(validateBookTitle == "" || validateIsbn == "" || validateNumberOfPages == "" || validateNumberOfCopies == "" || validatePrice == "") {
             let title = document.getElementById("title");
             title.placeholder = "The new book's title is required.";

             let isbn = document.getElementById("isbn");
             isbn.placeholder = "The new ISBN field cannot be left blank";

             let NumberOfPages = document.getElementById("number_of_pages");
             NumberOfPages.placeholder = "Please type the new books' number of pages.";

             let NumberOfCopies = document.getElementById("number_of_copies");
             NumberOfCopies.placeholder = "Please type the new book's number of copies.";

             let price = document.getElementById("price");
             price.placeholder = "Please type The book's new price.";

             title.classList.add("validate-error");
             isbn.classList.add("validate-error");
             NumberOfPages.classList.add("validate-error");
             NumberOfCopies.classList.add("validate-error");
             price.classList.add("validate-error");
            return false;
        }
    }
    </script>
@endsection
