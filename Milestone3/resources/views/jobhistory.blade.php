@extends('layouts.navbar')
@section('title', 'Job History Page')

@section('content')
<!--- Profile Form --->
	<form action="jobHistory" method="POST">
		<input type="hidden" name="_token" value = "<?php echo csrf_token()?>">
	<br>
	
	<br/>
	<h3>Job History: </h3>
	<table>
	
	<tr>
	<td><input type="hidden" name="users_id"/></td>
	</tr>
	
	<tr>
	<td>Previous Job Title:</td>
	<td><input type="text" name="prevTitle"/>{{ $errors->first('prevTitle')}}</td>
	</tr>
	
	<tr>
	<td>Description:</td>
	<td><input type="text" name="description"/>{{ $errors->first('description')}}</td>
	</tr>
	
	<tr>
	<td>Start Date:</td>
	<td><input type="date" name="startDate"/>{{ $errors->first('startDate')}}</td>
	</tr>
	
	<tr>
	<td>End Date:</td>
	<td><input type="date" name="endDate"/>{{ $errors->first('endDate')}}</td>
	</tr>
	
	<tr>
	<td>Company Name:</td>
	<td><input type="text" name="company"/>{{ $errors->first('company')}}</td>
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
		<td colspan="2" align="center">
		<input type="submit" value="Submit"/></td>
	</tr> 
	</table>
	</form>
@endsection