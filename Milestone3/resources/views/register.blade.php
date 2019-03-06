@extends('layouts.appmaster')
@section('title', 'Registration Page')

@section('content')
<!--- Login Form --->
	<form action="register" method="POST">
		<input type="hidden" name="_token" value = "<?php echo csrf_token()?>">
	<h3>Please Sign Up Here: </h3>
	<table>
	
	<tr>
	<td>First Name:</td>
	<td><input type="text" name="firstname"/>{{ $errors->first('firstname')}}</td>
	</tr>
	
	<tr>
	<td>Last Name:</td>
	<td><input type="text" name="lastname"/>{{ $errors->first('lastname')}}</td>
	</tr>
	
	<tr>
	<td>Email:</td>
	<td><input type="text" name="email"/>{{ $errors->first('email')}}</td>
	</tr>
	
	<tr>
	<td>Username:</td>
	<td><input type="text" name="username"/>{{ $errors->first('username')}}</td>
	</tr>
	
	<tr>
	<td>Password:</td>
	<td><input type="password" name="password"/>{{ $errors->first('password')}}</td>
	</tr>
	
	<tr>
		<td colspan="2" align="center">
		<input type="submit" value="Submit"/></td>
	</tr> 
	</table>
	</form>
@endsection