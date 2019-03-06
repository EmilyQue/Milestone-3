<?php session_start();
use App\Services\Business\UserBusinessService;
use App\Services\Business\AdminBusinessService;
?>
@extends('layouts.navbar')
@section('title', 'Admin Page')

@section('content')

<head>
<style>

</style>

</head>
<table id="user"> 
<h3>Job Listings: </h3>
<tbody>

<?php 
//user business service is called
$bs = new AdminBusinessService();
$jobs = $bs->displayJobs();

//for loop to populate the data table in the displayUsers view
for ($x = 0; $x < count($jobs); $x++) {
    echo "<hr>";

    echo $jobs[$x]['JOBTITLE'] . "<br/>";
    echo $jobs[$x]['POSITION'] . "<br/>";
    echo $jobs[$x]['DESCRIPTION'] . "<br/>";
    echo $jobs[$x]['EMPLOYER'] . "<br/>";
    echo $jobs[$x]['CITY'] . "<br/>";
    echo $jobs[$x]['STATE'] . "<br/>";
    echo $jobs[$x]['DATE'] . "<br/>";
}
?>
</table>
<!-- //loops through person array and prints values -->

@endsection