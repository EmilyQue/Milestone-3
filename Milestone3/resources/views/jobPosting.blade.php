@extends('layouts.navbar')
@section('title', 'Job History Page')

@section('content')
<!--- Profile Form --->
	<form action="jobPosting" method="POST">
		<input type="hidden" name="_token" value = "<?php echo csrf_token()?>">
	<br>
	
	<br/>
	<h3>Add A Job Posting: </h3>
	<table>
	
	<tr>
	<td><input type="hidden" name="id"/></td>
	</tr>
	
	<tr>
	<td>Job Title:</td>
	<td><input type="text" name="title"/>{{ $errors->first('prevTitle')}}</td>
	</tr>
	
	<tr>
	<td>Position:</td>
	<td><input type="text" name="position"/>{{ $errors->first('prevTitle')}}</td>
	</tr>
	
	<tr>
	<td>Job Description:</td>
	<td><input type="text" name="jobDescription"/>{{ $errors->first('description')}}</td>
	</tr>
	
	<tr>
	<td>Company Name:</td>
	<td><input type="text" name="companyName"/>{{ $errors->first('company')}}</td>
	</tr>
	
	<tr>
	<td>City:</td>
	<td><input type="text" name="companyCity"/>{{ $errors->first('city')}}</td>
	</tr>
	
	<tr>
	<td>State:</td>
	<td><input type="text" name="companyState"/>{{ $errors->first('state')}}</td>
	</tr>
	
	<tr>
	<td>Date Posted:</td>
	<td><input type="date" name="datePosted"/>{{ $errors->first('startDate')}}</td>
	</tr>
	
	<tr>
		<td colspan="2" align="center">
		<input type="submit" value="Submit"/></td>
	</tr> 
	</table>
	</form>
@endsection