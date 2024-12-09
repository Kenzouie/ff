<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            $user = $this->userModel->where('email', $email)->first();
            
            if ($user && password_verify($password, $user['password'])) {
                $session = session();
                $userData = [
                    'user_id' => $user['user_id'],
                    'email' => $user['email'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'role' => $user['role'],
                    'logged_in' => TRUE
                ];
                $session->set($userData);
                
                // Redirect based on role
                switch($user['role']) {
                    case 'admin':
                        return redirect()->to('admin/dashboard');
                    case 'dentist':
                        return redirect()->to('dentist/dashboard');
                    default:
                        return redirect()->to('patient/dashboard');
                }
            }
            
            return redirect()->back()->with('error', 'Invalid email or password');
        }
        
        return view('auth/login');
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            try {
                $rules = [
                    'first_name' => 'required|min_length[2]',
                    'last_name' => 'required|min_length[2]',
                    'email' => 'required|valid_email|is_unique[users.email]',
                    'phone_number' => 'required|min_length[10]',
                    'password' => 'required|min_length[6]',
                    'confirm_password' => 'required|matches[password]'
                ];
    
                if (!$this->validate($rules)) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', $this->validator->listErrors());
                }
    
                $data = [
                    'first_name' => $this->request->getPost('first_name'),
                    'last_name' => $this->request->getPost('last_name'),
                    'email' => $this->request->getPost('email'),
                    'phone_number' => $this->request->getPost('phone_number'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'role' => 'patient'
                ];
    
                // Debug data before insertion
                log_message('debug', 'Registration data: ' . print_r($data, true));
    
                $result = $this->userModel->insert($data);
                
                if (!$result) {
                    // Log database errors
                    log_message('error', 'Database Error: ' . print_r($this->userModel->errors(), true));
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Failed to register. Database error: ' . implode(', ', $this->userModel->errors()));
                }
    
                return redirect()->to('login')
                    ->with('success', 'Registration successful! Please login.');
    
            } catch (\Exception $e) {
                log_message('error', '[Auth::register] ' . $e->getMessage());
                log_message('error', '[Auth::register] Stack trace: ' . $e->getTraceAsString());
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'An error occurred during registration: ' . $e->getMessage());
            }
        }
    
        return view('auth/register');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
} 