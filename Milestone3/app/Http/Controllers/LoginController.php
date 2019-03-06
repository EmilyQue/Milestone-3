<?php
//Milestone 1
//Login Module
//Emily Quevedo
//January 20, 2019
//This is my own work

/* Login module processes the authentication of user credentials */ 


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Models\CredentialModel;
use App\Services\Business\UserBusinessService;

class LoginController extends Controller
{
    //authenticates user credentials
    public function index(Request $request) {
        try {
            //validate the form date (note will automatically redirect back to login
            //view if errors
            $this->validateForm($request);
            
            //1. process form data
            //get posted form data
            $username = $request->input('username');
            $password = $request->input('password');
            
            //2. create object model
            //save posted form data in user object model
            $user = new CredentialModel(0, $username, $password, 0, 0);
            
            //3. execute business service
            //call security business service
            $service = new UserBusinessService();

            $user_id = $service->login($user);

            //4. process results from business service (navigation)
            //set session variables
            //render a failed or success response view and pass the user model to it
            
            if ($user != null && $user_id) {
                $request->session()->put('user_id', $user_id);
                $request->session()->put('username', $username);
                $request->session()->put('role', $user_id);
                
                return view('jobList');
            }
            
            else {
                return view('loginFail');
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
    
    public function logout(Request $request) {
    try {
        //$request->session()->forget('user_id');
        $request->session()->flush();
        $request->session()->regenerate(true);
        return redirect('/login');
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
        $rules = ['username' => 'Required | Between:4,10 | Alpha',
            'password' => 'Required | Between:4,10'];
        
        //run data validation rules
        $this->validate($request, $rules);
    }
}