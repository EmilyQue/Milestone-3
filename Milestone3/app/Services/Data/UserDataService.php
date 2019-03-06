<?php
//Emily Quevedo
//CST 256
//February 4, 2019
//This is my own work 

//Database interacts with the data from the User class
namespace App\Services\Data;

use \PDO;

use App\Models\UserModel;
use App\Models\CredentialModel;
use Illuminate\Support\Facades\Log;
use App\Services\Utility\DatabaseException;
use PDOException;

class UserDataService {
    private $conn = null;
    
    //best practice: do not create a database connections in a dao
    //so you can support atomic database transactions
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    //method to find user
    public function findByUser(CredentialModel $user) {
        Log::info("Entering UserDataService.findByID()");
        
        try {
            //select username and password and see if the row exists
            $username = $user->getUsername();
            $password = $user->getPassword();
            
            $stmt = $this->conn->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            
            /*see if user existed and return true if found
             else return false if not found*/
            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                Log::info("Exit UserDataService.findByUser() with true");
                return $user['ID'];
            }
            
            else {
                Log::info("Exit UserDataService.findByUser() with false");
                return null;
            }
        }
        
        catch (PDOException $e) {
            //best practice: catch all exceptions (do not swallow exceptions),
            //log the exception, do not throw technology specific exceptions,
            //and throw a custom exception
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
    
    //method to create new user 
    public function createNewUser(UserModel $user) {
        Log::info("Entering UserDataService.createNewUser()");
        
        try {
            //select variables and see if the row exists
            $firstname = $user->getFirstname();
            $lastname = $user->getLastname();
            $email = $user->getEmail();
            $username = $user->getUsername();
            $password = $user->getPassword();
            $role = $user->getRole();
            $active = $user->getActive();
            
            //prepared statements is created
            $stmt = $this->conn->prepare("INSERT INTO `users` (`FIRSTNAME`, `LASTNAME`, `EMAIL`, `USERNAME`, `PASSWORD`, `ROLE`, `ACTIVE`) VALUES (:firstname, :lastname, :email, :username, :password, :role, :active)");
            //binds parameters
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':active', $active);
            
            /*see if user existed and return true if found
             else return false if not found*/
            if ($stmt->execute()) {
                Log::info("Exit UserDataService.createNewUser() with true");
                return true;
            }
            
            else {
                Log::info("Exit UserDataService.createNewUser() with false");
                return false;
            }
        }
        
        catch (PDOException $e) {
            //best practice: catch all exceptions (do not swallow exceptions),
            //log the exception, do not throw technology specific exceptions,
            //and throw a custom exception
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
}