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
    protected $validation; // Add this property

    public function __construct()
    {
        // Load necessary helpers and libraries
        helper(['form', 'url', 'session']);

        // Load the validation service
        $this->validation = \Config\Services::validation(); // Add this line

        $this->CompanyModel = new CompanyModel();
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

//-------------------------------------------------Display list of Clients-----------------------------------------------------------//

public function clients_list()
{
  //  $companyModel = new \App\Models\CompanyModel(); // Load the CompanyModel
    $data['clients'] =  $this->CompanyModel->getclient(); // Fetch all clients from the database

    return view('clients_list', $data); // Pass the data to the view
}


//------------------------------------------Add Clients data in form-----------------------------------------------------------------//

public function add_clients()
{
    // Check if the form is submitted
    if ($this->request->getMethod() === 'post') {
        // Define validation rules
        $rules = [
            'client_name' => 'required',
            'client_email' => 'required|valid_email',
            'client_location' => 'required',
            'status' => 'required|in_list[active,inactive]',
            'client_address' => 'required'
        ];

        // Set validation rules
        $this->validation->setRules($rules);

        // Validate the form input
        if ($this->validation->withRequest($this->request)->run()) {
            // Form validation passed, retrieve form input data
            $userdata = [
                'client_name' => $this->request->getPost('client_name'),
                'client_email' => $this->request->getPost('client_email'),
                'client_location' => $this->request->getPost('client_location'),
                'status' => $this->request->getPost('status'),
                'client_address' => $this->request->getPost('client_address'),
            ];
            
            // Insert client data into the database
            $inserted = $this->CompanyModel->insertClient($userdata);

            if ($inserted) {
                // Redirect to the clients list page if insertion is successful
                return redirect()->to(site_url('clients_list'));
            } else {
                // Redirect back to the add clients form if insertion fails
                return redirect()->to(site_url('add_clients'));
            }
        } else {
            // Form validation failed, redirect back to the form with validation errors
            return redirect()->back()->withInput()->with('validation_errors', $this->validation->getErrors());
        }
    } else {
        // If accessed directly, load the add clients form view
        return view('add_clients');
    }
}
   

//-------------------------------------------Change status of clients list table-----------------------------------------------------------//
    

public function change_status($clientId, $status)
{
    // Call the updateStatus method in your CompanyModel
    $this->CompanyModel->updateStatus($clientId, $status);

    // Redirect back to the clients list page or any other appropriate page
    return redirect()->to(site_url('clients_list'));
}

//---------------------------------------------------------Edit clients information -----------------------------------------------------------//

public function edit_client($clientId)
{
    // Fetch the client data from the database based on the client ID
    $clientData = $this->CompanyModel->getClientById($clientId);

    // Check if the client data exists
    if ($clientData) {
        // Load the view for editing client data and pass the client data and clientId to it
        return view('edit_client', ['client' => $clientData, 'clientId' => $clientId]);
    } else {
        // Client data not found, redirect to a 404 page or any appropriate page
        return redirect()->to(site_url('error404'));
    }
}

//-----------------------------------------Update clients information-----------------------------------------------------------//

public function updateClient($clientId)
{
    // Define validation rules
    $rules = [
        'client_name' => 'required',
        'client_email' => 'required|valid_email',
        'client_location' => 'required',
        'status' => 'required|in_list[active,inactive]',
        'client_address' => 'required'
    ];

    // Validate the form input
    if ($this->validate($rules)) {
        // Form validation passed, retrieve form input data
        $data = [
            'client_name' => $this->request->getPost('client_name'),
            'client_email' => $this->request->getPost('client_email'),
            'client_location' => $this->request->getPost('client_location'),
            'status' => $this->request->getPost('status'),
            'client_address' => $this->request->getPost('client_address'),
        ];

        // Call the updateClient method in the CompanyModel to update the client's details
        $this->CompanyModel->updateClient($clientId, $data);

        // Redirect to the clients list page with a success message
        return redirect()->to(site_url('clients_list'))->with('success_message', 'Client updated successfully.');
    } else {
        // Form validation failed, redirect back to the form with validation errors
        return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
    }
}



//--------------------------------------------Delete Client from clients list-----------------------------------------------------------//

public function delete_client($clientId)
{
    try {
        // Check if the client exists
        $clientDetails = $this->CompanyModel->getClientById($clientId);
        
        // If the client doesn't exist, show an error message
        if (!$clientDetails) {
            return redirect()->to('/clients_list')->with('error', 'Client not found');
        }

        // Soft delete the client
        $success = $this->CompanyModel->deleteClient($clientId);

        if ($success) {
            // Redirect to the clients list page with a success message
            return redirect()->to('/clients_list')->with('success', 'Client deleted successfully');
        } else {
            // Redirect back to the clients list page with an error message
            return redirect()->back()->with('error', 'Failed to delete client');
        }
    } catch (\Exception $e) {
        // Log the error
        log_message('error', 'Error deleting client: ' . $e->getMessage());

        // Redirect back with an error message
        return redirect()->back()->with('error', 'An error occurred while deleting the client');
    }
}

//---------------------------------------------------Display Project list------------------------------------------------------------//


public function projects_list(): string
{
    // Load CompanyModel
    $companyModel = new CompanyModel();

    // Fetch all projects from the database
    $data['projects'] = $companyModel->getProjects();
    $data['list_project'] = $companyModel->get_client_data();
   // print_r($list_data); die;
    
    // Pass the fetched data to the view
    return view('projects_list', $data);
}

//-------------------------------------------Add project of specific clients-----------------------------------------------------------//

    public function add_projects()
    {
        // Fetch clients data from the database
        $clients = $this->CompanyModel->getclient();
        
        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // Define validation rules
            $rules = [
                'project_name' => 'required',
                'client_id' => 'required', // Ensure client_id is required
                'project_start_date' => 'required|valid_date',
                'status' => 'required|in_list[active,inactive]',
                // Add more validation rules as needed
            ];
        
            // Set validation rules
            $this->validation->setRules($rules);
        
            // Validate the form input
            if ($this->validation->withRequest($this->request)->run()) {
                // Form validation passed, retrieve form input data
                $data = [
                    'project_name' => $this->request->getPost('project_name'),
                    'client_id' => $this->request->getPost('client_id'), // Get client ID
                    'project_start_date' => $this->request->getPost('project_start_date'),
                    'status' => $this->request->getPost('status'),
                    // Retrieve more form input data as needed
                ];
        
                // Insert project data into the database
                $inserted = $this->CompanyModel->insertProject($data);
        
                if ($inserted) {
                    // Redirect to the projects list page if insertion is successful
                    return redirect()->to(site_url('projects_list'));
                } else {
                    // Redirect back to the add projects form if insertion fails
                    return redirect()->to(site_url('add_projects'));
                }
            } else {
                // Form validation failed, redirect back to the form with validation errors
                return redirect()->back()->withInput()->with('validation_errors', $this->validation->getErrors());
            }
        } else {
            // If accessed directly, load the add projects form view with clients data
            return view('add_projects', ['clients' => $clients]);
        }
    }
    
//--------------------------------------Edit project information of clients-----------------------------------------------------------//

    public function edit_project($projectId)
    {
        // Load the CompanyModel
        $companyModel = new \App\Models\CompanyModel();
    
        // Get the project details by ID
        $project = $companyModel->getProjectById($projectId);
    
        // Check if the project data exists
        if ($project) {
            // Get the clients list
            $clients = $companyModel->getClients();
    
            // Load the edit project view and pass the project data and clients list
            return view('edit_project', ['project' => $project, 'clients' => $clients]);
        } else {
            // Project data not found, redirect to an error page or appropriate action
            return redirect()->to(site_url('error404'));
        }
    }
    
//------------------------------------------update project of clients-----------------------------------------------------------//

    public function update_project($projectId)
    {
        $rules = [
            'project_name' => 'required',
            'client_id' => 'required',
            'project_start_date' => 'required|valid_date',
            'status' => 'required|in_list[active,inactive]'
            // Add more validation rules as needed
        ];

        if ($this->validate($rules)) {
            $data = [
                'project_name' => $this->request->getPost('project_name'),
                'client_id' => $this->request->getPost('client_id'),
                'project_start_date' => $this->request->getPost('project_start_date'),
                'status' => $this->request->getPost('status'),
                // Retrieve more form input data as needed
            ];

            $this->CompanyModel->updateProject($projectId, $data);

            return redirect()->to(site_url('projects_list'))->with('success_message', 'Project updated successfully.');
        } else {
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }
    }

//--------------------------------------Delete project of specific clients-----------------------------------------------------------//
   
    public function delete_project($projectId)
{
    $companyModel = new \App\Models\CompanyModel();
    $deleted = $companyModel->deleteProject($projectId);
    
    if ($deleted) {
        // Project deleted successfully
        return redirect()->to(site_url('projects_list'))->with('success', 'Project deleted successfully');
    } else {
        // Failed to delete project
        return redirect()->to(site_url('projects_list'))->with('error', 'Failed to delete project');
    }
}

//-----------------------------------Change status of project list table-----------------------------------------------------------//

public function change_status1($projectId, $status)
{
    // Call the updateStatus method in your CompanyModel
    $this->CompanyModel->updateStatus1($projectId, $status);

    // Redirect back to the projects list page or any other appropriate page
    return redirect()->to(site_url('projects_list'));
}

//-----------------------------------SEO projects list-----------------------------------------------------------//

public function SEO_projects()
{
    // Load the CompanyModel
    $companyModel = new \App\Models\CompanyModel();

    // Fetch SEO projects data from the database
    $data['projects'] = $companyModel->getSEOProjects();

    // Load the SEO_projects view with the fetched data
    return view('SEO_projects', $data);
}

//-----------------------------------Add SEO projects list-----------------------------------------------------------//


public function add_seo_projects()
{
    // Fetch projects data from the database
    $projects = $this->CompanyModel->getProjects();
    
    // Check if the form is submitted
    if ($this->request->getMethod() === 'post') {
        // Define validation rules
        $rules = [
            'project_id' => 'required', 
            'project_name' => 'required', // Ensure project_name is required
            'seo_title' => 'required',
            'seo_description' => 'required',
            'description' => 'required',
            'progress' => 'required|in_list[0,1,2]' // Ensure progress is required and one of 0, 1, or 2
            // Add more validation rules as needed
        ];
    
        // Set validation rules
        $this->validation->setRules($rules);
    
        // Validate the form input
        if ($this->validation->withRequest($this->request)->run()) {
            // Form validation passed, retrieve form input data
            $data = [
                'project_id' => $this->request->getPost('project_id'),
                'project_name' => $this->request->getPost('project_name'),
                'seo_title' => $this->request->getPost('seo_title'),
                'seo_description' => $this->request->getPost('seo_description'),
                'description' => $this->request->getPost('description'),
                'progress' => $this->request->getPost('progress'),
                // Retrieve more form input data as needed
            ];
        
            // Insert SEO project data into the database
            $inserted = $this->CompanyModel->insertSEOProject($data);
    
            if ($inserted) {
                // Redirect to the SEO projects list page if insertion is successful
                return redirect()->to(site_url('SEO_projects'));
            } else {
                // Redirect back to the add SEO projects form if insertion fails
                return redirect()->to(site_url('add_seo_projects'));
            }
        } else {
            // Form validation failed, redirect back to the form with validation errors
            return redirect()->back()->withInput()->with('validation_errors', $this->validation->getErrors());
        }
    } else {
        // If accessed directly, load the add SEO projects form view with projects data
        return view('add_seo_projects', ['projects' => $projects]);
    }
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
