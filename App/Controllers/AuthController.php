<?php
namespace App\Controllers;

use Lite\Auth\AuthTrait;
use Lite\Http\Request;
use Lite\Http\Security\Auth;
use Lite\Routing\BaseController;
use Lite\Service\ContainerHolder;

class AuthController extends BaseController
{
    use AuthTrait;    

    public function __construct()
    {
        $this->setSignInColumn("email"); // Change the value in the constructor
    }
    
    public function loginPage(Request $request)
    {                
        $flashBag = $request->getSession()->getFlashBag();
        if ($flashBag) {
            $errors = $flashBag->get('error');
            $email = $flashBag->get('email')[0] ?? '';
        }
        $route = route('login');
        return $this->render('pages.login', ['errors' => $errors, 'email' => $email]);
    }

    // public function signIn(Request $request)
    // {
    //     if ($request->isMethod('POST')) {
    //         // Retrieve user input
    //         $email = $request->request->get('email');
    //         $password = $request->request->get('password');
            
    //         $user = $this->db()->table('users')->where('email', $email)->first();
        
    //         // Validate user credentials (replace with your authentication logic)            
    //         if ($user && password_verify($password, $user->password)) {
    //             // Authentication successful
    //             // Set a session or cookie to remember the user                
    //             $session = $request->getSession();
    //             $session->set('user', $email);                
        
    //             // Redirect to a protected area or dashboard
    //             return redirect('home');
    //         } else {
    //             // Authentication failed                
    //             return redirect('login');
    //         }
    //     }
    //     return response()->json(['name' => 'Tim'])->send();
    // }

    // public function signOut(Request $request)
    // {
    //     $request->getSession()->invalidate();
    //     return redirect('login');
    // }
}