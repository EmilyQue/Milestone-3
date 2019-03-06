@extends('layouts.navbar')
@section('title', 'Profile Success Page')

@section('content')
	<h3>Contact Info: </h3>
	<a href="updateContact">Edit</a>
	<hr>
	<h3>Education: </h3>
	<a href="education">Add Education</a><br/>
	<a href="updateEducation">Edit</a>
	<hr>
	<h3>Job History: </h3>
	<a href="jobHistory">Add Job History</a><br/>
	<a href="updateHistory">Edit</a>
	<hr>
	<h3>Skills: </h3>
	<a href="skills">Add Skills</a><br/>
	<a href="updateSkills">Edit</a>
@endsection