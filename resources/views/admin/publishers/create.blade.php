@extends('admin.main')

<style>
    .fa-angle-right {
        font-size: 16px !important;
    }
    .new {
        color: #ccc;
    }
</style>

@section('heading')
Dashboard <i class="fa-solid fa-angle-right"></i> Publishers <i class="fa-solid fa-angle-right"></i> <span class="new">New</span>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="card mb-4 col-md-8">
            <div class="card-header">
                Add new publisher
            </div>
            <div class="card-body">
                <form action="{{url('admin/publishers/store')}}" method="post" id="addForm" onsubmit="return validateForm()">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="name">Publisher Name<span class="star">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Publisher Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="address">Publishers Address</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Publisher Address">
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
        let validateName = document.forms["addForm"]["name"].value;

        if(validateName == "") {
            let name = document.getElementById("name");
            let namePlaceholder = name.placeholder = "Please type a publisher's name";

            name.classList.add("validate-error");
            return false;
        }
    }
    </script>
@endsection
