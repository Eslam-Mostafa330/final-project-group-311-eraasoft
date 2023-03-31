@extends('layouts.main')

@section('head')
<style>
 body {
  font-family: "Roboto", sans-serif;
  line-height: 1.9;
  color: #8c8c8c;
  position: relative;
  font-size: 15px !important;
 }

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  /* font-family: "Roboto", sans-serif; */
  color: #000;
 }

a {
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease; }
  a, a:hover {
    text-decoration: none !important; }

.text-black {
  color: #000; }
  .contact-header {
    font-weight: bold;
    color: #4FA72C;
  }

.form-control {
  border: none;
  border-bottom: 1px solid #ccc;
  padding-left: 0;
  padding-right: 0;
  border-radius: 0;
  background: none;
 }

  .form-control:active, .form-control:focus {
    outline: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-color: #4FA72C
 }

 .star {
    color: red;
    font-weight: bold;
 }

.col-form-label {
  color: #000;
  font-size: 13px;
 }

.btn, .form-control, .custom-select {
  height: 45px;
  border-radius: 0;
 }

.custom-select {
  border: none;
  border-bottom: 1px solid #ccc;
  padding-left: 0;
  padding-right: 0;
  border-radius: 0;
 }

  .custom-select:active, .custom-select:focus {
    outline: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-color: #000;
 }

.btn {
  border: none;
  border-radius: 0;
  font-size: 11px;
  letter-spacing: .2rem;
  text-transform: uppercase;
  border-radius: 30px !important;
 }

  .btn.btn-primary {
    border-radius: 30px;
    background: #4FA72C;
    color: #fff;
    -webkit-box-shadow: 0 5px 4px 2px #f1f7ef;
    box-shadow: 0 5px 4px 2px #f1f7ef;
 }

  .btn:hover {
    color: #fff;
 }

  .btn:active, .btn:focus {
    outline: none;
    -webkit-box-shadow: none;
    box-shadow: none;
 }

.contact-wrap {
  -webkit-box-shadow: 0 0px 20px 0 #f1f7ef !important;
  box-shadow: 0 0px 20px 0 #f1f7ef !important;
  border: 1px solid #f1f7ef !important;
  width: 85%;
  margin: auto;
  margin-top: 20px;
 }

  .contact-wrap .col-form-label {
    font-size: 14px;
    color: #b3b3b3;
    margin: 0 0 10px 0;
    display: inline-block;
    padding: 0;
 }

  .contact-wrap .form, .contact-wrap .contact-info {
    padding: 40px;
 }

  .contact-wrap .contact-info {
    color: rgba(255, 255, 255, 0.5);
 }

    .contact-wrap .contact-info ul li {
      margin-bottom: 15px;
      color: rgba(255, 255, 255, 0.5);
     }

      .contact-wrap .contact-info ul li .wrap-icon {
        font-size: 20px;
        color: #fff;
        margin-top: 5px;
     }

  .contact-wrap .form {
    background: #fff;
 }

    .contact-wrap .form h3 {
      color: #000;
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 30px;
     }

  .contact-wrap .contact-info {
    height: 100vh;
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
 }

    .contact-wrap .contact-info a {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
     }

     .contact-wrap .contact-info h3 {
      color: #fff;
      font-size: 20px;
      margin-bottom: 30px;
     }

     .validate-error::placeholder {
        color: red !important;
        font-size: 15px;
    }

        /* Footer styles */
        .footer {
        margin-top: 70px !important;
    }
    .footer h5 {
        color: #fff !important;
    }
    footer .email-input {
        background: #fff !important;
        border-radius: 4px !important;
        height: 37px !important;
    }
    footer .email-input::placeholder {
        padding-left: 7px !important;
    }
    .subscribe-btn {
        border: 1px solid #fff !important;
        border-radius: 5px !important;
        height: 37px !important;
        text-transform: none !important;
        font-size: 15px !important;
        letter-spacing: 0 !important;
    }

    @media (max-width: 1199.98px) {
        .contact-wrap .contact-info {
            height: 400px !important;
        }
     }



</style>
@endsection

@section('content')
<div class="container">
    <div class="row align-items-stretch no-gutters contact-wrap">
      <div class="col-md-12">
        <div class="form h-100">
          <h5 class="mb-5 contact-header">We would love to hear your suggestions and questions.</h5>
          <form action="{{url('contact/index/store')}}" class="mb-5" method="post" id="contactForm" onsubmit="return validateForm()">
            @csrf
            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <label for="" class="col-form-label">Name <span class="star">*</span></label>
                <input type="text" class="form-control" name="guest_name" id="guest_name" placeholder="Your name">
              </div>
              <div class="col-md-6 form-group mb-3">
                <label for="" class="col-form-label">Email <span class="star">*</span></label>
                <input type="text" class="form-control" name="guest_email" id="guest_email"  placeholder="Your email">
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 form-group mb-3">
                <label for="guest_message" class="col-form-label">Message <span class="star">*</span></label>
                <textarea class="form-control" name="guest_message" id="guest_message" cols="30" rows="4"  placeholder="Write your message"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                <span class="submitting"></span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        function validateForm() {
        let validateName = document.forms["contactForm"]["guest_name"].value;
        let validateEmail = document.forms["contactForm"]["guest_email"].value;
        let validateNotes = document.forms["contactForm"]["guest_message"].value;

        if(validateName == "" || validateEmail == "" || validateNotes == "") {
            let name = document.getElementById("guest_name");
            name.placeholder = "Please type your name";

            let email = document.getElementById("guest_email");
            email.placeholder = "Please type your email";

            let notes = document.getElementById("guest_message");
            notes.placeholder = "Please type your message";

            name.classList.add("validate-error");
            email.classList.add("validate-error");
            notes.classList.add("validate-error");
            return false;
        }
    }
    </script>
@endsection
