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
	<th>Suspend</th>
	<th>ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Email</th>
	<th>Username</th>
	<th>Password</th>
	<th>Role</th>
	<th>Active</th>
	</thead>
<tbody>

<?php 
//user business service is called
$bs = new AdminBusinessService();
$users = $bs->displayUsers();

//for loop to populate the data table in the displayUsers view
for ($x = 0; $x < count($users); $x++) {
    if ($users[$x]['ROLE'] != 1) {
    echo "<tr>";
    
    echo "<td><form action='adminDelete'><input type='hidden' name='id' value=". $users[$x]['ID'] ."><input type='submit' value='Delete'></form>  </td>";
    if ($users[$x]['ACTIVE'] == 0) {
    echo "<td><form action='adminSuspend'><input type='hidden' name='id' value=". $users[$x]['ID'] ."><input type='submit' value='Suspend'></form>  </td>";
    } else if ($users[$x]['ACTIVE'] == 1) {
        echo "<td><form action='adminUnsuspend'><input type='hidden' name='id' value=". $users[$x]['ID'] ."><input type='submit' value='Unsuspend'></form>  </td>";
    }
    echo "<td>" . $users[$x]['ID'] . "</td>";
    echo "<td>" . $users[$x]['FIRSTNAME'] . "</td>";
    echo "<td>" . $users[$x]['LASTNAME'] . "</td>";
    echo "<td>" . $users[$x]['EMAIL'] . "</td>";
    echo "<td>" . $users[$x]['USERNAME'] . "</td>";
    echo "<td>" . $users[$x]['PASSWORD'] . "</td>";
    echo "<td>" . $users[$x]['ROLE'] . "</td>";
    echo "<td>" . $users[$x]['ACTIVE'] . "</td>";
    }
}
?>
</table>
<!-- //loops through person array and prints values -->

@endsection