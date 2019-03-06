<?php session_start();?>
@extends('layouts.navbar')
@section('title', 'Suspend Account Success Page')

@section('content')
	<h3>User was successfully suspended</h3>
	<a href="usersAdmin">Back To Admin Page</a>
@endsection