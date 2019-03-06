@extends('layouts.navbar')
@section('title', 'Job History Page')

@section('content')
<!--- Profile Form --->
	<form action="jobUpdate" method="POST">
		<input type="hidden" name="_token" value = "<?php echo csrf_token()?>">
	<br>
	
	@if(count($jobPosting) != 0) 
	@foreach($jobPosting as $job)
	<br/>
	<h3>Edit Job Posting: </h3>
	<table>
	
	<tr>
	<td><input type="hidden" name="id" value='{{$job->getId()}}'/></td>
	</tr>
	
	<tr>
	<td>Job Title:</td>
	<td><input type="text" name="title" value='{{$job->getJobTitle()}}'/>{{ $errors->first('prevTitle')}}</td>
	</tr>
	
	<tr>
	<td>Position:</td>
	<td><input type="text" name="position" value='{{$job->getPosition()}}'/>{{ $errors->first('prevTitle')}}</td>
	</tr>
	
	<tr>
	<td>Job Description:</td>
	<td><input type="text" name="jobDescription" value='{{$job->getDescription()}}'/>{{ $errors->first('description')}}</td>
	</tr>
	
	<tr>
	<td>Company Name:</td>
	<td><input type="text" name="companyName" value='{{$job->getCompanyName()}}'/>{{ $errors->first('company')}}</td>
	</tr>
	
	<tr>
	<td>City:</td>
	<td><input type="text" name="companyCity" value='{{$job->getCity()}}'/>{{ $errors->first('city')}}</td>
	</tr>
	
	<tr>
	<td>State:</td>
	<td><input type="text" name="companyState" value='{{$job->getState()}}'/>{{ $errors->first('state')}}</td>
	</tr>
	
	<tr>
	<td>Date Posted:</td>
	<td><input type="date" name="datePosted" value='{{$job->getDatePosted()}}'/>{{ $errors->first('startDate')}}</td>
	</tr>
	
	<tr>
		<td colspan="2" align="center">
		<input type="submit" value="Submit"/></td>
	</tr> 
	</table>
	</form>
	@endforeach
	@endif
@endsection