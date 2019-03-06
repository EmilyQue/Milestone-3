<?php
//Milestone 1
//Login Module
//Emily Quevedo
//January 20, 2019
//This is my own work

/* Registration Controller process the registration of a new user */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\UserModel;
use Exception;
use App\Services\Business\UserBusinessService;

class RegistrationController extends Controller
{
    //creates new user
    public function index(Request $request) {
        try {
        //validate the form date (note will automatically redirect back to login
        //view if errors
        $this->validateForm($request);
            
        //recieves data inputed from user
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');
        
        //2. create object model
        //save posted form data in user object model
        $user = new UserModel(-1, $firstName, $lastName, $email, $username, $password, 0, 0);
        
        //3. execute business service
        //call security business service
        $service = new UserBusinessService();
        $status = $service->register($user);
        
        //4. process results from business service (navigation)
        //render a failed or success response view and pass the user model to it
        if ($status) {
            
            return view('registerSuccess');
        }
        
        else {
            return view('registerFail');
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
        $rules = ['firstname' => 'Required | Between: 4,10', 'lastname' => 'Required | Between: 4,10', 'email' => 'Required', 'username' => 'Required | Between:4,10 | Alpha',
            'password' => 'Required | Between:4,10'];
        
        //run data validation rules
        $this->validate($request, $rules);
    }
}