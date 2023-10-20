<?php
namespace Lite\Auth;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Valitron\Validator;

trait AuthTrait {
    protected $signInColumn = 'username';

    public function register(Request $request)
    {
        $v = new Validator($request->request->all());
        $v->rule('required', ['username', 'password'])
            ->message('{field} is required');
        $v->rule('lengthMin', 'username', 4)
            ->message('Username must be at least 4 characters long');
        $v->rule('lengthMin', 'password', 8)
            ->message('Password must be at least 8 characters long');

        if ($v->validate()) {
            $username = $request->get('username');
            $password = $request->get('password');

            // Hash the password (use a strong hashing algorithm)
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Store user data in the database using Illuminate Database Capsule
            $this->db()->table('users')->insert([
                'username' => $username,
                'password' => $hashedPassword,
            ]);

            return new Response('Registration successful', 200);
        } else {
            // Re-populate the form fields with user input (except password)
            $request->getSession()->getFlashBag()->set('input', $request->request->except(['password']));
            $request->getSession()->getFlashBag()->set('errors', $v->errors());

            return new Response('Registration failed', 400);
        }
    }

    public function signin(Request $request)
    {
        if ($request->isMethod('POST')) {            
            $v = new Validator($request->request->all());
            $v->rule('required', [$this->signInColumn, 'password'])
                ->message('{field} is required');

            if ($v->validate()) {                
                $login = $request->get($this->signInColumn);
                $password = $request->get('password');                

                // Retrieve user data from the database using Illuminate Database Capsule
                $user = $this->db()->table('users')->where($this->signInColumn, $login)->first();
                // Can not authenticate the user
                if (!$user || !password_verify($password, $user->password)) {                    
                    // Invalid credentials; redirect with error messages and user input
                    $flashData = [
                        'error' => 'Invalid Credential',
                        $this->signInColumn => $request->get($this->signInColumn)
                    ];                    
                    SessionManager::addItemsToFlashBag($request, $flashData);

                    return redirect('login');
                }

                // Create a session to indicate the user is signed in using Symfony Http Foundation
                // Define the session variables
                $sessionData = [
                    'user' => $user->id,
                    'name' => $user->name,
                    'loggedIn' => true,
                ];
                SessionManager::storeAll($request, $sessionData);

                return redirect('home');
            } else {
                // Re-populate the form fields with user input (except password)
                // Invalid credentials; redirect with error messages and user input                
                $flashData = [
                    'error' => json_encode($v->errors()),
                    $this->signInColumn, $request->get($this->signInColumn)
                ];
                SessionManager::addItemsToFlashBag($request, $flashData);

                return redirect('login');
            }
        }
        return response('Method not allowed', 405);
    }

    public function signOut(Request $request)
    {
        // Destroy the session to sign the user out using Symfony Http Foundation
        $request->getSession()->invalidate();
        return redirect('login');
    }

    public function setSignInColumn($column)
    {
        $this->signInColumn = $column;
    }
}