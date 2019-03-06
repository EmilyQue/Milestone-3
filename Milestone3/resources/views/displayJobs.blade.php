<?php session_start();
use App\Services\Business\UserBusinessService;
use App\Services\Business\AdminBusinessService;
?>
@extends('layouts.navbar')
@section('title', 'Admin Page')

@section('content')

<head>
<style>
#user {
    font-family: "Comic Sans", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#user td, #user th {
    border: 1px solid #ddd;
    padding: 8px;
}

#user tr:nth-child(even) {
    background-color: #f2f2f2;
}

#user tr:hover {
    background-color: #ddd;
}

#user th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}

#user thead {
    background-color: #aabd8c;
}
</style>

</head>
<table id="user"> 
<thead>
	<th>Delete</th>
	<th>Edit</th>
	<th>ID</th>
	<th>Job Title</th>
	<th>Position</th>
	<th>Description</th>
	<th>Company</th>
	<th>City</th>
	<th>State</th>
	<th>Date Posted</th>
	</thead>
<tbody>

<?php 
//user business service is called
$bs = new AdminBusinessService();
$jobs = $bs->displayJobs();

//for loop to populate the data table in the displayUsers view
for ($x = 0; $x < count($jobs); $x++) {
    echo "<tr>";
    
    echo "<td><form action='jobDelete'><input type='hidden' name='id' value=". $jobs[$x]['ID'] ."><input type='submit' value='Delete'></form>  </td>";
    echo "<td><form action='jobEdit'><input type='hidden' name='id' value=". $jobs[$x]['ID'] ."><input type='submit' value='Edit'></form>  </td>";
    
    echo "<td>" . $jobs[$x]['ID'] . "</td>";
    echo "<td>" . $jobs[$x]['JOBTITLE'] . "</td>";
    echo "<td>" . $jobs[$x]['POSITION'] . "</td>";
    echo "<td>" . $jobs[$x]['DESCRIPTION'] . "</td>";
    echo "<td>" . $jobs[$x]['EMPLOYER'] . "</td>";
    echo "<td>" . $jobs[$x]['CITY'] . "</td>";
    echo "<td>" . $jobs[$x]['STATE'] . "</td>";
    echo "<td>" . $jobs[$x]['DATE'] . "</td>";
}
?>
</table>
<!-- //loops through person array and prints values -->

@endsection