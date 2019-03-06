@extends('layouts.navbar')
@section('title', 'Job History Page')

@section('content')
<!--- Profile Form --->
@if(count($history) != 0) 
		@foreach($history as $job)
	<form action="updateHistory" method="POST">
		<input type="hidden" name="_token" value = "<?php echo csrf_token()?>">
	<br>
	
	<br/>
	<h3>Edit Job History: </h3>
	<table>
	
	<tr>
	<td><input type="hidden" name="users_id"/></td>
	</tr>
	
	<tr>
	<td>Previous Job Title:</td>
	<td><input type="text" name="prevTitle" value='{{$job->getPreviousJobTitle()}}'/>{{ $errors->first('prevTitle')}}</td>
	</tr>
	
	<tr>
	<td>Description:</td>
	<td><input type="text" name="description" value='{{$job->getPreviousJobDescription()}}'/>{{ $errors->first('description')}}</td>
	</tr>
	
	<tr>
	<td>Start Date:</td>
	<td><input type="date" name="startDate" value='{{$job->getStartDate()}}'/>{{ $errors->first('startDate')}}</td>
	</tr>
	
	<tr>
	<td>End Date:</td>
	<td><input type="date" name="endDate" value='{{$job->getEndDate()}}'/>{{ $errors->first('endDate')}}</td>
	</tr>
	
	<tr>
	<td>Company Name:</td>
	<td><input type="text" name="company" value='{{$job->getCompanyName()}}'/>{{ $errors->first('company')}}</td>
	</tr>
	
	<tr>
	<td>City:</td>
	<td><input type="text" name="city" value='{{$job->getCity()}}'/>{{ $errors->first('city')}}</td>
	</tr>
	
	<tr>
	<td>State:</td>
	<td><input type="text" name="state" value='{{$job->getState()}}'/>{{ $errors->first('state')}}</td>
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