<?php session_start();?>
@extends('layouts.navbar')
@section('title', 'Profile Success Page')

@section('content')
	<h3>User was successfully deleted</h3>
	<a href="usersAdmin">Back To Admin Page</a>
@endsection