<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function login()
    {
        $data = array();
        helper(['form']);

        // Login button clicked
        if($this->request->getMethod() == 'post') {
            $post = $this->request->getPost(['email', 'password']);

            $rules = [
                'email' => ['label' => 'email', 'rules' => 'required|valid_email'],
                'password' => ['label' => 'password', 'rules' => 'required']
            ];

            if(! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $employees = new \App\Models\EmployeeModel();
                $user = $employees->where('email', $post['email'])->where('password', $post['password'])->first(); // add sha1()

                if(! $user) {
                    $session = session();
                    $session->setFlashdata('invalid', 'Invalid email or password, please try again!');
                } else {
                    $this->setUserSession($user);
                    return redirect()->to('/dashboard');
                }
            }

        }    

        // Return Login Page
        return view('login', $data);
    }

    public function setUserSession($user) {

        // Provide variables for every field of user and set session of user
        $data = [
            'myId' => $user->id,
            'myFullName' => $user->full_name,
            'myGender' => $user->gender,
            'myBirthDate' => $user->birth_date,
            'myAge' => $user->age,
            'myContactNumber' => $user->contact_number,
            'myEmail' => $user->email,
            'myShiftId' => $user->shift_id,
            'myHireDate' => $user->hire_date,
            'myPassword' => $user->password,
            'isLoggedIn' => true
        ];

        session()->set($data);
    }
}