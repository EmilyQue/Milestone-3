@extends('layouts.navbar')
@section('title', 'Skills Page')

@section('content')
<!--- Profile Form --->
@if(count($skills) != 0) 
		@foreach($skills as $skill)
		
	<form action="updateSkills" method="POST">
		<input type="hidden" name="_token" value = "<?php echo csrf_token()?>">
	<br>
	
	<br/>
	<h3>Edit Skills: </h3>
	<table>
	
	<tr>
	<td><input type="hidden" name="id"/></td>
	</tr>
	
	<tr>
	<td>Skills:</td>
	<td><input type="text" name="skills" value="{{$skill->getUserSkill()}}"/>{{ $errors->first('skills')}}</td>
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