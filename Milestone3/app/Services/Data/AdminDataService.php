<?php
//Emily Quevedo
//CST 256
//February 20, 2019
//This is my own work

//Database interacts with the data from Admin class
namespace App\Services\Data;

use Illuminate\Support\Facades\Log;
use App\Models\JobModel;
use App\Services\Utility\DatabaseException;
use PDO;
use PDOException;


class AdminDataService {
    private $conn = null;
    
    //best practice: do not create a database connections in a dao
    //so you can support atomic database transactions
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    //method to find all users in the database
    public function findAllUsers() {
        Log::info("Entering AdminDataService.findAllUsers()");
        
        try {
            //prepared statement is created to display users
            $stmt = $this->conn->prepare('SELECT * from users');
            //executes prepared query
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                //user array is created
                $userArray = array();
                //fetches result from prepared statement and returns as an array
                while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    //inserts variables into end of array
                    array_push($userArray, $user);
                }
                
                Log::info("Exit AdminDataService.findAllUsers() with true");
                //return user array
                return $userArray;
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
    
    //method to delete user
    public function deleteUser($id) {
        Log::info("Entering AdminDataService.deleteUser()");
        
        try {
            //prepared statement is created
            $stmt = $this->conn->prepare('DELETE FROM users WHERE `ID` = :id');
            //bind parameter
            $stmt->bindParam(':id', $id);
            //executes statement
            $delete = $stmt->execute();
            
            //returns true or false if user has been deleted from database
            if ($delete) {
                Log::info("Exiting AdminDataService.deleteUser() with returning true");
                return true;
            }
            
            else {
                Log::info("Exiting AdminDataService.deleteUser() with returning false");
                return false;
            }
        }
        
        catch (\PDOException $e) {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
    
    //method to suspend user
    public function suspendUser($id) {
        Log::info("Entering AdminDataService.suspendUser()");
        
        try {
            //prepared statement is created
            $stmt = $this->conn->prepare("UPDATE users SET `ACTIVE` = '1' WHERE `ID` = :id");
            //bind parameter
            $stmt->bindParam(':id', $id);
            //executes statement
            $suspend = $stmt->execute();
            
            //returns true or false if user active row has been set to 1
            if ($suspend) {
                Log::info("Exiting AdminDataService.suspendUser() with returning true");
                return true;
            }
            
            else {
                Log::info("Exiting AdminDataService.suspendUser() with returning false");
                return false;
            }
        }
        
        catch (\PDOException $e) {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
    
    //method to unsuspend user account
    public function unsuspendUser($id) {
        Log::info("Entering AdminDataService.unsuspendUser()");
        
        try {
            //prepared statement is created
            $stmt = $this->conn->prepare("UPDATE users SET `ACTIVE` = '0' WHERE `ID` = :id");
            //bind parameter
            $stmt->bindParam(':id', $id);
            //executes statement
            $suspend = $stmt->execute();
            
            //returns true or false if user active row has been set to 0
            if ($suspend) {
                Log::info("Exiting AdminDataService.unsuspendUser() with returning true");
                return true;
            }
            
            else {
                Log::info("Exiting AdminDataService.unsuspendUser() with returning false");
                return false;
            }
        }
        
        catch (\PDOException $e) {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
    
    //method to create new job posting
    public function createNewJobPosting(JobModel $job) {
        Log::info("Entering AdminDataService.createNewJobPosting()");
        
        try {
            //select variables and see if the row exists
            $title = $job->getJobTitle();
            $position = $job->getPosition();
            $description = $job->getDescription();
            $employerName = $job->getCompanyName();
            $city = $job->getCity();
            $state = $job->getState();
            $datePosted = $job->getDatePosted();
            
            
            //prepared statements is created
            $stmt = $this->conn->prepare("INSERT INTO `job_posting` (`JOBTITLE`, `POSITION`, `DESCRIPTION`, `EMPLOYER`, `CITY`, `STATE`, `DATE`) VALUES (:title, :position, :description, :employer, :city, :state, :date)");
            //binds parameters
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':employer', $employerName);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':state', $state);
            $stmt->bindParam(':date', $datePosted);
            
            /*see if job posting was created and return true 
             else return false if failed*/
            if ($stmt->execute()) {
                Log::info("Exit AdminDataService.createNewJobPosting() with true");
                return true;
            }
            
            else {
                Log::info("Exit UserDataService.createNewJobPosting() with false");
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
    
    //method to find all jobs 
    public function findAllJobs() {
        Log::info("Entering AdminDataService.findAllJobs()");
        
        try {
            //prepared statement is created to display jobs
            $stmt = $this->conn->prepare('SELECT * from job_posting');
            //executes prepared query
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                //job array is created
                $jobArray = array();
                //fetches result from prepared statement and returns as an array
                while ($job = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    //inserts variables into end of array
                    array_push($jobArray, $job);
                }
                
                Log::info("Exit AdminDataService.findAllJobs() with true");
                //return job array
                return $jobArray;
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
    
    //method to delete job
    public function deleteJob($id) {
        Log::info("Entering AdminDataService.deleteJob()");
        
        try {
            //prepared statement is created
            $stmt = $this->conn->prepare('DELETE FROM job_posting WHERE `ID` = :id');
            //bind parameter
            $stmt->bindParam(':id', $id);
            //executes statement
            $delete = $stmt->execute();
            
            //returns true or false if job posting has been deleted from database
            if ($delete) {
                Log::info("Exiting AdminDataService.deleteJob() with returning true");
                return true;
            }
            
            else {
                Log::info("Exiting AdminDataService.deleteJob() with returning false");
                return false;
            }
        }
        
        catch (\PDOException $e) {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
    
    //method to find job posting by id
    public function findJobPostingByID($id) {
        Log::info("Entering AdminDataService.findJobPostingByID()");
        
        try {
            $stmt = $this->conn->prepare('SELECT * FROM job_posting WHERE ID = :id');
            $stmt->bindParam(':id', $id);
            
            //list array is created and statement is executed
            $list = array();
            $stmt->execute();
            
            //loops through table  using stmt->fetch         
            for ($i = 0; $row = $stmt->fetch(); $i++) {
                //job model is created 
                $job = new JobModel($id, $row['JOBTITLE'], $row['POSITION'], $row['DESCRIPTION'], $row['EMPLOYER'], $row['CITY'], $row['STATE'], $row['DATE']);
                //inserts variables into end of array
                array_push($list, $job);
            }
            //return list array that holds job variables
            Log::info("Exit AdminDataService.findJobPostingByID() with true");
            return $list;
        }
        
        catch (PDOException $e) {
            //best practice: catch all exceptions (do not swallow exceptions),
            //log the exception, do not throw technology specific exceptions,
            //and throw a custom exception
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
    
    //method to update job posting
    public function updateJobPosting(JobModel $jobPosting)
    {
        Log::info("Entering AdminDataService.updateJobPosting()");
        try {
            // select variables and see if the row exists
            $id = $jobPosting->getId();
            $title = $jobPosting->getJobTitle();
            $position = $jobPosting->getPosition();
            $description = $jobPosting->getDescription();
            $company = $jobPosting->getCompanyName();
            $city = $jobPosting->getCity();
            $state = $jobPosting->getState();
            $date = $jobPosting->getDatePosted();
            
            // prepared statements is created
            $stmt = $this->conn->prepare("UPDATE job_posting SET JOBTITLE = :title, POSITION = :position, DESCRIPTION = :description, EMPLOYER = :company, CITY = :city, STATE = :state, DATE = :date WHERE ID = :id");
            // binds parameters
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':state', $state);
            $stmt->bindParam(':date', $date);
            
            $stmt->execute();
            /*
             * see if new job posting data was inserted
             * else return false
             */
            if ($stmt->rowCount() == 1) {
                Log::info("Exit AdminDataService.updateJobPosting() with true");
                return true;
            } else {
                Log::info("Exit AdminDataService.updateJobPosting() with false");
                return false;
            }
        } catch (PDOException $e) {
            // best practice: catch all exceptions (do not swallow exceptions),
            // log the exception, do not throw technology specific exceptions,
            // and throw a custom exception
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
    
}