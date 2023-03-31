@extends('admin.main')

<style>
    .fa-angle-right {
        font-size: 16px !important;
    }
    .edit {
        color: #ccc;
    }
</style>

@section('heading')
Dashboard <i class="fa-solid fa-angle-right"></i> Publisher <i class="fa-solid fa-angle-right"></i> <span class="edit">Edit</span>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="card mb-4 col-md-8">
            <div class="card-header">
                Update this publisher
            </div>
            <div class="card-body">
                <form action="{{url("admin/publishers/update/$publisher->id")}}" method="post" id="editForm" onsubmit="return validateForm()">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="name">Publisher Name<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" id="name" value="{{$publisher->name}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="description">Publisher Address</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="address" id="address" value="{{$publisher->address}}">
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
        let validateName = document.forms["editForm"]["name"].value;

        if(validateName == "") {
            let name = document.getElementById("name");
            let namePlaceholder = name.placeholder = "the new publisher's name cannot be left blank.";

            name.classList.add("validate-error");
            return false;
        }
    }
    </script>
@endsection
