@extends('admin.main')

<style>
    .fa-angle-right {
        font-size: 16px !important;
    }
    .add {
        color: #ccc;
    }
    .btn-add {
        padding: 5px 25px !important;
    }

</style>

@section('heading')
Dashboard <i class="fa-solid fa-angle-right"></i> Books <i class="fa-solid fa-angle-right"></i> <span class="add">Add</span>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="card mb-4 col-md-8">
            <div class="card-header">
                Add new book
            </div>
            <div class="card-body">
                <form action="{{url('admin/books/store')}}" method="post" enctype="multipart/form-data" id="addForm" onsubmit="return validateForm()">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="title">Book Title<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Book Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="isbn">ISBN<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="cover_image">Cover Image<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="file" accept="image/*" class="form-control" name="cover_image" id="cover_image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="category">Category<span class="star">*</span></label>
                        <div class="col-md-6">
                            <select name="category" id="category" class="form-control">
                                <option disabled selected>Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
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
                                <option disabled selected>Choose Publisher</option>
                                @foreach($publishers as $publisher)
                                    <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="description">Book Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="description" id="description" cols="34" rows="5" placeholder="Book Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="publish_year">Publish Year</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="publish_year" id="publish_year" placeholder="Year of publish">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="number_of_pages">Number Of Pages<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="number_of_pages" id="number_of_pages" placeholder="Number of pages">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="number_of_copies">Number Of Copies<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="number_of_copies" id="number_of_copies" placeholder="Number of copies">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="price">Price<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="price" id="price" placeholder="Book Price">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-success btn-add">Add</button>
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
        let validateBookTitle = document.forms["addForm"]["title"].value;
        let validateIsbn = document.forms["addForm"]["isbn"].value;
        let validateNumberOfPages = document.forms["addForm"]["number_of_pages"].value;
        let validateNumberOfCopies = document.forms["addForm"]["number_of_copies"].value;
        let validatePrice = document.forms["addForm"]["price"].value;


        if(validateBookTitle == "" || validateIsbn == "" || validateNumberOfPages == "" || validateNumberOfCopies == "" || validatePrice == "") {
             let title = document.getElementById("title");
             title.placeholder = "Please give this book a title.";

             let isbn = document.getElementById("isbn");
             isbn.placeholder = "ISBN field cannot be empty and must be unique.";

             let NumberOfPages = document.getElementById("number_of_pages");
             NumberOfPages.placeholder = "Please type the books' number of pages.";

             let NumberOfCopies = document.getElementById("number_of_copies");
             NumberOfCopies.placeholder = "Please type the book's number of copies.";

             let price = document.getElementById("price");
             price.placeholder = "The book's price should be typed in.";

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
