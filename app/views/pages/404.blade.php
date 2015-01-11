@extends('layout.basic')
@section('body')
<div class="error-body no-top">
<div class="error-wrapper container">
<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-offset-1 col-xs-10">
	 <div class="error-container" >
		<div class="error-main">
		  <div class="error-number"> 404 </div>
		  <div class="error-description" > We seem to have lost you in the clouds. </div>
		  <div class="error-description-mini"> The page your looking for is not here </div>
		  <br>

		</div>
	  </div>
	
	</div>
</div>
</div>
<div id="footer">
  <div class="error-container">
    <ul class="footer-links">

      <li><a href="#">Help & FAQ</a></li>
      <li><a href="#">Contact Us</a></li>
      <li><a href="#">Reports</a></li>


    </ul>
    <br>
    <ul class="footer-links small-links">
      <li><a href="/login">Home</a></li>

    </ul>
    <br>
    <div class="copyright"> All Rights Reserved, 2015 </div>
  </div>
</div>
</div>
  @stop