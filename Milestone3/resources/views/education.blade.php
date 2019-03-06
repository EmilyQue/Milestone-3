@extends('layouts.navbar')
@section('title', 'Education Page')

@section('content')
<!--- Profile Form --->
	<form action="education" method="POST">
		<input type="hidden" name="_token" value = "<?php echo csrf_token()?>">
	<br>
	
	<br/>
	<h3>Education: </h3>
	<table>
	
	<tr>
	<td><input type="hidden" name="users_id"/></td>
	</tr>
	
	<tr>
	<td>Degree:</td>
	<td><input type="text" name="degree"/>{{ $errors->first('degree')}}</td>
	</tr>
	
	<tr>
	<td>School:</td>
	<td><input type="text" name="school"/>{{ $errors->first('school')}}</td>
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
	<td>Graduation Year:</td>
	<td><input type="date" name="graduation"/>{{ $errors->first('graduation')}}</td>
	</tr>
	
	<tr>
		<td colspan="2" align="center">
		<input type="submit" value="Submit"/></td>
	</tr> 
	</table>
	</form>
@endsection