@extends('layouts.navbar')
@section('title', 'Profile Page')

@section('content')
<!--- Profile Form --->
<form action="updateContact" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>"> <br>

@if(count($contactInfo) != 0) 
@foreach($contactInfo as $c)
	<br />
	<h3>Contact Information:</h3>

		<input type="hidden" name="contact_id" value='{{$c->getId()}}' />

		<label>Business Email: </label>
		<input type="text" name="business_email" value= '{{$c->getBusinessEmail()}}'/><br/>
		
		<label>Phone Number: </label>
		<input type="text" name="phone" value= '{{$c->getPhone()}}'/><br/>
		
		<label>About Me: </label>
		<input type="text" name="aboutMe" value= '{{$c->getAboutMe()}}'/><br/>
		
		<label>Street Address: </label>
		<input type="text" name="street" value= '{{$c->getStreetAddress()}}'/><br/>
		
		<label>City: </label>
		<input type="text" name="city" value= '{{$c->getCity()}}'/><br/>
		
		<label>State: </label>
		<input type="text" name="state" value= '{{$c->getState()}}'/><br/>
		
		<label>Zipcode: </label>
		<input type="text" name="zipcode" value= '{{$c->getZipcode()}}'/><br/>
		
			<input type="submit" value="Submit" />

</form>
@endforeach
@endif
@endsection