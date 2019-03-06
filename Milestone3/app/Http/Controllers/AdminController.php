<?php
//Milestone 3
//Emily Quevedo
//February 6, 2019
//This is my own work

/* Admin controller handles user admin methods */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Validation\ValidationException;
use App\Models\JobModel;
use App\Services\Business\AdminBusinessService;

class AdminController extends Controller {
    //method to display all users
    public function index(Request $request) {
        try {
        //call user business service
        $service = new AdminBusinessService();
        $users = $service->displayUsers();
        //render a response view
        if ($users) {
        return view('displayUsers')->with($users);
        }
       }

        catch (ValidationException $e1) {
            //note: this exception must be caught before exception bc validationexception extends from exception
            //must rethrow this exception in order for laravel to display your submitted page with errors
            //catch and rethrow data validation exception (so we can catch all others in our next exception catch block
            throw $e1;
        }
        
    catch (Exception $e){
        //best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
        //log exception and display exception view
        Log::error("Exception: ", array("message" => $e->getMessage()));
        $data = ['errorMsg' => $e->getMessage()];
        return view('exception')->with($data);
        }
    }
    
    //method to delete user 
    public function deleteUser() {
        try {
            //GET method for user id
            $id = $_GET['id'];
            //call user business service
            $service = new AdminBusinessService();
            $delete = $service->deleteUser($id);
            
            //render a success or fail view
            if($delete) {
                return view('deleteSuccess');
            }
            
            else {
                return view('deleteFail');
            }
        }
        
        catch (Exception $e){
            //best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            //log exception and display exception view
            Log::error("Exception: ", array("message" => $e->getMessage()));
            $data = ['errorMsg' => $e->getMessage()];
            return view('exception')->with($data);
        }
    }
    
    //method to suspend user
    public function suspendUser() {
        try {
            //GET method for user id
            $id = $_GET['id'];
            //call user business service
            $service = new AdminBusinessService();
            $suspend = $service->suspendUser($id);
            //renders a success or fail view 
            if($suspend) {
                return view('suspendSuccess');
            }
            
            else {
                return view('suspendFail');
            }
        }
        
        catch (Exception $e){
            //best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            //log exception and display exception view
            Log::error("Exception: ", array("message" => $e->getMessage()));
            $data = ['errorMsg' => $e->getMessage()];
            return view('exception')->with($data);
        }
    }
    
    //method to unsuspend user
    public function unsuspendUser() {
        try {
            //GET method for user id
            $id = $_GET['id'];
            //calls user business service
            $service = new AdminBusinessService();
            $unsuspend = $service->unsuspendUser($id);
            //renders a success or fail view
            if($unsuspend) {
                return view('unsuspendSuccess');
            }
            
            else {
                return view('unsuspendFail');
            }
        }
        
        catch (Exception $e){
            //best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            //log exception and display exception view
            Log::error("Exception: ", array("message" => $e->getMessage()));
            $data = ['errorMsg' => $e->getMessage()];
            return view('exception')->with($data);
        }
    }
    
    //method to add a job posting
    public function addJobPosting(Request $request) {
    try {
        //validate the form date (note will automatically redirect back to login
        //view if errors
        $this->validateForm($request);
        
        //recieves data inputed from user
        $jobTitle = $request->input('title');
        $position = $request->input('position');
        $jobDescription = $request->input('jobDescription');
        $employerName = $request->input('companyName');
        $employerCity = $request->input('companyCity');
        $employerState = $request->input('companyState');
        $datePosted = $request->input('datePosted');
        
        //create object model and save posted form data in user object model
        $job = new JobModel(0, $jobTitle, $position, $jobDescription, $employerName, $employerCity, $employerState, $datePosted);
        
        //execute business service and call security business service
        $service = new AdminBusinessService();
        $status = $service->createJobPosting($job);
        
        //process results from business service (navigation)
        //render a failed or redirect to table of all jobs
        if ($status) {
            
            return redirect()->action('AdminController@displayAllJobs');
        }
        
        else {
            return "Failed";
        }
    }
    
    catch (ValidationException $e1) {
        //note: this exception must be caught before exception bc validationexception extends from exception
        //must rethrow this exception in order for laravel to display your submitted page with errors
        //catch and rethrow data validation exception (so we can catch all others in our next exception catch block
        throw $e1;
    }
    
    catch (Exception $e){
        //best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
        //log exception and display exception view
        Log::error("Exception: ", array("message" => $e->getMessage()));
        $data = ['errorMsg' => $e->getMessage()];
        return view('exception')->with($data);
        }
    }
    
    //method to display all job
    public function displayAllJobs() {
    try {
        //call user business service
        $service = new AdminBusinessService();
        $job = $service->displayJobs();
        //render a response view
        if ($job) {
            return view('displayJobs')->with($job);
        }
    }
    
    catch (Exception $e){
        //best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
        //log exception and display exception view
        Log::error("Exception: ", array("message" => $e->getMessage()));
        $data = ['errorMsg' => $e->getMessage()];
        return view('exception')->with($data);
        }
    }
    
    //method to delete job 
    public function deleteJob() {
        try {
            //GET method for user id
            $id = $_GET['id'];
            //call user business service
            $service = new AdminBusinessService();
            $delete = $service->deleteJob($id);
            
            //render a success or fail view
            if($delete) {
                return view('deleteSuccess');
            }
            
            else {
                return view('deleteFail');
            }
        }
        
        catch (Exception $e){
            //best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            //log exception and display exception view
            Log::error("Exception: ", array("message" => $e->getMessage()));
            $data = ['errorMsg' => $e->getMessage()];
            return view('exception')->with($data);
        }
    }
    
    //method to find job posting by id 
    public function findJobPosting() {
        try {
            //1. process form data
            //get posted form data
            $id = $_GET['id'];
            
            //call security business service
            $service = new AdminBusinessService();
            $jobPosting = $service->findJobPostingByID($id);
            
            //process results from business service (navigation)
            //render a failed or success response view and pass the job posting model to it
            
            if ($jobPosting) {
                return view('editJobPosting')->with('jobPosting', $jobPosting);
            }
            
            else {
                return false;
            }
        }
        
        catch (Exception $e){
            //best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            //log exception and display exception view
            Log::error("Exception: ", array("message" => $e->getMessage()));
            $data = ['errorMsg' => $e->getMessage()];
            return view('exception')->with($data);
        }
    }
    
    //method to update job posting
    public function updateJobPosting(Request $request) {
        try {
            //validate the form date (note will automatically redirect back to login
            //view if errors
             $this->validateForm($request);
            
            //recieves data inputed from user
            $id = $request->input('id');
            $jobTitle = $request->input('title');
            $position = $request->input('position');
            $jobDescription = $request->input('jobDescription');
            $employerName = $request->input('companyName');
            $employerCity = $request->input('companyCity');
            $employerState = $request->input('companyState');
            $datePosted = $request->input('datePosted');
            
            //create object model and save posted form data in user object model
            $job = new JobModel($id, $jobTitle, $position, $jobDescription, $employerName, $employerCity, $employerState, $datePosted);
            
            //execute business service and call security business service
            $service = new AdminBusinessService();
            $status = $service->updateJobPosting($job);
            
            //process results from business service (navigation)
            //render a failed or redirect to table that displays all jobs
            if ($status) {
                
                return redirect()->action('AdminController@displayAllJobs');
            }
            
            else {
                return "Fail";
            }
        }
        
        catch (ValidationException $e1) {
            //note: this exception must be caught before exception bc validationexception extends from exception
            //must rethrow this exception in order for laravel to display your submitted page with errors
            //catch and rethrow data validation exception (so we can catch all others in our next exception catch block
            throw $e1;
        }
        
        catch (Exception $e){
            //best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            //log exception and display exception view
            Log::error("Exception: ", array("message" => $e->getMessage()));
            $data = ['errorMsg' => $e->getMessage()];
            return view('exception')->with($data);
        }
    }
    
    private function validateForm(Request $request){
        //best practice: centralize your rules so you have a consistent architecture and even reuse your rules
        //bad practice: not using a defined data validation framework, putting rules all over your code, doing only on client side or database
        //setup data validation rules for login form
                $rules = ['title' => 'Required | Between:4,50',
                    'position' => 'Required | Between:4,50', 'jobDescription' => 'Required | Between:2,100', 'companyName' => 'Required | Between:4,50', 'companyCity' => 'Required | Between:4,50', 'companyState' => 'Required | Between:4,50', 'datePosted' => 'Required | Between:4,50'];
        
//                 run data validation rules
                 $this->validate($request, $rules);
    }
}