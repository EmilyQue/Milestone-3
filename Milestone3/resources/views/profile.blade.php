@extends('layouts.navbar')
@section('title', 'Profile Success Page')

@section('content')
	<h3>Contact Info: </h3>
@if(count($contactInfo) != 0) 
		@foreach($contactInfo as $c)
			{{$c->getBusinessEmail()}} <br/>
			{{$c->getPhone()}} <br/>
			{{$c->getAboutMe()}} <br/>
			{{$c->getStreetAddress()}} <br/>
			{{$c->getCity()}} <br/>
			{{$c->getState()}} <br/>
			{{$c->getZipcode()}} <br/>
		@endforeach
		
	@else 
	<a href="contact">Add Contact</a><br/>
	@endif
	<a href="editContact">Edit</a>
	<a href="deleteContact">Delete</a><br/>
	<hr>
	<h3>Education: </h3>
	@if(count($education) != 0) 
		@foreach($education as $e)
			{{$e->getDegree()}} <br/>
			{{$e->getSchoolName()}} <br/>
			{{$e->getCity()}} <br/>
			{{$e->getState()}} <br/>
			{{$e->getGraduationYear()}} <br/>
		@endforeach
	@endif
	<a href="education">Add Education</a><br/>
	<a href="editEducation">Edit</a>
	<a href="deleteEducation">Delete</a><br/>
	<hr>
	<h3>Job History: </h3>
	@if(count($history) != 0) 
		@foreach($history as $job)
			{{$job->getPreviousJobTitle()}} <br/>
			{{$job->getPreviousJobDescription()}} <br/>
			{{$job->getStartDate()}} <br/>
			{{$job->getEndDate()}} <br/>
			{{$job->getCompanyName()}} <br/>
			{{$job->getCity()}}<br/>
			{{$job->getState()}} <br/>
		@endforeach
	@endif
	<a href="jobHistory">Add Job History</a><br/>
	<a href="editHistory">Edit</a>
	<a href="deleteHistory">Delete</a><br/>
	<hr>
	<h3>Skills: </h3>
	@if(count($skills) != 0) 
		@foreach($skills as $skill)
			{{$skill->getUserSkill()}} <br/>
		@endforeach
	@endif	
	<a href="skills">Add Skills</a><br/>
	<a href="editSkills">Edit</a>
	<a href="deleteSkills">Delete</a><br/>
@endsection