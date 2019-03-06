<?php
//Milestone 3
//Emily Quevedo
//February 20, 2019
//This is my own work

/* Profile controller processes the submitted data for user profile */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Services\Business\ProfileBusinessService;
use App\Models\ContactModel;
use App\Models\EducationModel;
use App\Models\JobHistoryModel;
use App\Models\SkillsModel;

class ProfileController extends Controller
{
    //method to find user profile 
    public function findProfile() {
        //get session user id
        $id = session()->get('user_id');
        
        //call business service class
        $service = new ProfileBusinessService();
        
        //access find by id methods 
        $contactInfo = $service->findContactByID($id);
        
        $skills = $service->findSkillsByID($id);
        
        $education = $service->findEducationByID($id);
        
        $jobHistory = $service->findJobHistoryByID($id);
        
        //process results from business service (navigation)
        //render the user profile view and pass the profile array to it
        $profile = ['contactInfo' => $contactInfo, 'skills' => $skills, 'education' => $education, 'history' => $jobHistory];
        
        return view('profile')->with($profile);
    }
    
    //method to find user skills
    public function findSkills() {
        try {
            //get posted form data
            $id = session()->get('user_id');
            
            //call security business service
            $service = new ProfileBusinessService();
            $skills = $service->findSkillsByID($id);
            
            //render a failed or edit skills view and pass the skills model to it
            if ($skills) {
                return view('editSkills')->with('skills', $skills);
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
    
    //method to find user education 
    public function findEducation() {
        try {
            //get posted form data
            $id = session()->get('user_id');
            
            //call security business service
            $service = new ProfileBusinessService();
            $education = $service->findEducationByID($id);
            
            //process results from business service (navigation)
            //render a failed or edit education view and pass the education model to it
            
            if ($education) {
                return view('editEducation')->with('education', $education);
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
    
    //method to find user contact info
    public function findContactInfo() {
        try {
            //get posted form data
            $id = session()->get('user_id');
            
            //call security business service
            $service = new ProfileBusinessService();
            $contactInfo = $service->findContactByID($id);
            
            //process results from business service (navigation)
            //render a failed or edit contact info response view and pass the contact info model to it
            if ($contactInfo) {
                return view('editContactInfo')->with('contactInfo', $contactInfo);
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
    
    //method to find user job history
    public function findJobHistory() {
        try {
            //get posted form data
            $id = session()->get('user_id');
            
            //call security business service
            $service = new ProfileBusinessService();
            $history = $service->findJobHistoryByID($id);
            
            //process results from business service (navigation)
            //render a failed or edit job history view and pass the job history model to it
            if ($history) {
                return view('editHistory')->with('history', $history);
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
    
    //method to create contact info
    public function createContactInfo(Request $request) {
        try {
            //validate the form date (note will automatically redirect back to login
            //view if errors
            $this->validateForm($request);

            //get posted form data
            $email = $request->input('business_email');
            $phone = $request->input('phone');
            $about = $request->input('aboutMe');
            $street = $request->input('street');
            $city = $request->input('city');
            $state = $request->input('state');
            $zipcode = $request->input('zipcode');
            
            if ($request->session()->has('user_id')) {
                $user_id = $request->session()->get('user_id');
            }
            
            //create object model and save posted form data in user object model
            $userContact = new ContactModel(-1, $email, $phone, $about, $street, $city, $state, $zipcode, $user_id);
            
            //execute business service and call security business service
            $service = new ProfileBusinessService();
            $status = $service->addContactInfo($userContact);
            
            //process results from business service (navigation)
            //render a failed or redirect to user profile view
            if ($status) {
                return redirect()->action('ProfileController@findProfile');
            }
            
            else {
                return view('profileFail');
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
    
    //method to update contact info
    public function updateContactInfo(Request $request) {
            try {
                //validate the form date
                //view if errors
                $this->validateForm($request);
                
                //get posted form data
                $id = $request->input('contact_id');
                $email = $request->input('business_email');
                $phone = $request->input('phone');
                $about = $request->input('aboutMe');
                $street = $request->input('street');
                $city = $request->input('city');
                $state = $request->input('state');
                $zipcode = $request->input('zipcode');
                
                //create object model and save posted form data in contact object model
                $userContact = new ContactModel($id, $email, $phone, $about, $street, $city, $state, $zipcode, 0);
                
                //execute business service and call security business service
                $service = new ProfileBusinessService();
                $status = $service->updateContactInfo($userContact);
                
                //process results from business service (navigation)
                //render a failed or redirect to profile view
                if ($status) {
                    
                    return redirect()->action('ProfileController@findProfile');
                }
                
                else {
                    return view('profileFail');
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
    
    //method to delete user contact info
    public function deleteContact() {
        try {
            //GET method for user id
            $id = $_GET['id'];
            //call user business service
            $service = new ProfileBusinessService();
            $delete = $service->deleteContactInfo($id);
            
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
    
    //method to create education
    public function createEducation(Request $request) {
        try {
            //validate the form date (note will automatically redirect back to login
            //view if errors
            $this->validateForm($request);
            
            //get posted form data
            $degree = $request->input('degree');
            $school = $request->input('school');
            $city = $request->input('city');
            $state = $request->input('state');
            $graduation = $request->input('graduation');
            
            if ($request->session()->has('user_id')) {
                $user_id = $request->session()->get('user_id');
            }
            
            //create object model and save posted form data in education object model
            $userEducation = new EducationModel(-1, $degree, $school, $city, $state, $graduation, $user_id);
            
            //execute business service and call security business service
            $service = new ProfileBusinessService();
            $status = $service->addEducation($userEducation);
            
            //process results from business service (navigation)
            //render a failed or redirect to user profile view
            
            if ($status) {
                return redirect()->action('ProfileController@findProfile');
            }
            
            else {
                return view('profileFail');
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
    
    //method to update user education 
    public function updateEducation(Request $request) {
        try {
            //validate the form date (note will automatically redirect back to login
            //view if errors
            $this->validateForm($request);
            
            //get posted form data
            $id = $request->input('id');
            $degree = $request->input('degree');
            $school = $request->input('school');
            $city = $request->input('city');
            $state = $request->input('state');
            $graduation = $request->input('graduation');
            
            if ($request->session()->has('user_id')) {
                $user_id = $request->session()->get('user_id');
            }
            
            //create object model and save posted form data in user object model
            $userEducation = new EducationModel($id, $degree, $school, $city, $state, $graduation, $user_id);
            
            //execute business service and call security business service
            $service = new ProfileBusinessService();
            $status = $service->updateEduation($userEducation);
            
            //process results from business service (navigation)
            //render a failed or redirect to user profile view
            
            if ($status) {
                return redirect()->action('ProfileController@findProfile');
            }
            
            else {
                return view('profileFail');
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
    
    //delete education
    public function deleteEducation() {
        try {
            //GET method for user id
            $id = $_GET['id'];
            //call user business service
            $service = new ProfileBusinessService();
            $delete = $service->deleteEducation($id);
            
            //render page redirect to user profile view or fail view
            if($delete) {
                return redirect()->action('ProfileController@findProfile');
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
    
    //method to create job history
    public function createJobHistory(Request $request) {
        try {
            //validate the form date (note will automatically redirect back to login
            //view if errors
            $this->validateForm($request);
            
            //get posted form data
            $previousJobTitle = $request->input('prevTitle');
            $previousJobDescription = $request->input('description');
            $startDate = $request->input('startDate');
            $endDate = $request->input('endDate');
            $companyName = $request->input('company');
            $city = $request->input('city');
            $state = $request->input('state');
            
            if ($request->session()->has('user_id')) {
                $user_id = $request->session()->get('user_id');
            }
            
            //create object model and save posted form data in job history object model
            $userHistory = new JobHistoryModel(-1, $previousJobTitle, $previousJobDescription, $startDate, $endDate, $companyName, $city, $state, $user_id);
            
            //execute business service and call security business service
            $service = new ProfileBusinessService();
            $status = $service->addJobHistory($userHistory);
            
            //process results from business service (navigation)
            //render a failed or redirect to user profile view
            
            if ($status) {
                return redirect()->action('ProfileController@findProfile');
            }
            
            else {
                return view('profileFail');
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
    
    //update job history
    public function updateJobHistory(Request $request) {
        try {
            //validate the form date
            //view if errors
            $this->validateForm($request);
            
            //get posted form data
            $id = $request->input('id');
            $previousJobTitle = $request->input('prevTitle');
            $previousJobDescription = $request->input('description');
            $startDate = $request->input('startDate');
            $endDate = $request->input('endDate');
            $companyName = $request->input('company');
            $city = $request->input('city');
            $state = $request->input('state');
            
            //create object model and save posted form data in job history object model
            $userHistory = new JobHistoryModel($id, $previousJobTitle, $previousJobDescription, $startDate, $endDate, $companyName, $city, $state, 0);
            
            //execute business service and call security business service
            $service = new ProfileBusinessService();
            $status = $service->updateJobHistory($userHistory);
            
            //process results from business service (navigation)
            //render a failed or redirect to profile view
            if ($status) {
                
                return redirect()->action('ProfileController@findProfile');
            }
            
            else {
                return view('profileFail');
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
    
    //delete job history
    public function deleteJobHistory() {
        try {
            //GET method for user id
            $id = $_GET['id'];
            //call user business service
            $service = new ProfileBusinessService();
            $delete = $service->deleteJobHistory($id);
            
            //render page redirect to user profile view or fail view
            if($delete) {
                return redirect()->action('ProfileController@findProfile');
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
    
    //method to create user skills
    public function createSkills(Request $request) {
        try {
            //validate the form date
            //view if errors
            $this->validateForm($request);
            
            //get posted form data
            $skill = $request->input('skills');
            
            if ($request->session()->has('user_id')) {
                $user_id = $request->session()->get('user_id');
            }
            
            //create object model and save posted form data in skills object model
            $skills = new SkillsModel(-1, $skill, $user_id);
            
            //execute business service and call security business service
            $service = new ProfileBusinessService();
            $status = $service->addSkills($skills);
            
            //process results from business service (navigation)
            //render a failed or redirect to user profile view
            
            if ($status) {
                return redirect()->action('ProfileController@findProfile');
            }
            
            else {
                return view('profileFail');
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
    
    //update skill
    public function updateSkill(Request $request) {
        try {
            //validate the form date (note will automatically redirect back to login
            //view if errors
            $this->validateForm($request);
            
            //get posted form data
            $id = $request->input('id');
            $skill = $request->input('skills');
            
            //create object model and save posted form data in skill object model
            $userSkill = new SkillsModel($id, $skill, 0);
            
            //execute business service and call security business service
            $service = new ProfileBusinessService();
            $status = $service->updateSkills($userSkill);
            
            //process results from business service (navigation)
            //render a failed or redirect to user profile view
            
            if ($status) {
                return redirect()->action('ProfileController@findProfile');
            }
            
            else {
                return view('profileFail');
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
    
    //method to delete skill
    public function deleteSkill() {
        try {
            //GET method for user id
            $id = $_GET['id'];
            //call user business service
            $service = new ProfileBusinessService();
            $delete = $service->deleteSkill($id);
            
            //render page redirect to user profile view or fail view
            if($delete) {
                return redirect()->action('ProfileController@findProfile');
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
    
    private function validateForm(Request $request){
        //best practice: centralize your rules so you have a consistent architecture and even reuse your rules
        //bad practice: not using a defined data validation framework, putting rules all over your code, doing only on client side or database
        //setup data validation rules for login form
//         $rules = ['business_email' => 'Required | Between:4,50',
//             'phone' => 'Required', 'aboutMe' => 'Required | Between:2,100', 'street' => 'Required', 'city' => 'Required', 'state' => 'Required', 'zipcode' => 'Required', 'degree' => 'Required | Between:4, 100', 'school' => 'Required | Between:4,50', 'graduation' => 'Required', 'prevTitle' => 'Required', 'description' => 'Required', 'startDate' => 'Required', 'endDate' => 'Required', 'company' => 'Required', 'skills' => 'Required'];
        
//         run data validation rules
//          $this->validate($request, $rules);
    }
}