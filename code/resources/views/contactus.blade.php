
@extends('layout.main')

@section('section1')


<section class="py-5">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 section-title text-left mb-4">
<h2>Contact Us</h2>
</div>
<form class="col-lg-12 col-md-12" name="sentMessage">
<div class="row">
<div class="control-group form-group col-lg-4 col-md-4">
<div class="controls">
<label>Your Name <span class="text-danger">*</span></label>
<input type="text" class="form-control" required>
</div>
</div>
<div class="control-group form-group col-lg-4 col-md-4">
<div class="controls">
<label>Email Address <span class="text-danger">*</span></label>
<input type="email" class="form-control" required>
</div>
</div>
<div class="control-group form-group col-lg-4 col-md-4">
<div class="controls">
<label>Phone Number <span class="text-danger">*</span></label>
<input type="email" class="form-control" required>
</div>
</div>
</div>
<div class="control-group form-group">
<div class="controls">
<label>Message <span class="text-danger">*</span></label>
<textarea rows="10" cols="100" class="form-control"></textarea>
</div>
</div>
<button type="submit" class="btn btn-success">Send Message</button>
</form>
</div>
</div>
</section>

@endsection