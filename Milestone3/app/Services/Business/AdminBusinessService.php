<?php
//Milestone 3
//Emily Quevedo
//February 20, 2019
//This is my own work

/*Handles admin business logic and connections to database*/
namespace App\Services\Business;

use Illuminate\Support\Facades\Log;
use PDO;
use App\Services\Data\AdminDataService;
use App\Models\JobModel;

class AdminBusinessService {
    //deletes user 
    public function deleteUser($id) {
        Log::info("Entering AdminBusinessService.deleteUser()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create an admin dao with this connection and try to find and delete user
        $service = new AdminDataService($conn);
        $flag = $service->deleteUser($id);
        
        //return the finder results
        Log::info("Exit AdminBusinessService.deleteUser() with " . $flag);
        return $flag;
    }
    
    //suspend user
    public function suspendUser($id) {
        Log::info("Entering AdminBusinessService.suspendUser()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create an admin dao with this connection and try to find and suspend user
        $service = new AdminDataService($conn);
        $flag = $service->suspendUser($id);
        
        //return the finder results
        Log::info("Exit AdminBusinessService.suspendUser() with " . $flag);
        return $flag;
    }
    
    //unsuspend user
    public function unsuspendUser($id) {
        Log::info("Entering AdminBusinessService.unsuspendUser()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create an admin dao with this connection and try to find and unsuspend user
        $service = new AdminDataService($conn);
        $flag = $service->unsuspendUser($id);
        
        //return the finder results
        Log::info("Exit AdminBusinessService.unsuspendUser() with " . $flag);
        return $flag;
    }
    
    //display users
    public function displayUsers() {
        Log::info("Entering AdminBusinessService.displayUsers()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //best practice: do not create database connections in a dao
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create an admin dao with this connection and try to display all users
        $service = new AdminDataService($conn);
        //calls the findAllUsers command
        $flag = $service->findAllUsers();
        //return the finder results
        return $flag;
        
        Log::info("Exit AdminBusinessService.displayUsers() with " . $flag);
    }
    
    //create job posting
    public function createJobPosting(JobModel $job) {
        Log::info("Entering AdminBusinessService.createJobPosting()");
        
        //best practice: externalize your app configuration
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //best practice: do not create database connections in a dao
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create an admin dao with this connection and create a new job posting
        $service = new AdminDataService($conn);
        $flag = $service->createNewJobPosting($job);
        
        //return the finder results
        Log::info("Exit AdminBusinessService.createJobPosting() with " . $flag);
        return $flag;
    }
    
    //display jobs
    public function displayJobs() {
        Log::info("Entering AdminBusinessService.displayJobs()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //best practice: do not create database connections in a dao
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create an admin dao with this connection and try to find jobs and display them
        $service = new AdminDataService($conn);
        //calls the findAllJobs command
        $flag = $service->findAllJobs();
        //return the finder results
        return $flag;
        
        Log::info("Exit AdminBusinessService.displayJobs() with " . $flag);
    }
    
    //delete job
    public function deleteJob($id) {
        Log::info("Entering AdminBusinessService.deleteJob()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create an admin dao with this connection and try to find and delete job posting
        $service = new AdminDataService($conn);
        $flag = $service->deleteJob($id);
        
        //return the finder results
        Log::info("Exit AdminBusinessService.deleteJob() with " . $flag);
        return $flag;
    }
    
    //find job posting by id
    public function findJobPostingByID($id) {
        Log::info("Entering AdminBusinessService.findJobPostingByID()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create an admin dao with this connection and try to find the job posting by id
        $service = new AdminDataService($conn);
        $flag = $service->findJobPostingByID($id);
        
        //return the finder results
        Log::info("Exit AdminBusinessService.findJobPostingByID() with " . print_r($flag, true));
        return $flag;
    }
    
    //update job posting
    public function updateJobPosting(JobModel $job) {
        Log::info("Entering AdminBusinessService.updateJobPosting()");
        
        //best practice: externalize your app configuration
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //best practice: do not create database connections in a dao
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create an admin dao with this connection and update job posting
        $service = new AdminDataService($conn);
        $flag = $service->updateJobPosting($job);
        
        //return the finder results
        Log::info("Exit AdminBusinessService.updateJobPosting() with " . $flag);
        return $flag;
    }
}