<?php
namespace App\Controllers;

use Lite\Http\Request;
use Lite\Http\Security\Auth;
use Lite\Routing\BaseController;
use Lite\Service\ContainerHolder;

class AuthController extends BaseController
{
    public function loginPage(Request $request)
    {                
        $route = route('login');        
        return $this->render('pages.login');
    }

    public function signIn(Request $request)
    {
        if ($request->isMethod('POST')) {
            // Retrieve user input
            $email = $request->request->get('email');
            $password = $request->request->get('password');
            
            $user = $this->db()->table('users')->where('email', $email)->first();
        
            // Validate user credentials (replace with your authentication logic)            
            if ($user && password_verify($password, $user->password)) {
                // Authentication successful
                // Set a session or cookie to remember the user                
                $session = $request->getSession();
                $session->set('user', $email);                
        
                // Redirect to a protected area or dashboard
                return redirect('home');
            } else {
                // Authentication failed                
                return redirect('login');
            }
        }
        return response()->json(['name' => 'Tim'])->send();
    }

    public function signOut(Request $request)
    {        
        return response()->json(['response' => 'Signed out'])->send();
    }
}