@extends('layouts.appmaster')
@section('title', 'Login Page')

@section('content')
<!--- Login Form --->
	<form action="login" method="POST">
		<input type="hidden" name="_token" value = "<?php echo csrf_token()?>">
	<h3>Please Login Here: </h3>
	<table>
	
	<tr>
	<td>Username:</td>
	<td><input type="text" name="username" maxlength="10"/> {{ $errors->first('username')}}</td>
	</tr>
	
	<tr>
	<td>Password:</td>
	<td><input type="password" name="password" maxlength="10"/> {{ $errors->first('password')}}</td>
	</tr>
	
	<tr>
		<td colspan="2" align="center">
		<input type="submit" value="Submit"/></td>
	</tr> 
	</table>
	Click <a href="register">here</a> to register
	</form>
@endsection