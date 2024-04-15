<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CompanyModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
    public function __construct()
    {
        // Load necessary helpers and libraries
        helper(['form', 'url', 'session']);
       // $this->db = \Config\Database::connect();
       $this->CompanyModel=new CompanyModel();

    }

//-----------------------------------Register user-----------------------------------------------------------//

    public function register()
    {
        // Load necessary helpers and libraries
        helper(['form']);
    
        if ($this->request->getMethod() === 'post') {
            // Validate the form input
            if ($this->validate([
                "firstname" => "required",
                "lastname" => "required",
                "email" => "required|valid_email|is_unique[users.email]",
                "password" => "required|min_length[5]|max_length[20]",
                "confirmpassword" => "matches[password]"
            ])) {
                // Registration form submitted successfully
                $firstname = $this->request->getVar("firstname");
                $lastname = $this->request->getVar("lastname");
                $email = $this->request->getVar("email");
                $password = password_hash($this->request->getVar("password"), PASSWORD_DEFAULT); // Hash password
    
                // Prepare data for insertion
                $data = [
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "email" => $email,
                    "password" => $password
                ];
    
                // Insert data into the database
                $model = new UserModel();
                if ($model->insert($data)) {
                    // Data inserted successfully
                    $session = session();
                    $session->setFlashdata("success_message", "User registered successfully");
                    return redirect()->to('login');
                } else {
                    // Database insert failed
                    $session = session();
                    $session->setFlashdata("error_message", "Failed to register user. Please try again.");
                    return redirect()->back()->withInput();
                }
            } 
            else {
                // Form validation failed
                return redirect()->back()->withInput();
            }
        } 
        else {
            // Redirect to the registration form if accessed directly
            echo view('register');
        }
    }
    

   

//-----------------------------------Display table of registered user-----------------------------------------------------------//

    public function tables(): string
    {
        // Load UserModel
        $model = new UserModel();

        // Fetch all users from the database
        $data['users'] = $model->findAll();

        // Pass the fetched data to the view
        return view('tables', $data);
        
    }

//-----------------------------------View the form to fill company details-----------------------------------------------------------//

    public function company_data()
    {
            return view('company_data');
    }

    public function login()
    {
            echo view('login');
    }

   
    public function logout(){
        $session=session();
        session_unset();
        session_destroy();
        return redirect()->to(site_url());
    }

//-----------------------------------Change the password of registered user-----------------------------------------------------------//
  

    public function change_password()
{
    // Load necessary helpers and libraries
    helper(['form']);

    if ($this->request->getMethod() === 'post') {
        $email = $this->request->getVar("email");
        $oldPassword = $this->request->getVar("old_password");
        $newPassword = $this->request->getVar("new_password");
        $confirmNewPassword = $this->request->getVar("confirm_new_password");

        // Get the user's data from the database based on the email
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        // Verify if the user exists and old password matches
        if ($user && password_verify($oldPassword, $user['password'])) {
            // Verify if new password and confirm new password match
            if ($newPassword === $confirmNewPassword) {
                // Hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the user's password in the database
                $updatedData = [
                    'password' => $hashedPassword
                ];

                if ($userModel->update($user['id'], $updatedData)) {
                    // Password updated successfully
                    $session = session();
                    $session->setFlashdata("success_message", "Password changed successfully.");
                    return redirect()->to(site_url('change-password'));
                } else {
                    // Database update failed
                    $session = session();
                    $session->setFlashdata("error_message", "Failed to change password. Please try again.");
                    return redirect()->to(site_url('change-password'));
                }
            } else {
                // New password and confirm new password do not match
                $session = session();
                $session->setFlashdata("error_message", "New password and confirm new password do not match.");
                return redirect()->to(site_url('change-password'));
            }
        } else {
            // Email or old password is incorrect or user not found
            $session = session();
            $session->setFlashdata("error_message", "Email or old password is incorrect.");
            return redirect()->to(site_url('change-password'));
        }
    }

    // Redirect to the change password form if accessed directly
    return view('change_password');
}



public function forgot_password(): string
{
    return view('forgot_password');
}
public function clients_list()
{
  //  $companyModel = new \App\Models\CompanyModel(); // Load the CompanyModel
    $data['clients'] =  $this->CompanyModel->getclient(); // Fetch all clients from the database

    return view('clients_list', $data); // Pass the data to the view
}

public function add_clients()
    {
        return view('add_clients');
    }

public function addclients()
{
    if($this->request->getMethod()==='post')
    {
        $userdata=[
            'client_name' => $this->request->getPost('client_name'),
            'client_email' => $this->request->getPost('client_email'),
            'client_location' => $this->request->getPost('client_location'),
            'status' => $this->request->getPost('status'),
            'client_address' => $this->request->getPost('client_address'),
        ];
        $inserted= $this->CompanyModel->insertClient($userdata);

        if( $inserted)
        {
            return redirect()->to(site_url('clients_list'));
        }
        else{
            return redirect()->to(site_url('add_clients'));
        }
    }
}

public function change_status($clientId, $status)
{
    // Call the updateStatus method in your CompanyModel
    $this->CompanyModel->updateStatus($clientId, $status);

    // Redirect back to the clients list page or any other appropriate page
    return redirect()->to(site_url('clients_list'));
}


public function edit_client($clientId)
{
    // Fetch the client data from the database based on the client ID
    $clientData = $this->CompanyModel->getClientById($clientId);

    // Check if the client data exists
    if ($clientData) {
        // Load the view for editing client data and pass the client data to it
        return view('edit_client', ['client' => $clientData]);
    } else {
        // Client data not found, redirect to a 404 page or any appropriate page
        return redirect()->to(site_url('error404'));
    }
}

public function updateClient($clientId)
{
    // Validate the form input
    $rules = [
        // Add your validation rules here
    ];

    if ($this->validate($rules)) {
        // Form validation passed, update the client record
        $data = [
            // Retrieve form input data
        ];

        // Call your model method to update the client record
        $success = $this->CompanyModel->updateClient($clientId, $data);

        if ($success) {
            // Client updated successfully, redirect to a success page
            return redirect()->to(site_url('clients_list'))->with('success_message', 'Client updated successfully.');
        } else {
            // Failed to update client, redirect back to the form with an error message
            return redirect()->back()->withInput()->with('error_message', 'Failed to update client. Please try again.');
        }
    } else {
        // Form validation failed, redirect back to the form with validation errors
        return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
    }
}

public function project(): string
    {
        return view('project');
    }


























    //---*--//
    public function utilities_color(): string
    {
        return view('utilities_color');
    }
    public function utilities_border(): string
    {
        return view('utilities_border');
    }
    public function utilities_animation(): string
    {
        return view('utilities_animation');
    }
    public function utilities_other(): string
    {
        return view('utilities_other');
    }
    public function charts(): string
    {
        return view('charts');
    }
    public function cards(): string
    {
        return view('cards');
    }
    
    public function blank(): string
    {
        return view('blank');
    }
    public function error404()
    {
        return view('404');
    }
}
