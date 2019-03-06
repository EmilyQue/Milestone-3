<?php
//Emily Quevedo 
//CST 256
//February 3, 2019
//This is my own work
/*Handles user business logic and connections to database*/
namespace App\Services\Business;
use \PDO;
use Illuminate\Support\Facades\Log;
use App\Models\CredentialModel;
use App\Models\UserModel;
use App\Services\Data\UserDataService;

class UserBusinessService {
    
    public function login(CredentialModel $user) {
        Log::info("Entering UserBusinessService.login()");
        
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
        
        //create a security service dao with this connection and try to find the password in user
        $service = new UserDataService($conn);
        $flag = $service->findByUser($user);
        
        //return the finder results
        Log::info("Exit UserBusinessService.authenticate() with " . $flag);
        return $flag;
    }
    
    public function register(UserModel $user) {
        Log::info("Entering UserBusinessService.register()");
        
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
        
        //create a security service dao with this connection and try to find the password in user
        $service = new UserDataService($conn);
        $flag = $service->createNewUser($user);
        
        //return the finder results
        Log::info("Exit UserBusinessService.register() with " . $flag);
        return $flag;
    }
    
}