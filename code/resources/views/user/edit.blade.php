@extends('layout.main2')

@section('section1')

<div class="py-5">
<div class="container">
<div class="row">
@foreach($edit as $p)
<aside class="col-md-4">
<div class="box mb-3 shadow-sm rounded bg-white profile-box text-center">
<div class="py-4 px-3 border-bottom">
<img src='{{asset("images/$p->image")}}' class="img-fluid mt-2 rounded-circle" style="width:150px;" alt="Responsive image">

<h5 class="font-weight-bold text-dark mb-1 mt-4">{{$p->name}}</h5>
<p class="mb-0 text-muted">{{$p->ex_job_title}}r</p>
</div>

</div>
</aside>
<main class="col-md-8">
<div class="shadow-sm rounded bg-white mb-3">
<div class="box-title border-bottom p-3">
<h6 class="m-0">Edit Basic Info</h6>
</div>
<div class="box-body p-3">


<form class="js-validate" novalidate="novalidate"  method="post" action="/update/{{Auth::user()->id}}" enctype="multipart/form-data">
@csrf
@method('POST')
<div class="row">
<div class="col-sm-6 mb-2">
<div class="js-form-message">
<label id="nameLabel" class="form-label">
First Name
<span class="text-danger">*</span>
</label>
<div class="form-group">
<input type="text" class="form-control" name="first_name" value="" placeholder="" aria-label="Enter your name" required="" aria-describedby="nameLabel" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success">
</div>
</div>
</div>


<div class="col-sm-6 mb-2">
<div class="js-form-message">
<label id="usernameLabel" class="form-label">
    last Name
<span class="text-danger">*</span>
</label>
<div class="form-group">
<input type="text" class="form-control" name="last_name" value="" placeholder="" aria-label="Enter your username" required="" aria-describedby="usernameLabel" data-msg="Please enter your username." data-error-class="u-has-error" data-success-class="u-has-success">
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 mb-2">
<div class="js-form-message">
<label id="emailLabel" class="form-label">
Email address
<span class="text-danger">*</span>
</label>
<div class="form-group">
<input type="email" class="form-control" name="email" value="{{$p->email}}" placeholder="" aria-label="Enter your email address" required="" aria-describedby="emailLabel" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
</div>
</div>
</div>

<div class="col-sm-6 mb-2">
    <div class="js-form-message">
    <label id="phoneNumberLabel" class="form-label">
    Phone number
    <span class="text-danger">*</span>
    </label>
    <div class="form-group">
    <input class="form-control" type="tel" name="number" value="+91 85680 79956" placeholder="Enter your phone number" aria-label="Enter your phone number" required="" aria-describedby="phoneNumberLabel" data-msg="Please enter a valid phone number" data-error-class="u-has-error" data-success-class="u-has-success">
    </div>
    </div> 
    </div>
<div>
  
</div>
</div>
</div>
<div class="shadow-sm rounded bg-white mb-3">
<div class="shadow-sm rounded bg-white mb-3">
<div class="box-title border-bottom p-3">
<h6 class="m-0">Education
</h6>

<div class="box-body px-3 pt-3 pb-0">
<div class="row">
<div class="col-sm-6 mb-4">
<label id="FROM" class="form-label">University</label>
<div class="input-group">
<input type="text" class="form-control" name="university" placeholder="University" aria-label="FROM" aria-describedby="FROM">
</div>

</div>
<div class="col-sm-6 mb-4">
<label id="TO" class="form-label">Major</label>
<div class="input-group">
<input type="text" class="form-control" name="major" placeholder="Major" >
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 mb-4">
<label id="companyLabel" class="form-label">Degree</label>

<div class="input-group">
<input type="text" class="form-control" name="degree" placeholder="degree" aria-label="Enter your company title" aria-describedby="companyLabel">
</div>

</div>
<div class="form-group">
    <label for="exampleFormControlFile1">Upload Photo</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" value="">
  </div>
</div>
</div>
<div class="col-sm-12 mb-2">
    <div class="js-form-message">
<label id="phoneNumberLabel" class="form-label">
 Bio
    <span class="text-danger">*</span>
    </label>
  <textarea  class="form-control" rows="4" cols="50" name="bio" >
</textarea> 
</div>
</div>
</div>
<!-- EXPERIENCE -->

<div class="shadow-sm rounded bg-white mb-3">
<div class="box-title border-bottom p-3">
<h6 class="m-0">Experience
</h6>

<div class="box-body px-3 pt-3 pb-0">
<div class="row">
<div class="col-sm-6 mb-4">
<label id="FROM" class="form-label">Job Title</label>
<div class="input-group">
<input type="text" class="form-control" name="ex_job_title" placeholder="Job Title" aria-label="FROM" aria-describedby="FROM">
</div>

</div>
<div class="col-sm-6 mb-4">
<label id="TO" class="form-label">Company Name</label>
<div class="input-group">
<input type="text" class="form-control" name="ex_company_name" placeholder="Company Name" >
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 mb-4">
<label id="companyLabel" class="form-label">Starting Date</label>

<div class="input-group">
<select name="ex_start_date">
<?php 
   for($i = 1950 ; $i < date('Y'); $i++){
      echo "<option>$i</option>";
   }
?>
Start Date</select>
</div>

</div>
<div class="col-sm-6 mb-4">
<label id="companyLabel" class="form-label">Ending Date</label>

<div class="input-group">

<select name="ex_end_date">
<?php 
   for($i = 1950 ; $i < date('Y'); $i++){
      echo "<option>$i</option>";
   }
?>
End Date</select>

</div>

</div>
</div>
</div>




<div class="col-sm-12 mb-2">
    <div class="js-form-message">
<label id="phoneNumberLabel" class="form-label">
 Job Description
    <span class="text-danger">*</span>
    </label>
  <textarea  class="form-control" rows="4" cols="50" name="ex_job_desc">
</textarea> 
</div>
</div>
<div class="mb-3 text-right">
<button type="submit" class="btn btn-outline-success">Cancel</button>
<button type="submit" class="btn btn-success">Submit</button>
</div>
</main>
</div>
</div>
</div>
</form>
@endforeach
@endsection