<?php
//Emily Quevedo
//CST 256
//February 20, 2019
//This is my own work
/*Handles user profile business logic and connections to database*/
namespace App\Services\Business;

use \PDO;
use Illuminate\Support\Facades\Log;
use App\Models\ContactModel;
use App\Services\Data\ProfileDataService;
use App\Models\EducationModel;
use App\Models\JobHistoryModel;
use App\Models\SkillsModel;

class ProfileBusinessService {
    //create contact info
    public function addContactInfo(ContactModel $contactInfo) {
        Log::info("Entering ProfileBusinessService.addContactInfo()");
    
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create a profile dao with this connection and create user contact info
        $service = new ProfileDataService($conn);
        $flag = $service->createContactInfo($contactInfo);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.addContactInfo() with " . $flag);
        return $flag;
    }
    
    //find contact by id
    public function findContactByID($id) {
        Log::info("Entering ProfileBusinessService.findContactByID()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create a profile dao with this connection and try to find contact info by id
        $service = new ProfileDataService($conn);
        $flag = $service->findContactByID($id);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.findContactByID() with " . print_r($flag, true));
        return $flag;
    }
    
    //update contact info
    public function updateContactInfo(ContactModel $contactInfo)
    {
        Log::info("Entering ProfileBusinessService.updateContactInfo()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a profile dao with this connection and try to update user contact info
        $service = new ProfileDataService($conn);
        $flag = $service->updateContactInfo($contactInfo);
        // return the finder results
        Log::info("Exit ProfileBusinessService.updateContactInfo() with " . $flag);
        return $flag;
    }
    
    //delete user contact info
    public function deleteContactInfo($id) {
        Log::info("Entering ProfileBusinessService.deleteContactInfo()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create a profile dao with this connection and try to find and delete user contact info
        $service = new ProfileDataService($conn);
        $flag = $service->deleteContact($id);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.deleteContactInfo() with " . $flag);
        return $flag;
    }
    
    //add education
    public function addEducation(EducationModel $education) {
        Log::info("Entering ProfileBusinessService.addEducation()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create a security service dao with this connection and create user education
        $service = new ProfileDataService($conn);
        $flag = $service->createEducation($education);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.addEducation() with " . $flag);
        return $flag;
    }
    
    //find education by id
    public function findEducationByID($id) {
        Log::info("Entering ProfileBusinessService.findEducationByID()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create a profile dao with this connection and try to find the password in user
        $service = new ProfileDataService($conn);
        $flag = $service->findEducationByID($id);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.findEducationByID() with " . print_r($flag, true));
        return $flag;
    }
    
    //update education
    public function updateEduation(EducationModel $education) {
        Log::info("Entering ProfileBusinessService.updateEducation()");
        
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
        
        //create a profile dao with this connection and try to find and update education
        $service = new ProfileDataService($conn);
        $flag = $service->updateEducation($education);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.updateEducation() with " . $flag);
        return $flag;
    }
    
    //delete education
    public function deleteEducation($id) {
        Log::info("Entering ProfileBusinessService.deleteEducation()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create a profile dao with this connection and try to find and delete education
        $service = new ProfileDataService($conn);
        $flag = $service->deleteEducation($id);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.deleteEducation() with " . $flag);
        return $flag;
    }
    
    //add job history
    public function addJobHistory(JobHistoryModel $history) {
        Log::info("Entering ProfileBusinessService.addJobHistory()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create a profile dao with this connection and create user job history
        $service = new ProfileDataService($conn);
        $flag = $service->createJobHistory($history);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.addJobHistory() with " . $flag);
        return $flag;
    }
    
    //find job history by id
    public function findJobHistoryByID($id) {
        Log::info("Entering ProfileBusinessService.findJobHistoryByID()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create a profile dao with this connection and try to find the job history by id
        $service = new ProfileDataService($conn);
        $flag = $service->findJobHistoryByID($id);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.findJobHistoryByID() with " . print_r($flag, true));
        return $flag;
    }
    
    //update job history
    public function updateJobHistory(JobHistoryModel $history) {
        Log::info("Entering ProfileBusinessService.updateJobHistory()");
        
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
        
        //create a profile dao with this connection and try to find and update education
        $service = new ProfileDataService($conn);
        $flag = $service->updateJobHistory($history);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.updateJobHistory() with " . $flag);
        return $flag;
    }
    
    //delete job history
    public function deleteJobHistory($id) {
        Log::info("Entering ProfileBusinessService.deleteJobHistory()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create a profile dao with this connection and try to find and delete skill
        $service = new ProfileDataService($conn);
        $flag = $service->deleteJobHistory($id);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.deleteJobHistory() with " . $flag);
        return $flag;
    }
    
    //add skills
    public function addSkills(SkillsModel $skills) {
        Log::info("Entering ProfileBusinessService.addSkills()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create a profile with this connection and create user skills
        $service = new ProfileDataService($conn);
        $flag = $service->createSkills($skills);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.addSkills() with " . $flag);
        return $flag;
    }
    
    //find skills by id
    public function findSkillsByID($id) {
        Log::info("Entering ProfileBusinessService.findSkillsByID()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create a profile dao with this connection and try to find the password in user
        $service = new ProfileDataService($conn);
        $flag = $service->findSkillsByID($id);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.findSkillsByID() with " . print_r($flag, true));
        return $flag;
    }
    
    //update skill
    public function updateSkills(SkillsModel $skill) {
        Log::info("Entering ProfileBusinessService.updateSkills()");
        
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
        
        //create a profile dao with this connection and try to find and update education
        $service = new ProfileDataService($conn);
        $flag = $service->updateSkills($skill);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.updateSkills() with " . $flag);
        return $flag;
    }
    
    
    //delete skill
    public function deleteSkill($id) {
        Log::info("Entering ProfileBusinessService.deleteSkill()");
        
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        //create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create a profile dao with this connection and try to find and delete skill
        $service = new ProfileDataService($conn);
        $flag = $service->deleteSkill($id);
        
        //return the finder results
        Log::info("Exit ProfileBusinessService.deleteUser() with " . $flag);
        return $flag;
    }
}