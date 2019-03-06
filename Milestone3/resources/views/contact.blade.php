@extends('layouts.navbar')
@section('title', 'Contact Info Page')

@section('content')
<!--- Profile Form --->
	<form action="contact" method="POST">
		<input type="hidden" name="_token" value = "<?php echo csrf_token()?>">
	<br>
	
	<br/>
	<h3>Contact Info: </h3>
	<table>
	
	<tr>
	<td><input type="hidden" name="contact_id"/></td>
	</tr>
	
	<tr>
	<td>Business Email:</td>
	<td><input type="text" name="business_email"/>{{ $errors->first('business_email')}}</td>
	</tr>
	
	<tr>
	<td>Phone Number:</td>
	<td><input type="text" name="phone"/>{{ $errors->first('phone')}}</td>
	</tr>
	
	<tr>
	<td>About Me:</td>
	<td><input type="text" name="aboutMe"/>{{ $errors->first('aboutMe')}}</td>
	</tr>
	
	<tr>
	<td>Street Address:</td>
	<td><input type="text" name="street"/>{{ $errors->first('street')}}</td>
	</tr>
	
	<tr>
	<td>City:</td>
	<td><input type="text" name="city"/>{{ $errors->first('city')}}</td>
	</tr>
	
	<tr>
	<td>State:</td>
	<td><input type="text" name="state"/>{{ $errors->first('state')}}</td>
	</tr>
	
	<tr>
	<td>Zipcode:</td>
	<td><input type="text" name="zipcode"/>{{ $errors->first('zipcode')}}</td>
	</tr>
	
	<tr>
		<td colspan="2" align="center">
		<input type="submit" value="Submit"/></td>
	</tr> 
	</table>
	</form>
@endsection